<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdfs\abstracts;

use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesRawContents;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\InvoiceSuitePackageVersion;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\mimedb\MimeDb;

/**
 * Class representing the basics for a PDF document constructor
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractPdfConstructor
{
    use HandlesCurrentDocumentFormatProvider;
    use HandlesRawContents;

    /**
     * Constant for Relationship types "Data"
     */
    public const AF_RELATIONSHIP_DATA = 'Data';

    /**
     * Constant for Relationship types "Alternative"
     */
    public const AF_RELATIONSHIP_ALTERNATIVE = 'Alternative';

    /**
     * Constant for Relationship types "Source"
     */
    public const AF_RELATIONSHIP_SOURCE = 'Source';

    /**
     * Constant for Relationship types "Supplement"
     */
    public const AF_RELATIONSHIP_SUPPLEMENT = 'Supplement';

    /**
     * Constant for Relationship types "Unspecified"
     */
    public const AF_RELATIONSHIP_UNSPECIFIED = 'Unspecified';

    /**
     * The additional creator tool
     *
     * @var string
     */
    private $additionalCreatorTool = '';

    /**
     * The relationship type of the attached invoice document
     *
     * @var string
     */
    private $documentRelationshipType = 'Data';

    /**
     * List which holds the additional attachments
     *
     * @var array<int, array{content: string, filename: string, displayname: string, relationship: string, mimetype: string}>
     */
    private $additionalDocumentsToAttach = [];

    /**
     * Status of deterministic mode
     *
     * @var bool
     */
    private $deterministicMode = false;

    /**
     * User-defined template for the author-metainformation
     *
     * @var string
     */
    private $metaInformationAuthorTemplate = '';

    /**
     * User-defined template for the keyword-metainformation
     *
     * @var string
     */
    private $metaInformationKeywordTemplate = '';

    /**
     * User-defined template for the title-metainformation
     *
     * @var string
     */
    private $metaInformationTitleTemplate = '';

    /**
     * User-defined template for the subject-metainformation
     *
     * @var string
     */
    private $metaInformationSubjectTemplate = '';

    /**
     * User-defined callback function for all meta information
     *
     * @var null|callable
     */
    private $metaInformationCallback;

    /**
     * Flag which indicates, that attachment pane should be opened or is closed
     *
     * @var bool
     */
    private $attachmentPaneVisibility = true;

    /**
     * Constructor
     *
     * @param  InvoiceSuiteAbstractDocumentFormatProvider $newProvider
     * @param  string                                     $newRawDocumentContent
     * @param  string                                     $newRawPdfContent
     * @return static
     */
    public function __construct(
        InvoiceSuiteAbstractDocumentFormatProvider $newProvider,
        string $newRawDocumentContent,
        string $newRawPdfContent
    ) {
        $this->setCurrentDocumentFormatProvider($newProvider);
        $this->setRawDocumentContent($newRawDocumentContent);
        $this->setRawPdfContent($newRawPdfContent);
    }

    /**
     * Generate the final PDF and get the content as string
     *
     * @return string
     */
    public function generatePdfDocumentAndGetContent(): string
    {
        return $this->generatePdfDocument()->getGeneratedPdfDocumentContent();
    }

    /**
     * Generate the final PDF and save it to a file
     *
     * @param  string $toFilename
     * @return static
     */
    public function generatePdfDocumentAndSaveToFile(string $toFilename): static
    {
        return $this->generatePdfDocument()->saveGeneratedPdfDocumentToFile($toFilename);
    }

    /**
     * Get the additional creator tool (e.g. the ERP software that called the PHP library)
     *
     * @return string
     */
    public function getAdditionalCreatorTool(): string
    {
        return $this->additionalCreatorTool;
    }

    /**
     * Set the additional creator tool (e.g. the ERP software that called the PHP library)
     *
     * @param  string $newAdditionalCreatorTool
     * @return static
     */
    public function setAdditionalCreatorTool(string $newAdditionalCreatorTool): static
    {
        $this->additionalCreatorTool = $newAdditionalCreatorTool;

        return $this;
    }

    /**
     * Returns the creator tool name (the PHP library, and if given also the additional creator tool)
     *
     * @return string
     */
    public function getCreatorToolName(): string
    {
        $creatorToolName = sprintf('InvoiceSuite PHP library v%s by HorstOeko', InvoiceSuitePackageVersion::getInstalledVersion());

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->getAdditionalCreatorTool())) {
            return sprintf('%s / %s', $this->getAdditionalCreatorTool(), $creatorToolName);
        }

        return $creatorToolName;
    }

    /**
     * Get the relationship type of the attached invoice document
     *
     * @return string
     */
    public function getDocumentRelationshipType(): string
    {
        return $this->documentRelationshipType;
    }

    /**
     * Set the relationship type of the attached invoice document
     *
     * @param  string $newDocumentRelationshipType
     * @return static
     */
    public function setDocumentRelationshipType(string $newDocumentRelationshipType): static
    {
        if (!in_array($newDocumentRelationshipType, [static::AF_RELATIONSHIP_DATA, static::AF_RELATIONSHIP_ALTERNATIVE, static::AF_RELATIONSHIP_SOURCE])) {
            $newDocumentRelationshipType = static::AF_RELATIONSHIP_DATA;
        }

        $this->documentRelationshipType = $newDocumentRelationshipType;

        return $this;
    }

    /**
     * Set the type of relationship for the invoice attachment to "Data"
     *
     * @return static
     */
    public function setDocumentRelationshipTypeToData()
    {
        return $this->setDocumentRelationshipType(static::AF_RELATIONSHIP_DATA);
    }

    /**
     * Set the type of relationship for the invoice attachment to "Alternative"
     *
     * @return static
     */
    public function setDocumentRelationshipTypeToAlternative()
    {
        return $this->setDocumentRelationshipType(static::AF_RELATIONSHIP_ALTERNATIVE);
    }

    /**
     * Set the type of relationship for the invoice attachment to "Source"
     *
     * @return static
     */
    public function setDocumentRelationshipTypeToSource()
    {
        return $this->setDocumentRelationshipType(static::AF_RELATIONSHIP_SOURCE);
    }

    /**
     * Get a list of additional documents to attach
     *
     * @return array<int, array{content: string, filename: string, displayname: string, relationship: string, mimetype: string}>
     */
    public function getaddAdditionalDocuments(): array
    {
        return $this->additionalDocumentsToAttach;
    }

    /**
     * Add an additional document to attach by an existing file
     *
     * @param  string                               $newFullFilename
     * @param  string                               $newDisplayName
     * @param  string                               $newRelationshipType
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteUnknownContentException
     * @return static
     */
    public function addAdditionalDocumentByRealFile(string $newFullFilename, string $newDisplayName = '', string $newRelationshipType = ''): static
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFullFilename)) {
            throw new InvoiceSuiteInvalidArgumentException('You must specify a filename for the content to attach');
        }

        if (!file_exists($newFullFilename)) {
            throw new InvoiceSuiteFileNotFoundException($newFullFilename);
        }

        $content = file_get_contents($newFullFilename);

        if ($content === false) {
            throw new InvoiceSuiteFileNotReadableException($newFullFilename);
        }

        return $this->addAdditionalDocumentByContent(
            $content,
            $newFullFilename,
            $newDisplayName,
            $newRelationshipType,
        );
    }

    /**
     * Add an additional document to attach by a content string
     *
     * @param  string                               $newContent
     * @param  string                               $newFilename
     * @param  string                               $newDisplayName
     * @param  string                               $newRelationshipType
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteUnknownContentException
     * @return static
     */
    public function addAdditionalDocumentByContent(string $newContent, string $newFilename, string $newDisplayName = '', string $newRelationshipType = ''): static
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContent)) {
            throw new InvoiceSuiteInvalidArgumentException('You must specify a content to attach');
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFilename)) {
            throw new InvoiceSuiteInvalidArgumentException('You must specify a filename for the content to attach');
        }

        $mimeType = (new MimeDb())->findFirstMimeTypeByExtension(InvoiceSuiteFileUtils::getFileExtension($newFilename));

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($mimeType)) {
            throw new InvoiceSuiteUnknownContentException();
        }

        if ($newRelationshipType === '') {
            $newRelationshipType = static::AF_RELATIONSHIP_SUPPLEMENT;
        }

        if (!in_array($newRelationshipType, [static::AF_RELATIONSHIP_DATA, static::AF_RELATIONSHIP_ALTERNATIVE, static::AF_RELATIONSHIP_SOURCE, static::AF_RELATIONSHIP_SUPPLEMENT, static::AF_RELATIONSHIP_UNSPECIFIED])) {
            $newRelationshipType = static::AF_RELATIONSHIP_SUPPLEMENT;
        }

        if ($newDisplayName === '') {
            $newDisplayName = InvoiceSuiteFileUtils::getFilenameWithExtension($newFilename);
        }

        $this->additionalDocumentsToAttach[] = [
            'content' => $newContent,
            'filename' => InvoiceSuiteFileUtils::getFilenameWithExtension($newFilename),
            'displayname' => $newDisplayName,
            'relationship' => $newRelationshipType,
            'mimetype' => $mimeType,
        ];

        return $this;
    }

    /**
     * Get the status of deterministic mode
     *
     * @return bool
     */
    public function getDeterministicMode(): bool
    {
        return $this->deterministicMode;
    }

    /**
     * Set the status of deterministic mode
     *
     * @param  bool   $newDeterministicMode
     * @return static
     */
    public function setDeterministicMode(bool $newDeterministicMode): static
    {
        $this->deterministicMode = $newDeterministicMode;

        return $this;
    }

    /**
     * Enable deterministic mode
     *
     * @return static
     */
    public function setDeterministicModeToEnabled(): static
    {
        return $this->setDeterministicMode(true);
    }

    /**
     * Disable deterministic mode
     *
     * @return static
     */
    public function setDeterministicModeToDisabled(): static
    {
        return $this->setDeterministicMode(false);
    }

    /**
     * Get the template for author-metainformation
     *
     * @return string
     */
    public function getMetaInformationAuthorTemplate(): string
    {
        return $this->metaInformationAuthorTemplate;
    }

    /**
     * Set the template for author-metainformation
     *
     * @param  string $newMetaInformationAuthorTemplate
     * @return static
     */
    public function setMetaInformationAuthorTemplate(string $newMetaInformationAuthorTemplate): static
    {
        $this->metaInformationAuthorTemplate = $newMetaInformationAuthorTemplate;

        return $this;
    }

    /**
     * Get the template for keyword-metainformation
     *
     * @return string
     */
    public function getMetaInformationKeywordTemplate(): string
    {
        return $this->metaInformationKeywordTemplate;
    }

    /**
     * Set the template for keyword-metainformation
     *
     * @param  string $newMetaInformationKeywordTemplate
     * @return static
     */
    public function setMetaInformationKeywordTemplate(string $newMetaInformationKeywordTemplate): static
    {
        $this->metaInformationKeywordTemplate = $newMetaInformationKeywordTemplate;

        return $this;
    }

    /**
     * Get the template for title-metainformation
     *
     * @return string
     */
    public function getMetaInformationTitleTemplate(): string
    {
        return $this->metaInformationTitleTemplate;
    }

    /**
     * Set the template for title-metainformation
     *
     * @param  string $newMetaInformationTitleTemplate
     * @return static
     */
    public function setMetaInformationTitleTemplate(string $newMetaInformationTitleTemplate): static
    {
        $this->metaInformationTitleTemplate = $newMetaInformationTitleTemplate;

        return $this;
    }

    /**
     * Get the template for subject-metainformation
     *
     * @return string
     */
    public function getMetaInformationSubjectTemplate(): string
    {
        return $this->metaInformationSubjectTemplate;
    }

    /**
     * Set the template for subject-metainformation
     *
     * @param  string $newMetaInformationSubjectTemplate
     * @return static
     */
    public function setMetaInformationSubjectTemplate(string $newMetaInformationSubjectTemplate): static
    {
        $this->metaInformationSubjectTemplate = $newMetaInformationSubjectTemplate;

        return $this;
    }

    /**
     * Get the callback for metainformation
     *
     * @return null|null|callable(string $whichTemplate,string $xmlContent,array{invoiceId: string, docTypeName: string, seller: string, date: string} $invoiceInformation,string $defaultValue): string
     */
    public function getMetaInformationCallback(): ?callable
    {
        return $this->metaInformationCallback;
    }

    /**
     * Set the callback for metainformation
     *
     * @param  null|null|callable(string $whichTemplate,string $xmlContent,array{invoiceId: string, docTypeName: string, seller: string, date: string} $invoiceInformation,string $defaultValue): string $newMetaInformationCallback
     * @return static
     */
    public function setMetaInformationCallback(?callable $newMetaInformationCallback): static
    {
        $this->metaInformationCallback = $newMetaInformationCallback;

        return $this;
    }

    /**
     * Get the attachment pane visibility
     *
     * @return bool
     */
    public function getAttachmentPaneVisibility(): bool
    {
        return $this->attachmentPaneVisibility;
    }

    /**
     * Set the attachment pane visibility
     *
     * @param  bool   $newAttachmentPaneVisibility
     * @return static
     */
    public function setAttachmentPaneVisibility(bool $newAttachmentPaneVisibility): static
    {
        $this->attachmentPaneVisibility = $newAttachmentPaneVisibility;

        return $this;
    }

    /**
     * Generate the final PDF
     *
     * @return static
     */
    abstract protected function generatePdfDocument(): static;

    /**
     * Get the content of the generated PDF as string
     *
     * @return string
     */
    abstract protected function getGeneratedPdfDocumentContent(): string;

    /**
     * Save the content of the generated PDF to a file
     *
     * @param  string $toFilename
     * @return static
     */
    abstract protected function saveGeneratedPdfDocumentToFile(string $toFilename): static;
}
