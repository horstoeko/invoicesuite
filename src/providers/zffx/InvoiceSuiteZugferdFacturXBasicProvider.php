<?php

namespace horstoeko\invoicesuite\providers\zffx;

use horstoeko\invoicesuite\models\zffx\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;

class InvoiceSuiteZugferdFacturXBasicProvider extends InvoiceSuiteAbstractFormatProvider
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
        return ["zffxbasic"];
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
        return InvoiceSuiteZugferdFacturXBasicProviderReader::class;
    }

    /**
     * @inheritDoc
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteZugferdFacturXBasicProviderBuilder::class;
    }
}
