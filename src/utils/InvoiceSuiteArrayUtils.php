<?php

namespace horstoeko\invoicesuite\utils;

/**
 * class representing array utilities
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteArrayUtils
{
    /**
     * Returns true if the given array is empty, otherwise false
     *
     * @param array<mixed,mixed> $array
     * @return boolean
     */
    public static function isEmpty(array $array): bool
    {
        return $array === [];
    }

    /**
     * Seek to the first array element. If the first element was successfully resolved
     * this method returns true, otherwise false
     *
     * @param array<mixed,mixed>&$array
     * @return bool
     */
    public static function hasFirst(array &$array): bool
    {
        if (static::isEmpty($array)) {
            return false;
        }

        reset($array);

        return key($array) !== null;
    }

    /**
     * Seek to the next array element. If the a element was successfully resolved
     * this method returns true, otherwise false
     *
     * @param array<mixed,mixed>&$array
     * @return bool
     */
    public static function hasNext(array &$array): bool
    {
        if (static::isEmpty($array)) {
            return false;
        }

        next($array);

        return key($array) !== null;
    }

    /**
     * Seek to the last array element. If the a element was successfully resolved
     * this method returns true, otherwise false
     *
     * @param array<mixed,mixed>&$array
     * @return bool
     */
    public static function hasLast(array &$array): bool
    {
        if (static::isEmpty($array)) {
            return false;
        }

        end($array);

        return key($array) !== null;
    }

    /**
     * Returns the current value of the array element
     *
     * @param array<mixed,mixed> $array
     * @return mixed
     */
    public static function currentValue(array &$array)
    {
        if (static::isEmpty($array)) {
            return null;
        }

        if (key($array) === null) {
            return null;
        }

        return current($array);
    }

    /**
     * Ensure that $value is an array
     *
     * @param mixed $value
     * @return array<mixed,mixed>
     */
    public static function ensure($value): array
    {
        return is_array($value) ? $value : [$value];
    }
}
