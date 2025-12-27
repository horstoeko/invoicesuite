<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

/**
 * Class representing the general InvoiceSuite settings
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteSettings
{
    /**
     * The number of decimals for amount values
     *
     * @var int
     */
    protected static $amountDecimals = 2;

    /**
     * The number of decimals for quantity values
     *
     * @var int
     */
    protected static $quantityDecimals = 2;

    /**
     * The number of decimals for percent values
     *
     * @var int
     */
    protected static $percentDecimals = 2;

    /**
     * The number of decimals for measure values
     *
     * @var int
     */
    protected static $measureDecimals = 2;

    /**
     * The decimal separator
     *
     * @var string
     */
    protected static $decimalSeparator = '.';

    /**
     * The thousands seperator
     *
     * @var string
     */
    protected static $thousandsSeparator = '';

    /**
     * Node paths which present an amount. Used for special amount formatting
     *
     * @var array<string,int>
     */
    protected static $specialDecimalPlacesMaps = [];

    /**
     * The configured cache directory for the serializer
     *
     * @var string
     */
    protected static $serializerCacheDirectory = '';

    /**
     * Get the number of decimals to use for amount values
     *
     * @return int
     */
    public static function getAmountDecimals(): int
    {
        return static::$amountDecimals;
    }

    /**
     * Set the number of decimals to use for amount values
     *
     * @param  int  $amountDecimals
     * @return void
     */
    public static function setAmountDecimals(int $amountDecimals): void
    {
        static::$amountDecimals = $amountDecimals;
    }

    /**
     * Get the number of decimals to use for amount values
     *
     * @return int
     */
    public static function getQuantityDecimals(): int
    {
        return static::$quantityDecimals;
    }

    /**
     * Set the number of decimals to use for quantity values
     *
     * @param  int  $quantityDecimals
     * @return void
     */
    public static function setQuantityDecimals(int $quantityDecimals): void
    {
        static::$quantityDecimals = $quantityDecimals;
    }

    /**
     * Get the number of decimals to use for percent values
     *
     * @return int
     */
    public static function getPercentDecimals(): int
    {
        return static::$percentDecimals;
    }

    /**
     * Set the number of decimals to use for percent values
     *
     * @param  int  $percentDecimals
     * @return void
     */
    public static function setPercentDecimals(int $percentDecimals): void
    {
        static::$percentDecimals = $percentDecimals;
    }

    /**
     * Get the number of decimals to use for measure values
     *
     * @return int
     */
    public static function getMeasureDecimals(): int
    {
        return static::$measureDecimals;
    }

    /**
     * Set the number of decimals to use for measure values
     *
     * @param  int  $measureDecimals
     * @return void
     */
    public static function setMeasureDecimals(int $measureDecimals): void
    {
        static::$measureDecimals = $measureDecimals;
    }

    /**
     * Get the decimal separator
     *
     * @return string
     */
    public static function getDecimalSeparator(): string
    {
        return static::$decimalSeparator;
    }

    /**
     * Set the decimal separator
     *
     * @param  string $decimalSeparator
     * @return void
     */
    public static function setDecimalSeparator(string $decimalSeparator): void
    {
        static::$decimalSeparator = $decimalSeparator;
    }

    /**
     * Get the thousands separator
     *
     * @return string
     */
    public static function getThousandsSeparator(): string
    {
        return static::$thousandsSeparator;
    }

    /**
     * Set the thousands separator
     *
     * @param  string $thousandsSeparator
     * @return void
     */
    public static function setThousandsSeparator(string $thousandsSeparator): void
    {
        static::$thousandsSeparator = $thousandsSeparator;
    }

    /**
     * Returns a list of node paths which have a special number of decimal places
     *
     * @return array<string,int>
     */
    public static function getSpecialDecimalPlacesMaps(): array
    {
        return static::$specialDecimalPlacesMaps;
    }

    /**
     * Get a specific map for node paths with a special number of decimal places. If not map
     * is found then the default value is returns
     *
     * @param  string $nodePath
     * @param  int    $defaultDecimalPlaces
     * @return int
     */
    public static function getSpecialDecimalPlacesMap(string $nodePath, int $defaultDecimalPlaces): int
    {
        $nodePath = preg_replace('@\[\d+\]@', '', $nodePath);

        return static::$specialDecimalPlacesMaps[$nodePath] ?? $defaultDecimalPlaces;
    }

    /**
     * Update the map of node paths which have a special number of decimal places
     *
     * @param  array<string,int> $specialDecimalPlacesMaps
     * @return void
     */
    public static function setSpecialDecimalPlacesMaps(array $specialDecimalPlacesMaps): void
    {
        static::$specialDecimalPlacesMaps = $specialDecimalPlacesMaps;
    }

    /**
     * Add a new map for a node path with a special number of decimal places
     *
     * @param  string $nodePath
     * @param  int    $defaultDecimalPlaces
     * @return void
     */
    public static function addSpecialDecimalPlacesMap(string $nodePath, int $defaultDecimalPlaces): void
    {
        $nodePath = preg_replace('@\[\d+\]@', '', $nodePath);

        static::$specialDecimalPlacesMaps[$nodePath] = $defaultDecimalPlaces;
    }

    /**
     * Set the number of decimals to use for unit single amount (unit prices) values
     *
     * @param  int  $defaultDecimalPlaces
     * @return void
     */
    public static function setUnitAmountDecimals(int $defaultDecimalPlaces): void
    {
        static::addSpecialDecimalPlacesMap('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', $defaultDecimalPlaces);
        static::addSpecialDecimalPlacesMap('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', $defaultDecimalPlaces);
        static::addSpecialDecimalPlacesMap('/Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', $defaultDecimalPlaces);
        static::addSpecialDecimalPlacesMap('/*/cac:InvoiceLine/cac:Price/cbc:PriceAmount', $defaultDecimalPlaces);
    }

    /**
     * Set the cache directory for the internal serializer
     *
     * @param  string $serializerCacheDirectoty
     * @return void
     */
    public static function setSerializerCacheDirectory(string $serializerCacheDirectoty): void
    {
        static::$serializerCacheDirectory = $serializerCacheDirectoty;
    }

    /**
     * Returns the cache directory for the internal serializer. This might be empty
     *
     * @return string
     */
    public static function getSerializerCacheDirectory(): string
    {
        return static::$serializerCacheDirectory;
    }

    /**
     * Returns true if a cache directory for the internal serializer is configured, otherwise false
     *
     * @return bool
     */
    public static function hasSerializerCacheDirectory(): bool
    {
        return false === InvoiceSuiteStringUtils::stringIsNullOrEmpty(static::$serializerCacheDirectory);
    }

    /**
     * Get root directory
     *
     * @return string
     */
    public static function getRootDirectory(): string
    {
        return InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..');
    }

    /**
     * Get the directory where all the sources are stored
     *
     * @return string
     */
    public static function getSourceDirectory(): string
    {
        return InvoiceSuitePathUtils::combineAllPaths(static::getRootDirectory(), 'src');
    }
}
