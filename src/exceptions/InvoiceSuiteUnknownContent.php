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
 * Class representing an exception for non-readable a file
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   D. Erling <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteUnknownContent extends InvoiceSuiteBaseException
{
    /**
     * Constructor
     *
     * @param Throwable|null $throwable
     */
    public function __construct(?Throwable $throwable = null)
    {
        parent::__construct("Unknown content", InvoiceSuiteExceptionCodes::UNKNOWN_CONTENT, $throwable);
    }
}
