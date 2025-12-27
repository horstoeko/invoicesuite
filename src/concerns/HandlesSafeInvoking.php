<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\concerns;

/**
 * Trait representing safe invoker methods
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
trait HandlesSafeInvoking
{
    /**
     * Tries to call a method
     *
     * @param  object $instance
     * @param  string $method
     * @param  mixed  $value
     * @return static
     */
    private function safeInvokeTryCall($instance, string $method, $value): static
    {
        if (!$instance) {
            return $this;
        }

        if ('' === $method) {
            return $this;
        }

        if ($this->safeInvokeMethodExists($instance, $method)) {
            $instance->{$method}($value);
        }

        return $this;
    }

    /**
     * Tries to call a method and return the returnvalue from call to $method
     * in object $instance
     *
     * @param  object $instance
     * @param  string $method
     * @return mixed
     */
    private function safeInvokeTryCallAndReturn($instance, string $method)
    {
        if (!$instance) {
            return null;
        }

        if ('' === $method) {
            return null;
        }

        if ($this->safeInvokeMethodExists($instance, $method)) {
            return $instance->{$method}();
        }

        return null;
    }

    /**
     * Try call methods in a form .object.method1.method2.method3
     *
     * @param  object $instance
     * @param  string $methods
     * @param  mixed  $value
     * @return void
     */
    private function safeInvokeTryCallByPath($instance, string $methods, $value)
    {
        $methods = explode('.', $methods);

        foreach ($methods as $index => $method) {
            if ($index === count($methods) - 1) {
                $this->safeInvokeTryCall($instance, $method, $value);
            } else {
                $instance = $this->safeInvokeTryCallAndReturn($instance, $method);
            }
        }
    }

    /**
     * Wrapper for method_exists for use in PHP8
     *
     * @param  object|string $instance
     * @param  string        $method
     * @return bool
     */
    private function safeInvokeMethodExists($instance, $method): bool
    {
        if (null == $instance) {
            return false;
        }

        if (!is_object($instance) && !is_string($instance)) {
            return false;
        }

        return method_exists($instance, $method);
    }
}
