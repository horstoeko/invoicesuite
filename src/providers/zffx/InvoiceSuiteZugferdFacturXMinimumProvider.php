<?php

namespace horstoeko\invoicesuite\providers\zffx;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;
use horstoeko\invoicesuite\models\zffx\rsm\CrossIndustryInvoice;

class InvoiceSuiteZugferdFacturXMinimumProvider extends InvoiceSuiteAbstractFormatProvider
{
    /**
     * @inheritDoc
     */
    public function getUniqueId(): string
    {
        return 'zffxminimum';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return 'The MINIMUM profile includes the main information about the purchaser and vendor, the total invoice ' .
            'amount, and the total sales tax (VAT). A breakdown of the sales tax (VAT) is not supported. It is therefore ' .
            'a booking aid.';
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
        return ["zffxminimum"];
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
        return InvoiceSuiteZugferdFacturXMinimumProviderReader::class;
    }

    /**
     * @inheritDoc
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteZugferdFacturXMinimumProviderBuilder::class;
    }
}
