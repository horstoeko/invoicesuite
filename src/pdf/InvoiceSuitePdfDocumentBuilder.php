<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdf;

use DateTime;
use DOMXPath;
use DOMDocument;
use horstoeko\mimedb\MimeDb;
use JMS\Serializer\Exception\RuntimeException;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\concerns\HandlesFormatProviders;
use setasign\Fpdi\PdfParser\StreamReader as PdfStreamReader;
use horstoeko\invoicesuite\concerns\HandlesCurrentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\InvoiceSuitePackageVersion;

class InvoiceSuitePdfDocumentBuilder
{
    use HandlesCurrentFormatProvider;
    use HandlesFormatProviders;

    /**
     * Internal buffer for PDF data
     *
     * @var string
     */
    protected string $currentPdfContent = "";

    /**
     * Internal buffer for XML data
     *
     * @var string
     */
    protected string $currentXmlContent = "";

    /**
     * Internal PDF helper instance
     *
     * @var InvoiceSuitePdfWriter
     */
    protected InvoiceSuitePdfWriter $pdfWriter;

    /**
     * The relationship type to use for the XML attachment. Detault is Data
     *
     * @var string
     */

    private $attachmentRelationshipType = 'Data';

    /**
     * List of files which should be additionally attached to PDF
     *
     * @var array
     */
    private $additionalFilesToAttach = [];

    /**
     * Additional creator tool (e.g. the ERP software that called the PHP library)
     *
     * @var string
     */
    private $metadataAdditionalCreatorTool = "";

    /**
     * User-defined template for the author-metainformation
     *
     * @var string
     */
    private $metadataAuthorTemplate = "";

    /**
     * User-defined template for the keyword-metainformation
     *
     * @var string
     */
    private $metadataKeywordTemplate = "";

    /**
     * User-defined template for the title-metainformation
     *
     * @var string
     */
    private $metadataTitleTemplate = "";

    /**
     * User-defined template for the subject-metainformation
     *
     * @var string
     */
    private $metadataSubjectTemplate = "";

    /**
     * User-defined callback function for all metainformation
     *
     * @var callable|null
     */
    private $metadataCallback;

    /**
     * Internal flag which indicate, that attachment pane should be opened
     *
     * @var boolean
     */
    private $attachmentPaneVisibility = true;

    /**
     * Constants for Relationship types
     * 'Data', 'Alternative', 'Source', 'Supplement', 'Unspecified'
     */
    public const AF_RELATIONSHIP_DATA = "Data";

    public const AF_RELATIONSHIP_ALTERNATIVE = "Alternative";

    public const AF_RELATIONSHIP_SOURCE = "Source";

    public const AF_RELATIONSHIP_SUPPLEMENT = "Supplement";

    public const AF_RELATIONSHIP_UNSPECIFIED = "Unspecified";

    /**
     * Create a new instance of InvoiceSuitePdfDocumentBuilder by given PDF content and XML content
     *
     * @param string $newPdfContent
     * @param string $newXmlContent
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public static function createFromPdfContentAndXmlContent(string $newPdfContent, string $newXmlContent): self
    {
        return (new static())->setCurrentPdfContent($newPdfContent)->setCurrentXmlContent($newXmlContent);
    }

    /**
     * Create a new instance of InvoiceSuitePdfDocumentBuilder by given PDF filename and XML content
     *
     * @param string $newPdfFile
     * @param string $newXmlContent
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public static function createFromPdfFileAndXmlContent(string $newPdfFile, string $newXmlContent): self
    {
        if (!file_exists($newPdfFile)) {
            throw new InvoiceSuiteFileNotFoundException($newPdfFile);
        }

        $newPdfContent = file_get_contents($newPdfFile);

        if ($newPdfContent === false) {
            throw new InvoiceSuiteFileNotReadableException($newPdfFile);
        }

        return static::createFromPdfContentAndXmlContent($newPdfContent, $newXmlContent);
    }

    /**
     * Create a new instance of InvoiceSuitePdfDocumentBuilder by given PDF content and XML filename
     *
     * @param string $newPdfContent
     * @param string $newXmlFile
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public static function createFromPdfContentAndXmlFile(string $newPdfContent, string $newXmlFile): self
    {
        if (!file_exists($newXmlFile)) {
            throw new InvoiceSuiteFileNotFoundException($newXmlFile);
        }

        $newXmlContent = file_get_contents($newXmlFile);

        if ($newXmlContent === false) {
            throw new InvoiceSuiteFileNotReadableException($newXmlFile);
        }

        return static::createFromPdfContentAndXmlContent($newPdfContent, $newXmlContent);
    }

    /**
     * Create a new instance of InvoiceSuitePdfDocumentBuilder by given PDF filename and XML filename
     *
     * @param string $newPdfFile
     * @param string $newXmlFile
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public static function createFromPdfFileAndXmlFile(string $newPdfFile, string $newXmlFile): self
    {
        if (!file_exists($newPdfFile)) {
            throw new InvoiceSuiteFileNotFoundException($newPdfFile);
        }

        $newPdfContent = file_get_contents($newPdfFile);

        if ($newPdfContent === false) {
            throw new InvoiceSuiteFileNotReadableException($newPdfFile);
        }

        if (!file_exists($newXmlFile)) {
            throw new InvoiceSuiteFileNotFoundException($newXmlFile);
        }

        $newXmlContent = file_get_contents($newXmlFile);

        if ($newXmlContent === false) {
            throw new InvoiceSuiteFileNotReadableException($newXmlFile);
        }

        return static::createFromPdfContentAndXmlContent($newPdfContent, $newXmlContent);
    }

    /**
     * Create a new instance of InvoiceSuitePdfDocumentBuilder by given PDF content and an InvoiceSuiteDocumentBuilder
     *
     * @param string $newPdfContent
     * @param InvoiceSuiteDocumentBuilder $newDocumentBuilder
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    public static function createFromPdfContentAndDocumentBuilder(string $newPdfContent, InvoiceSuiteDocumentBuilder $newDocumentBuilder): self
    {
        return (new static())->setCurrentPdfContent($newPdfContent)->setCurrentDocumentBuilder($newDocumentBuilder);
    }

    /**
     * Create a new instance of InvoiceSuitePdfDocumentBuilder by given PDF filename and an InvoiceSuiteDocumentBuilder
     *
     * @param string $newPdfFile
     * @param InvoiceSuiteDocumentBuilder $newDocumentBuilder
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    public static function createFromPdfFileAndDocumentBuilder(string $newPdfFile, InvoiceSuiteDocumentBuilder $newDocumentBuilder): self
    {
        if (!file_exists($newPdfFile)) {
            throw new InvoiceSuiteFileNotFoundException($newPdfFile);
        }

        $newPdfContent = file_get_contents($newPdfFile);

        if ($newPdfContent === false) {
            throw new InvoiceSuiteFileNotReadableException($newPdfFile);
        }

        return static::createFromPdfContentAndDocumentBuilder($newPdfContent, $newDocumentBuilder);
    }

    /**
     * Constructor (hidden)
     *
     * @param string $pdfContent
     * @param string $xmlContent
     */
    final protected function __construct()
    {
        $this->pdfWriter = new InvoiceSuitePdfWriter();
    }

    /**
     * Returns the currently given PDF content
     *
     * @return string
     */
    public function getCurrentPdfContent(): string
    {
        return $this->currentPdfContent;
    }

    /**
     * Internal method for setting up the PDF content to use
     *
     * @param string $newPdfContent
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteInvalidArgumentException
     */
    protected function setCurrentPdfContent(string $newPdfContent): self
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPdfContent)) {
            throw new InvoiceSuiteInvalidArgumentException('Invalid PDF content given');
        }

        $this->currentPdfContent = $newPdfContent;

        return $this;
    }

    /**
     * Returns the currently given XML content
     *
     * @return string
     */
    public function getCurrentXmlContent(): string
    {
        return $this->currentXmlContent;
    }

    /**
     * Internal method for setting up the XML content to use
     *
     * @param string $newXmlContent
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    protected function setCurrentXmlContent(string $newXmlContent): self
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newXmlContent)) {
            throw new InvoiceSuiteInvalidArgumentException('Invalid XML content given');
        }

        $this->resolveAvailableFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredFormatProviders(),
            fn($formatProvider) =>
                ($formatProvider->isSatisfiableBySerializedContent($newXmlContent)) &&
                ($formatProvider->getFormatProviderParameterValue('PDFEmbeddable', false) === true)
        );

        if ($formatProviders === []) {
            throw new InvoiceSuiteFormatProviderNotFoundException("unknown");
        }

        $formatProvider = reset($formatProviders);

        $this->setCurrentFormatProvider($formatProvider);
        $this->currentXmlContent = $newXmlContent;

        return $this;
    }

    /**
     * Internal method for setting up the InvoiceSuiteDocumentBuilder to use
     * This will setup the currrent format provider and the XML content to use
     *
     * @param InvoiceSuiteDocumentBuilder $newDocumentBuilder
     * @return self
     */
    protected function setCurrentDocumentBuilder(InvoiceSuiteDocumentBuilder $newDocumentBuilder): self
    {
        $this->setCurrentFormatProvider($newDocumentBuilder->getCurrentFormatProvider());
        $this->currentXmlContent = $newDocumentBuilder->getContentAsXml();

        return $this;
    }

    /**
     * Returns the relationship type for the XML attachment. This
     * can return 'Data', 'Alternative'
     *
     * @return string
     */
    public function getAttachmentRelationshipType(): string
    {
        return $this->attachmentRelationshipType;
    }

    /**
     * Set the type of relationship for the XML attachment. Allowed
     * types are 'Data', 'Alternative' and 'Source'
     *
     * @param  string $newRelationshipType Type of relationship
     * @return static
     */
    public function setAttachmentRelationshipType(string $newRelationshipType)
    {
        if (!in_array($newRelationshipType, [static::AF_RELATIONSHIP_DATA, static::AF_RELATIONSHIP_ALTERNATIVE, static::AF_RELATIONSHIP_SOURCE])) {
            $newRelationshipType = static::AF_RELATIONSHIP_DATA;
        }

        $this->attachmentRelationshipType = $newRelationshipType;

        return $this;
    }

    /**
     * Set the type of relationship for the XML attachment to "Alternative"
     *
     * @return static
     */
    public function setAttachmentRelationshipTypeToAlternative()
    {
        return $this->setAttachmentRelationshipType(static::AF_RELATIONSHIP_ALTERNATIVE);
    }

    /**
     * Set the type of relationship for the XML attachment to "Source"
     *
     * @return static
     */
    public function setAttachmentRelationshipTypeToSource()
    {
        return $this->setAttachmentRelationshipType(static::AF_RELATIONSHIP_SOURCE);
    }

    /**
     * Attach an additional file to PDF. The file that is specified in $fullFilename
     * must exists
     *
     * @param string $fullFilename
     * @param string $displayName
     * @param string $relationshipType
     * @return $this
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public function attachAdditionalFileFromFile(string $fullFilename, string $displayName = "", string $relationshipType = "")
    {
        // Checks that the file really exists

        if ($fullFilename === '') {
            throw new InvoiceSuiteInvalidArgumentException("You must specify a filename for the content to attach");
        }

        if (!file_exists($fullFilename)) {
            throw new InvoiceSuiteFileNotFoundException($fullFilename);
        }

        // Load content

        $content = file_get_contents($fullFilename);

        if ($content === false) {
            throw new InvoiceSuiteFileNotReadableException($fullFilename);
        }

        // Add attachment

        $this->attachAdditionalFileFromContent(
            $content,
            $fullFilename,
            $displayName,
            $relationshipType,
        );

        return $this;
    }

    /**
     * Attach an additional file to PDF by a content
     *
     * @param string $content
     * @param string $filename
     * @param string $displayName
     * @param string $relationshipType
     * @return $this
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function attachAdditionalFileFromContent(string $content, string $filename, string $displayName = "", string $relationshipType = "")
    {
        // Check content. The content must not be empty

        if ($content === '') {
            throw new InvoiceSuiteInvalidArgumentException("You must specify a content to attach");
        }

        // Check filename. The filename must not be empty

        if ($filename === '') {
            throw new InvoiceSuiteInvalidArgumentException("You must specify a filename for the content to attach");
        }

        // Mimetype for the file must exist

        $mimeType = (new MimeDb())->findFirstMimeTypeByExtension(InvoiceSuiteFileUtils::getFileExtension($filename));

        if (is_null($mimeType)) {
            throw new InvoiceSuiteInvalidArgumentException("Unknown mimetypr");
        }

        // Sanatize relationship type

        if ($relationshipType === '') {
            $relationshipType = static::AF_RELATIONSHIP_SUPPLEMENT;
        }

        if (!in_array($relationshipType, [static::AF_RELATIONSHIP_DATA, static::AF_RELATIONSHIP_ALTERNATIVE, static::AF_RELATIONSHIP_SOURCE, static::AF_RELATIONSHIP_SUPPLEMENT, static::AF_RELATIONSHIP_UNSPECIFIED])) {
            $relationshipType = static::AF_RELATIONSHIP_SUPPLEMENT;
        }

        // Sanatize displayname

        if ($displayName === '') {
            $displayName = InvoiceSuiteFileUtils::getFilenameWithExtension($filename);
        }

        // Add to attachment list

        $this->additionalFilesToAttach[] = [
            PdfStreamReader::createByString($content),
            InvoiceSuiteFileUtils::getFilenameWithExtension($filename),
            $displayName,
            $relationshipType,
            str_replace('/', '#2F', $mimeType)
        ];

        return $this;
    }

    /**
     * Get the the deterministic mode. This mode should only be used
     * for testing purposes
     *
     * @return bool
     */
    public function getDeterministicModeEnabled(): bool
    {
        return $this->pdfWriter->getDeterministicModeEnabled();
    }

    /**
     * Set the the deterministic mode. This mode should only be used
     * for testing purposes
     *
     * @param  bool $newDeterministicModeEnabled
     * @return static
     */
    public function setDeterministicModeEnabled(bool $newDeterministicModeEnabled)
    {
        $this->pdfWriter->setDeterministicModeEnabled($newDeterministicModeEnabled);

        return $this;
    }

    /**
     * Gets an additional creator tool (e.g. the ERP software that called the PHP library)
     *
     * @return string
     */
    public function getMetadataAdditionalCreatorTool(): string
    {
        return $this->metadataAdditionalCreatorTool;
    }

    /**
     * Sets an additional creator tool (e.g. the ERP software that called the PHP library)
     *
     * @param  string $newMetadataAdditionalCreatorTool The name of the creator
     * @return static
     */
    public function setMetadataAdditionalCreatorTool(string $newMetadataAdditionalCreatorTool)
    {
        $this->metadataAdditionalCreatorTool = $newMetadataAdditionalCreatorTool;

        return $this;
    }

    /**
     * Returns the creator tool name (the PHP library, and if given also the additional creator tool)
     *
     * @return string
     */
    private function getMetadataCreatorToolName(): string
    {
        $toolName = sprintf('InvoiceSuite Library v%s by HorstOeko', InvoiceSuitePackageVersion::getInstalledVersion());

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->getMetadataAdditionalCreatorTool())) {
            return $this->getMetadataAdditionalCreatorTool() . ' / ' . $toolName;
        }

        return $toolName;
    }

    /**
     * Set the template for the author meta information
     *
     * @param  string $newMetadataAuthorTemplate
     * @return static
     */
    public function setMetadataAuthorTemplate(string $newMetadataAuthorTemplate)
    {
        $this->metadataAuthorTemplate = $newMetadataAuthorTemplate;

        return $this;
    }

    /**
     * Set the template for the keyword meta information
     *
     * @param  string $newMetadataKeywordTemplate
     * @return static
     */
    public function setMetadataKeywordTemplate(string $newMetadataKeywordTemplate)
    {
        $this->metadataKeywordTemplate = $newMetadataKeywordTemplate;

        return $this;
    }

    /**
     * Set the template for the title meta information
     *
     * @param  string $newMetadataTitleTemplate
     * @return static
     */
    public function setMetadataTitleTemplate(string $newMetadataTitleTemplate)
    {
        $this->metadataTitleTemplate = $newMetadataTitleTemplate;

        return $this;
    }

    /**
     * Set the template for the subject meta information
     *
     * @param  string $newMetadataSubjectTemplate
     * @return static
     */
    public function setMetadataSubjectTemplate(string $newMetadataSubjectTemplate)
    {
        $this->metadataSubjectTemplate = $newMetadataSubjectTemplate;

        return $this;
    }

    /**
     * Set the user defined callback for generating custom meta information
     *
     * @param  callable|null $newMetadataCallback
     * @return static
     */
    public function setMetadataCallback(?callable $newMetadataCallback = null)
    {
        $this->metadataCallback = is_callable($newMetadataCallback) ? $newMetadataCallback : null;

        return $this;
    }

    /**
     * Returns true if the attachment pane is visible, otherwise false
     *
     * @return boolean
     */
    public function getAttachmentPaneVisibility(): bool
    {
        return $this->attachmentPaneVisibility;
    }

    /**
     * Sets the flag that indicates, that the attachment pane should be visible on start (True)
     * or hidden (False)
     *
     * @param boolean $attachmentPaneVisibility Flag that indicates, that the attachment pane should be visible or hidden
     * @return static
     */
    public function setAttachmentPaneVisibility(bool $attachmentPaneVisibility)
    {
        $this->attachmentPaneVisibility = $attachmentPaneVisibility;

        return $this;
    }

    /**
     * Show attachment pane on startup
     *
     * @return static
     */
    public function setAttachmentPaneVisible()
    {
        $this->setAttachmentPaneVisibility(true);

        return $this;
    }

    /**
     * Hide attachment pane on startup
     *
     * @return static
     */
    public function setAttachmentPaneHidden()
    {
        $this->setAttachmentPaneVisibility(false);

        return $this;
    }

    /**
     * Internal function which sets up the PDF
     *
     * @return void
     */
    private function startCreatePdf(): void
    {
        // Get PDF data

        $pdfDataRef = PdfStreamReader::createByString($this->getCurrentPdfContent());

        // Get XML data from Builder

        $documentBuilderXmlDataRef = PdfStreamReader::createByString($this->getCurrentXmlContent());

        // Start

        $this->pdfWriter->attach(
            $documentBuilderXmlDataRef,
            $this->getCurrentFormatProviderParameterValue('PDFXmlAttachmentFilename', 'factur-x.xml'),
            $this->getCurrentFormatProviderParameterValue('PDFXmlAttachmentName', 'Factur-X Invoice'),
            $this->getAttachmentRelationshipType(),
            'text#2Fxml'
        );

        // Add additional attachments

        foreach ($this->additionalFilesToAttach as $fileToAttach) {
            $this->pdfWriter->attach(
                $fileToAttach[0],
                $fileToAttach[1],
                $fileToAttach[2],
                $fileToAttach[3],
                $fileToAttach[4],
            );
        }

        // Set flag to always show the attachment pane

        if ($this->getAttachmentPaneVisibility() === true) {
            $this->pdfWriter->openAttachmentPane();
        }

        // Copy pages from the original PDF

        $pageCount = $this->pdfWriter->setSourceFile($pdfDataRef);

        for ($pageNumber = 1; $pageNumber <= $pageCount; ++$pageNumber) {
            $pageContent = $this->pdfWriter->importPage($pageNumber, '/MediaBox', true, true);
            $this->pdfWriter->AddPage();
            $this->pdfWriter->useTemplate($pageContent, 0, 0, null, null, true);
        }

        // Set PDF version 1.7 according to PDF/A-3 ISO 32000-1

        $this->pdfWriter->setPdfVersion('1.7', true);

        // Update meta data (e.g. such as author, producer, title)

        $this->updatePdfMetadata();
    }

    /**
     * Update PDF metadata to according to FacturX/ZUGFeRD XML data.
     *
     * @return void
     */
    private function updatePdfMetadata(): void
    {
        $pdfCreatorToolInfos = $this->getMetadataCreatorToolName();

        $pdfMetadataInfos = $this->preparePdfMetadata();
        $this->pdfWriter->setPdfMetadataInfos($pdfMetadataInfos);

        $xmp = simplexml_load_file(InvoiceSuiteSettings::getFullPdfXmpMetaDataFilename());
        $descriptionNodes = $xmp->xpath('rdf:Description');

        $descFx = $descriptionNodes[0];
        $descFx->children('fx', true)->{'ConformanceLevel'} = strtoupper($this->getCurrentFormatProviderParameterValue('PDFXmpName', ''));
        $descFx->children('fx', true)->{'Version'} = strtoupper($this->getCurrentFormatProviderParameterValue('PDFXmpVersion', '1.0'));
        $descFx->children('fx', true)->{'DocumentFileName'} = $this->getCurrentFormatProviderParameterValue('PDFXmpVersion', 'factur-x.xml');
        $this->pdfWriter->addMetadataDescriptionNode($descFx->asXML());

        $this->pdfWriter->addMetadataDescriptionNode($descriptionNodes[1]->asXML());

        $descPdfAid = $descriptionNodes[2];
        $this->pdfWriter->addMetadataDescriptionNode($descPdfAid->asXML());

        $descDc = $descriptionNodes[3];
        $descNodes = $descDc->children('dc', true);
        $descNodes->title->children('rdf', true)->Alt->li = $pdfMetadataInfos['title'];
        $descNodes->creator->children('rdf', true)->Seq->li = $pdfMetadataInfos['author'];
        $descNodes->description->children('rdf', true)->Alt->li = $pdfMetadataInfos['subject'];

        $this->pdfWriter->addMetadataDescriptionNode($descDc->asXML());

        $descAdobe = $descriptionNodes[4];
        $descAdobe->children('pdf', true)->{'Producer'} = 'FPDF';
        $this->pdfWriter->addMetadataDescriptionNode($descAdobe->asXML());

        $descXmp = $descriptionNodes[5];
        $xmpNodes = $descXmp->children('xmp', true);
        $xmpNodes->{'CreatorTool'} = $pdfCreatorToolInfos;
        $xmpNodes->{'CreateDate'} = $pdfMetadataInfos['createdDate'];
        $xmpNodes->{'ModifyDate'} = $pdfMetadataInfos['modifiedDate'];

        $this->pdfWriter->addMetadataDescriptionNode($descXmp->asXML());

        $this->pdfWriter->SetAuthor($pdfMetadataInfos['author'], true);
        $this->pdfWriter->SetKeywords($pdfMetadataInfos['keywords'], true);
        $this->pdfWriter->SetTitle($pdfMetadataInfos['title'], true);
        $this->pdfWriter->SetSubject($pdfMetadataInfos['subject'], true);
        $this->pdfWriter->SetCreator($pdfCreatorToolInfos, true);
    }

    /**
     * Prepare PDF Metadata informations from FacturX/ZUGFeRD XML.
     *
     * @return array
     */
    private function preparePdfMetadata(): array
    {
        $invoiceInformations = $this->extractInvoiceInformations();

        $dateString = date('Y-m-d', strtotime($invoiceInformations['date']));

        $author = $invoiceInformations['seller'];
        $keywords = sprintf('%s, FacturX/ZUGFeRD', $invoiceInformations['docTypeName']);
        $title = sprintf('%s : %s %s', $invoiceInformations['seller'], $invoiceInformations['docTypeName'], $invoiceInformations['invoiceId']);
        $subject = sprintf('FacturX/ZUGFeRD %s %s dated %s issued by %s', $invoiceInformations['docTypeName'], $invoiceInformations['invoiceId'], $dateString, $invoiceInformations['seller']);

        return [
            'author' => $this->buildMetadataField('author', $author, $invoiceInformations),
            'keywords' => $this->buildMetadataField('keywords', $keywords, $invoiceInformations),
            'title' => $this->buildMetadataField('title', $title, $invoiceInformations),
            'subject' => $this->buildMetadataField('subject', $subject, $invoiceInformations),
            'createdDate' => $invoiceInformations['date'],
            'modifiedDate' => (new DateTime())->format('Y-m-d\TH:i:sP'),
        ];
    }

    /**
     * Extract major invoice information from FacturX/ZUGFeRD XML.
     *
     * @return array
     */
    protected function extractInvoiceInformations(): array
    {
        $domDocument = new DOMDocument();
        $domDocument->loadXML($this->getCurrentXmlContent());

        $xpath = new DOMXPath($domDocument);

        $dateXpath = $xpath->query('//rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString');
        $date = $dateXpath->item(0)->nodeValue;
        $dateReformatted = (new DateTime())->setTimestamp(strtotime($date))->format('Y-m-d\TH:i:sP');

        $invoiceIdXpath = $xpath->query('//rsm:ExchangedDocument/ram:ID');
        $invoiceId = $invoiceIdXpath->item(0)->nodeValue;

        $sellerXpath = $xpath->query('//ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:Name');
        $sellerName = $sellerXpath->item(0)->nodeValue;

        $docTypeXpath = $xpath->query('//rsm:ExchangedDocument/ram:TypeCode');
        $docTypeCode = $docTypeXpath->item(0)->nodeValue;

        switch ($docTypeCode) {
            case '381':
                $docTypeName = 'Credit Note';
                break;
            default:
                $docTypeName = 'Invoice';
                break;
        }

        return [
            'invoiceId' => $invoiceId,
            'docTypeName' => $docTypeName,
            'seller' => $sellerName,
            'date' => $dateReformatted,
        ];
    }

    /**
     * Returns the parsed meta-field content
     *
     * @param  string $templateId
     * @param  string $defaultValue
     * @param  array  $invoiceInformation
     * @return string
     */
    private function buildMetadataField(string $templateId, string $defaultValue, array $invoiceInformation): string
    {
        $xmlContent = $this->getCurrentXmlContent();

        if (is_callable($this->metadataCallback)) {
            $callbackResult = call_user_func($this->metadataCallback, $templateId, $xmlContent, $invoiceInformation, $defaultValue);
            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($callbackResult)) {
                return $callbackResult;
            }
        }

        $templates = [
            'author' => $this->metadataAuthorTemplate,
            'keywords' => $this->metadataKeywordTemplate,
            'title' => $this->metadataTitleTemplate,
            'subject' => $this->metadataSubjectTemplate,
        ];

        if (!isset($templates[$templateId])) {
            return $defaultValue;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($templates[$templateId])) {
            return $defaultValue;
        }

        return sprintf(
            $templates[$templateId],
            $invoiceInformation['invoiceId'],
            $invoiceInformation['docTypeName'],
            $invoiceInformation['seller'],
            $invoiceInformation['date']
        );
    }
}
