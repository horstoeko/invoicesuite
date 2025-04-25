<?php

namespace horstoeko\invoicesuite\providers\zffx;

class InvoiceSuiteZugferdFacturXEn16931ProviderBuilder extends InvoiceSuiteZugferdFacturXProviderBuilder
{
    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteZugferdFacturXEn16931ProviderBuilder
    {
        $this->setContextParameter('urn:cen.eu:en16931:2017');

        return $this;
    }
}
