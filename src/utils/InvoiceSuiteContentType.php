<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\utils;

/**
 * Enum representing list of valid content types
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
enum InvoiceSuiteContentType: string
{
    /**
     * XML format
     */
    case XML = 'xml';

    /**
     * JSON format
     */
    case JSON = 'json';
}
