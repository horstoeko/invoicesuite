<?php

namespace horstoeko\invoicesuite\concerns;

/**
 * Trait representing methods for conditionals
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
trait HandlesConditionals
{
    /**
     * Call conditionally
     *
     * @param boolean $condition
     * @param callable $callback
     * @return void
     */
    public function callWhen(bool $condition, callable $callback): void
    {
        if ($condition === true) {
            $callback();
        }
    }
}
