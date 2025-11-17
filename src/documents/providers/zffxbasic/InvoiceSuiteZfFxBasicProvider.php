<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\zffxbasic;

use DOMDocument;
use DOMXPath;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\documents\models\zffxbasic\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfConstructor;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use Throwable;

class InvoiceSuiteZfFxBasicProvider extends InvoiceSuiteAbstractDocumentFormatProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'zffxbasic';
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'The BASIC profile is a subset of EN 16931-1 and can be used for simple VAT-compliant invoices.';
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'ContextParameter' => 'urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic',
            'AlternativeContextParameters' => ['urn:cen.eu:en16931:2017#compliant#urn:zugferd.de:2p0:basic'],
            'PdfXmpName' => 'BASIC',
            'PdfXmpVersion' => '1.0',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerMetadataDirectories(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerHandlers(): array
    {
        return [
            InvoiceSuiteZfFxBasicSerializerHandler::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerListeners(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerSubscribers(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerGroups(): array
    {
        return ['zffx'];
    }

    /**
     * {@inheritDoc}
     */
    public function isSatisfiableBySerializedContent(string $serializedContent): bool
    {
        $prevUseInternalErrors = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $contentDomDocument = new DOMDocument();
            $contentDomDocument->loadXML($serializedContent);
            $contentDomXPath = new DOMXPath($contentDomDocument);
            $contentDomXPath->registerNamespace('rsm', 'urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100');
            $contentDomXPath->registerNamespace('ram', 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100');

            $contextParameters = array_merge(
                InvoiceSuiteArrayUtils::ensure($this->getFormatProviderParameterValue('ContextParameter', '')),
                InvoiceSuiteArrayUtils::ensure($this->getFormatProviderParameterValue('AlternativeContextParameters', ''))
            );

            foreach ($contextParameters as $contextParameter) {
                $contentQuery = sprintf(
                    "//rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID[text()='%s']",
                    $contextParameter
                );

                $contentEntries = $contentDomXPath->query($contentQuery);

                if ($contentEntries === false) {
                    continue;
                }

                if ($contentEntries->length === 1) {
                    return true;
                }
            }
        } catch (Throwable) {
            // Do nothing
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function getRootClassName(): string
    {
        return CrossIndustryInvoice::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuiteZfFxBasicProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteZfFxBasicProviderBuilder::class;
    }

    /**
     * Returns true if PDF support is available
     *
     * @return bool
     */
    public function isPdfSupportAvailable(): bool
    {
        return true;
    }

    /**
     * Returns a list of valid PDF attachment filenames
     *
     * @return array<string>
     */
    public function getAllowedPdfAttachmentFilenames(): array
    {
        return [
            'ZUGFeRD-invoice.xml' /* 1.0 */,
            'zugferd-invoice.xml' /* 2.0 */,
            'factur-x.xml' /* 2.1 */,
            'xrechnung.xml',
        ];
    }

    /**
     * Get the default PDF attachment filename
     *
     * @return string
     */
    public function getDefaultPdfAttachmentFilename(): string
    {
        return 'factur-x.xml';
    }

    /**
     * Returns the PDF constructor classname for this format provider
     *
     * @return string
     */
    public function getPdfConstructorClassName(): string
    {
        return InvoiceSuiteZffxPdfConstructor::class;
    }
}
