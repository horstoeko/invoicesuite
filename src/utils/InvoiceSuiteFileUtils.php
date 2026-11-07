<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use finfo;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\stringmanagement\FileUtils;

/**
 * Class representing some string utilities for files
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteFileUtils extends FileUtils
{
    /**
     * Returns true if $filename is a file, otherwise false
     *
     * @param  string $filename
     * @return bool
     */
    public static function isReadableFile(
        string $filename
    ): bool {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($filename) || InvoiceSuiteStringUtils::contains($filename, "\0")) {
            return false;
        }

        if (preg_match('~^[a-z][a-z0-9+.-]*://~i', $filename)) {
            return false;
        }

        return is_file($filename) && is_readable($filename);
    }

    /**
     * Returns the content of the file or the content itself
     *
     * @param  string $filenameOrContent
     * @return string
     *
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function getContentFromFileOrString(
        string $filenameOrContent
    ): string {
        if (!static::isReadableFile($filenameOrContent)) {
            return $filenameOrContent;
        }

        $fileContent = file_get_contents($filenameOrContent);

        if (false === $fileContent) {
            throw new InvoiceSuiteFileNotReadableException($filenameOrContent);
        }

        return $fileContent;
    }

    /**
     * Returns the content of the file
     *
     * @param  string $filename
     * @return string
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function getContentFromFile(
        string $filename
    ): string {
        if (!static::isReadableFile($filename)) {
            throw new InvoiceSuiteFileNotFoundException($filename);
        }

        $fileContent = file_get_contents($filename);

        if (false === $fileContent) {
            throw new InvoiceSuiteFileNotReadableException($filename);
        }

        return $fileContent;
    }

    /**
     * Put content to a file
     *
     * @param  string $filename
     * @param  mixed  $content
     * @return bool
     */
    public static function putContentToFile(
        string $filename,
        mixed $content
    ): bool {
        return false !== file_put_contents($filename, $content, LOCK_EX);
    }

    /**
     * Detect the MIME type of a readable file from its contents.
     *
     * @param  string       $filename The path to the file
     * @return false|string The detected MIME type, or false if detection fails
     */
    public static function getMimeTypeFromFile(
        string $filename
    ): false|string {
        if (!static::isReadableFile($filename)) {
            return false;
        }

        return (new finfo(FILEINFO_MIME_TYPE))->file($filename);
    }

    /**
     * Check whether the file has a JSON MIME type.
     *
     * @param  string $filename The path to the file
     * @return bool
     */
    public static function isJsonFile(
        string $filename
    ): bool {
        $mimeType = static::getMimeTypeFromFile($filename);

        return false !== $mimeType && InvoiceSuiteStringUtils::equalsNoCase($mimeType, 'application/json');
    }

    /**
     * Check whether the file has an XML MIME type or contains well-formed XML.
     *
     * @param  string $filename The path to the file
     * @return bool
     */
    public static function isXmlFile(
        string $filename
    ): bool {
        $mimeType = static::getMimeTypeFromFile($filename);

        if (false !== $mimeType && InvoiceSuiteArrayUtils::inArrayNoCase(['application/xml', 'text/xml'], $mimeType)) {
            return true;
        }

        return static::isReadableFile($filename) && false !== InvoiceSuiteXmlUtils::loadFile($filename);
    }

    /**
     * Check whether the file has a PDF MIME type.
     *
     * @param  string $filename The path to the file
     * @return bool
     */
    public static function isPdfFile(
        string $filename
    ): bool {
        $mimeType = static::getMimeTypeFromFile($filename);

        return false !== $mimeType && InvoiceSuiteStringUtils::equalsNoCase($mimeType, 'application/pdf');
    }
}
