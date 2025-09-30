<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdfdocumentproviders\zffxextended;

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractPdfDocumentFormatReader;

class InvoiceSuiteZfFxExtendedProviderReader extends InvoiceSuiteAbstractPdfDocumentFormatReader
{
    /**
     * Initialize, Set contents to read
     *
     * @param string $fromContent
     * @return InvoiceSuiteZfFxExtendedProviderReader
     */
    public function setContents(string $fromContent): self
    {
        return $this->setDocumentReaderObject(InvoiceSuiteDocumentReader::createFromContent($fromContent));
    }
}
