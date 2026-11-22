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
     * Get the default cache directory for regular and PHAR installations.
     *
     * @return string
     */
    private static function getCacheDirectory(): string
    {
        return InvoiceSuiteFileUtils::isRunningFromPhar()
            ? InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), 'invoicesuite', 'cache')
            : InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'cache');
    }
}
