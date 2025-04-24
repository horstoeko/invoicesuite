<?php

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;

trait HandlesCurrentFormatProvider
{
    /**
     * The format provider for which the serializer was created
     *
     * @var InvoiceSuiteAbstractFormatProvider
     */
    protected $currentInvoiceSuiteAbstractFormat;

    /**
     * Returns the requested format provider
     *
     * @return InvoiceSuiteAbstractFormatProvider
     */
    public function getCurrentFormatProvider(): InvoiceSuiteAbstractFormatProvider
    {
        return $this->currentInvoiceSuiteAbstractFormat;
    }

    /**
     * Set the requested format provider
     *
     * @param InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider
     * @return void
     */
    public function setCurrentFormatProvider(InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider): void
    {
        $this->currentInvoiceSuiteAbstractFormat = $invoiceSuiteAbstractFormatProvider;
    }
}
