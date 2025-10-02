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
use JMS\Serializer\Exception\LogicException;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class representing the PDF document build
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

    protected $documentContent;

    protected $pdfContent;

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
    public static function createFromDocumentBuilderAndPdfFile(InvoiceSuiteDocumentBuilder $fromDocumentBuilder, string $fromPdfFilename): InvoiceSuitePdfDocumentBuilder
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
    public static function createFromDocumentBuilderAndPdfContent(InvoiceSuiteDocumentBuilder $fromDocumentBuilder, string $fromPdfContent): InvoiceSuitePdfDocumentBuilder
    {
        return (new static())->setDocumentBuilder($fromDocumentBuilder)->setPdfContentDirect($fromPdfContent);
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
    public static function createFromDocumentContentAndPdfFile(string $fromDocumentContent, string $fromPdfFilename): InvoiceSuitePdfDocumentBuilder
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
    public static function createFromDocumentContentAndPdfContent(string $fromDocumentContent, string $fromPdfContent): InvoiceSuitePdfDocumentBuilder
    {
        return (new static())->setDocumentContent($fromDocumentContent)->setPdfContentDirect($fromPdfContent);
    }

    /**
     * Constructor (hidden)
     *
     * @return void
     */
    final protected function __construct() {}

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
    protected function setDocumentBuilder(InvoiceSuiteDocumentBuilder $fromDocumentBuilder): InvoiceSuitePdfDocumentBuilder
    {
        if (!$fromDocumentBuilder->isPdfSupportAvailable()) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf("Provider %s does not support PDF embedding", $this->getCurrentDocumentFormatProvider()->getUniqueId()));
        }

        $this->setCurrentDocumentFormatProvider($fromDocumentBuilder->getCurrentDocumentFormatProvider());
        $this->setDocumentContentDirect($fromDocumentBuilder->getContentAsXml());

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
    protected function setDocumentContent(string $fromDocumentContent): InvoiceSuitePdfDocumentBuilder
    {
        $this->resolveAvailableDocumentFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredDocumentFormatProviders(),
            fn($formatProvider) => $formatProvider->isPdfSupportAvailable() && $formatProvider->isSatisfiableBySerializedContent($fromDocumentContent())
        );

        if ($formatProviders === []) {
            throw new InvoiceSuiteFormatProviderNotFoundException("unknown");
        }

        $formatProvider = reset($formatProviders);

        $this->setCurrentDocumentFormatProvider($formatProvider);
        $this->setDocumentContentDirect($fromDocumentContent);

        return $this;
    }

    /**
     * Internal method to set the document content directly
     *
     * @param string $fromDocumentContent
     * @return InvoiceSuitePdfDocumentBuilder
     */
    protected function setDocumentContentDirect(string $fromDocumentContent): InvoiceSuitePdfDocumentBuilder
    {
        $this->documentContent = $fromDocumentContent;

        return $this;
    }

    /**
     * Internal method to set the PDF content directly
     *
     * @param string $fromPdfContent
     * @return InvoiceSuitePdfDocumentBuilder
     */
    protected function setPdfContentDirect(string $fromPdfContent): InvoiceSuitePdfDocumentBuilder
    {
        $this->pdfContent = $fromPdfContent;

        return $this;
    }
}
