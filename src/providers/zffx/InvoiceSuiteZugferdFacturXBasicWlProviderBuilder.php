<?php

namespace horstoeko\invoicesuite\providers\zffx;

class InvoiceSuiteZugferdFacturXBasicWLProviderBuilder extends InvoiceSuiteZugferdFacturXProviderBuilder
{
    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteZugferdFacturXBasicWLProviderBuilder
    {
        $this->setContextParameter('urn:factur-x.eu:1p0:basicwl');

        return $this;
    }
}
