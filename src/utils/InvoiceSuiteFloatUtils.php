<?php

namespace horstoeko\invoicesuite\utils;

/**
 * class representing float utilities
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteFloatUtils
{
    /**
     * Returns true if the given value is null otherwise false
     *
     * @param float|null $value
     * @return boolean
     */
    public static function floatIsNullOrEmpty(?float $value = null): bool
    {
        return is_null($value);
    }

    /**
     * Check if all elements are null or empty
     * Tests if any float in $values is not null and has a value != ""
     *
     * @param array<float|null> $values
     * @return boolean
     */
    public static function allIsNullOrEmpty(array $values): bool
    {
        foreach ($values as $value) {
            if (!static::floatIsNullOrEmpty($value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns true if at least on element in values is null or empty
     *
     * @param array<float|null> $values
     * @return boolean
     */
    public static function oneIsNullOrEmpty(array $values): bool
    {
        foreach ($values as $value) {
            if (static::floatIsNullOrEmpty($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns null if the given float is empty
     *
     * @param null|float $str
     * @return null|float
     */
    public static function asNullWhenEmpty(?float $str): ?float
    {
        return static::floatIsNullOrEmpty($str) ? null : $str;
    }
}