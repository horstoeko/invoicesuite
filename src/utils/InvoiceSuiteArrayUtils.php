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
    public static function ensure($value): array
    {
        return is_array($value) ? $value : [$value];
    }

    /**
     * Search an array of string for a value (case-insensitive)
     *
     * @param  array<string> $array
     * @param  string        $search
     * @return bool
     */
    public static function inArrayNoCase(array $array, string $search): bool
    {
        return in_array(strtolower($search), array_map(strtolower(...), $array));
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
     * Push a nullable array to an int-indexed array. The string ($value) is only pushed when it is not null or an empty one
     *
     * @template T of array<array-key, mixed>
     * @param array<int, T> $array
     * @param T             $value
     * @phpstan-param-out array<int, T> $array
     * @return void
     */
    public static function pushArrayToIntIndexedArray(array &$array, array $value): void
    {
        // @phpstan-ignore paramOut.type
        if ($value !== []) {
            // @phpstan-ignore paramOut.type
            $array[] = $value;
        }
    }
}
