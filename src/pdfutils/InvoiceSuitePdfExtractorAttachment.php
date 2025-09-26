<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\pdfutils;

use Exception;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use Smalot\PdfParser\Parser as PdfParser;

/**
 * Class representing an attachment of an PDF extracted by InvoiceSuitePdfExtractor
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */

class InvoiceSuitePdfExtractorAttachment
{
    /**
     * The attachment content
     *
     * @var string
     */
    protected string $attachmentContent = "";

    /**
     * The attachment filename
     *
     * @var string
     */
    protected string $attachmentFilename = "";

    /**
     * The attachment mime type
     *
     * @var string
     */
    protected string $attachmentMimeType = "";

    /**
     * Constructor
     *
     * @param string $newAttachmentContent
     * @param string $newAttachmentFilename
     * @param string $newAttachmentMimeType
     * @return void
     */
    public function __construct(
        string $newAttachmentContent,
        string $newAttachmentFilename,
        string $newAttachmentMimeType
    ) {
        $this->setNewAttachmentContent($newAttachmentContent);
        $this->setNewAttachmentFilename($newAttachmentFilename);
        $this->setNewAttachmentMimeType($newAttachmentMimeType);
    }

    /**
     * Get the content of a PDF attachment
     *
     * @return string
     */
    public function getNewAttachmentContent(): string
    {
        return $this->attachmentContent;
    }

    /**
     * Set the content of a PDF attachment
     *
     * @return self
     */
    public function setNewAttachmentContent(string $newAttachmentContent): self
    {
        $this->attachmentContent = $newAttachmentContent;

        return $this;
    }

    /**
     * Get the filename of a PDF attachment
     *
     * @return string
     */
    public function getNewAttachmentFilename(): string
    {
        return $this->attachmentFilename;
    }

    /**
     * Set the filename of a PDF attachment
     *
     * @return self
     */
    public function setNewAttachmentFilename(string $newAttachmentFilename): self
    {
        $this->attachmentFilename = $newAttachmentFilename;

        return $this;
    }

    /**
     * Get the mime type of a PDF attachment
     *
     * @return string
     */
    public function getNewAttachmentMimeType(): string
    {
        return $this->attachmentMimeType;
    }

    /**
     * Set the mime type of a PDF attachment
     *
     * @return self
     */
    public function setNewAttachmentMimeType(string $newAttachmentMimeType): self
    {
        $this->attachmentMimeType = $newAttachmentMimeType;

        return $this;
    }
}
