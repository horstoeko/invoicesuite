<?php

/**
 * This file is a part of horstoeko/zugferd.
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
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
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
        try {
            return ComposerInstalledVersions::getVersion('horstoeko/invoicesuite') ?? self::getDefaultVersion();
        } catch (OutOfBoundsException $outOfBoundsException) {
            return self::getDefaultVersion();
        }
    }

    /**
     * Return the default version used for this package, when no installation was found
     *
     * @return string
     */
    private static function getDefaultVersion(): string
    {
        return "1.0.x";
    }
}
