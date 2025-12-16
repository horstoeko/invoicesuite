<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\concerns;

use BadMethodCallException;
use Error;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteBadMethodCallException;

/**
 * Trait representing methods for forwarding calls
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 *
 * @codeCoverageIgnore
 */
trait HandlesCallForwarding
{
    /**
     * Forward a method call to the given object.
     *
     * @param  mixed                              $object
     * @param  string                             $method
     * @param  array<mixed>                       $parameters
     * @return mixed
     * @throws BadMethodCallException
     * @throws Error
     * @throws InvoiceSuiteBadMethodCallException
     */
    protected function forwardCallTo($object, $method, $parameters)
    {
        try {
            return $object->{$method}(...$parameters);
        } catch (BadMethodCallException|Error $e) {
            $pattern = '~^Call to undefined method (?P<class>[^:]+)::(?P<method>[^\(]+)\(\)$~';

            if (in_array(preg_match($pattern, $e->getMessage(), $matches), [0, false], true)) {
                throw $e;
            }

            if (
                $matches['class'] != $object::class
                || $matches['method'] != $method
            ) {
                throw $e;
            }

            throw new InvoiceSuiteBadMethodCallException($method);
        }
    }

    /**
     * Forward a method call to the given object. The existance of the method is checked
     *
     * @param  mixed                              $object
     * @param  string                             $method
     * @param  array<mixed>                       $parameters
     * @return mixed
     * @throws BadMethodCallException
     * @throws Error
     * @throws InvoiceSuiteBadMethodCallException
     */
    protected function forwardCallWithCheckTo($object, $method, $parameters)
    {
        if (!method_exists($object, $method)) {
            return $this;
        }

        return $this->forwardCallTo($object, $method, $parameters);
    }
}
