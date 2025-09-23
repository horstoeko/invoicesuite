<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdf;

use InvalidArgumentException;
use JMS\Serializer\Exception\RuntimeException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\concerns\HandlesFormatProviders;
use horstoeko\invoicesuite\concerns\HandlesCurrentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;

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
     * Create a new instance of InvoiceSuitePdfDocumentBuilder by given PDF content and XML content
     *
     * @param string $newPdfContent
     * @param string $newXmlContent
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvalidArgumentException
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
     * @throws InvalidArgumentException
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
     * @throws InvalidArgumentException
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
     * @throws InvalidArgumentException
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
     * @throws InvalidArgumentException
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
     * @throws InvalidArgumentException
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
     * @throws InvalidArgumentException
     */
    protected function setCurrentPdfContent(string $newPdfContent): self
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPdfContent)) {
            throw new InvalidArgumentException('Invalid PDF content given');
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
     * @throws InvalidArgumentException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    protected function setCurrentXmlContent(string $newXmlContent): self
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newXmlContent)) {
            throw new InvalidArgumentException('Invalid XML content given');
        }

        $this->resolveAvailableFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredFormatProviders(),
            fn ($formatProvider) =>
                ($formatProvider->isSatisfiableBy($newXmlContent)) &&
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
}
