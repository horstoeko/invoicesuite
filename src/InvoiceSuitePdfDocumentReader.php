<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use Exception;
use horstoeko\invoicesuite\documentabstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContent;
use horstoeko\invoicesuite\pdf\InvoiceSuitePdfExtractor;
use horstoeko\invoicesuite\pdf\InvoiceSuitePdfExtractorAttachment;

/**
 * Class representing the PDF document reader
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePdfDocumentReader
{
    use HandlesCallForwarding;
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentFormatProviders;

    /**
     * The internal buffer for the attached invoice document attachment
     *
     * @var InvoiceSuitePdfExtractorAttachment
     */
    private $invoiceDocumentAttachment;

    /**
     * The internal buffer for additional document attachments
     *
     * @var array<int,InvoiceSuitePdfExtractorAttachment>
     */
    private $additionalDocumentAttachments = [];

    /**
     * Create PDF reader by file
     *
     * @param string $fromFile
     * @return InvoiceSuitePdfDocumentReader
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function createFromFile(string $fromFile): self
    {
        if (!file_exists($fromFile)) {
            throw new InvoiceSuiteFileNotFoundException($fromFile);
        }

        $fromContent = file_get_contents($fromFile);

        if ($fromContent === false) {
            throw new InvoiceSuiteFileNotReadableException($fromFile);
        }

        return static::createFromContent($fromContent);
    }

    /**
     * Create PDF reader by content
     *
     * @param string $fromContent
     * @return self
     */
    public static function createFromContent(string $fromContent): self
    {
        return new static($fromContent);
    }

    /**
     * Constructor (hidden)
     *
     * @param string $fromContent
     * @return void
     * @throws Exception
     * @throws InvoiceSuiteUnknownContent
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    final protected function __construct(string $fromContent)
    {
        $this->resolveAvailableDocumentFormatProviders();

        $pdfExtractor = InvoiceSuitePdfExtractor::fromContent($fromContent);

        foreach ($pdfExtractor as $pdfExtractorAttachment) {
            if ($this->hasCurrentDocumentFormatProvider()) {
                $this->addAdditionalDocumentAttachments($pdfExtractorAttachment);
                continue;
            }

            $formatProviders = array_filter(
                $this->getRegisteredDocumentFormatProviders(),
                fn($formatProvider) =>
                    $formatProvider->isPdfSupportAvailable() &&
                    $formatProvider->isValidPdfAttachmentFilename($pdfExtractorAttachment->getAttachmentFilename()) &&
                    $formatProvider->isSatisfiableBySerializedContent($pdfExtractorAttachment->getAttachmentContent())
            );

            if ($formatProviders === []) {
                $this->addAdditionalDocumentAttachments($pdfExtractorAttachment);
                continue;
            }

            $this->setInvoiceDocumentAttachment($pdfExtractorAttachment);

            $formatProvider = reset($formatProviders);

            $this->setCurrentDocumentFormatProvider($formatProvider);
            $this->getCurrentDocumentFormatProvider()->getReader()->deserializeFromContent($pdfExtractorAttachment->getAttachmentContent());
        }

        if ($this->hasNotCurrentDocumentFormatProvider()) {
            throw new InvoiceSuiteFormatProviderNotFoundException("unknown");
        }
    }

    /**
     * Returns the document reader
     *
     * @return InvoiceSuiteAbstractDocumentFormatReader
     */
    public function getDocumentReader(): InvoiceSuiteAbstractDocumentFormatReader
    {
        return $this->getCurrentDocumentFormatProvider()->getReader();
    }

    /**
     * Internal method to set the invoice document attachment
     *
     * @param InvoiceSuitePdfExtractorAttachment $attachment
     * @return InvoiceSuitePdfDocumentReader
     */
    protected function setInvoiceDocumentAttachment(InvoiceSuitePdfExtractorAttachment $attachment): self
    {
        $this->invoiceDocumentAttachment = $attachment;

        return $this;
    }

    /**
     * Get the invoice document attachment
     *
     * @return InvoiceSuitePdfExtractorAttachment|null
     */
    public function getInvoiceDocumentAttachment(): ?InvoiceSuitePdfExtractorAttachment
    {
        return $this->invoiceDocumentAttachment;
    }

    /**
     * Internal method to set a bulk of additional attachments
     *
     * @param array<int,InvoiceSuitePdfExtractorAttachment> $attachments
     * @return InvoiceSuitePdfDocumentReader
     */
    protected function setAdditionalDocumentAttachments(array $attachments): self
    {
        $this->additionalDocumentAttachments = $attachments;

        return $this;
    }

    /**
     * Internal method to add a single additional attachments
     *
     * @param InvoiceSuitePdfExtractorAttachment $attachment
     * @return InvoiceSuitePdfDocumentReader
     */
    protected function addAdditionalDocumentAttachments(InvoiceSuitePdfExtractorAttachment $attachment): self
    {
        $this->additionalDocumentAttachments[] = $attachment;

        return $this;
    }

    /**
     * Get all additional document attachment
     *
     * @return array<int,InvoiceSuitePdfExtractorAttachment>
     */
    public function getAdditionalDocumentAttachments(): array
    {
        return $this->additionalDocumentAttachments;
    }
}
