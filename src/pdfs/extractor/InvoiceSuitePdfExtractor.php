<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdfs\extractor;

use ArrayAccess;
use ArrayIterator;
use Countable;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use IteratorAggregate;
use LogicException;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use PrinsFrank\PdfParser\PdfParser;
use Traversable;

/**
 * Class representing an extractor for PDF attachments
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 *
 * @implements ArrayAccess<int, InvoiceSuitePdfExtractorAttachment>
 * @implements IteratorAggregate<int, InvoiceSuitePdfExtractorAttachment>
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
     * @param  string                               $pdfFilename
     * @return static
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws PdfParserException
     */
    public static function fromFile(string $pdfFilename): static
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
     * @param  string             $pdfContent
     * @return static
     * @throws PdfParserException
     */
    public static function fromContent(string $pdfContent): static
    {
        return (new static())->collectAttachmentsFromPdfContent($pdfContent);
    }

    /**
     * Enable foreach
     *
     * @return Traversable<int, InvoiceSuitePdfExtractorAttachment>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->attachmentList);
    }

    /**
     * Enable count
     */
    public function count(): int
    {
        return count($this->attachmentList);
    }

    /**
     * Check if an attachment exists at index
     *
     * @param  mixed $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return is_int($offset) && array_key_exists($offset, $this->attachmentList);
    }

    /**
     * Get an attachment by index
     *
     * @param  mixed                                   $offset
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
     * @param  mixed          $offset
     * @param  mixed          $value
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
     * @param  mixed          $offset
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

    /**
     * Returns the classname of the LGPL-licensed PDF Parser smalot\pdfparser
     *
     * @return string
     */
    protected function getSmalotPdfParserClassname(): string
    {
        return '\Smalot\PdfParser\Parser';
    }

    /**
     * Returns true if the LGPL-licensed PDF Parser smalot\pdfparser is available
     *
     * @return bool
     */
    protected function isSmalotPdfParserAvailable(): bool
    {
        return class_exists($this->getSmalotPdfParserClassname());
    }

    /**
     * Get a list of all the attachments.
     *
     * @param  string             $pdfContent
     * @return static
     * @throws PdfParserException
     */
    protected function collectAttachmentsFromPdfContent(string $pdfContent): static
    {
        $this->attachmentList = [];

        if ($this->isSmalotPdfParserAvailable()) {
            $pdfParser = new ($this->getSmalotPdfParserClassname())();
            $pdfParsed = $pdfParser->parseContent($pdfContent);
            $fileSpecs = $pdfParsed->getObjectsByType('Filespec');

            $fileSpecs = array_filter(
                $fileSpecs,
                static function ($fileSpec) {
                    return $fileSpec->has('F') && $fileSpec->has('EF');
                }
            );

            $fileSpecs = array_filter(
                $fileSpecs,
                static function ($fileSpec) {
                    return $fileSpec->get('EF')->has('F');
                }
            );

            foreach ($fileSpecs as $fileSpec) {
                $this->attachmentList[] = new InvoiceSuitePdfExtractorAttachment(
                    $fileSpec->get('EF')->get('F')->getContent(),
                    $fileSpec->get('F')->getContent(),
                    $fileSpec->get('EF')->get('F')->has('Subtype') ? (string) ($fileSpec->get('EF')->get('F')->get('Subtype')->getContent()) : ''
                );
            }

            return $this;
        }

        $pdfParser = new PdfParser();
        $pdfParsed = $pdfParser->parseString($pdfContent);
        $fileSpecs = $pdfParsed->getCatalog()->getFileSpecifications();

        $fileSpecs = array_filter(
            $fileSpecs,
            static function ($fileSpec) {
                return !is_null($fileSpec->getEmbeddedFile());
            }
        );

        foreach ($fileSpecs as $fileSpec) {
            $this->attachmentList[] = new InvoiceSuitePdfExtractorAttachment(
                $fileSpec->getEmbeddedFile()->getStream()->toString(),
                $fileSpec->getFileSpecificationString(),
                ltrim($fileSpec->getEmbeddedFile()->getSubType() ?? '', '/')
            );
        }

        return $this;
    }
}
