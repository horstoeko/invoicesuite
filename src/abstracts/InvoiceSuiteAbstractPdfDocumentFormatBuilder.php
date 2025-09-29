<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\abstracts;

use horstoeko\invoicesuite\concerns\HandlesCurrentPdfDocumentFormatProvider;

/**
 * Class representing methods for a PDF builder
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractPdfDocumentFormatBuilder
{
    use HandlesCurrentPdfDocumentFormatProvider;

    /**
     * Constructor
     *
     * @param InvoiceSuiteAbstractPdfDocumentFormatProvider $newProvider
     */
    public function __construct(InvoiceSuiteAbstractPdfDocumentFormatProvider $newProvider)
    {
        $this->setCurrentPdfDocumentFormatProvider($newProvider);
    }
}
