<?php

namespace horstoeko\invoicesuite\providers\xrechnung;

use horstoeko\invoicesuite\models\zffx\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;

class InvoiceSuiteXRechnungProvider extends InvoiceSuiteAbstractFormatProvider
{
    /**
     * @inheritDoc
     */
    public function getUniqueId(): string
    {
        return 'xrechnung';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return 'The reference profile is based on the CIUS XRechnung, which is maintained by KoSIT. It represents an ' .
            'extension of EN 16931-1 with its own business rules, the national German laws and regulations. It is therefore more ' .
            'specific than the EN 16931 (COMFORT) profile.';
    }

    /**
     * @inheritDoc
     */
    public function getMetadataDirectories(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getHandlers(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getListeners(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSubscribers(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getGroups(): array
    {
        return ["zffxen16931"];
    }

    /**
     * @inheritDoc
     */
    public function isSatisfiableBy(string $content): bool
    {
        return true;
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
        return InvoiceSuiteXRechnungProviderReader::class;
    }

    /**
     * @inheritDoc
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteXRechnungProviderBuilder::class;
    }
}
