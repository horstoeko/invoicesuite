<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdf\zffx;

/**
 * Class representing the basics for a ZUGFeRD/Factor-X PDF document constructor
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteZffxExtendedPdfConstructor extends InvoiceSuiteZffxAbstractPdfConstructor
{
    /**
     * Return the XMP name
     *
     * @return string
     */
    protected function getXmlAttachmentXmpName(): string
    {
        return 'EXTENDED';
    }

    /**
     * Return the XMP veesion
     *
     * @return string
     */
    protected function getXmlAttachmentXmpVersion(): string
    {
        return '1.0';
    }
}
