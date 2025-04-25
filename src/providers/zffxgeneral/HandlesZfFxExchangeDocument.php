<?php

namespace horstoeko\invoicesuite\providers\zffxgeneral;

use horstoeko\invoicesuite\concerns\HandlesRootObject;
use horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\models\zffx\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\models\zffx\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\models\zffx\rsm\CrossIndustryInvoiceType;

/**
 * Trait for general Zugferd/Factur-X document handling
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
trait HandlesZfFxExchangeDocument
{
    use HandlesRootObject;

    /**
     * Init Context parameter
     *
     * @param string $newContextParameter
     * @return static
     */
    public function setContextParameter(string $newContextParameter): self
    {
        /**
         * @var CrossIndustryInvoiceType $crossIndustryInvoice
         */
        $crossIndustryInvoice = $this->getRootObject();

        $exchangedDocumentContextType = new ExchangedDocumentContextType();
        $exchangedDocumentType = new ExchangedDocumentType();

        $crossIndustryInvoice->setExchangedDocumentContext($exchangedDocumentContextType);
        $crossIndustryInvoice->setExchangedDocument($exchangedDocumentType);

        $documentContextParameterType = new DocumentContextParameterType();
        $documentContextParameterType->getIDWithCreate()->setValue($newContextParameter);

        $crossIndustryInvoice->getExchangedDocumentContext()->setGuidelineSpecifiedDocumentContextParameter($documentContextParameterType);

        return $this;
    }
}