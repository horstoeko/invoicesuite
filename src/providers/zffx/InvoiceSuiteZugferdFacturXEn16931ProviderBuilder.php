<?php

namespace horstoeko\invoicesuite\providers\zffx;

use horstoeko\invoicesuite\providers\zffx\HandlesZfFxExchangeDocument;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;

class InvoiceSuiteZugferdFacturXEn16931ProviderBuilder extends InvoiceSuiteZugferdFacturXProviderBuilder
{
    use HandlesZfFxExchangeDocument;

    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteAbstractFormatProviderBuilder
    {
        $this->setContextParameter('urn:cen.eu:en16931:2017');

        return $this;
    }
}
