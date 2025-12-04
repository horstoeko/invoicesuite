<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

/**
 * Trait representing PDF builder content handling
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
trait HandlesRawContents
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
     * @return static
     */
    protected function setRawDocumentContent(string $fromDocumentContent): static
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
     * Returns true if a non-empty document content is given
     *
     * @return bool
     */
    protected function hasRawDocumentContent(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->rawDocumentContent);
    }

    /**
     * Set the PDF content
     *
     * @param  string $fromPdfContent
     * @return static
     */
    protected function setRawPdfContent(string $fromPdfContent): static
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

    /**
     * Returns true if a non-empty PDF content is given
     *
     * @return bool
     */
    protected function hasRawPdfContent(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->rawPdfContent);
    }
}
