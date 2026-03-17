<?php

declare(strict_types=1);

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
class InvoiceSuiteInvalidArgumentException extends InvoiceSuiteBaseException
{
    /**
     * Constructor
     *
     * @param string         $message
     * @param null|Throwable $throwable
     */
    public function __construct(
        string $message,
        ?Throwable $throwable = null
    ) {
        parent::__construct($message, InvoiceSuiteExceptionCodes::INVALID_ARGUMENT, $throwable);
    }
}
