<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\exceptions;

use Throwable;

/**
 * Class representing the base exception
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteBadMethodCallException extends InvoiceSuiteBaseException
{
    /**
     * Constructor
     *
     * @param string         $method
     * @param null|Throwable $throwable
     */
    public function __construct(string $method, ?Throwable $throwable = null)
    {
        parent::__construct(sprintf('Call to undefined method %s::%s()', static::class, $method), InvoiceSuiteExceptionCodes::BAD_METHOD_CALL, $throwable);
    }
}
