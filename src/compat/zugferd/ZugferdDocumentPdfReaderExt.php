<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use JMS\Serializer\Exception\RuntimeException;
use PrinsFrank\PdfParser\Exception\PdfParserException;

/**
 * Class representing the extended document reader for incoming PDF/A-Documents with
 * attached XML data in BASIC-, EN16931- and EXTENDED profile. The Extended PDF reader
 * reads also additinal attached documents from PDF
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocumentPdfReaderExt
{
    /**
     * Internal PDF document reader
     *
     * @var InvoiceSuitePdfDocumentReader
     */
    protected InvoiceSuitePdfDocumentReader $pdfDocumentReader;

    /**
     * (Hidden) Constructor
     */
    final protected function __construct(
        InvoiceSuitePdfDocumentReader $pdfDocumentReader
    ) {
        $this->pdfDocumentReader = $pdfDocumentReader;
    }

    /**
     * Load a PDF file
     *
     * @param  string                                      $pdfFilename Contains a full-qualified filename which must exist and must be readable
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws RuntimeException
     * @throws PdfParserException
     * @return static
     */
    public static function fromFile(string $pdfFilename): static
    {
        return new static(InvoiceSuitePdfDocumentReader::createFromFile($pdfFilename));
    }

    /**
     * Load a PDF content string
     *
     * @param  string                                      $pdfContent Contains the raw data of a PDF
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws RuntimeException
     * @throws PdfParserException
     * @return static
     */
    public static function fromContent(string $pdfContent): static
    {
        return new static(InvoiceSuitePdfDocumentReader::createFromContent($pdfContent));
    }
}
