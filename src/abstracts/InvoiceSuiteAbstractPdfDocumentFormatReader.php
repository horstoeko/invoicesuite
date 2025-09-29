<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\abstracts;

use horstoeko\invoicesuite\concerns\HandlesPdfDocumentReaderObject;
use horstoeko\invoicesuite\concerns\HandlesCurrentPdfDocumentFormatProvider;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

/**
 * Class representing methods for a PDF reader
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractPdfDocumentFormatReader
{
    use HandlesCurrentPdfDocumentFormatProvider;
    use HandlesPdfDocumentReaderObject;

    /**
     * Constructor
     *
     * @param InvoiceSuiteAbstractPdfDocumentFormatProvider $newProvider
     */
    public function __construct(InvoiceSuiteAbstractPdfDocumentFormatProvider $newProvider)
    {
        $this->setCurrentPdfDocumentFormatProvider($newProvider);
    }

    /**
     * Read content
     *
     * @param string $fromContent
     * @return InvoiceSuiteAbstractPdfDocumentFormatReader
     */
    public function readFromContent(string $fromContent): self
    {
        $this->setDocumentReaderObject(InvoiceSuiteDocumentReader::createFromContent($fromContent));

        return $this;
    }
}
