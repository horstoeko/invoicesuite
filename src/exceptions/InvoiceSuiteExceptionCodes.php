<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\exceptions;

/**
 * Class representing the exception codes
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteExceptionCodes
{
    public const FORMATPROVIDER_NOTFOUND = -1000;

    public const FILENOTFOUND = -1001;

    public const FILENOTREADABLE = -1002;

    public const UNKNOWN_CONTENT = -1003;

    public const BAD_METHOD_CALL = -1004;

    public const INVALID_ARGUMENT = -1005;

    public const UNKNOWN_PROVIDER_PARAMETER = -1006;
}
