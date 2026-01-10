<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

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
use JMS\Serializer\Exception\RuntimeException;
use PrinsFrank\PdfParser\Exception\PdfParserException;

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
     * @param  string $fromContent
     * @return void
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws PdfParserException
     * @throws RuntimeException
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
                    && $formatProvider->getIsValidPdfAttachmentFilename($pdfExtractorAttachment->getAttachmentFilename())
                    && $formatProvider->getIsSatisfiableBySerializedContent($pdfExtractorAttachment->getAttachmentContent())
            );

            if ([] === $formatProviders) {
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
     * @param  string $fromFile
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    public static function createFromFile(string $fromFile): static
    {
        if (!file_exists($fromFile)) {
            throw new InvoiceSuiteFileNotFoundException($fromFile);
        }

        $fromContent = file_get_contents($fromFile);

        if (false === $fromContent) {
            throw new InvoiceSuiteFileNotReadableException($fromFile);
        }

        return static::createFromContent($fromContent);
    }

    /**
     * Create PDF reader by content
     *
     * @param  string $fromContent
     * @return static
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    public static function createFromContent(string $fromContent): static
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
     * @return static
     */
    protected function setInvoiceDocumentAttachment(InvoiceSuitePdfExtractorAttachment $attachment): static
    {
        $this->invoiceDocumentAttachment = $attachment;

        return $this;
    }

    /**
     * Internal method to add a single additional attachments
     *
     * @param  InvoiceSuitePdfExtractorAttachment $attachment
     * @return static
     */
    protected function addAdditionalDocumentAttachments(InvoiceSuitePdfExtractorAttachment $attachment): static
    {
        $this->additionalDocumentAttachments[] = $attachment;

        return $this;
    }
}
