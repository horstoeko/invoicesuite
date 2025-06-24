<?php

namespace horstoeko\invoicesuite\utils;

use LogicException;

/**
 * class representing float utilities
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePointerUtils
{
    /**
     * Internal pointer state storage
     *
     * @var array<string, int>
     */
    protected static $pointerState = [];

    /**
     * Initialize Pointer
     *
     * @param string $name
     * @param int $withValue
     * @return void
     */
    protected static function initNamedPointer(string $name, int $withValue = 0): void
    {
        static::$pointerState[$name] = $withValue;
    }

    /**
     * Initialize Pointer if it does not exist
     *
     * @param string $name
     * @param integer $withValue
     * @return void
     */
    protected static function initNamedPointerIfNeeded(string $name, int $withValue = 0): void
    {
        if (!array_key_exists($name, static::$pointerState)) {
            static::initNamedPointer($name, $withValue);
        }
    }

    /**
     * First value of named pointer
     *
     * @param string $name
     * @return void
     */
    public static function first(string $name): void
    {
        static::initNamedPointer($name);

        static::$pointerState[$name] = 0;
    }

    /**
     * Next value of named pointer
     *
     * @param string $name
     * @return void
     */
    public static function next(string $name): void
    {
        static::initNamedPointerIfNeeded($name, -1);

        static::$pointerState[$name] = static::$pointerState[$name] + 1;
    }

    /**
     * Previous value of named pointer
     *
     * @param string $name
     * @return void
     */
    public static function prev(string $name): void
    {
        static::initNamedPointerIfNeeded($name, 1);

        static::$pointerState[$name] = static::$pointerState[$name] - 1;
    }

    /**
     * Check that an array has key. The array key is identified by a pointer state
     *
     * @param array $array
     * @param string $name
     * @return boolean
     */
    public static function has(array $array, string $name): bool
    {
        static::initNamedPointerIfNeeded($name);

        return array_key_exists(static::$pointerState[$name], $array);
    }
}
