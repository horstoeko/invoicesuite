<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\concerns\HandlesRawContents;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Legacy-class representing the ZUGFeRD PDF document builder for outgoing documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocumentPdfBuilder extends ZugferdDocumentPdfBuilderAbstract
{
    use HandlesRawContents;

    /**
     * Constructor
     *
     * @param  ZugferdDocumentBuilder                      $documentBuilder The instance of the document builder. Needed to get the XML data
     * @param  string                                      $pdfContent      The full filename or a string containing the binary pdf data. This is the original PDF (e.g. created by a ERP system)
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws RuntimeException
     */
    public function __construct(ZugferdDocumentBuilder $documentBuilder, string $pdfContent)
    {
        $this->setRawDocumentContent($documentBuilder->getContent());
        $this->setRawPdfContent($pdfContent);

        parent::__construct($pdfContent);
    }

    /**
     * Generate PDF document by ZugferdDocumentBuilder and PDF-File
     *
     * @param  ZugferdDocumentBuilder                      $documentBuilder
     * @param  string                                      $pdfFileName
     * @return static
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws RuntimeException
     */
    public static function fromPdfFile(ZugferdDocumentBuilder $documentBuilder, string $pdfFileName): static
    {
        if (!is_file($pdfFileName)) {
            throw new InvoiceSuiteFileNotFoundException($pdfFileName);
        }

        $pdfContent = file_get_contents($pdfFileName);

        if ($pdfContent === false) {
            throw new InvoiceSuiteFileNotReadableException($pdfFileName);
        }

        // @phpstan-ignore new.static
        return new static($documentBuilder, $pdfContent);
    }

    /**
     * Generate PDF document by ZugferdDocumentBuilder and PDF-content
     *
     * @param  ZugferdDocumentBuilder                      $documentBuilder
     * @param  string                                      $pdfContent
     * @return static
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws RuntimeException
     */
    public static function fromPdfString(ZugferdDocumentBuilder $documentBuilder, string $pdfContent): static
    {
        // @phpstan-ignore new.static
        return new static($documentBuilder, $pdfContent);
    }

    /**
     * Get the content of XML to attach
     *
     * @return string
     */
    protected function getXmlContent(): string
    {
        return $this->getRawDocumentContent();
    }
}
