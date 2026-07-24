<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use horstoeko\stringmanagement\StringUtils;
use Random\RandomException;

/**
 * class representing string utilities
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteStringUtils
{
    /**
     * Find whether the type of a variable is string
     *
     * @param  mixed $value
     * @return bool
     *
     * @phpstan-assert-if-true string $value
     */
    public static function is(
        mixed $value
    ): bool {
        return is_string($value);
    }

    /**
     * Return a specific character
     *
     * @param  int    $codePoint
     * @return string
     */
    public static function chr(
        int $codePoint
    ): string {
        return chr($codePoint);
    }

    /**
     * Split a string by a string
     *
     * @param  string            $separator
     * @param  string            $string
     * @param  int<min, max>     $limit
     * @return array<int,string>
     */
    public static function explode(
        string $separator,
        string $string,
        int $limit = PHP_INT_MAX
    ): array {
        return explode($separator, $string, $limit);
    }

    /**
     * Join array elements with a string
     *
     * @param  string                   $separator
     * @param  array<array-key, scalar> $array
     * @return string
     */
    public static function implode(
        string $separator,
        array $array
    ): string {
        return implode($separator, $array);
    }

    /**
     * Convert a string from one character encoding to another
     *
     * @param  string                        $string
     * @param  string                        $toEncoding
     * @param  null|array<int,string>|string $fromEncoding
     * @return string
     */
    public static function mbConvertEncoding(
        string $string,
        string $toEncoding,
        array|string|null $fromEncoding = null
    ): string {
        return mb_convert_encoding($string, $toEncoding, $fromEncoding);
    }

    /**
     * Return all supported multibyte encodings
     *
     * @return array<int,string>
     */
    public static function mbListEncodings(): array
    {
        return mb_list_encodings();
    }

    /**
     * Get a truncated string with specified width
     *
     * @param  string      $string
     * @param  int         $start
     * @param  int         $width
     * @param  string      $trimMarker
     * @param  null|string $encoding
     * @return string
     */
    public static function mbTrimWidth(
        string $string,
        int $start,
        int $width,
        string $trimMarker = '',
        ?string $encoding = null
    ): string {
        return mb_strimwidth($string, $start, $width, $trimMarker, $encoding);
    }

    /**
     * Calculate the md5 hash of a string
     *
     * @param  string $string
     * @param  bool   $binary
     * @return string
     */
    public static function md5(
        string $string,
        bool $binary = false
    ): string {
        return md5($string, $binary);
    }

    /**
     * Format a number with grouped thousands
     *
     * @param  float       $number
     * @param  int         $decimals
     * @param  null|string $decimalSeparator
     * @param  null|string $thousandsSeparator
     * @return string
     */
    public static function numberFormat(
        float $number,
        int $decimals = 0,
        ?string $decimalSeparator = '.',
        ?string $thousandsSeparator = ','
    ): string {
        return number_format($number, $decimals, $decimalSeparator, $thousandsSeparator);
    }

    /**
     * Return a formatted string
     *
     * @param  string $format
     * @param  mixed  ...$values
     * @return string
     */
    public static function sprintf(
        string $format,
        mixed ...$values
    ): string {
        return sprintf($format, ...$values);
    }

    /**
     * Its like the almost known C#-Methods
     * Tests if string is not null and has a value != ""
     *
     * @param  null|string $str
     * @return bool
     */
    public static function stringIsNullOrEmpty(
        ?string $str = null
    ): bool {
        return StringUtils::stringIsNullOrEmpty($str);
    }

    /**
     * Check if all elements are null or empty
     * Tests if any string in $values is not null and has a value != ""
     *
     * @param  array<null|string> $values
     * @return bool
     */
    public static function allIsNullOrEmpty(
        array $values
    ): bool {
        foreach ($values as $value) {
            if (!static::stringIsNullOrEmpty($value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns true if at least on element in values is null or empty
     *
     * @param  array<null|string> $values
     * @return bool
     */
    public static function oneIsNullOrEmpty(
        array $values
    ): bool {
        foreach ($values as $value) {
            if (static::stringIsNullOrEmpty($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns null if the given string is empty
     *
     * @param  null|string $str
     * @return null|string
     */
    public static function asNullWhenEmpty(
        ?string $str
    ): ?string {
        return static::stringIsNullOrEmpty($str) ? null : $str;
    }

    /**
     * Create a new GUID
     *
     * @param  bool   $useOpenSsl Use OpenSSL-Framework. Default is true
     * @return string
     *
     * @throws RandomException
     */
    public static function createGuid(
        bool $useOpenSsl = true
    ): string {
        $randomBytes = function_exists('openssl_random_pseudo_bytes') && $useOpenSsl ? openssl_random_pseudo_bytes(16) : random_bytes(16);

        $randomBytes[6] = chr(ord($randomBytes[6]) & 0x0F | 0x40);
        $randomBytes[8] = chr(ord($randomBytes[8]) & 0x3F | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($randomBytes), 4));
    }

    /**
     * Lower a string
     *
     * @param  string $str
     * @return string
     */
    public static function lower(
        string $str
    ): string {
        return strtolower($str);
    }

    /**
     * Upper a string
     *
     * @param  string $str
     * @return string
     */
    public static function upper(
        string $str
    ): string {
        return strtoupper($str);
    }

    /**
     * Make a string's first character lowercase
     *
     * @param  string $str
     * @return string
     */
    public static function lcFirst(
        string $str
    ): string {
        return lcfirst($str);
    }

    /**
     * Make a string's first character uppercase
     *
     * @param  string $str
     * @return string
     */
    public static function ucFirst(
        string $str
    ): string {
        return ucfirst($str);
    }

    /**
     * Binary safe string comparison
     *
     * @param  string $str1
     * @param  string $str2
     * @return bool
     */
    public static function equals(
        string $str1,
        string $str2
    ): bool {
        return 0 === strcmp($str1, $str2);
    }

    /**
     * Binary safe case-insensitive string comparison
     *
     * @param  string $str1
     * @param  string $str2
     * @return bool
     */
    public static function equalsNoCase(
        string $str1,
        string $str2
    ): bool {
        return 0 === strcasecmp($str1, $str2);
    }

    /**
     * Binary safe string comparison
     *
     * @param  string $str1
     * @param  string $str2
     * @return int
     */
    public static function compare(
        string $str1,
        string $str2
    ): int {
        return strcmp($str1, $str2);
    }

    /**
     * Binary safe case-insensitive string comparison
     *
     * @param  string $str1
     * @param  string $str2
     * @return int
     */
    public static function compareNoCase(
        string $str1,
        string $str2
    ): int {
        return strcasecmp($str1, $str2);
    }

    /**
     * Get string length
     *
     * @param  string $string
     * @return int
     */
    public static function length(
        string $string
    ): int {
        return strlen($string);
    }

    /**
     * Find the position of the last occurrence of a substring in a string
     *
     * @param  string    $haystack
     * @param  string    $needle
     * @param  int       $offset
     * @return false|int
     */
    public static function reversePosition(
        string $haystack,
        string $needle,
        int $offset = 0
    ): false|int {
        return strrpos($haystack, $needle, $offset);
    }

    /**
     * Return part of a string
     *
     * @param  string   $string
     * @param  int      $offset
     * @param  null|int $length
     * @return string
     */
    public static function substring(
        string $string,
        int $offset,
        ?int $length = null
    ): string {
        return substr($string, $offset, $length);
    }

    /**
     * Checks if $needle is found in $haystack and returns a boolean value (true/false)
     * whether or not the $needle was found
     *
     * @param  string $str
     * @param  string $needle
     * @return bool
     */
    public static function contains(
        string $str,
        string $needle
    ): bool {
        return str_contains($str, $needle);
    }

    /**
     * Checks if $needle is found in $haystack and returns a boolean value (true/false)
     * whether or not the $needle was found. The comparission is case-insensitive.
     *
     * @param  string $str
     * @param  string $needle
     * @return bool
     */
    public static function containsNoCase(
        string $str,
        string $needle
    ): bool {
        return static::contains(static::lower($str), static::lower($needle));
    }

    /**
     * Replace all occurrences of the search string with the replacement string
     *
     * @template TSubject of string|string[]
     *
     * @param  string|string[] $search
     * @param  string|string[] $replace
     * @param  TSubject        $subject $subject
     * @param  null|int        $count
     * @return TSubject
     */
    public static function replace(
        array|string $search,
        array|string $replace,
        array|string $subject,
        &$count = null
    ): array|string {
        return str_replace($search, $replace, $subject, $count);
    }

    /**
     * The function returns {@see true} if the passed $haystack ends with the $needle string or {@see false} otherwise
     *
     * @param  null|string $haystack
     * @param  null|string $needle
     * @return bool
     */
    public static function endsWith(
        ?string $haystack,
        ?string $needle
    ): bool {
        return str_ends_with((string) $haystack, (string) $needle);
    }

    /**
     * The function returns {@see true} if the passed $haystack starts from the $needle string or {@see false} otherwise
     *
     * @param  null|string $haystack
     * @param  null|string $needle
     * @return bool
     */
    public static function startsWith(
        ?string $haystack,
        ?string $needle
    ): bool {
        return str_starts_with((string) $haystack, (string) $needle);
    }

    /**
     * Strip whitespace (or other characters) from the beginning and end of a string
     *
     * @param  string $string
     * @param  string $characters
     * @return string
     */
    public static function trim(
        string $string,
        string $characters = " \n\r\t\v\0"
    ): string {
        return trim($string, $characters);
    }

    /**
     * Strip whitespace (or other characters) from the end of a string
     *
     * @param  string $string
     * @param  string $characters
     * @return string
     */
    public static function trimEnd(
        string $string,
        string $characters = " \n\r\t\v\0"
    ): string {
        return rtrim($string, $characters);
    }

    /**
     * Strip whitespace (or other characters) from the beginning of a string
     *
     * @param  string $string
     * @param  string $characters
     * @return string
     */
    public static function trimStart(
        string $string,
        string $characters = " \n\r\t\v\0"
    ): string {
        return ltrim($string, $characters);
    }

    /**
     * Translate characters or replace substrings
     *
     * @param  string $string
     * @param  string $from
     * @param  string $to
     * @return string
     */
    public static function translate(
        string $string,
        string $from,
        string $to
    ): string {
        return strtr($string, $from, $to);
    }

    /**
     * Translate certain characters
     *
     * @param  string               $string
     * @param  array<string,string> $replacements
     * @return string
     */
    public static function translateArray(
        string $string,
        array $replacements
    ): string {
        return strtr($string, $replacements);
    }
}
