<?php

namespace horstoeko\invoicesuite\providers\zffx;

use horstoeko\invoicesuite\providers\zffx\HandlesZfFxExchangeDocument;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;

class InvoiceSuiteZugferdFacturXMinimumProviderBuilder extends InvoiceSuiteZugferdFacturXProviderBuilder
{
    use HandlesZfFxExchangeDocument;

    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteAbstractFormatProviderBuilder
    {
        $this->setContextParameter('urn:factur-x.eu:1p0:minimum');

        return $this;
    }
}
