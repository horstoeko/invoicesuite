<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

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
     * Ensure that $value is an array
     *
     * @param  mixed              $value
     * @return array<mixed,mixed>
     */
    public static function ensure(
        $value
    ): array {
        return is_array($value) ? $value : [$value];
    }

    /**
     * Search an array of string for a value (case-insensitive)
     *
     * @param  array<string> $array
     * @param  string        $search
     * @return bool
     */
    public static function inArrayNoCase(
        array $array,
        string $search
    ): bool {
        return in_array(InvoiceSuiteStringUtils::lower($search), array_map(InvoiceSuiteStringUtils::lower(...), $array));
    }

    /**
     * Search an array for a value
     *
     * @param  array<mixed> $array
     * @param  mixed        $search
     * @return bool
     */
    public static function arrayContains(
        array $array,
        mixed $search
    ): bool {
        return in_array($search, $array);
    }

    /**
     * Push a nullable string to an int-indexed array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<int,string> $array
     * @param  null|string       $value
     * @return void
     *
     * @phpstan-param-out array<int,string> $array
     */
    public static function pushStringToIntIndexedArray(array &$array, ?string $value): void
    {
        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($value)) {
            $array[] = (string) $value;
        }
    }

    /**
     * Push a nullable string to an string-indexed ($key) array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<string,string> $array
     * @param  null|string          $key
     * @param  null|string          $value
     * @return void
     *
     * @phpstan-param-out array<string,string> $array
     */
    public static function pushStringToStringIndexedArray(array &$array, ?string $key, ?string $value): void
    {
        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$key, $value])) {
            $array[(string) $key] = (string) $value;
        }
    }

    /**
     * Push a nullable float to an int-indexed array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<int,float> $array
     * @param  null|float       $value
     * @return void
     *
     * @phpstan-param-out array<int,float> $array
     */
    public static function pushFloatToIntIndexedArray(array &$array, ?float $value): void
    {
        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($value)) {
            $array[] = (float) $value;
        }
    }

    /**
     * Push a nullable float to an string-indexed ($key) array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<string,float> $array
     * @param  null|string         $key
     * @param  null|float          $value
     * @return void
     *
     * @phpstan-param-out array<string,float> $array
     */
    public static function pushFloatToStringIndexedArray(array &$array, ?string $key, ?float $value): void
    {
        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($key) && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($value)) {
            $array[(string) $key] = (float) $value;
        }
    }

    /**
     * Push a nullable boolean to an int-indexed array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<int,bool> $array
     * @param  null|bool       $value
     * @return void
     *
     * @phpstan-param-out array<int,bool> $array
     */
    public static function pushBooleanToIntIndexedArray(array &$array, ?bool $value): void
    {
        if (!is_null($value)) {
            $array[] = $value;
        }
    }

    /**
     * Push a nullable boolean to an string-indexed ($key) array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @param  array<string,bool> $array
     * @param  null|string        $key
     * @param  null|bool          $value
     * @return void
     *
     * @phpstan-param-out array<string,bool> $array
     */
    public static function pushBooleanToStringIndexedArray(array &$array, ?string $key, ?bool $value): void
    {
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
    public static function pushArrayToIntIndexedArray(array &$array, array $value): void
    {
        // @phpstan-ignore paramOut.type
        if ([] !== $value) {
            // @phpstan-ignore paramOut.type
            $array[] = $value;
        }
    }

    /**
     * Limit array to n elements
     *
     * @param  array<mixed,mixed> $array
     * @param  int                $limit
     * @return array<mixed,mixed>
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
     * @param  bool               $limitCondition
     * @param  array<mixed,mixed> $array
     * @param  int                $limit
     * @return array<mixed,mixed>
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
     * @param  array<mixed,mixed> $array
     * @return array<mixed,mixed>
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
     * @param  bool               $limitCondition
     * @param  array<mixed,mixed> $array
     * @return array<mixed,mixed>
     */
    public static function limitToOneWhen(
        bool $limitCondition,
        array $array
    ): array {
        return $limitCondition ? static::limitToOne($array) : $array;
    }
}
