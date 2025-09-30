<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use Exception;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesCurrentPdfDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesPdfDocumentFormatProviders;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\pdfutils\InvoiceSuitePdfExtractor;

/**
 * Class representing the PDF document reader
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePdfDocumentReader
{
    use HandlesCallForwarding;
    use HandlesCurrentPdfDocumentFormatProvider;
    use HandlesPdfDocumentFormatProviders;

    /**
     * Create PDF reader by file
     *
     * @param string $fromFile
     * @return InvoiceSuitePdfDocumentReader
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function createFromFile(string $fromFile): self
    {
        if (!file_exists($fromFile)) {
            throw new InvoiceSuiteFileNotFoundException($fromFile);
        }

        $fromContent = file_get_contents($fromFile);

        if ($fromContent === false) {
            throw new InvoiceSuiteFileNotReadableException($fromFile);
        }

        return static::createFromContent($fromContent);
    }

    /**
     * Create PDF reader by content
     *
     * @param string $fromContent
     * @return InvoiceSuitePdfDocumentReader
     */
    public static function createFromContent(string $fromContent): self
    {
        return new static($fromContent);
    }

    /**
     * Constructor (hidden)
     *
     * @param string $fromContent
     * @return static
     * @throws Exception
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    final protected function __construct(string $fromContent)
    {
        $this->resolveAvailablePdfDocumentFormatProviders();

        $pdfExtractor = InvoiceSuitePdfExtractor::fromContent($fromContent);

        foreach ($pdfExtractor as $pdfExtractorAttachment) {
            $formatProviders = array_filter(
                $this->getRegisteredPdfDocumentFormatProviders(),
                fn($formatProvider) => $formatProvider->isReadableByPdfAttachment($pdfExtractorAttachment)
            );

            if ($formatProviders === []) {
                continue;
            }

            $formatProvider = reset($formatProviders);

            $this->setCurrentPdfDocumentFormatProvider($formatProvider);
            $this->getCurrentPdfDocumentFormatProvider()->initPdfReader()->getPdfReader()->setContents($pdfExtractorAttachment->getAttachmentContent());

            break;
        }

        if (is_null($this->getCurrentPdfDocumentFormatProvider())) {
            throw new InvoiceSuiteFormatProviderNotFoundException("unknown");
        }
    }

    /**
     * Dynamically pass missing methods to the PDF reader provided by PDF format provider
     *
     * @param  string       $method
     * @param  array<mixed> $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->forwardCallWithCheckTo($this->getCurrentPdfDocumentFormatProvider()->getPdfReader(), $method, $parameters);
    }

    /**
     * Get the instance of a document reader
     *
     * @return InvoiceSuiteDocumentReader
     */
    public function getDocumentReader(): InvoiceSuiteDocumentReader
    {
        return $this->getCurrentPdfDocumentFormatProvider()->getPdfReader()->getDocumentReaderObject();
    }
}
