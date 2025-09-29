<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use JMS\Serializer\Exception\LogicException;
use JMS\Serializer\Exception\RuntimeException;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesPdfDocumentFormatProviders;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\concerns\HandlesCurrentPdfDocumentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;

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
    use HandlesCurrentPdfDocumentFormatProvider;
    use HandlesPdfDocumentFormatProviders;

    /**
     * Create an instance by InvoiceSuiteDocumentBuilder and an existing file which contains the PDF to merge
     *
     * @param InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @param string $fromPdfFilename
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
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
     * Create an instance by InvoiceSuiteDocumentBuilder and an existing file which contains the PDF to merge
     *
     * @param InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @param string $fromPdfContent
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws LogicException
     * @throws RuntimeException
     */
    public static function createFromDocumentBuilderAndPdfContent(InvoiceSuiteDocumentBuilder $fromDocumentBuilder, string $fromPdfContent): self
    {
        return static::createFromDocumentContentAndPdfContent($fromDocumentBuilder->getContentAsXml(), $fromPdfContent);
    }

    /**
     * Create an instance by document content an existing file which contains the PDF to merge
     *
     * @param string $fromDocumentContent
     * @param string $fromPdfFilename
     * @return InvoiceSuitePdfDocumentBuilder
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
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
     * Create an instance by document content an PDF content
     *
     * @param string $fromDocumentContent
     * @param string $fromPdfContent
     * @return InvoiceSuitePdfDocumentBuilder
     */
    public static function createFromDocumentContentAndPdfContent(string $fromDocumentContent, string $fromPdfContent): self
    {
        return new static($fromDocumentContent, $fromPdfContent);
    }

    /**
     * Constructor (hidden)
     *
     * @param string $fromDocumentContent
     * @param string $fromPdfContent
     * @return static
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    final protected function __construct(string $fromDocumentContent, string $fromPdfContent)
    {
        $this->resolveAvailablePdfDocumentFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredPdfDocumentFormatProviders(),
            fn($formatProvider) => $formatProvider->isWriteableByDocumentContent($fromDocumentContent)
        );

        if ($formatProviders === []) {
            throw new InvoiceSuiteFormatProviderNotFoundException("unknown");
        }

        $formatProvider = reset($formatProviders);

        $this->setCurrentPdfDocumentFormatProvider($formatProvider);
        $this->getCurrentPdfDocumentFormatProvider()->initPdfBuilder();
    }

    /**
     * Dynamically pass missing methods to the PDF builder provided by PDF format provider
     *
     * @param  string       $method
     * @param  array<mixed> $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->forwardCallWithCheckTo($this->getCurrentPdfDocumentFormatProvider()->getPdfBuilder(), $method, $parameters);
    }
}
