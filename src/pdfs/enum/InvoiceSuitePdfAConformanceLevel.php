<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdfs\enum;

/**
 * Enum representing PDF/A conformance levels
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
enum InvoiceSuitePdfAConformanceLevel: string
{
    /**
     * Accessible PDF/A conformance level
     */
    case ACCESSIBLE = 'A';

    /**
     * Basic PDF/A conformance level
     */
    case BASIC = 'B';

    /**
     * Unicode PDF/A conformance level
     */
    case UNICODE = 'U';
}
