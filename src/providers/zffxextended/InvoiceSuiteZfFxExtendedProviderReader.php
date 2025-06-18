<?php

namespace horstoeko\invoicesuite\providers\zffxextended;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderReader;
use horstoeko\invoicesuite\models\zffxextended\rsm\CrossIndustryInvoiceType;

class InvoiceSuiteZfFxExtendedProviderReader extends InvoiceSuiteAbstractFormatProviderReader
{
    /**
     * Returns the root object as a CrossIndustryInvoiceType
     *
     * @return CrossIndustryInvoiceType
     */
    protected function getCrossIndustryRootObject(): CrossIndustryInvoiceType
    {
        return $this->getRootObject();
    }

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo The document no issued by the seller
     * @return static
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): self {
        $newDocumentNo = $this->getCrossIndustryRootObject()?->getExchangedDocument()?->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param string|null $newDocumentType The type of the document
     * @return static
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): self {
        $newDocumentType = $this->getCrossIndustryRootObject()?->getExchangedDocument()?->getTypeCode()?->getValue() ?? "";

        return $this;
    }
}
