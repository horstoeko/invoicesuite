<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdf\zffx;

use DateTime;
use DOMXPath;
use DOMDocument;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\pdf\InvoiceSuiteAbstractPdfConstructor;
use horstoeko\invoicesuite\pdf\zffx\InvoiceSuiteZffxPdfWriter;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use setasign\Fpdi\PdfParser\StreamReader as PdfStreamReader;

/**
 * Class representing the basics for a ZUGFeRD/Factor-X PDF document constructor
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteZffxPdfConstructor extends InvoiceSuiteAbstractPdfConstructor
{
    /**
     * The PDF writer
     *
     * @var InvoiceSuiteZffxPdfWriter
     */
    private $pdfWriter;

    /**
     * Constructor
     *
     * @param InvoiceSuiteAbstractDocumentFormatProvider $newProvider
     * @param string $newRawDocumentContent
     * @param string $newRawPdfContent
     * @return self
     */
    public function __construct(
        InvoiceSuiteAbstractDocumentFormatProvider $newProvider,
        string $newRawDocumentContent,
        string $newRawPdfContent
    ) {
        parent::__construct($newProvider, $newRawDocumentContent, $newRawPdfContent);

        $this->pdfWriter = new InvoiceSuiteZffxPdfWriter();
    }

    /**
     * Generate the final PDF
     *
     * @return InvoiceSuiteAbstractPdfConstructor
     */
    protected function generatePdfDocument(): InvoiceSuiteAbstractPdfConstructor
    {
        // Set deterministic mode

        $this->pdfWriter->setDeterministicModeEnabled($this->getDeterministicMode());

        // Attach the invoice document

        $this->pdfWriter->attach(
            PdfStreamReader::createByString($this->getRawDocumentContent()),
            $this->getCurrentDocumentFormatProvider()->getDefaultPdfAttachmentFilename(),
            'Factur-X Invoice',
            $this->getDocumentRelationshipType(),
            'text#2Fxml'
        );

        // Attach additional documents

        foreach ($this->getaddAdditionalDocuments() as $additionalDocumentToAttach) {
            $this->pdfWriter->attach(
                PdfStreamReader::createByString($additionalDocumentToAttach['content']),
                $additionalDocumentToAttach['filename'],
                $additionalDocumentToAttach['displayname'],
                $additionalDocumentToAttach['relationship'],
                $additionalDocumentToAttach['mimetype'],
            );
        }

        // Attachment pane

        if ($this->getAttachmentPaneVisibility() === true) {
            $this->pdfWriter->openAttachmentPane();
        }

        // Copy pages from the original PDF

        $pageCount = $this->pdfWriter->setSourceFile(PdfStreamReader::createByString($this->getRawPdfContent()));

        for ($pageNumber = 1; $pageNumber <= $pageCount; ++$pageNumber) {
            $pageContent = $this->pdfWriter->importPage($pageNumber, '/MediaBox', true, true);
            $this->pdfWriter->AddPage();
            $this->pdfWriter->useTemplate($pageContent, 0, 0, null, null, true);
        }

        // Set PDF version 1.7 according to PDF/A-3 ISO 32000-1

        $this->pdfWriter->setPdfVersion('1.7', true);

        // Update meta data (e.g. such as author, producer, title)

        $this->updatePdfMetadata();

        return $this;
    }

    protected function getGeneratedPdfDocumentContent(): string
    {
        return $this->pdfWriter->Output('S');
    }

    protected function saveGeneratedPdfDocumentToFile(string $toFilename): InvoiceSuiteAbstractPdfConstructor
    {
        $this->pdfWriter->Output('F', $toFilename);

        return $this;
    }

    /**
     * Update PDF metadata to according to FacturX/ZUGFeRD XML data.
     *
     * @return void
     */
    private function updatePdfMetadata(): void
    {
        $pdfCreatorToolInfos = $this->getCreatorToolName();

        $pdfMetadataInfos = $this->preparePdfMetadata();
        $this->pdfWriter->setPdfMetadataInfos($pdfMetadataInfos);

        $xmp = simplexml_load_file(InvoiceSuitePathUtils::combinePathWithFile(InvoiceSuitePathUtils::combineAllPaths(__DIR__, "assets"), "facturx_extension_schema.xmp"));
        $descriptionNodes = $xmp->xpath('rdf:Description');

        $descFx = $descriptionNodes[0];
        $descFx->children('fx', true)->{'ConformanceLevel'} = strtoupper($this->getXmlAttachmentXmpName());
        $descFx->children('fx', true)->{'Version'} = strtoupper($this->getXmlAttachmentXmpVersion());
        $descFx->children('fx', true)->{'DocumentFileName'} = $this->getCurrentDocumentFormatProvider()->getDefaultPdfAttachmentFilename();
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
     * @return array{author: string, keywords: string, title: string, subject: string, createdDate: string, modifiedDate: string}
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
     * @return array{invoiceId: string, docTypeName: string, seller: string, date: string}
     */
    protected function extractInvoiceInformations(): array
    {
        $domDocument = new DOMDocument();
        $domDocument->loadXML($this->getRawDocumentContent());

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
            case InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE:
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
     * @param string $whichTemplate
     * @param string $defaultValue
     * @param array{invoiceId: string, docTypeName: string, seller: string, date: string} $invoiceInformation
     * @return string
     */
    private function buildMetadataField(string $whichTemplate, string $defaultValue, array $invoiceInformation): string
    {
        $xmlContent = $this->getRawDocumentContent();

        if (is_callable($this->getMetaInformationCallback())) {
            $callbackResult = call_user_func($this->getMetaInformationCallback(), $whichTemplate, $xmlContent, $invoiceInformation, $defaultValue);
            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($callbackResult)) {
                return $callbackResult;
            }
        }

        $allTemplates = [
            'author' => $this->getMetaInformationAuthorTemplate(),
            'keywords' => $this->getMetaInformationKeywordTemplate(),
            'title' => $this->getMetaInformationTitleTemplate(),
            'subject' => $this->getMetaInformationSubjectTemplate(),
        ];

        if (!isset($allTemplates[$whichTemplate])) {
            return $defaultValue;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($allTemplates[$whichTemplate])) {
            return $defaultValue;
        }

        return sprintf(
            $allTemplates[$whichTemplate],
            $invoiceInformation['invoiceId'],
            $invoiceInformation['docTypeName'],
            $invoiceInformation['seller'],
            $invoiceInformation['date']
        );
    }

    /**
     * Return the XMP name
     *
     * @return string
     */
    protected function getXmlAttachmentXmpName(): string
    {
        return $this->getCurrentDocumentFormatProvider()->getFormatProviderParameterValue('PdfXmpName', '');
    }

    /**
     * Return the XMP veesion
     *
     * @return string
     */
    protected function getXmlAttachmentXmpVersion(): string
    {
        return $this->getCurrentDocumentFormatProvider()->getFormatProviderParameterValue('PdfXmüVersion', '');
    }
}
