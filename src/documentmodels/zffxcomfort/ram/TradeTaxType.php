<?php

namespace horstoeko\invoicesuite\documentmodels\zffxcomfort\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxCategoryCodeType;
use horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxTypeCodeType;
use horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TimeReferenceCodeType;
use horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType;
use horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\CodeType;
use horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\DateType;
use horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\PercentType;
use horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\TextType;

class TradeTaxType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("CalculatedAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCalculatedAmount", setter="setCalculatedAmount")
     */
    private $calculatedAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxTypeCodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxTypeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $typeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("ExemptionReason")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getExemptionReason", setter="setExemptionReason")
     */
    private $exemptionReason;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisAmount", setter="setBasisAmount")
     */
    private $basisAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxCategoryCodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxCategoryCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("CategoryCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCategoryCode", setter="setCategoryCode")
     */
    private $categoryCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\CodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ExemptionReasonCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getExemptionReasonCode", setter="setExemptionReasonCode")
     */
    private $exemptionReasonCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\DateType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\DateType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxPointDate")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxPointDate", setter="setTaxPointDate")
     */
    private $taxPointDate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TimeReferenceCodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TimeReferenceCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("DueDateTypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDueDateTypeCode", setter="setDueDateTypeCode")
     */
    private $dueDateTypeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\PercentType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\PercentType")
     * @JMS\Expose
     * @JMS\SerializedName("RateApplicablePercent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getRateApplicablePercent", setter="setRateApplicablePercent")
     */
    private $rateApplicablePercent;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType|null
     */
    public function getCalculatedAmount(): ?AmountType
    {
        return $this->calculatedAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType
     */
    public function getCalculatedAmountWithCreate(): AmountType
    {
        $this->calculatedAmount = is_null($this->calculatedAmount) ? new AmountType() : $this->calculatedAmount;

        return $this->calculatedAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType|null $calculatedAmount
     * @return self
     */
    public function setCalculatedAmount(?AmountType $calculatedAmount = null): self
    {
        $this->calculatedAmount = $calculatedAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCalculatedAmount(): self
    {
        $this->calculatedAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxTypeCodeType|null
     */
    public function getTypeCode(): ?TaxTypeCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxTypeCodeType
     */
    public function getTypeCodeWithCreate(): TaxTypeCodeType
    {
        $this->typeCode = is_null($this->typeCode) ? new TaxTypeCodeType() : $this->typeCode;

        return $this->typeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxTypeCodeType|null $typeCode
     * @return self
     */
    public function setTypeCode(?TaxTypeCodeType $typeCode = null): self
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTypeCode(): self
    {
        $this->typeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\TextType|null
     */
    public function getExemptionReason(): ?TextType
    {
        return $this->exemptionReason;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\TextType
     */
    public function getExemptionReasonWithCreate(): TextType
    {
        $this->exemptionReason = is_null($this->exemptionReason) ? new TextType() : $this->exemptionReason;

        return $this->exemptionReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\TextType|null $exemptionReason
     * @return self
     */
    public function setExemptionReason(?TextType $exemptionReason = null): self
    {
        $this->exemptionReason = $exemptionReason;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExemptionReason(): self
    {
        $this->exemptionReason = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType|null
     */
    public function getBasisAmount(): ?AmountType
    {
        return $this->basisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType
     */
    public function getBasisAmountWithCreate(): AmountType
    {
        $this->basisAmount = is_null($this->basisAmount) ? new AmountType() : $this->basisAmount;

        return $this->basisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\AmountType|null $basisAmount
     * @return self
     */
    public function setBasisAmount(?AmountType $basisAmount = null): self
    {
        $this->basisAmount = $basisAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBasisAmount(): self
    {
        $this->basisAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxCategoryCodeType|null
     */
    public function getCategoryCode(): ?TaxCategoryCodeType
    {
        return $this->categoryCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxCategoryCodeType
     */
    public function getCategoryCodeWithCreate(): TaxCategoryCodeType
    {
        $this->categoryCode = is_null($this->categoryCode) ? new TaxCategoryCodeType() : $this->categoryCode;

        return $this->categoryCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TaxCategoryCodeType|null $categoryCode
     * @return self
     */
    public function setCategoryCode(?TaxCategoryCodeType $categoryCode = null): self
    {
        $this->categoryCode = $categoryCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCategoryCode(): self
    {
        $this->categoryCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\CodeType|null
     */
    public function getExemptionReasonCode(): ?CodeType
    {
        return $this->exemptionReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\CodeType
     */
    public function getExemptionReasonCodeWithCreate(): CodeType
    {
        $this->exemptionReasonCode = is_null($this->exemptionReasonCode) ? new CodeType() : $this->exemptionReasonCode;

        return $this->exemptionReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\CodeType|null $exemptionReasonCode
     * @return self
     */
    public function setExemptionReasonCode(?CodeType $exemptionReasonCode = null): self
    {
        $this->exemptionReasonCode = $exemptionReasonCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExemptionReasonCode(): self
    {
        $this->exemptionReasonCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\DateType|null
     */
    public function getTaxPointDate(): ?DateType
    {
        return $this->taxPointDate;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\DateType
     */
    public function getTaxPointDateWithCreate(): DateType
    {
        $this->taxPointDate = is_null($this->taxPointDate) ? new DateType() : $this->taxPointDate;

        return $this->taxPointDate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\DateType|null $taxPointDate
     * @return self
     */
    public function setTaxPointDate(?DateType $taxPointDate = null): self
    {
        $this->taxPointDate = $taxPointDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxPointDate(): self
    {
        $this->taxPointDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TimeReferenceCodeType|null
     */
    public function getDueDateTypeCode(): ?TimeReferenceCodeType
    {
        return $this->dueDateTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TimeReferenceCodeType
     */
    public function getDueDateTypeCodeWithCreate(): TimeReferenceCodeType
    {
        $this->dueDateTypeCode = is_null($this->dueDateTypeCode) ? new TimeReferenceCodeType() : $this->dueDateTypeCode;

        return $this->dueDateTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxcomfort\qdt\TimeReferenceCodeType|null $dueDateTypeCode
     * @return self
     */
    public function setDueDateTypeCode(?TimeReferenceCodeType $dueDateTypeCode = null): self
    {
        $this->dueDateTypeCode = $dueDateTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDueDateTypeCode(): self
    {
        $this->dueDateTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\PercentType|null
     */
    public function getRateApplicablePercent(): ?PercentType
    {
        return $this->rateApplicablePercent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\PercentType
     */
    public function getRateApplicablePercentWithCreate(): PercentType
    {
        $this->rateApplicablePercent = is_null($this->rateApplicablePercent) ? new PercentType() : $this->rateApplicablePercent;

        return $this->rateApplicablePercent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxcomfort\udt\PercentType|null $rateApplicablePercent
     * @return self
     */
    public function setRateApplicablePercent(?PercentType $rateApplicablePercent = null): self
    {
        $this->rateApplicablePercent = $rateApplicablePercent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRateApplicablePercent(): self
    {
        $this->rateApplicablePercent = null;

        return $this;
    }
}
