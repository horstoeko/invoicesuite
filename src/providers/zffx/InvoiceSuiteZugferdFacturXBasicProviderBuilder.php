<?php

namespace horstoeko\invoicesuite\providers\zffx;

class InvoiceSuiteZugferdFacturXBasicProviderBuilder extends InvoiceSuiteZugferdFacturXProviderBuilder
{
    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteZugferdFacturXBasicProviderBuilder
    {
        $this->setContextParameter('urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic');

        return $this;
    }
}
