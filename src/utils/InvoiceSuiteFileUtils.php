<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

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
     * Returns true if $filenameOrContent is a file, otherwise false
     *
     * @param  string $filenameOrContent
     * @return bool
     */
    public static function isReadableFilePath(
        string $filenameOrContent
    ): bool {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($filenameOrContent) || InvoiceSuiteStringUtils::contains($filenameOrContent, "\0")) {
            return false;
        }

        if (preg_match('~^[a-z][a-z0-9+.-]*://~i', $filenameOrContent)) {
            return false;
        }

        return is_file($filenameOrContent) && is_readable($filenameOrContent);
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
        if (!static::isReadableFilePath($filenameOrContent)) {
            return $filenameOrContent;
        }

        $fileContent = file_get_contents($filenameOrContent);

        if (false === $fileContent) {
            throw new InvoiceSuiteFileNotReadableException($filenameOrContent);
        }

        return $fileContent;
    }
}
