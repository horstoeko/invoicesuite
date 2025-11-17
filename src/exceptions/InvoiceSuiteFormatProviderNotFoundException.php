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
class InvoiceSuiteFormatProviderNotFoundException extends InvoiceSuiteBaseException
{
    /**
     * Constructor
     *
     * @param string         $formatProviderUniqueId
     * @param null|Throwable $throwable
     */
    public function __construct(string $formatProviderUniqueId, ?Throwable $throwable = null)
    {
        parent::__construct(sprintf('The format provider with unique id %s was not found', $formatProviderUniqueId), InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND, $throwable);
    }
}
