<?php

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
}
