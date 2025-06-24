<?php

namespace horstoeko\invoicesuite\providers\zffxextended;

use DateTimeInterface;
use horstoeko\invoicesuite\models\zffxextended\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteDateTimeUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePointerUtils;

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
     * @param string|null $newDocumentNo __BT-1, From MINIMUM__ The document no issued by the seller
     * @return static
     *
     * @phpstan-param-out string $newDocumentNo
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): self {
        $newDocumentNo = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param string|null $newDocumentType __BT-3, From MINIMUM__ The type of the document
     * @return static
     *
     * @phpstan-param-out string $newDocumentType
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): self {
        $newDocumentType = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getTypeCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document description
     *
     * @param string|null $newDocumentDescription __BT-X-2, From EXTENDED__ The documenttype as free text
     * @return self
     *
     * @phpstan-param-out string $newDocumentDescription
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): self {
        $newDocumentDescription = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document language
     *
     * @param string|null $newDocumentLanguage __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     * @return self
     *
     * @phpstan-param-out string $newDocumentLanguage
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): self {
        $newDocumentLanguage = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getLanguageID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate __BT-2, From MINIMUM__ Date of the document. The date when the document was issued by the seller
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newDocumentDate
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): self {
        $newDocumentDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Gets the document period
     *
     * @param DateTimeInterface|null $newCompleteDate __BT-X-6-000, From EXTENDED__ Contractual due date of the document
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newCompleteDate
     */
    public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): self {
        $newCompleteDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getEffectiveSpecifiedPeriod()?->getCompleteDateTime()?->getDateTimeString()?->getValue() ?? "",
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getEffectiveSpecifiedPeriod()?->getCompleteDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Gets the document currency
     *
     * @param string|null $newDocumentCurrency __BT-5, From MINIMUM__ Code for the invoice currency
     * @return self
     *
     * @phpstan-param-out string $newDocumentCurrency
     */
    public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): self {
        $newDocumentCurrency = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceCurrencyCode()
            ?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the new document tax currency
     *
     * @param string|null $newDocumentTaxCurrency Code for the tax currency
     * @return self
     *
     * @phpstan-param-out string $newDocumentTaxCurrency
     */
    public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): self {
        $newDocumentTaxCurrency = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getTaxCurrencyCode()
            ?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the new status of the copy indicator
     *
     * @param boolean|null $newDocumentIsCopy Indicates that the document is a copy
     * @return self
     *
     * @phpstan-param-out boolean $newDocumentIsCopy
     */
    public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy = null
    ): self {
        $newDocumentIsCopy = $this->getCrossIndustryRootObject()->getExchangedDocument()
            ?->getCopyIndicator()
            ?->getIndicator() ?? false;

        return $this;
    }

    /**
     * Gets the status of the test indicator
     *
     * @param boolean|null $newDocumentIsTest Indicates that the document is a test
     * @return self
     *
     * @phpstan-param-out boolean $newDocumentIsTest
     */
    public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): self {
        $newDocumentIsTest = $this->getCrossIndustryRootObject()->getExchangedDocumentContext()
            ?->getTestIndicator()
            ?->getIndicator() ?? false;

        return $this;
    }

    /**
     * Go to the first document of the document
     *
     * @return bool
     */
    public function firstDocumentNote(): bool
    {
        InvoiceSuitePointerUtils::first('documentnote');

        return InvoiceSuitePointerUtils::has($this->getCrossIndustryRootObject()->getExchangedDocument()?->getIncludedNote() ?? [], 'documentnote');
    }

    /**
     * Go to the next document of the document
     *
     * @return bool
     */
    public function nextDocumentNote(): bool
    {
        InvoiceSuitePointerUtils::next('documentnote');

        return InvoiceSuitePointerUtils::has($this->getCrossIndustryRootObject()->getExchangedDocument()?->getIncludedNote() ?? [], 'documentnote');
    }
}
