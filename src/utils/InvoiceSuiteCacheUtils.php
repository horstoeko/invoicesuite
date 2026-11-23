<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\utils;

use horstoeko\invoicesuite\InvoiceSuiteSettings;
use RuntimeException;

/**
 * Class representing utilities for cache directories.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteCacheUtils
{
    /**
     * Get the resolved class finder cache directory.
     *
     * @return string
     */
    public static function getClassFinderCacheDirectory(): string
    {
        return InvoiceSuitePathUtils::combineAllPaths(self::getCacheDirectory(), 'classfinder');
    }

    /**
     * Get the resolved serializer cache directory, respecting explicit settings.
     *
     * @return string
     */
    public static function getSerializerCacheDirectory(): string
    {
        return InvoiceSuiteSettings::hasSerializerCacheDirectory()
            ? InvoiceSuiteSettings::getSerializerCacheDirectory()
            : InvoiceSuitePathUtils::combineAllPaths(self::getCacheDirectory(), 'jms');
    }

    /**
     * Ensure the class finder cache directory exists and is readable and writable.
     *
     * @return string the resolved cache directory
     *
     * @throws RuntimeException if the directory cannot be created or accessed
     */
    public static function ensureClassFinderCacheDirectory(): string
    {
        $cacheDirectory = self::getClassFinderCacheDirectory();

        if (!is_dir($cacheDirectory) && !@mkdir($cacheDirectory, 0777, true) && !is_dir($cacheDirectory)) {
            throw new RuntimeException(InvoiceSuiteStringUtils::sprintf('Could not create cache directory "%s".', $cacheDirectory));
        }

        if (!is_readable($cacheDirectory) || !is_writable($cacheDirectory)) {
            throw new RuntimeException(InvoiceSuiteStringUtils::sprintf('Cache directory "%s" must be readable and writable.', $cacheDirectory));
        }

        return $cacheDirectory;
    }

    /**
     * Ensure the serializer cache directory exists and is readable and writable.
     *
     * @return string the resolved cache directory
     *
     * @throws RuntimeException if the directory cannot be created or accessed
     */
    public static function ensureSerializerCacheDirectory(): string
    {
        $cacheDirectory = self::getSerializerCacheDirectory();

        if (!is_dir($cacheDirectory) && !@mkdir($cacheDirectory, 0777, true) && !is_dir($cacheDirectory)) {
            throw new RuntimeException(InvoiceSuiteStringUtils::sprintf('Could not create cache directory "%s".', $cacheDirectory));
        }

        if (!is_readable($cacheDirectory) || !is_writable($cacheDirectory)) {
            throw new RuntimeException(InvoiceSuiteStringUtils::sprintf('Cache directory "%s" must be readable and writable.', $cacheDirectory));
        }

        return $cacheDirectory;
    }

    /**
     * Get the default cache directory in the system temporary directory.
     *
     * @return string
     */
    private static function getCacheDirectory(): string
    {
        return InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), 'invoicesuite', 'cache');
    }
}
