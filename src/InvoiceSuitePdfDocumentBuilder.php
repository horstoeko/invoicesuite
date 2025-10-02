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
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
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

    /**
     * Internal buffer which holds the content of the invoice document
     *
     * @var string
     */
    private $rawDocumentContent;

    /**
     * Internal buffer which holds the content of the PDF document
     *
     * @var string
     */
    private $rawPdfContent;

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
                $formatProvider->isSatisfiableBySerializedContent($fromDocumentContent())
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
     * Internal method to set the raw invoice document content
     *
     * @param string $fromDocumentContent
     * @return InvoiceSuitePdfDocumentBuilder
     */
    protected function setRawDocumentContent(string $fromDocumentContent): self
    {
        $this->rawDocumentContent = $fromDocumentContent;

        return $this;
    }

    /**
     * Returns the given document content
     *
     * @return string
     */
    protected function getRawDocumentContent(): string
    {
        return $this->rawDocumentContent;
    }

    /**
     * Internal method to set the PDF content directly
     *
     * @param string $fromPdfContent
     * @return InvoiceSuitePdfDocumentBuilder
     */
    protected function setRawPdfContent(string $fromPdfContent): self
    {
        $this->rawPdfContent = $fromPdfContent;

        return $this;
    }

    /**
     * Returns the given PDF content
     *
     * @return string
     */
    protected function getRawPdfContent(): string
    {
        return $this->rawPdfContent;
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
}
