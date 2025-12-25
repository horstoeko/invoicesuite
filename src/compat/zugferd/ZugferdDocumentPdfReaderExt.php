<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;

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
     * Key of the type element in the internal attachment list
     */
    public const ATTACHMENT_KEY_TYPE = 'type';

    /**
     * Key of the content element in the internal attachment list
     */
    public const ATTACHMENT_KEY_CONTENT = 'content';

    /**
     * Key of the filename element in the internal attachment list
     */
    public const ATTACHMENT_KEY_FILENAME = 'filename';

    /**
     * Key of the filename element in the internal attachment list
     */
    public const ATTACHMENT_KEY_MIMETYPE = 'mimetype';

    /**
     * Identifier for an additional document
     */
    private const ATTACHMENT_TYPE_ADDITIONAL = 1;

    /**
     * (Hidden) Constructor
     */
    final protected function __construct(
        /**
         * Internal PDF document reader
         */
        protected InvoiceSuitePdfDocumentReader $pdfDocumentReader
    ) {}

    /**
     * Load a PDF file
     *
     * @param  string $pdfFilename Contains a full-qualified filename which must exist and must be readable
     * @return static
     */
    public static function fromFile(string $pdfFilename): static
    {
        return new static(InvoiceSuitePdfDocumentReader::createFromFile($pdfFilename));
    }

    /**
     * Load a PDF content string
     *
     * @param  string $pdfContent Contains the raw data of a PDF
     * @return static
     */
    public static function fromContent(string $pdfContent): static
    {
        return new static(InvoiceSuitePdfDocumentReader::createFromContent($pdfContent));
    }

    /**
     * Load a PDF file and return a ZugferDocumentReader-Instance
     *
     * @param  string                $pdfFilename
     * @return ZugferdDocumentReader
     */
    public static function readAndGuessFromFile(string $pdfFilename): ZugferdDocumentReader
    {
        return static::fromFile($pdfFilename)->resolveInvoiceDocumentReader();
    }

    /**
     * Load a PDF content and return a ZugferDocumentReader-Instance
     *
     * @param  string                $pdfContent Contains the raw data of a PDF
     * @return ZugferdDocumentReader
     */
    public static function readAndGuessFromContent(string $pdfContent): ZugferdDocumentReader
    {
        return static::fromContent($pdfContent)->resolveInvoiceDocumentReader();
    }

    /**
     * Returns a invoice document XML content from a PDF file
     *
     * @param  string $pdfFilename Contains a full-qualified filename which must exist and must be readable
     * @return string
     */
    public static function getInvoiceDocumentContentFromFile(string $pdfFilename): string
    {
        return static::fromFile($pdfFilename)->resolveInvoiceDocumentContent();
    }

    /**
     * Returns a invoice document XML content from a PDF content string
     *
     * @param  string $pdfContent Contains the raw data of a PDF
     * @return string
     */
    public static function getInvoiceDocumentContentFromContent(string $pdfContent): string
    {
        return static::fromContent($pdfContent)->resolveInvoiceDocumentContent();
    }

    /**
     * Returns all additional documents (except the invoice document) from a PDF file
     *
     * @param  string                                                                            $pdfFilename Contains a full-qualified filename which must exist and must be readable
     * @return array<int, array{type: int, content: string, filename: string, mimetype: string}>
     */
    public static function getAdditionalDocumentContentsFromFile(string $pdfFilename): array
    {
        return static::fromFile($pdfFilename)->resolveAdditionalDocumentContents();
    }

    /**
     * Returns all additional documents (except the invoice document) from a PDF content string
     *
     * @param  string                                                                            $pdfContent Contains the raw data of a PDF
     * @return array<int, array{type: int, content: string, filename: string, mimetype: string}>
     */
    public static function getAdditionalDocumentContentsFromContent(string $pdfContent): array
    {
        return static::fromContent($pdfContent)->resolveAdditionalDocumentContents();
    }

    /**
     * Returns an instance of ZugferdDocumentReader by a valid invoice attachment
     *
     * @return ZugferdDocumentReader
     */
    public function resolveInvoiceDocumentReader(): ZugferdDocumentReader
    {
        return ZugferdDocumentReader::readAndGuessFromContent($this->resolveInvoiceDocumentContent());
    }

    /**
     * Returns the content as string if a valid invoice attachment was found, otherwise
     * an exception will be raised
     *
     * @return string
     */
    public function resolveInvoiceDocumentContent(): string
    {
        return $this->pdfDocumentReader->getInvoiceDocumentAttachment()?->getAttachmentContent() ?? '';
    }

    /**
     * Returns a list of all additional attached documents except the invoice document
     *
     * @return array<int, array{type: int, content: string, filename: string, mimetype: string}>
     */
    public function resolveAdditionalDocumentContents(): array
    {
        $result = [];
        $attachmentContentList = $this->pdfDocumentReader->getAdditionalDocumentAttachments();

        foreach ($attachmentContentList as $attachmentContentItem) {
            $result[] = [
                self::ATTACHMENT_KEY_TYPE => self::ATTACHMENT_TYPE_ADDITIONAL,
                self::ATTACHMENT_KEY_CONTENT => $attachmentContentItem->getAttachmentContent(),
                self::ATTACHMENT_KEY_FILENAME => $attachmentContentItem->getAttachmentFilename(),
                self::ATTACHMENT_KEY_MIMETYPE => $attachmentContentItem->getAttachmentMimeType(),
            ];
        }

        return $result;
    }
}
