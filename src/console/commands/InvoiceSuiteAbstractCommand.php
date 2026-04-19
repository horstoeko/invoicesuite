<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console\commands;

use finfo;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractorAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Exception\RuntimeException as JmsRuntimeException;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Abstract base class for InvoiceSuite console commands.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractCommand extends Command
{
    /**
     * The MIME type used for PDF documents.
     */
    protected const PDF_MIME_TYPE = 'application/pdf';

    /**
     * The MIME types used for XML documents.
     *
     * @var list<string>
     */
    protected const XML_MIME_TYPES = ['application/xml', 'text/xml'];

    /**
     * Get a string argument.
     *
     * @param  InputInterface $input
     * @param  string         $name
     * @param  string         $default
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getStringArgument(InputInterface $input, string $name, string $default = ''): string
    {
        $value = $input->getArgument($name);

        if (is_string($value)) {
            return $value;
        }

        if (null === $value) {
            return $default;
        }

        throw new RuntimeException(sprintf('Argument "%s" must be a string.', $name));
    }

    /**
     * Get a string option.
     *
     * @param  InputInterface $input
     * @param  string         $name
     * @param  string         $default
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getStringOption(InputInterface $input, string $name, string $default = ''): string
    {
        $value = $input->getOption($name);

        if (is_string($value)) {
            return $value;
        }

        if (null === $value) {
            return $default;
        }

        throw new RuntimeException(sprintf('Option "%s" must be a string.', $name));
    }

    /**
     * Get a boolean option.
     *
     * @param  InputInterface $input
     * @param  string         $name
     * @param  bool           $default
     * @return bool
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getBoolOption(InputInterface $input, string $name, bool $default = false): bool
    {
        $value = $input->getOption($name);

        if (is_bool($value)) {
            return $value;
        }

        if (null === $value) {
            return $default;
        }

        throw new RuntimeException(sprintf('Option "%s" must be a boolean.', $name));
    }

    /**
     * Get an integer option.
     *
     * @param  InputInterface $input
     * @param  string         $name
     * @param  int            $default
     * @return int
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getIntOption(InputInterface $input, string $name, int $default = 0): int
    {
        $value = $input->getOption($name);

        if (is_int($value)) {
            return $value;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($value)) {
            return $default;
        }

        if (is_string($value) && false !== filter_var($value, FILTER_VALIDATE_INT)) {
            return (int) $value;
        }

        throw new RuntimeException(sprintf('Option "%s" must be an integer.', $name));
    }

    /**
     * Ensure that the given file exists and is readable.
     *
     * @param  string $filename
     * @return string
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    protected function requireReadableFilename(string $filename): string
    {
        if (!file_exists($filename)) {
            throw new InvoiceSuiteFileNotFoundException($filename);
        }

        if (!InvoiceSuiteFileUtils::isReadableFilePath($filename)) {
            throw new InvoiceSuiteFileNotReadableException($filename);
        }

        return $filename;
    }

    /**
     * Read the full contents of a readable file.
     *
     * @param  string $filename
     * @return string
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    protected function readFileContents(string $filename): string
    {
        return InvoiceSuiteFileUtils::getContentFromFileOrString($this->requireReadableFilename($filename));
    }

    /**
     * Detect the MIME type of a file.
     *
     * @param  string $filename
     * @return string
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function detectMimeTypeByFilename(string $filename): string
    {
        $fileInfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->file($this->requireReadableFilename($filename));

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($mimeType)) {
            throw new RuntimeException(sprintf('Unable to detect MIME type for file "%s".', $filename));
        }

        return $mimeType;
    }

    /**
     * Determine whether the given file is an XML document.
     *
     * @param  string $filename
     * @return bool
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function isXmlFilename(string $filename): bool
    {
        return InvoiceSuiteArrayUtils::inArrayNoCase($this->detectMimeTypeByFilename($filename), static::XML_MIME_TYPES);
    }

    /**
     * Ensure that the given file is an XML document.
     *
     * @param  string $filename
     * @return string
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    protected function requireReadableXmlFilename(string $filename): string
    {
        $filename = $this->requireReadableFilename($filename);

        if (!$this->isXmlFilename($filename)) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('The file %s is not an XML document.', $filename));
        }

        return $filename;
    }

    /**
     * Determine whether the given file is a PDF.
     *
     * @param  string $filename
     * @return bool
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function isPdfFilename(string $filename): bool
    {
        return $this->detectMimeTypeByFilename($filename) === static::PDF_MIME_TYPE;
    }

    /**
     * Ensure that the given file is a PDF.
     *
     * @param  string $filename
     * @return string
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    protected function requireReadablePdfFilename(string $filename): string
    {
        $filename = $this->requireReadableFilename($filename);

        if (!$this->isPdfFilename($filename)) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('The file %s is not a PDF document.', $filename));
        }

        return $filename;
    }

    /**
     * Detect the structured content type of a non-PDF file.
     *
     * @param  string                       $filename
     * @return null|InvoiceSuiteContentType
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    protected function detectStructuredContentTypeByFilename(string $filename): ?InvoiceSuiteContentType
    {
        return InvoiceSuiteContentTypeResolver::resolveContentType($this->readFileContents($filename));
    }

    /**
     * Create an invoice reader from an XML file or from an embedded XML inside a PDF.
     *
     * @param  string                     $filename
     * @return InvoiceSuiteDocumentReader
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteUnknownContentException
     * @throws JmsRuntimeException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    protected function createInvoiceDocumentReaderFromFilename(string $filename): InvoiceSuiteDocumentReader
    {
        $filename = $this->requireReadableFilename($filename);

        if (!$this->isPdfFilename($filename)) {
            return InvoiceSuiteDocumentReader::createFromFile($filename);
        }

        $pdfDocumentReader = InvoiceSuitePdfDocumentReader::createFromFile($filename);
        $invoiceAttachment = $pdfDocumentReader->getInvoiceDocumentAttachment();

        if (!$invoiceAttachment instanceof InvoiceSuitePdfExtractorAttachment) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('The file %s does not contain an embedded invoice document.', $filename));
        }

        return InvoiceSuiteDocumentReader::createFromContent($invoiceAttachment->getAttachmentContent());
    }

    /**
     * Ensure that a directory exists.
     *
     * @param  string $directory
     * @return string
     *
     * @throws RuntimeException
     */
    protected function ensureDirectoryExists(string $directory): string
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($directory)) {
            throw new RuntimeException('The directory name must not be empty.');
        }

        if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
            throw new RuntimeException(sprintf('Unable to create directory "%s".', $directory));
        }

        return $directory;
    }

    /**
     * Write content to a file.
     *
     * @param  string $filename
     * @param  string $content
     * @return void
     *
     * @throws RuntimeException
     */
    protected function writeFileContents(string $filename, string $content): void
    {
        $directory = dirname($filename);

        if ('.' !== $directory) {
            $this->ensureDirectoryExists($directory);
        }

        if (false === file_put_contents($filename, $content)) {
            throw new RuntimeException(sprintf('Unable to write file "%s".', $filename));
        }
    }

    /**
     * Build a default output filename beside the input file.
     *
     * @param  string $inputFilename
     * @param  string $suffix
     * @param  string $extension
     * @return string
     */
    protected function buildOutputFilename(string $inputFilename, string $suffix, string $extension): string
    {
        $directory = dirname($inputFilename);
        $basename = InvoiceSuiteFileUtils::getFilenameWithoutExtension($inputFilename) . $suffix;
        $filename = InvoiceSuiteFileUtils::combineFilenameWithFileextension($basename, $extension);

        return InvoiceSuitePathUtils::combinePathWithFile($directory, $filename);
    }
}
