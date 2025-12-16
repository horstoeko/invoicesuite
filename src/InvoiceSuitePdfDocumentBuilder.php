<?php

declare(strict_types=1);

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
use horstoeko\invoicesuite\concerns\HandlesRawContents;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\pdfs\abstracts\InvoiceSuiteAbstractPdfConstructor;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class representing the PDF document builder
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePdfDocumentBuilder
{
    use HandlesCallForwarding;
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentFormatProviders;
    use HandlesRawContents;

    /**
     * The PDF constructor instance
     *
     * @var InvoiceSuiteAbstractPdfConstructor
     */
    private $currentPdfConstructor;

    /**
     * Constructor (hidden)
     *
     * @return void
     */
    final protected function __construct() {}

    /**
     * Create the PDF builder from a document builder and a PDF file
     *
     * @param  InvoiceSuiteDocumentBuilder          $fromDocumentBuilder
     * @param  string                               $fromPdfFilename
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     * @return static
     */
    public static function createFromDocumentBuilderAndPdfFile(InvoiceSuiteDocumentBuilder $fromDocumentBuilder, string $fromPdfFilename): static
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
     * @param  InvoiceSuiteDocumentBuilder          $fromDocumentBuilder
     * @param  string                               $fromPdfContent
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     * @return static
     */
    public static function createFromDocumentBuilderAndPdfContent(InvoiceSuiteDocumentBuilder $fromDocumentBuilder, string $fromPdfContent): static
    {
        return (new static())->setDocumentBuilder($fromDocumentBuilder)->setRawPdfContent($fromPdfContent)->initCurrentPdfConstructor();
    }

    /**
     * Create the PDF builder from a document content and a PDF file
     *
     * @param  string                                      $fromDocumentContent
     * @param  string                                      $fromPdfFilename
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @return static
     */
    public static function createFromDocumentContentAndPdfFile(string $fromDocumentContent, string $fromPdfFilename): static
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
     * @param  string                                      $fromDocumentContent
     * @param  string                                      $fromPdfContent
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @return static
     */
    public static function createFromDocumentContentAndPdfContent(string $fromDocumentContent, string $fromPdfContent): static
    {
        return (new static())->setDocumentContent($fromDocumentContent)->setRawPdfContent($fromPdfContent)->initCurrentPdfConstructor();
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
     * @param  string $toFilename
     * @return static
     */
    public function generatePdfDocumentAndSaveToFile(string $toFilename): static
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
     * @param  string $newAdditionalCreatorTool
     * @return static
     */
    public function setAdditionalCreatorTool(string $newAdditionalCreatorTool): static
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
     * @param  string $newDocumentRelationshipType
     * @return static
     */
    public function setDocumentRelationshipType(string $newDocumentRelationshipType): static
    {
        $this->getCurrentPdfConstructor()->setDocumentRelationshipType($newDocumentRelationshipType);

        return $this;
    }

    /**
     * Set the type of relationship for the XML attachment to "Data"
     *
     * @return static
     */
    public function setDocumentRelationshipTypeToData()
    {
        $this->getCurrentPdfConstructor()->setDocumentRelationshipTypeToData();

        return $this;
    }

    /**
     * Set the type of relationship for the XML attachment to "Alternative"
     *
     * @return static
     */
    public function setDocumentRelationshipTypeToAlternative()
    {
        $this->getCurrentPdfConstructor()->setDocumentRelationshipTypeToAlternative();

        return $this;
    }

    /**
     * Set the type of relationship for the XML attachment to "Source"
     *
     * @return static
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
     * @param  string                               $newFullFilename
     * @param  string                               $newDisplayName
     * @param  string                               $newRelationshipType
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteUnknownContentException
     * @return static
     */
    public function addAdditionalDocumentByRealFile(string $newFullFilename, string $newDisplayName = '', string $newRelationshipType = ''): static
    {
        $this->getCurrentPdfConstructor()->addAdditionalDocumentByRealFile($newFullFilename, $newDisplayName, $newRelationshipType);

        return $this;
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
        $this->getCurrentPdfConstructor()->addAdditionalDocumentByContent($newContent, $newFilename, $newDisplayName, $newRelationshipType);

        return $this;
    }

    /**
     * Get the status of deterministic mode
     *
     * @return bool
     */
    public function getDeterministicMode(): bool
    {
        return $this->getCurrentPdfConstructor()->getDeterministicMode();
    }

    /**
     * Set the status of deterministic mode
     *
     * @param  bool   $newDeterministicMode
     * @return static
     */
    public function setDeterministicMode(bool $newDeterministicMode): static
    {
        $this->getCurrentPdfConstructor()->setDeterministicMode($newDeterministicMode);

        return $this;
    }

    /**
     * Enable deterministic mode
     *
     * @return static
     */
    public function setDeterministicModeToEnabled(): static
    {
        $this->getCurrentPdfConstructor()->setDeterministicModeToEnabled();

        return $this;
    }

    /**
     * Disable deterministic mode
     *
     * @return static
     */
    public function setDeterministicModeToDisabled(): static
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
     * @param  string $newMetaInformationAuthorTemplate
     * @return static
     */
    public function setMetaInformationAuthorTemplate(string $newMetaInformationAuthorTemplate): static
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
     * @param  string $newMetaInformationKeywordTemplate
     * @return static
     */
    public function setMetaInformationKeywordTemplate(string $newMetaInformationKeywordTemplate): static
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
     * @param  string $newMetaInformationTitleTemplate
     * @return static
     */
    public function setMetaInformationTitleTemplate(string $newMetaInformationTitleTemplate): static
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
     * @param  string $newMetaInformationSubjectTemplate
     * @return static
     */
    public function setMetaInformationSubjectTemplate(string $newMetaInformationSubjectTemplate): static
    {
        $this->getCurrentPdfConstructor()->setMetaInformationSubjectTemplate($newMetaInformationSubjectTemplate);

        return $this;
    }

    /**
     * Get the callback for metainformation
     *
     * @return null|callable
     */
    public function getMetaInformationCallback(): ?callable
    {
        return $this->getCurrentPdfConstructor()->getMetaInformationCallback();
    }

    /**
     * Set the callback for metainformation
     *
     * @param  null|callable $newMetaInformationCallback
     * @return static
     */
    public function setMetaInformationCallback(?callable $newMetaInformationCallback): static
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
     * @param  bool   $newAttachmentPaneVisibility
     * @return static
     */
    public function setAttachmentPaneVisibility(bool $newAttachmentPaneVisibility): static
    {
        $this->getCurrentPdfConstructor()->setAttachmentPaneVisibility($newAttachmentPaneVisibility);

        return $this;
    }

    /**
     * Internal method to set a document builder from which to get the content from. This will check
     * if the given provider has an enabled PDF support
     *
     * @param  InvoiceSuiteDocumentBuilder          $fromDocumentBuilder
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     * @return static
     */
    protected function setDocumentBuilder(InvoiceSuiteDocumentBuilder $fromDocumentBuilder): static
    {
        if (!$fromDocumentBuilder->getCurrentDocumentFormatProvider()->isPdfSupportAvailable()) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('Provider %s does not support PDF embedding', $fromDocumentBuilder->getCurrentDocumentFormatProvider()->getUniqueId()));
        }

        if (!is_subclass_of($fromDocumentBuilder->getCurrentDocumentFormatProvider()->getPdfConstructorClassName(), InvoiceSuiteAbstractPdfConstructor::class)) {
            throw new InvoiceSuiteInvalidArgumentException('The PDF constructor class provided by format provider must inherit from InvoiceSuiteAbstractPdfConstructor');
        }

        $this->setCurrentDocumentFormatProvider($fromDocumentBuilder->getCurrentDocumentFormatProvider());
        $this->setRawDocumentContent($fromDocumentBuilder->getContentAsXml());

        return $this;
    }

    /**
     * Internal method to set the document content directly. This will look for a provider and check if
     * PDF support is enabled
     *
     * @param  string                                      $fromDocumentContent
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @return static
     */
    protected function setDocumentContent(string $fromDocumentContent): static
    {
        $this->resolveAvailableDocumentFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredDocumentFormatProviders(),
            static fn ($formatProvider) => (
                $formatProvider->isPdfSupportAvailable()
                && is_subclass_of($formatProvider->getPdfConstructorClassName(), InvoiceSuiteAbstractPdfConstructor::class)
                && $formatProvider->isSatisfiableBySerializedContent($fromDocumentContent)
            )
        );

        if ($formatProviders === []) {
            throw new InvoiceSuiteFormatProviderNotFoundException('unknown');
        }

        $formatProvider = reset($formatProviders);

        $this->setCurrentDocumentFormatProvider($formatProvider);
        $this->setRawDocumentContent($fromDocumentContent);

        return $this;
    }

    /**
     * Initialize the internal PDF constructor
     *
     * @return static
     */
    protected function initCurrentPdfConstructor(): static
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
     * @param  InvoiceSuiteAbstractPdfConstructor $pdfConstructor
     * @return static
     */
    protected function setCurrentPdfConstructor(InvoiceSuiteAbstractPdfConstructor $pdfConstructor): static
    {
        $this->currentPdfConstructor = $pdfConstructor;

        return $this;
    }
}
