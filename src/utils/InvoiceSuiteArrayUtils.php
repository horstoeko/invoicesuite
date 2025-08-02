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
