<?php

namespace horstoeko\invoicesuite\providers\ubl;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;
use horstoeko\invoicesuite\models\ubl\main\Invoice;

class InvoiceSuiteUblInvoiceProvider extends InvoiceSuiteAbstractFormatProvider
{
    /**
     * @inheritDoc
     */
    public function getUniqueId(): string
    {
        return 'ublinvoice';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return 'Common Invoice in UBL syntax';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            'BUILDER_QUOTATION_DOCTYPECODE' => '325',
            'BUILDER_QUOTATION_DOCDESCRIPTION' => 'Quotation',
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
        return ["ubl"];
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
        return Invoice::class;
    }

    /**
     * @inheritDoc
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuiteUblInvoiceProviderReader::class;
    }

    /**
     * @inheritDoc
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteUblInvoiceProviderBuilder::class;
    }
}
