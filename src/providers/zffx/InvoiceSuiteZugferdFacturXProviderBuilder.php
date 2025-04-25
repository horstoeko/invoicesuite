<?php

namespace horstoeko\invoicesuite\providers\zffx;

use DateTimeInterface;
use horstoeko\invoicesuite\models\zffx\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\models\zffx\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\models\zffx\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;

class InvoiceSuiteZugferdFacturXProviderBuilder extends InvoiceSuiteAbstractFormatProviderBuilder
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
     * Init context parameter for profile definition
     *
     * @param string $newContextParameter
     * @param string $newBusinessProcessContextParameter
     * @return static
     */
    public function setContextParameter(string $newContextParameter, string $newBusinessProcessContextParameter = ""): self
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

        $crossIndustryInvoice
            ->getExchangedDocumentContext()
            ->setGuidelineSpecifiedDocumentContextParameter($documentContextParameterType);

        if ($newBusinessProcessContextParameter !== "") {
            $documentContextParameterType = new DocumentContextParameterType();
            $documentContextParameterType->getIDWithCreate()->setValue($newBusinessProcessContextParameter);

            $crossIndustryInvoice
                ->getExchangedDocumentContext()
                ->setBusinessProcessSpecifiedDocumentContextParameter($documentContextParameterType);
        }

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newDocumentNo __BT-1, From MINIMUM__ The document no issued by the seller
     */
    public function setDocumentNo(string $newDocumentNo): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getIDWithCreate()
            ->setValue($newDocumentNo);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newDocumentType __BT-3, From MINIMUM__ The type of the document
     */
    public function setDocumentType(string $newDocumentType): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getTypeCodeWithCreate()
            ->setValue($newDocumentType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newDocumentDescription__BT-X-2, From EXTENDED__ Document Type. The documenttype (free text)
     */
    public function setDocumentDescription(string $newDocumentDescription): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getNameWithCreate()
            ->setValue($newDocumentDescription);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newDocumentLanguage __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     */
    public function setDocumentLanguage(string $newDocumentLanguage): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getLanguageIDWithCreate()
            ->setValue($newDocumentLanguage);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param DateTimeInterface $newDocumentDate __BT-2, From MINIMUM__ Date of invoice. The date when the document was issued by the seller
     */
    public function setDocumentDate(DateTimeInterface $newDocumentDate): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getIssueDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newDocumentDate->format("Ymd"))
            ->setFormat('102');

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param DateTimeInterface $newCompleteDate __BT-X-6-000, From EXTENDED__ The contractual due date of the invoice
     */
    public function setDocumentCompleteDate(DateTimeInterface $newCompleteDate): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getEffectiveSpecifiedPeriodWithCreate()
            ->getCompleteDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newCompleteDate->format("Ymd"))
            ->setFormat("102");

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newDocumentCurrency __BT-5, From MINIMUM__ Code for the invoice currency
     */
    public function setDocumentCurrency(string $newDocumentCurrency): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceCurrencyCodeWithCreate()
            ->setValue($newDocumentCurrency);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * Note: Shall be used in combination with the Total VAT amount in accounting currency (BT-111)
     * when the VAT accounting currency code differs from the Invoice currency code.
     *
     * @param string $newDocumentTaxCurrency __BT-6, From BASIC WL__ Code for the tax currency
     */
    public function setDocumentTaxCurrency(string $newDocumentTaxCurrency): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getTaxCurrencyCodeWithCreate()
            ->setValue($newDocumentTaxCurrency);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param bool $newDocumentIsCopy __BT-X-1-00, From EXTENDED__ Only to be used in the case of a test calculation, with newDocumentIsCopy = true
     */
    public function setDocumentIsCopy(bool $newDocumentIsCopy): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getCopyIndicatorWithCreate()
            ->setIndicator($newDocumentIsCopy);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param bool $newDocumentIsCopy __BT-X-3-00, From EXTENDED__ With newDocumentIsTest = true, the document is a copy
     */
    public function setDocumentIsTest(bool $newDocumentIsTest): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentContextWithCreate()
            ->getTestIndicatorWithCreate()
            ->setIndicator($newDocumentIsTest);

        return $this;
    }
}
