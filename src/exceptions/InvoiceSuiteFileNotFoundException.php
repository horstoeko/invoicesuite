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
 * Class representing an exception for missing a file
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   D. Erling <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteFileNotFoundException extends InvoiceSuiteBaseException
{
    /**
     * Constructor
     *
     * @param string         $filename
     * @param Throwable|null $throwable
     */
    public function __construct(string $filename, ?Throwable $throwable = null)
    {
        parent::__construct(sprintf("The file %s was not found", $filename), InvoiceSuiteExceptionCodes::FILENOTFOUND, $throwable);
    }
}
