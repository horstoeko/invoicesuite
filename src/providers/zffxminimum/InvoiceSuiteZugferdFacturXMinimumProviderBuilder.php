<?php

namespace horstoeko\invoicesuite\providers\zffxminimum;

use horstoeko\invoicesuite\providers\zffxgeneral\HandlesZfFxExchangeDocument;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;

class InvoiceSuiteZugferdFacturXMinimumProviderBuilder extends InvoiceSuiteAbstractFormatProviderBuilder
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
