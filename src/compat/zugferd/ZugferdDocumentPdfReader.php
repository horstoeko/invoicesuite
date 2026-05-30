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
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInternalMethodCallException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use JMS\Serializer\Exception\RuntimeException;
use PrinsFrank\PdfParser\Exception\PdfParserException;

/**
 * Class representing the document reader for incoming PDF/A-Documents with
 * attached XML data in BASIC-, EN16931- and EXTENDED profile
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocumentPdfReader
{
    /**
     * Tries to load a PDF file (ZUGFeRD/Factur-X) and return a ZugferdDocumentReader
     *
     * @param  string                $pdfFilename
     * @return ZugferdDocumentReader
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInternalMethodCallException
     * @throws InvoiceSuiteUnknownContentException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    public static function readAndGuessFromFile(
        string $pdfFilename
    ): ZugferdDocumentReader {
        return ZugferdDocumentPdfReaderExt::readAndGuessFromFile($pdfFilename);
    }

    /**
     * Tries to load an attachment content from PDF and return a ZugferdDocumentReader
     *
     * @param  string                $pdfContent
     * @return ZugferdDocumentReader
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInternalMethodCallException
     * @throws InvoiceSuiteUnknownContentException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    public static function readAndGuessFromContent(
        string $pdfContent
    ): ZugferdDocumentReader {
        return ZugferdDocumentPdfReaderExt::readAndGuessFromContent($pdfContent);
    }

    /**
     * Returns a XML content from a PDF file
     *
     * @param  string $pdfFilename
     * @return string
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInternalMethodCallException
     * @throws InvoiceSuiteUnknownContentException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    public static function getXmlFromFile(
        string $pdfFilename
    ): string {
        return ZugferdDocumentPdfReaderExt::getInvoiceDocumentContentFromFile($pdfFilename);
    }

    /**
     * Returns a XML content from a PDF binary stream (string)
     *
     * @param  string $pdfContent
     * @return string
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInternalMethodCallException
     * @throws InvoiceSuiteUnknownContentException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    public static function getXmlFromContent(
        string $pdfContent
    ): string {
        return ZugferdDocumentPdfReaderExt::getInvoiceDocumentContentFromContent($pdfContent);
    }
}
