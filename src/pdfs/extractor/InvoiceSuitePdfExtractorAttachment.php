<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdfs\extractor;

/**
 * Class representing an attachment of an PDF extracted by InvoiceSuitePdfExtractor
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePdfExtractorAttachment
{
    /**
     * The attachment content
     *
     * @var string
     */
    protected string $attachmentContent = '';

    /**
     * The attachment filename
     *
     * @var string
     */
    protected string $attachmentFilename = '';

    /**
     * The attachment mime type
     *
     * @var string
     */
    protected string $attachmentMimeType = '';

    /**
     * Constructor
     *
     * @param string $newAttachmentContent
     * @param string $newAttachmentFilename
     * @param string $newAttachmentMimeType
     */
    public function __construct(
        string $newAttachmentContent,
        string $newAttachmentFilename,
        string $newAttachmentMimeType
    ) {
        $this->setAttachmentContent($newAttachmentContent);
        $this->setAttachmentFilename($newAttachmentFilename);
        $this->setAttachmentMimeType($newAttachmentMimeType);
    }

    /**
     * Get the content of a PDF attachment
     *
     * @return string
     */
    public function getAttachmentContent(): string
    {
        return $this->attachmentContent;
    }

    /**
     * Set the content of a PDF attachment
     *
     * @return static
     */
    public function setAttachmentContent(
        string $newAttachmentContent
    ): static {
        $this->attachmentContent = $newAttachmentContent;

        return $this;
    }

    /**
     * Get the filename of a PDF attachment
     *
     * @return string
     */
    public function getAttachmentFilename(): string
    {
        return $this->attachmentFilename;
    }

    /**
     * Set the filename of a PDF attachment
     *
     * @return static
     */
    public function setAttachmentFilename(
        string $newAttachmentFilename
    ): static {
        $this->attachmentFilename = $newAttachmentFilename;

        return $this;
    }

    /**
     * Get the mime type of a PDF attachment
     *
     * @return string
     */
    public function getAttachmentMimeType(): string
    {
        return $this->attachmentMimeType;
    }

    /**
     * Set the mime type of a PDF attachment
     *
     * @return static
     */
    public function setAttachmentMimeType(
        string $newAttachmentMimeType
    ): static {
        $this->attachmentMimeType = $newAttachmentMimeType;

        return $this;
    }
}
