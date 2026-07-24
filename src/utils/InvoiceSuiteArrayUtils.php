<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use Countable;

/**
 * class representing array utilities
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteArrayUtils
{
    /**
     * Finds whether a variable is an array
     *
     * @param  mixed $value
     * @return bool
     *
     * @phpstan-assert-if-true array<array-key, mixed> $value
     */
    public static function is(
        mixed $value
    ): bool {
        return is_array($value);
    }

    /**
     * Ensure that $value is an array
     *
     * @param  mixed                   $value
     * @return array<array-key, mixed>
     */
    public static function ensure(
        $value
    ): array {
        return static::is($value) ? $value : [$value];
    }

    /**
     * Search an array of string for a value (case-insensitive)
     *
     * @param  array<array-key, string> $array
     * @param  string                   $search
     * @return bool
     */
    public static function inArrayNoCase(
        array $array,
        string $search
    ): bool {
        return in_array(InvoiceSuiteStringUtils::lower($search), array_map(InvoiceSuiteStringUtils::lower(...), $array), true);
    }

    /**
     * Search an array for a value
     *
     * @param  array<array-key, mixed> $array
     * @param  mixed                   $search
     * @return bool
     */
    public static function arrayContains(
        array $array,
        mixed $search
    ): bool {
        return in_array($search, $array, true);
    }

    /**
     * Push a nullable string to an int-indexed array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<int, string> $array
     * @param  null|string        $value
     * @return void
     *
     * @phpstan-param-out array<int, string> $array
     */
    public static function pushStringToIntIndexedArray(
        array &$array,
        ?string $value
    ): void {
        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($value)) {
            $array[] = (string) $value;
        }
    }

    /**
     * Push a nullable string to an string-indexed ($key) array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<string, string> $array
     * @param  null|string           $key
     * @param  null|string           $value
     * @return void
     *
     * @phpstan-param-out array<string, string> $array
     */
    public static function pushStringToStringIndexedArray(
        array &$array,
        ?string $key,
        ?string $value
    ): void {
        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$key, $value])) {
            $array[(string) $key] = (string) $value;
        }
    }

    /**
     * Push a nullable float to an int-indexed array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<int, float> $array
     * @param  null|float        $value
     * @return void
     *
     * @phpstan-param-out array<int, float> $array
     */
    public static function pushFloatToIntIndexedArray(
        array &$array,
        ?float $value
    ): void {
        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($value)) {
            $array[] = (float) $value;
        }
    }

    /**
     * Push a nullable float to an string-indexed ($key) array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<string, float> $array
     * @param  null|string          $key
     * @param  null|float           $value
     * @return void
     *
     * @phpstan-param-out array<string, float> $array
     */
    public static function pushFloatToStringIndexedArray(
        array &$array,
        ?string $key,
        ?float $value
    ): void {
        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($key) && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($value)) {
            $array[(string) $key] = (float) $value;
        }
    }

    /**
     * Push a nullable boolean to an int-indexed array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<int, bool> $array
     * @param  null|bool        $value
     * @return void
     *
     * @phpstan-param-out array<int, bool> $array
     */
    public static function pushBooleanToIntIndexedArray(
        array &$array,
        ?bool $value
    ): void {
        if (!is_null($value)) {
            $array[] = $value;
        }
    }

    /**
     * Push a nullable boolean to an string-indexed ($key) array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<string, bool> $array
     * @param  null|string         $key
     * @param  null|bool           $value
     * @return void
     *
     * @phpstan-param-out array<string, bool> $array
     */
    public static function pushBooleanToStringIndexedArray(
        array &$array,
        ?string $key,
        ?bool $value
    ): void {
        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($key) && !is_null($value)) {
            $array[(string) $key] = $value;
        }
    }

    /**
     * Push a nullable array to an int-indexed array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @template T of array<array-key, mixed>
     *
     * @param array<int, T> $array
     * @param T             $value
     *
     * @phpstan-param-out array<int, T> $array
     *
     * @return void
     */
    public static function pushArrayToIntIndexedArray(
        array &$array,
        array $value
    ): void {
        // @phpstan-ignore paramOut.type
        if (!static::empty($value)) {
            // @phpstan-ignore paramOut.type
            $array[] = $value;
        }
    }

    /**
     * Limit array to n elements
     *
     * @param  array<array-key, mixed> $array
     * @param  int                     $limit
     * @return array<array-key, mixed>
     */
    public static function limit(
        array $array,
        int $limit
    ): array {
        return array_slice($array, 0, $limit);
    }

    /**
     * Limit array to n elements if $limitCondition evaluates to true, otherwise
     * the original array is returned
     *
     * @param  bool                    $limitCondition
     * @param  array<array-key, mixed> $array
     * @param  int                     $limit
     * @return array<array-key, mixed>
     */
    public static function limitWhen(
        bool $limitCondition,
        array $array,
        int $limit
    ): array {
        return $limitCondition ? static::limit($array, $limit) : $array;
    }

    /**
     * Limit array to one element
     *
     * @param  array<array-key, mixed> $array
     * @return array<array-key, mixed>
     */
    public static function limitToOne(
        array $array
    ): array {
        return static::limit($array, 1);
    }

    /**
     * Limit array to 1 element if $limitCondition evaluates to true, otherwise
     * the original array is returned
     *
     * @param  bool                    $limitCondition
     * @param  array<array-key, mixed> $array
     * @return array<array-key, mixed>
     */
    public static function limitToOneWhen(
        bool $limitCondition,
        array $array
    ): array {
        return $limitCondition ? static::limitToOne($array) : $array;
    }

    /**
     * Check whether an array is empty
     *
     * @param  mixed $array
     * @return bool
     *
     * @phpstan-assert-if-true array{} $array
     */
    public static function empty(
        mixed $array
    ): bool {
        return static::is($array) && [] === $array;
    }

    /**
     * Filter elements of an array using a callback function
     *
     * @template TKey of array-key
     * @template TValue
     *
     * @param  array<TKey, TValue> $array
     * @param  null|callable       $callback
     * @param  int                 $mode
     * @return array<TKey, TValue>
     */
    public static function filter(
        array $array,
        ?callable $callback = null,
        int $mode = 0
    ): array {
        return array_filter($array, $callback, $mode);
    }

    /**
     * Check whether an array key exists
     *
     * @param  array<array-key, mixed> $array
     * @param  int|string              $key
     * @return bool
     */
    public static function keyExists(
        array $array,
        int|string $key
    ): bool {
        return array_key_exists($key, $array);
    }

    /**
     * Gets the first key of an array
     *
     * @param  array<array-key, mixed> $array
     * @return null|int|string
     */
    public static function firstKey(
        array $array
    ): int|string|null {
        return array_key_first($array);
    }

    /**
     * Return all the keys or a subset of the keys of an array
     *
     * @param  array<array-key, mixed> $array
     * @param  mixed                   ...$arguments
     * @return array<int, int|string>
     */
    public static function keys(
        array $array,
        mixed ...$arguments
    ): array {
        if (static::empty($arguments)) {
            return array_keys($array);
        }

        return array_keys($array, $arguments[0], true);
    }

    /**
     * Applies the callback to the elements of the given arrays
     *
     * @param  null|callable           $callback
     * @param  array<array-key, mixed> $array
     * @param  array<array-key, mixed> ...$arrays
     * @return array<array-key, mixed>
     */
    public static function map(
        ?callable $callback,
        array $array,
        array ...$arrays
    ): array {
        return array_map($callback, $array, ...$arrays);
    }

    /**
     * Merge one or more arrays
     *
     * @param  array<array-key, mixed> ...$arrays
     * @return array<array-key, mixed>
     */
    public static function merge(
        array ...$arrays
    ): array {
        return array_merge(...$arrays);
    }

    /**
     * Searches the array for a given value and returns the first corresponding key
     *
     * @param  array<array-key, mixed> $array
     * @param  mixed                   $search
     * @return false|int|string
     */
    public static function search(
        array $array,
        mixed $search
    ): false|int|string {
        return array_search($search, $array, true);
    }

    /**
     * Return all the values of an array
     *
     * @template TValue
     *
     * @param  array<array-key, TValue> $array
     * @return array<int, TValue>
     */
    public static function values(
        array $array
    ): array {
        return array_values($array);
    }

    /**
     * Count all elements in an array or a Countable object
     *
     * @param  array<array-key, mixed>|Countable $value
     * @param  0|1                               $mode
     * @return int
     */
    public static function count(
        array|Countable $value,
        int $mode = COUNT_NORMAL
    ): int {
        return count($value, $mode);
    }

    /**
     * Return the first element in an array
     *
     * @template TValue
     *
     * @param  array<array-key, TValue> $array
     * @return false|TValue
     */
    public static function first(
        array &$array
    ): mixed {
        return reset($array);
    }

    /**
     * Return the last element in an array
     *
     * @template TValue
     *
     * @param  array<array-key, TValue> $array
     * @return false|TValue
     */
    public static function last(
        array &$array
    ): mixed {
        return end($array);
    }

    /**
     * Return the next element in an array
     *
     * @template TValue
     *
     * @param  array<array-key, TValue> $array
     * @return false|TValue
     */
    public static function next(
        array &$array
    ): mixed {
        return next($array);
    }

    /**
     * Return the previous element in an array
     *
     * @template TValue
     *
     * @param  array<array-key, TValue> $array
     * @return false|TValue
     */
    public static function previous(
        array &$array
    ): mixed {
        return prev($array);
    }

    /**
     * Sort an array by values using a user-defined comparison function
     *
     * @param  array<array-key, mixed> $array
     * @param  callable                $callback
     * @return bool
     */
    public static function sortWithCallback(
        array &$array,
        callable $callback
    ): bool {
        return usort($array, $callback);
    }

    /**
     * Return the values from a single column in the input array
     *
     * @param  array<array-key, mixed> $array
     * @param  null|int|string         $columKey
     * @param  null|int|string         $indexKey
     * @return array<array-key, mixed>
     */
    public static function col(
        array $array,
        int|string|null $columKey,
        int|string|null $indexKey = null
    ): array {
        return array_column($array, $columKey, $indexKey);
    }
}
