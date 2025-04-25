<?php

namespace horstoeko\invoicesuite\providers\zffx;

class InvoiceSuiteZugferdFacturXMinimumProviderBuilder extends InvoiceSuiteZugferdFacturXProviderBuilder
{
    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteZugferdFacturXMinimumProviderBuilder
    {
        $this->setContextParameter('urn:factur-x.eu:1p0:minimum');

        return $this;
    }
}
