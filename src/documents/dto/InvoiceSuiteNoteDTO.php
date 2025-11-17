<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\dto;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteNoteDTO
{
    /**
     * Free text containing unstructured information that is relevant to the invoice as a whole
     *
     * @var null|string
     */
    protected ?string $content = null;

    /**
     * Code to classify the content of the free text of the invoice
     *
     * @var null|string
     */
    protected ?string $contentCode = null;

    /**
     * Qualification of the free text for the invoice
     *
     * @var null|string
     */
    protected ?string $subjectCode = null;

    /**
     * Constructor
     *
     * @param null|string $content     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param null|string $contentCode Code to classify the content of the free text of the invoice
     * @param null|string $subjectCode Qualification of the free text for the invoice
     */
    public function __construct(?string $content = null, ?string $contentCode = null, ?string $subjectCode = null)
    {
        $this->setContent($content);
        $this->setContentCode($contentCode);
        $this->setSubjectCode($subjectCode);
    }

    /**
     * Returns free text containing unstructured information that is relevant to the invoice as a whole
     *
     * @return null|string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Sets free text containing unstructured information that is relevant to the invoice as a whole
     *
     * @param  null|string $content Free text containing unstructured information that is relevant to the invoice as a whole
     * @return self
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Returns code to classify the content of the free text of the invoice
     *
     * @return null|string
     */
    public function getContentCode(): ?string
    {
        return $this->contentCode;
    }

    /**
     * Sets code to classify the content of the free text of the invoice
     *
     * @param  null|string $contentCode Code to classify the content of the free text of the invoice
     * @return self
     */
    public function setContentCode(?string $contentCode): self
    {
        $this->contentCode = $contentCode;

        return $this;
    }

    /**
     * Returns qualification of the free text for the invoice
     *
     * @return null|string
     */
    public function getSubjectCode(): ?string
    {
        return $this->subjectCode;
    }

    /**
     * Sets qualification of the free text for the invoice
     *
     * @param  null|string $subjectCode Qualification of the free text for the invoice
     * @return self
     */
    public function setSubjectCode(?string $subjectCode): self
    {
        $this->subjectCode = $subjectCode;

        return $this;
    }
}
