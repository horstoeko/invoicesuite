<?php

namespace horstoeko\invoicesuite\providers\zffxbasicwl;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;
use horstoeko\invoicesuite\models\zffx\rsm\CrossIndustryInvoice;

class InvoiceSuiteZugferdFacturXBasicWlProvider extends InvoiceSuiteAbstractFormatProvider
{
    /**
     * @inheritDoc
     */
    public function getUniqueId(): string
    {
        return 'zffxbasicwl';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return 'The BASIC WL profile does not contain any invoice items and therefore cannot display any VAT-compliant ' .
            'invoices. However, it contains all the information at document level that is required to post the invoice. ' .
            'It is therefore a booking aid.';
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
        return ["zffxbasicwl"];
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
        return InvoiceSuiteZugferdFacturXBasicWlProviderReader::class;
    }

    /**
     * @inheritDoc
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteZugferdFacturXBasicWlProviderBuilder::class;
    }
}
