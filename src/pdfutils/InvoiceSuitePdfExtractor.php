<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdfutils;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use LogicException;
use Traversable;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use Smalot\PdfParser\Parser as PdfParser;

/**
 * Class representing an extractor for PDF attachments
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePdfExtractor implements IteratorAggregate, Countable, ArrayAccess
{
    /**
     * Array containing all the attached files found in PDF
     *
     * @var array<int, InvoiceSuitePdfExtractorAttachment>
     */
    private $attachmentList = [];

    /**
     * (Hidden) Constructor
     */
    final protected function __construct() {}

    /**
     * Start getting attached files from a PDF file
     *
     * @param string $pdfFilename
     * @return InvoiceSuitePdfExtractor
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws Exception
     */
    public static function fromFile(string $pdfFilename): self
    {
        if (!file_exists($pdfFilename)) {
            throw new InvoiceSuiteFileNotFoundException($pdfFilename);
        }

        $pdfContent = file_get_contents($pdfFilename);

        if ($pdfContent === false) {
            throw new InvoiceSuiteFileNotReadableException($pdfFilename);
        }

        return static::fromContent($pdfContent);
    }

    /**
     * Start getting attached files from a PDF content
     *
     * @param string $pdfContent
     * @return InvoiceSuitePdfExtractor
     * @throws Exception
     */
    public static function fromContent(string $pdfContent): self
    {
        return (new InvoiceSuitePdfExtractor())->collectAttachmentsFromPdfContent($pdfContent);
    }

    /**
     * Get an attachment by it's filename. If no matching attachment is not available null is returned
     *
     * @param string $filename
     * @return null|string
     */
    public function getAttachmentContentByFilename(string $filename): ?string
    {
        $filteredAttachments = array_filter(
            $this->attachmentList,
            fn($attachment) => strcasecmp($attachment->getNewAttachmentFilename(), $filename) === 0
        );

        if ($filteredAttachments === []) {
            return null;
        }

        $firstAttachment = reset($filteredAttachments);

        return $firstAttachment->getNewAttachmentContent();
    }

    /**
     * Iterate over available attachments
     *
     * @param callable $callback Callback called when attachment is available. The callback gets the current attachment and it's internal undex
     * @param null|callable $callbackElse Callback called when no attachment is available
     * @param null|int $limit Maximum iterations. When null through all attachments is iterated
     * @return InvoiceSuitePdfExtractor
     */
    public function foreachAttachment(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $attachmentIndex = 0;

        foreach ($this->attachmentList as $attachment) {
            if ($limit !== null && $attachmentIndex >= $limit) {
                break;
            }

            $attachmentIndex++;

            if ($callback($attachment, $attachmentIndex) === false) {
                break;
            };
        }

        if ($attachmentIndex === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get a list of all the attachments.
     *
     * @param string $pdfContent
     * @return InvoiceSuitePdfExtractor
     * @throws Exception
     */
    protected function collectAttachmentsFromPdfContent(string $pdfContent): self
    {
        $this->attachmentList = [];

        $pdfParser = new PdfParser();
        $pdfParsed = $pdfParser->parseContent($pdfContent);
        $fileSpecs = $pdfParsed->getObjectsByType('Filespec');

        $fileSpecs = array_filter(
            $fileSpecs,
            function ($fileSpec) {
                return $fileSpec->has('F') && $fileSpec->has('EF');
            }
        );

        $fileSpecs = array_filter(
            $fileSpecs,
            function ($fileSpec) {
                return $fileSpec->get('EF')->has('F');
            }
        );

        foreach ($fileSpecs as $fileSpec) {
            $this->attachmentList[] = new InvoiceSuitePdfExtractorAttachment(
                $fileSpec->get('EF')->get('F')->getContent(),
                $fileSpec->get('F')->getContent(),
                $fileSpec->get('EF')->get('F')->has('Subtype') ? (string)($fileSpec->get('EF')->get('F')->get('Subtype')->getContent()) : ""
            );
        }

        return $this;
    }

    /**
     * Enable foreach ($extractor as $attachment) { ... }
     *
     * @return Traversable<int, InvoiceSuitePdfExtractorAttachment>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->attachmentList);
    }

    /**
     * Enable count($extractor)
     */
    public function count(): int
    {
        return count($this->attachmentList);
    }

    /**
     * Check if an attachment exists at index
     *
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return is_int($offset) && array_key_exists($offset, $this->attachmentList);
    }

    /**
     * Get an attachment by index
     *
     * @param mixed $offset
     * @return null|InvoiceSuitePdfExtractorAttachment
     */
    public function offsetGet(mixed $offset): ?InvoiceSuitePdfExtractorAttachment
    {
        if (!is_int($offset)) {
            return null;
        }

        return $this->attachmentList[$offset] ?? null;
    }

    /**
     * Set an attachment at index. Disallow external modification
     *
     * @param mixed $offset
     * @param mixed $value
     * @return void
     * @throws LogicException
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Attachments are read-only via array access.');
    }

    /**
     * Remove an attachment at index. Disallow external modification
     *
     * @param mixed $offset
     * @return void
     * @throws LogicException
     */
    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Attachments are read-only via array access.');
    }

    /**
     * Get a shallow copy of the attáchments
     *
     * @return array<int, InvoiceSuitePdfExtractorAttachment>
     */
    public function toArray(): array
    {
        return $this->attachmentList;
    }
}
