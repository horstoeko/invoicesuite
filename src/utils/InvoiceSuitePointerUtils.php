<?php

namespace horstoeko\invoicesuite\utils;

/**
 * class representing array-pointer utilities
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
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
     * First value of named pointer
     *
     * @param  string $name
     * @return void
     */
    public static function first(string $name): void
    {
        static::initNamedPointer($name);
    }

    /**
     * Next value of named pointer
     *
     * @param  string $name
     * @return void
     */
    public static function next(string $name): void
    {
        static::initNamedPointerIfNeeded($name, -1);

        ++static::$pointerState[$name];
    }

    /**
     * Previous value of named pointer
     *
     * @param  string $name
     * @return void
     */
    public static function prev(string $name): void
    {
        static::initNamedPointerIfNeeded($name, 1);

        --static::$pointerState[$name];
    }

    /**
     * Check that an array has key. The array key is identified by a pointer state
     *
     * @param  array<mixed,mixed> $array
     * @param  string             $name
     * @return bool
     */
    public static function has(array $array, string $name): bool
    {
        static::initNamedPointerIfNeeded($name);

        return array_key_exists(static::$pointerState[$name], $array);
    }

    /**
     * Seek to first and check if array has an element
     *
     * @param  array<mixed,mixed> $array
     * @param  string             $name
     * @return bool
     */
    public static function hasFirst(array $array, string $name): bool
    {
        static::first($name);

        return static::has($array, $name);
    }

    /**
     * Seek to next and check if array has an element
     *
     * @param  array<mixed,mixed> $array
     * @param  string             $name
     * @return bool
     */
    public static function hasNext(array $array, string $name): bool
    {
        static::next($name);

        return static::has($array, $name);
    }

    /**
     * Get the pointer value
     *
     * @param  string $name
     * @return int
     */
    public static function getValue(string $name): int
    {
        static::initNamedPointerIfNeeded($name);

        return static::$pointerState[$name];
    }

    /**
     * Clear all pointers and their states
     *
     * @return void
     */
    public static function reset(): void
    {
        static::$pointerState = [];
    }

    /**
     * Clear a single pointer
     *
     * @param  string $name
     * @return void
     */
    public static function resetSingle(string $name): void
    {
        unset(static::$pointerState[$name]);
    }

    /**
     * Initialize Pointer
     *
     * @param  string $name
     * @param  int    $withValue
     * @return void
     */
    protected static function initNamedPointer(string $name, int $withValue = 0): void
    {
        static::$pointerState[$name] = $withValue;
    }

    /**
     * Initialize Pointer if it does not exist
     *
     * @param  string $name
     * @param  int    $withValue
     * @return void
     */
    protected static function initNamedPointerIfNeeded(string $name, int $withValue = 0): void
    {
        if (!array_key_exists($name, static::$pointerState)) {
            static::initNamedPointer($name, $withValue);
        }
    }
}
