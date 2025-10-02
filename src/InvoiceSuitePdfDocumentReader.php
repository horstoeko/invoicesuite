<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use Exception;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContent;
use horstoeko\invoicesuite\pdf\InvoiceSuitePdfExtractor;

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
            $formatProviders = array_filter(
                $this->getRegisteredDocumentFormatProviders(),
                fn($formatProvider) =>
                    $formatProvider->isPdfSupportAvailable() &&
                    $formatProvider->isValidPdfAttachmentFilename($pdfExtractorAttachment->getAttachmentFilename()) &&
                    $formatProvider->isSatisfiableBySerializedContent($pdfExtractorAttachment->getAttachmentContent())
            );

            if ($formatProviders === []) {
                continue;
            }

            $formatProvider = reset($formatProviders);

            $this->setCurrentDocumentFormatProvider($formatProvider);
            $this->getCurrentDocumentFormatProvider()->getReader()->deserializeFromContent($pdfExtractorAttachment->getAttachmentContent());

            break;
        }

        if (is_null($this->getCurrentDocumentFormatProvider())) {
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
}
