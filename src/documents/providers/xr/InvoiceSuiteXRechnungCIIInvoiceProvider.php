<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\xr;

use DOMDocument;
use DOMXPath;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxProfiles;
use horstoeko\invoicesuite\documents\providers\zffx\models\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfConstructor;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

class InvoiceSuiteXRechnungCIIInvoiceProvider extends InvoiceSuiteAbstractDocumentFormatProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'xrechnungcii';
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
        return 'The reference profile is based on the CIUS XRechnung, which is maintained by KoSIT. It represents an '
            .'extension of EN 16931-1 with its own business rules, the national German laws and regulations. It is therefore more '
            .'specific than the EN 16931 (COMFORT) profile. This provider uses the CII syntax.';
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'ContextParameter' => 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0',
            'BusinessProcess' => 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0',
            'AlternativeContextParameters' => [
                'urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_1.2',
                'urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_2.0',
                'urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_2.1',
                'urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_2.2',
                'urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_2.3',
            ],
            'PdfXmpName' => 'XRECHNUNG',
            'PdfXmpVersion' => '3.0',
            'WantsMaximumProfile' => InvoiceSuiteZfFxProfiles::EN16931->value,
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
            InvoiceSuiteXRechnungCIIInvoiceSerializerHandler::class,
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
    public function getSerializedContentMatchesScheme(string $serializedContent): bool
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
        return InvoiceSuiteXRechnungCIIInvoiceProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteXRechnungCIIInvoiceProviderBuilder::class;
    }

    /**
     * Returns true if PDF support is available
     *
     * @return bool
     */
    public function getIsPdfSupportAvailable(): bool
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
        return ['xrechnung.xml'];
    }

    /**
     * Get the default PDF attachment filename
     *
     * @return string
     */
    public function getDefaultPdfAttachmentFilename(): string
    {
        return 'xrechnung.xml';
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
    public function getValidationXsdFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'zffx', 'xsd'),
            'FACTUR-X_EN16931.xsd'
        );
    }
}
