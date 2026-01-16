<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\utils;

use Composer\InstalledVersions as ComposerInstalledVersions;
use Throwable;

/**
 * Class representing some tools for getting the package paths
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
final class InvoiceSuitePackagePaths
{
    /**
     * Get my installaton path
     *
     * @return string
     */
    public static function getInstallationPath(): string
    {
        return static::getInstallationPathByName('horstoeko/invoicesuite');
    }

    /**
     * Get vendor directory
     *
     * @return string
     */
    public static function getVendorPackagePath(): string
    {
        return dirname(static::getInstallationPath(), 2);
    }

    /**
     * Get the root path of the project which uses this project
     *
     * @return string
     */
    public static function getProjectRootPath(): string
    {
        return dirname(static::getVendorPackagePath());
    }

    /**
     * Get installaton path of a package with name $packageName
     *
     * @param  string $packageName
     * @return string
     */
    public static function getInstallationPathByName(string $packageName): string
    {
        try {
            return ComposerInstalledVersions::getInstallPath($packageName) ?? '';
            // @phpstan-ignore catch.neverThrown
        } catch (Throwable) {
            return '';
        }
    }
}
