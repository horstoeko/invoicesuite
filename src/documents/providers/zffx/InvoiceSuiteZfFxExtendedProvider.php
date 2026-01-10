<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\zffx;

use DOMDocument;
use DOMXPath;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\documents\models\zffx\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfConstructor;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;

class InvoiceSuiteZfFxExtendedProvider extends InvoiceSuiteAbstractDocumentFormatProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'zffxextended';
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
        return 'The EXTENDED profile is an extension of EN 16931-1 to support more complex business processes (invoices '
            .'in which several deliveries / delivery locations are billed, structured payment conditions, further information at '
            .'item level to support warehousing, etc.)';
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'ContextParameter' => 'urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended',
            'AlternativeContextParameters' => ['urn:cen.eu:en16931:2017#conformant#urn:zugferd.de:2p0:extended'],
            'BusinessProcess' => 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0',
            'PdfXmpName' => 'EXTENDED',
            'PdfXmpVersion' => '1.0',
            'WantsMaximumProfile' => InvoiceSuiteZfFxProfiles::EXTENDED->value,
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
            InvoiceSuiteZfFxSerializerHandler::class,
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
        if ($this->getContentType() !== InvoiceSuiteContentTypeResolver::resolveContentType($serializedContent)) {
            return false;
        }

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
        return InvoiceSuiteZfFxProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteZfFxProviderBuilder::class;
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

    /**
     * Returns the full file name (including path) for the XSD schema that matches this provider.
     *
     * @return string
     */
    public function getXsdFilename(): string
    {
        return '';
    }
}
