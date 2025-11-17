<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\concerns;

/**
 * Trait representing PDF builder content handling
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
trait HandlesPdfConstructorRawContents
{
    /**
     * Internal buffer which holds the content of the invoice document
     *
     * @var string
     */
    private $rawDocumentContent;

    /**
     * Internal buffer which holds the content of the PDF document
     *
     * @var string
     */
    private $rawPdfContent;

    /**
     * Set the invoice document content
     *
     * @param  string $fromDocumentContent
     * @return self
     */
    protected function setRawDocumentContent(string $fromDocumentContent): self
    {
        $this->rawDocumentContent = $fromDocumentContent;

        return $this;
    }

    /**
     * Returns the invoice document content
     *
     * @return string
     */
    protected function getRawDocumentContent(): string
    {
        return $this->rawDocumentContent;
    }

    /**
     * Set the PDF content
     *
     * @param  string $fromPdfContent
     * @return self
     */
    protected function setRawPdfContent(string $fromPdfContent): self
    {
        $this->rawPdfContent = $fromPdfContent;

        return $this;
    }

    /**
     * Returns the PDF content
     *
     * @return string
     */
    protected function getRawPdfContent(): string
    {
        return $this->rawPdfContent;
    }
}
