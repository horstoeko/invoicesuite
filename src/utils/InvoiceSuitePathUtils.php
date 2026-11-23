<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use horstoeko\stringmanagement\PathUtils;

/**
 * Class representing some string utilities for directories/paths
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePathUtils extends PathUtils
{
    /**
     * Returns true if the given path is a directory.
     *
     * @param  string $directory
     * @return bool
     */
    public static function isDirectory(
        string $directory
    ): bool {
        return is_dir($directory);
    }

    /**
     * Create a directory, optionally including missing parent directories.
     *
     * @param  string $directory
     * @param  int    $permissions
     * @param  bool   $recursive
     * @return bool
     */
    public static function createDirectory(
        string $directory,
        int $permissions = 0777,
        bool $recursive = false
    ): bool {
        return mkdir($directory, $permissions, $recursive);
    }

    /**
     * Returns true if the given path is a readable directory.
     *
     * @param  string $directory
     * @return bool
     */
    public static function isReadableDirectory(
        string $directory
    ): bool {
        return static::isDirectory($directory) && is_readable($directory);
    }

    /**
     * Returns true if the given path is a writable directory.
     *
     * @param  string $directory
     * @return bool
     */
    public static function isWritableDirectory(
        string $directory
    ): bool {
        return static::isDirectory($directory) && is_writable($directory);
    }

    /**
     * Get the system temporary directory.
     *
     * @return string
     */
    public static function getTempDirectory(): string
    {
        return sys_get_temp_dir();
    }
}
