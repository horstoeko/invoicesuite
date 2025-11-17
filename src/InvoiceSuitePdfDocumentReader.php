<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use Exception;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractor;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractorAttachment;

/**
 * Class representing the PDF document reader
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
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
     * Constructor (hidden)
     *
     * @param  string                                      $fromContent
     * @throws Exception
     * @throws InvoiceSuiteUnknownContentException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @return void
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
                static fn ($formatProvider) => $formatProvider->isPdfSupportAvailable()
                    && $formatProvider->isValidPdfAttachmentFilename($pdfExtractorAttachment->getAttachmentFilename())
                    && $formatProvider->isSatisfiableBySerializedContent($pdfExtractorAttachment->getAttachmentContent())
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
            throw new InvoiceSuiteFormatProviderNotFoundException('unknown');
        }
    }

    /**
     * Create PDF reader by file
     *
     * @param  string                               $fromFile
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @return InvoiceSuitePdfDocumentReader
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
     * @param  string $fromContent
     * @return self
     */
    public static function createFromContent(string $fromContent): self
    {
        return new static($fromContent);
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
     * Get the invoice document attachment
     *
     * @return null|InvoiceSuitePdfExtractorAttachment
     */
    public function getInvoiceDocumentAttachment(): ?InvoiceSuitePdfExtractorAttachment
    {
        return $this->invoiceDocumentAttachment;
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

    /**
     * Internal method to set the invoice document attachment
     *
     * @param  InvoiceSuitePdfExtractorAttachment $attachment
     * @return InvoiceSuitePdfDocumentReader
     */
    protected function setInvoiceDocumentAttachment(InvoiceSuitePdfExtractorAttachment $attachment): self
    {
        $this->invoiceDocumentAttachment = $attachment;

        return $this;
    }

    /**
     * Internal method to add a single additional attachments
     *
     * @param  InvoiceSuitePdfExtractorAttachment $attachment
     * @return InvoiceSuitePdfDocumentReader
     */
    protected function addAdditionalDocumentAttachments(InvoiceSuitePdfExtractorAttachment $attachment): self
    {
        $this->additionalDocumentAttachments[] = $attachment;

        return $this;
    }
}
