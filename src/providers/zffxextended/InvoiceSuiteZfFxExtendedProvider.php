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
        return [];
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
        try {
            $contentDomDocument = new \DOMDocument();
            $contentDomDocument->loadXML($content);
            $contentDomXPath = new \DOMXPath($contentDomDocument);
            $contentQuery = sprintf(
                "//rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID[text()='%s']",
                $this->getParameters()['CONTEXTPARAMETER']
            );
            $contentEntries = $contentDomXPath->query($contentQuery);
            return $contentEntries->length === 1;
        } catch (\Throwable $throwable) {
            // Do nothing
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
