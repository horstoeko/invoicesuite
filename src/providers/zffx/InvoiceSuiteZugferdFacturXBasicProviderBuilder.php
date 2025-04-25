<?php

namespace horstoeko\invoicesuite\providers\zffx;

use horstoeko\invoicesuite\providers\zffx\HandlesZfFxExchangeDocument;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;

class InvoiceSuiteZugferdFacturXBasicProviderBuilder extends InvoiceSuiteZugferdFacturXProviderBuilder
{
    use HandlesZfFxExchangeDocument;

    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteAbstractFormatProviderBuilder
    {
        $this->setContextParameter('urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic');

        return $this;
    }
}
