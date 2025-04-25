<?php

namespace horstoeko\invoicesuite\utils;

use Closure;
use horstoeko\stringmanagement\StringUtils;

/**
 * class representing string utilities
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteConditionalUtils
{
    /**
     * Return the default value of the given value.
     *
     * @template TValue
     * @template TArgs
     *
     * @param  TValue|Closure(TArgs): TValue $value
     * @param  TArgs ...$args
     * @return TValue
     */
    public static function value($value, ...$args)
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }

    /**
     * Return a value if the given condition is true.
     *
     * @param  bool          $condition
     * @param  Closure|mixed $callback
     * @param  Closure|mixed $defaultCallback
     * @return mixed
     */
    public static function when(bool $condition, $callback, $defaultCallback = null)
    {
        if ($condition) {
            return static::value($callback, $condition);
        }

        return static::value($defaultCallback, $condition);
    }
}
