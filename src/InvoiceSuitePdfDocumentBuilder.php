<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\concerns\HandlesPdfConstructorRawContents;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContent;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\pdf\InvoiceSuiteAbstractPdfConstructor;
use JMS\Serializer\Exception\LogicException;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class representing the PDF document builder
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePdfDocumentBuilder
{
    use HandlesCallForwarding;
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentFormatProviders;
    use HandlesPdfConstructorRawContents;

    /**
     * The PDF constructor instance
     *
     * @var \horstoeko\invoicesuite\pdf\InvoiceSuiteAbstractPdfConstructor
     */
    private $currentPdfConstructor;

    /**
     * Create the PDF builder from a document builder and a PDF file
     *
     * @param InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @param string $fromPdfFilename
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws LogicException
     * @throws RuntimeException
     */
    public static function createFromDocumentBuilderAndPdfFile(InvoiceSuiteDocumentBuilder $fromDocumentBuilder, string $fromPdfFilename): self
    {
        if (!file_exists($fromPdfFilename)) {
            throw new InvoiceSuiteFileNotFoundException($fromPdfFilename);
        }

        $fromPdfContent = file_get_contents($fromPdfFilename);

        if ($fromPdfContent === false) {
            throw new InvoiceSuiteFileNotReadableException($fromPdfFilename);
        }

        return static::createFromDocumentBuilderAndPdfContent($fromDocumentBuilder, $fromPdfContent);
    }

    /**
     * Create the PDF builder from a document builder and a PDF content
     *
     * @param InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @param string $fromPdfContent
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws LogicException
     * @throws RuntimeException
     */
    public static function createFromDocumentBuilderAndPdfContent(InvoiceSuiteDocumentBuilder $fromDocumentBuilder, string $fromPdfContent): self
    {
        return (new static())->setDocumentBuilder($fromDocumentBuilder)->setRawPdfContent($fromPdfContent)->initCurrentPdfConstructor();
    }

    /**
     * Create the PDF builder from a document content and a PDF file
     *
     * @param string $fromDocumentContent
     * @param string $fromPdfFilename
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public static function createFromDocumentContentAndPdfFile(string $fromDocumentContent, string $fromPdfFilename): self
    {
        if (!file_exists($fromPdfFilename)) {
            throw new InvoiceSuiteFileNotFoundException($fromPdfFilename);
        }

        $fromPdfContent = file_get_contents($fromPdfFilename);

        if ($fromPdfContent === false) {
            throw new InvoiceSuiteFileNotReadableException($fromPdfFilename);
        }

        return static::createFromDocumentContentAndPdfContent($fromDocumentContent, $fromPdfContent);
    }

    /**
     * Create the PDF builder from a document content and a PDF content
     *
     * @param string $fromDocumentContent
     * @param string $fromPdfContent
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public static function createFromDocumentContentAndPdfContent(string $fromDocumentContent, string $fromPdfContent): self
    {
        return (new static())->setDocumentContent($fromDocumentContent)->setRawPdfContent($fromPdfContent)->initCurrentPdfConstructor();
    }

    /**
     * Constructor (hidden)
     *
     * @return void
     */
    final protected function __construct()
    {
    }

    /**
     * Internal method to set a document builder from which to get the content from. This will check
     * if the given provider has an enabled PDF support
     *
     * @param InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws LogicException
     * @throws RuntimeException
     */
    protected function setDocumentBuilder(InvoiceSuiteDocumentBuilder $fromDocumentBuilder): self
    {
        if (!$fromDocumentBuilder->getCurrentDocumentFormatProvider()->isPdfSupportAvailable()) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf("Provider %s does not support PDF embedding", $this->getCurrentDocumentFormatProvider()->getUniqueId()));
        }

        if (!is_subclass_of($fromDocumentBuilder->getCurrentDocumentFormatProvider()->getPdfConstructorClassName(), InvoiceSuiteAbstractPdfConstructor::class)) {
            throw new InvoiceSuiteInvalidArgumentException("The PDF constructor class provided by format provider must inherit from InvoiceSuiteAbstractPdfConstructor");
        }

        $this->setCurrentDocumentFormatProvider($fromDocumentBuilder->getCurrentDocumentFormatProvider());
        $this->setRawDocumentContent($fromDocumentBuilder->getContentAsXml());

        return $this;
    }

    /**
     * Internal method to set the document content directly. This will look for a provider and check if
     * PDF support is enabled
     *
     * @param string $fromDocumentContent
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    protected function setDocumentContent(string $fromDocumentContent): self
    {
        $this->resolveAvailableDocumentFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredDocumentFormatProviders(),
            fn ($formatProvider) => (
                $formatProvider->isPdfSupportAvailable() &&
                is_subclass_of($formatProvider->getPdfConstructorClassName(), InvoiceSuiteAbstractPdfConstructor::class) &&
                $formatProvider->isSatisfiableBySerializedContent($fromDocumentContent)
            )
        );

        if ($formatProviders === []) {
            throw new InvoiceSuiteFormatProviderNotFoundException("unknown");
        }

        $formatProvider = reset($formatProviders);

        $this->setCurrentDocumentFormatProvider($formatProvider);
        $this->setRawDocumentContent($fromDocumentContent);

        return $this;
    }

    /**
     * Initialize the internal PDF constructor
     *
     * @return InvoiceSuitePdfDocumentBuilder
     */
    protected function initCurrentPdfConstructor(): self
    {
        $this->setCurrentPdfConstructor(
            new ($this->getCurrentDocumentFormatProvider()->getPdfConstructorClassName())(
                $this->getCurrentDocumentFormatProvider(),
                $this->getRawDocumentContent(),
                $this->getRawPdfContent()
            )
        );

        return $this;
    }

    /**
     * Retrieve the internal PDF constructor implementation
     *
     * @return InvoiceSuiteAbstractPdfConstructor
     */
    protected function getCurrentPdfConstructor(): InvoiceSuiteAbstractPdfConstructor
    {
        return $this->currentPdfConstructor;
    }

    /**
     * Set the internal PDF constructor implementation
     *
     * @param InvoiceSuiteAbstractPdfConstructor $pdfConstructor
     * @return self
     */
    protected function setCurrentPdfConstructor(InvoiceSuiteAbstractPdfConstructor $pdfConstructor): self
    {
        $this->currentPdfConstructor = $pdfConstructor;

        return $this;
    }

    /**
     * Get the content of the generated PDF as string
     *
     * @return string
     */
    public function generatePdfDocumentAndGetContent(): string
    {
        return $this->getCurrentPdfConstructor()->generatePdfDocumentAndGetContent();
    }

    /**
     * Save the content of the generated PDF to a file
     *
     * @param string $toFilename
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function generatePdfDocumentAndSaveToFile(string $toFilename): self
    {
        $this->getCurrentPdfConstructor()->generatePdfDocumentAndSaveToFile($toFilename);

        return $this;
    }

    /**
     * Get the additional creator tool (e.g. the ERP software that called the PHP library)
     *
     * @return string
     */
    public function getAdditionalCreatorTool(): string
    {
        return $this->getCurrentPdfConstructor()->getAdditionalCreatorTool();
    }

    /**
     * Set the additional creator tool (e.g. the ERP software that called the PHP library)
     *
     * @param string $newAdditionalCreatorTool
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setAdditionalCreatorTool(string $newAdditionalCreatorTool): self
    {
        $this->getCurrentPdfConstructor()->setAdditionalCreatorTool($newAdditionalCreatorTool);

        return $this;
    }

    /**
     * Get the relationship type of the attached invoice document
     *
     * @return string
     */
    public function getDocumentRelationshipType(): string
    {
        return $this->getCurrentPdfConstructor()->getDocumentRelationshipType();
    }

    /**
     * Set the relationship type of the attached invoice document
     *
     * @param string $newDocumentRelationshipType
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setDocumentRelationshipType(string $newDocumentRelationshipType): self
    {
        $this->getCurrentPdfConstructor()->setDocumentRelationshipType($newDocumentRelationshipType);

        return $this;
    }

    /**
     * Set the type of relationship for the XML attachment to "Data"
     *
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setDocumentRelationshipTypeToData()
    {
        $this->getCurrentPdfConstructor()->setDocumentRelationshipTypeToData();

        return $this;
    }

    /**
     * Set the type of relationship for the XML attachment to "Alternative"
     *
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setDocumentRelationshipTypeToAlternative()
    {
        $this->getCurrentPdfConstructor()->setDocumentRelationshipTypeToAlternative();

        return $this;
    }

    /**
     * Set the type of relationship for the XML attachment to "Source"
     *
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setDocumentRelationshipTypeToSource()
    {
        $this->getCurrentPdfConstructor()->setDocumentRelationshipTypeToSource();

        return $this;
    }

    /**
     * Get a list of additional documents to attach
     *
     * @return array<int, array{content: string, filename: string, displayname: string, relationship: string, mimetype: string}>
     */
    public function getaddAdditionalDocument(): array
    {
        return $this->getCurrentPdfConstructor()->getaddAdditionalDocuments();
    }

    /**
     * Add an additional document to attach by an existing file
     *
     * @param string $newFullFilename
     * @param string $newDisplayName
     * @param string $newRelationshipType
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteUnknownContent
     */
    public function addAdditionalDocumentByRealFile(string $newFullFilename, string $newDisplayName = "", string $newRelationshipType = ""): self
    {
        $this->getCurrentPdfConstructor()->addAdditionalDocumentByRealFile($newFullFilename, $newDisplayName, $newRelationshipType);

        return $this;
    }

    /**
     * Add an additional document to attach by a content string
     *
     * @param string $newContent
     * @param string $newFilename
     * @param string $newDisplayName
     * @param string $newRelationshipType
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteUnknownContent
     */
    public function addAdditionalDocumentByContent(string $newContent, string $newFilename, string $newDisplayName = "", string $newRelationshipType = ""): self
    {
        $this->getCurrentPdfConstructor()->addAdditionalDocumentByContent($newContent, $newFilename, $newDisplayName, $newRelationshipType);

        return $this;
    }

    /**
     * Set the status of deterministic mode
     *
     * @param bool $newDeterministicMode
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setDeterministicMode(bool $newDeterministicMode): self
    {
        $this->getCurrentPdfConstructor()->setDeterministicMode($newDeterministicMode);

        return $this;
    }

    /**
     * Enable deterministic mode
     *
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setDeterministicModeToEnabled(): self
    {
        $this->getCurrentPdfConstructor()->setDeterministicModeToEnabled();

        return $this;
    }

    /**
     * Disable deterministic mode
     *
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setDeterministicModeToDisabled(): self
    {
        $this->getCurrentPdfConstructor()->setDeterministicModeToDisabled();

        return $this;
    }

    /**
     * Get the template for author-metainformation
     *
     * @return string
     */
    public function getMetaInformationAuthorTemplate(): string
    {
        return $this->getCurrentPdfConstructor()->getMetaInformationAuthorTemplate();
    }

    /**
     * Set the template for author-metainformation
     *
     * @param string $newMetaInformationAuthorTemplate
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setMetaInformationAuthorTemplate(string $newMetaInformationAuthorTemplate): self
    {
        $this->getCurrentPdfConstructor()->setMetaInformationAuthorTemplate($newMetaInformationAuthorTemplate);

        return $this;
    }

    /**
     * Get the template for keyword-metainformation
     *
     * @return string
     */
    public function getMetaInformationKeywordTemplate(): string
    {
        return $this->getCurrentPdfConstructor()->getMetaInformationKeywordTemplate();
    }

    /**
     * Set the template for keyword-metainformation
     *
     * @param string $newMetaInformationKeywordTemplate
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setMetaInformationKeywordTemplate(string $newMetaInformationKeywordTemplate): self
    {
        $this->getCurrentPdfConstructor()->setMetaInformationKeywordTemplate($newMetaInformationKeywordTemplate);

        return $this;
    }

    /**
     * Get the template for title-metainformation
     *
     * @return string
     */
    public function getMetaInformationTitleTemplate(): string
    {
        return $this->getCurrentPdfConstructor()->getMetaInformationTitleTemplate();
    }

    /**
     * Set the template for title-metainformation
     *
     * @param string $newMetaInformationTitleTemplate
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setMetaInformationTitleTemplate(string $newMetaInformationTitleTemplate): self
    {
        $this->getCurrentPdfConstructor()->setMetaInformationTitleTemplate($newMetaInformationTitleTemplate);

        return $this;
    }

    /**
     * Get the template for subject-metainformation
     *
     * @return string
     */
    public function getMetaInformationSubjectTemplate(): string
    {
        return $this->getCurrentPdfConstructor()->getMetaInformationSubjectTemplate();
    }

    /**
     * Set the template for subject-metainformation
     *
     * @param string $newMetaInformationSubjectTemplate
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setMetaInformationSubjectTemplate(string $newMetaInformationSubjectTemplate): self
    {
        $this->getCurrentPdfConstructor()->setMetaInformationSubjectTemplate($newMetaInformationSubjectTemplate);

        return $this;
    }

    /**
     * Get the callback for metainformation
     *
     * @return callable|null
     */
    public function getMetaInformationCallback(): ?callable
    {
        return $this->getCurrentPdfConstructor()->getMetaInformationCallback();
    }

    /**
     * Set the callback for metainformation
     *
     * @param null|callable $newMetaInformationCallback
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setMetaInformationCallback(?callable $newMetaInformationCallback): self
    {
        $this->getCurrentPdfConstructor()->setMetaInformationCallback($newMetaInformationCallback);

        return $this;
    }

    /**
     * Get the attachment pane visibility
     *
     * @return bool
     */
    public function getAttachmentPaneVisibility(): bool
    {
        return $this->getCurrentPdfConstructor()->getAttachmentPaneVisibility();
    }

    /**
     * Set the attachment pane visibility
     *
     * @param boolean $newAttachmentPaneVisibility
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public function setAttachmentPaneVisibility(bool $newAttachmentPaneVisibility): self
    {
        $this->getCurrentPdfConstructor()->setAttachmentPaneVisibility($newAttachmentPaneVisibility);

        return $this;
    }
}
