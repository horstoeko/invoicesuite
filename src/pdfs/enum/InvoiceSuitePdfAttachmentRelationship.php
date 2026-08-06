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
 * Enum representing PDF attachment relationship types
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
enum InvoiceSuitePdfAttachmentRelationship: string
{
    /**
     * The attachment contains data used to derive a visual presentation
     */
    case DATA = 'Data';

    /**
     * The attachment is an alternative representation of the document
     */
    case ALTERNATIVE = 'Alternative';

    /**
     * The attachment is the original source material for the document
     */
    case SOURCE = 'Source';

    /**
     * The attachment supplements the document
     */
    case SUPPLEMENT = 'Supplement';

    /**
     * The attachment relationship is unspecified
     */
    case UNSPECIFIED = 'Unspecified';
}
