<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\zffxbasicwl;

use DOMDocument;
use DOMXPath;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfConstructor;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;

class InvoiceSuiteZfFxBasicWlProvider extends InvoiceSuiteAbstractDocumentFormatProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'zffxbasicwl';
    }

    /**
     * {@inheritDoc}
     */
    public function getContentType(): InvoiceSuiteContentType
    {
        return InvoiceSuiteContentType::XML;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'The BASIC WL profile does not contain any invoice items and therefore cannot display any VAT-compliant '
            .'invoices. However, it contains all the information at document level that is required to post the invoice. '
            .'It is therefore a booking aid.';
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'ContextParameter' => 'urn:factur-x.eu:1p0:basicwl',
            'AlternativeContextParameters' => ['urn:zugferd.de:2p0:basicwl'],
            'PdfXmpName' => 'BASIC WL',
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
            InvoiceSuiteZfFxBasicWlSerializerHandler::class,
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

            if (!$contentDomDocument->loadXML($serializedContent)) {
                return false;
            }

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

                if (false === $contentEntries) {
                    continue;
                }

                if (1 === $contentEntries->length) {
                    return true;
                }
            }
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
        return InvoiceSuiteZfFxBasicWlProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteZfFxBasicWlProviderBuilder::class;
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
