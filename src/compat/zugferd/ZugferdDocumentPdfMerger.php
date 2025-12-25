<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\concerns\HandlesRawContents;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;

/**
 * Legacy-class representing the facillity adding existing XML data (file or data-string)
 * to an existing PDF with conversion to PDF/A
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocumentPdfMerger extends ZugferdDocumentPdfBuilderAbstract
{
    use HandlesRawContents;

    /**
     * Constructor
     *
     * @param string $xmlDataOrFilename The XML data as a string or the full qualified path to an XML-File containing the XML-data
     * @param string $pdfData           The full filename or a string containing the binary pdf data. This is the original PDF (e.g. created by a ERP system)
     */
    public function __construct(string $xmlDataOrFilename, string $pdfData)
    {
        $this->setRawDocumentContent(InvoiceSuiteFileUtils::getContentFromFileOrString($xmlDataOrFilename));
        $this->setRawPdfContent(InvoiceSuiteFileUtils::getContentFromFileOrString($pdfData));

        parent::__construct($this->getRawPdfContent());
    }

    /**
     * Get the content of XML to attach
     *
     * @return string
     */
    protected function getXmlContent(): string
    {
        return $this->getRawDocumentContent();
    }
}
