<?php

namespace horstoeko\invoicesuite\providers\xrechnung;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;
use horstoeko\invoicesuite\providers\zffx\HandlesZfFxExchangeDocument;
use horstoeko\invoicesuite\providers\zffx\InvoiceSuiteZugferdFacturXProviderBuilder;

class InvoiceSuiteXRechnungProviderBuilder extends InvoiceSuiteZugferdFacturXProviderBuilder
{
    use HandlesZfFxExchangeDocument;

    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteAbstractFormatProviderBuilder
    {
        $this->setContextParameter(
            'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0',
            'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0'
        );

        return $this;
    }
}
