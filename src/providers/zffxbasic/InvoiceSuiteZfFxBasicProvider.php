<?php

namespace horstoeko\invoicesuite\providers\zffxbasic;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;
use horstoeko\invoicesuite\models\zffxbasic\rsm\CrossIndustryInvoice;

class InvoiceSuiteZfFxBasicProvider extends InvoiceSuiteAbstractFormatProvider
{
    /**
     * @inheritDoc
     */
    public function getUniqueId(): string
    {
        return 'zffxbasic';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return 'The BASIC profile is a subset of EN 16931-1 and can be used for simple VAT-compliant invoices.';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            'CONTEXTPARAMETER' => 'urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic',
            'ALTERNATIVECONTEXTPARAMETERS' => ['urn:cen.eu:en16931:2017#compliant#urn:zugferd.de:2p0:basic'],
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
            InvoiceSuiteZfFxBasicSerializerHandler::class
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
        } catch (\Throwable) {
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
        return InvoiceSuiteZfFxBasicProviderReader::class;
    }

    /**
     * @inheritDoc
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteZfFxBasicProviderBuilder::class;
    }
}
