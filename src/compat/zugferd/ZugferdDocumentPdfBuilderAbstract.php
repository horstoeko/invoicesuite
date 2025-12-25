<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\InvoiceSuitePdfDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;

/**
 * Legacy-class representing the abstract ZUGFeRD PDF document builder for outgoing documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
abstract class ZugferdDocumentPdfBuilderAbstract
{
    /**
     * Constants for Relationship types
     * 'Data', 'Alternative', 'Source', 'Supplement', 'Unspecified'
     */
    public const AF_RELATIONSHIP_DATA = 'Data';

    public const AF_RELATIONSHIP_ALTERNATIVE = 'Alternative';

    public const AF_RELATIONSHIP_SOURCE = 'Source';

    public const AF_RELATIONSHIP_SUPPLEMENT = 'Supplement';

    public const AF_RELATIONSHIP_UNSPECIFIED = 'Unspecified';

    /**
     * Internal PDF builder instance
     *
     * @var InvoiceSuitePdfDocumentBuilder
     */
    protected $pdfDocumentBuilder;

    /**
     * Constructor
     *
     * @param string $pdfContent The full filename or a string containing the binary pdf data. This is the original PDF (e.g. created by a ERP system)
     */
    public function __construct(string $pdfContent)
    {
        $this->pdfDocumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfContent(
            $this->getXmlContent(),
            $pdfContent
        );
    }

    /**
     * Generates the final document
     *
     * @return static
     */
    public function generateDocument(): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Saves the generated PDF document to a file
     *
     * @param  string $toFilename The full qualified filename to which the generated PDF (with attachment)is stored
     * @return static
     */
    public function saveDocument(string $toFilename): static
    {
        $this->pdfDocumentBuilder->generatePdfDocumentAndSaveToFile($toFilename);

        return $this;
    }

    /**
     * Starts a HTTP download of the generated PDF document
     *
     * @param  string $toFilename
     * @return string
     */
    public function saveDocumentInline(string $toFilename): string
    {
        $pdfContent = $this->downloadString();

        if (PHP_SAPI !== 'cli') {
            header('Content-Type: application/pdf');
            header(sprintf('Content-Disposition: inline; filename=$s', rawurlencode(InvoiceSuiteFileUtils::getFilenameWithExtension($toFilename))));
            header('Cache-Control: private, max-age=0, must-revalidate');
            header('Pragma: public');
        }

        echo $pdfContent;

        return $pdfContent;
    }

    /**
     * Returns the content of the generared PDF as a string
     *
     * @return string
     */
    public function downloadString(): string
    {
        return $this->pdfDocumentBuilder->generatePdfDocumentAndGetContent();
    }

    /**
     * Sets an additional creator tool (e.g. the ERP software that called the PHP library)
     *
     * @param  string $additionalCreatorTool The name of the creator
     * @return static
     */
    public function setAdditionalCreatorTool(string $additionalCreatorTool): static
    {
        $this->pdfDocumentBuilder->setAdditionalCreatorTool($additionalCreatorTool);

        return $this;
    }

    /**
     * Returns the creator tool name (the PHP library, and if given also the additional creator tool)
     *
     * @return string
     */
    public function getCreatorToolName(): string
    {
        return $this->pdfDocumentBuilder->getCreatorToolName();
    }

    /**
     * Set the type of relationship for the XML attachment.
     *
     * @param  string $relationshipType Type of relationship
     * @return static
     */
    public function setAttachmentRelationshipType(string $relationshipType): static
    {
        $this->pdfDocumentBuilder->setDocumentRelationshipType($relationshipType);

        return $this;
    }

    /**
     * Returns the relationship type for the XML attachment.
     *
     * @return string
     */
    public function getAttachmentRelationshipType(): string
    {
        return $this->pdfDocumentBuilder->getDocumentRelationshipType();
    }

    /**
     * Set the type of relationship for the XML attachment to "Data"
     *
     * @return static
     */
    public function setAttachmentRelationshipTypeToData(): static
    {
        $this->pdfDocumentBuilder->setDocumentRelationshipTypeToData();

        return $this;
    }

    /**
     * Set the type of relationship for the XML attachment to "Alternative"
     *
     * @return static
     */
    public function setAttachmentRelationshipTypeToAlternative(): static
    {
        $this->pdfDocumentBuilder->setDocumentRelationshipTypeToAlternative();

        return $this;
    }

    /**
     * Set the type of relationship for the XML attachment to "Source"
     *
     * @return static
     */
    public function setAttachmentRelationshipTypeToSource(): static
    {
        $this->pdfDocumentBuilder->setDocumentRelationshipTypeToSource();

        return $this;
    }

    /**
     * Attach an additional file to PDF. The file that is specified in $fullFilename must exists
     *
     * @param  string $fullFilename
     * @param  string $displayName
     * @param  string $relationshipType
     * @return static
     */
    public function attachAdditionalFileByRealFile(
        string $fullFilename,
        string $displayName = '',
        string $relationshipType = ''
    ): static {
        $this->pdfDocumentBuilder->addAdditionalDocumentByRealFile(
            $fullFilename,
            $displayName,
            $relationshipType
        );

        return $this;
    }

    /**
     * Attach an additional file to PDF by a content string
     *
     * @param  string $content
     * @param  string $filename
     * @param  string $displayName
     * @param  string $relationshipType
     * @return static
     */
    public function attachAdditionalFileByContent(
        string $content,
        string $filename,
        string $displayName = '',
        string $relationshipType = ''
    ): static {
        $this->pdfDocumentBuilder->addAdditionalDocumentByContent(
            $content,
            $filename,
            $displayName,
            $relationshipType
        );

        return $this;
    }

    /**
     * Set the the deterministic mode. This mode should only be used for testing purposes
     *
     * @param  bool   $deterministicModeEnabled
     * @return static
     */
    public function setDeterministicModeEnabled(
        bool $deterministicModeEnabled
    ): static {
        $this->pdfDocumentBuilder->setDeterministicMode(
            $deterministicModeEnabled
        );

        return $this;
    }

    /**
     * Get the status of deterministic mode
     *
     * @return bool
     */
    public function getDeterministicModeEnabled(): bool
    {
        return $this->pdfDocumentBuilder->getDeterministicMode();
    }

    /**
     * Enable deterministic mode
     *
     * @return static
     */
    public function enableDeterministicMode(): static
    {
        $this->setDeterministicModeEnabled(true);

        return $this;
    }

    /**
     * Disable deterministic mode
     *
     * @return static
     */
    public function disableDeterministicMode(): static
    {
        $this->setDeterministicModeEnabled(false);

        return $this;
    }

    /**
     * Set the template for the author meta information
     *
     * @param  string $authorTemplate
     * @return static
     */
    public function setAuthorTemplate(
        string $authorTemplate
    ): static {
        $this->pdfDocumentBuilder->setMetaInformationAuthorTemplate(
            $authorTemplate
        );

        return $this;
    }

    /**
     * Set the template for the keyword meta information
     *
     * @param  string $keywordTemplate
     * @return static
     */
    public function setKeywordTemplate(
        string $keywordTemplate
    ): static {
        $this->pdfDocumentBuilder->setMetaInformationKeywordTemplate(
            $keywordTemplate
        );

        return $this;
    }

    /**
     * Set the template for the title meta information
     *
     * @param  string $titleTemplate
     * @return static
     */
    public function setTitleTemplate(
        string $titleTemplate
    ): static {
        $this->pdfDocumentBuilder->setMetaInformationTitleTemplate(
            $titleTemplate
        );

        return $this;
    }

    /**
     * Set the template for the subject meta information
     *
     * @param  string $subjectTemplate
     * @return static
     */
    public function setSubjectTemplate(
        string $subjectTemplate
    ): static {
        $this->pdfDocumentBuilder->setMetaInformationSubjectTemplate(
            $subjectTemplate
        );

        return $this;
    }

    /**
     * Set the user defined callback for generating custom meta information
     *
     * @param  null|callable $callback
     * @return static
     */
    public function setMetaInformationCallback(
        ?callable $callback = null
    ): static {
        $this->pdfDocumentBuilder->setMetaInformationCallback(
            $callback
        );

        return $this;
    }

    /**
     * Sets the flag that indicates, that the attachment pane should be visible on start (True)
     * or hidden (False)
     *
     * @param  bool   $attachmentPaneVisibility Flag that indicates, that the attachment pane should be visible or hidden
     * @return static
     */
    public function setAttachmentPaneVisibility(
        bool $attachmentPaneVisibility
    ): static {
        $this->pdfDocumentBuilder->setAttachmentPaneVisibility(
            $attachmentPaneVisibility
        );

        return $this;
    }

    /**
     * Returns true if the attachment pane is visible, otherwise false
     *
     * @return bool
     */
    public function getAttachmentPaneIsVisible(): bool
    {
        return $this->pdfDocumentBuilder->getAttachmentPaneVisibility();
    }

    /**
     * Show attachment pane on startup
     *
     * @return static
     */
    public function showAttachmentPane(): static
    {
        $this->setAttachmentPaneVisibility(true);

        return $this;
    }

    /**
     * Hide attachment pane on startup
     *
     * @return static
     */
    public function hideAttachmentPane(): static
    {
        $this->setAttachmentPaneVisibility(false);

        return $this;
    }

    /**
     * Get the content of XML to attach
     *
     * @return string
     */
    abstract protected function getXmlContent(): string;
}
