<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use Composer\InstalledVersions as ComposerInstalledVersions;
use OutOfBoundsException;

/**
 * Class representing some tools for getting the package version
 * of this package
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
final class InvoiceSuitePackageVersion
{
    /**
     * Get the installed version of this library
     *
     * @return string
     */
    public static function getInstalledVersion(): string
    {
        return self::getInstalledVersionByName('horstoeko/invoicesuite');
    }

    /**
     * Get the installed version of a package defined by $packageName
     *
     * @param  string $packageName
     * @param  string $defaultPackageVersion
     * @return string
     */
    public static function getInstalledVersionByName(string $packageName, string $defaultPackageVersion = '1.0.x'): string
    {
        try {
            return ComposerInstalledVersions::getVersion($packageName) ?? $defaultPackageVersion;
        } catch (OutOfBoundsException) {
            return $defaultPackageVersion;
        }
    }
}
