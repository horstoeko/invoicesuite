<?php

namespace horstoeko\invoicesuite\providers\zffxextended;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;
use horstoeko\invoicesuite\models\zffxextended\rsm\CrossIndustryInvoice;

class InvoiceSuiteZfFxExtendedProvider extends InvoiceSuiteAbstractFormatProvider
{
    /**
     * @inheritDoc
     */
    public function getUniqueId(): string
    {
        return 'zffxextended';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return 'The EXTENDED profile is an extension of EN 16931-1 to support more complex business processes (invoices ' .
            'in which several deliveries / delivery locations are billed, structured payment conditions, further information at ' .
            'item level to support warehousing, etc.)';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            'CONTEXTPARAMETER' => 'urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended',
            'ALTERNATIVECONTEXTPARAMETERS' => ['urn:cen.eu:en16931:2017#conformant#urn:zugferd.de:2p0:extended'],
            'BUSINESSPROCESS' => 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0',
        ];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerMetadataDirectories(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerHandlers(): array
    {
        return [
            InvoiceSuiteZfFxExtendedSerializerHandler::class
        ];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerListeners(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerSubscribers(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerGroups(): array
    {
        return ["zffx"];
    }

    /**
     * @inheritDoc
     */
    public function isSatisfiableBy(string $content): bool
    {
        $prevUseInternalErrors = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $contextParameters = array_merge(
                [$this->getParameters()['CONTEXTPARAMETER']],
                $this->getParameters()['ALTERNATIVECONTEXTPARAMETERS']
            );

            foreach ($contextParameters as $contextParameter) {
                $contentDomDocument = new \DOMDocument();
                $contentDomDocument->loadXML($content);
                $contentDomXPath = new \DOMXPath($contentDomDocument);
                $contentDomXPath->registerNamespace('rsm', 'urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100');
                $contentDomXPath->registerNamespace('ram', 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100');

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
        } catch (\Throwable $throwable) {
            // Do nothing
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function getRootClassName(): string
    {
        return CrossIndustryInvoice::class;
    }

    /**
     * @inheritDoc
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuiteZfFxExtendedProviderReader::class;
    }

    /**
     * @inheritDoc
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteZfFxExtendedProviderBuilder::class;
    }
}
