<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType;
use horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType;
use horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType;
use horstoeko\invoicesuite\models\zugferd\udt\AmountType;
use horstoeko\invoicesuite\models\zugferd\udt\CodeType;
use horstoeko\invoicesuite\models\zugferd\udt\DateType;
use horstoeko\invoicesuite\models\zugferd\udt\PercentType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class TradeTaxType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("CalculatedAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCalculatedAmount", setter="setCalculatedAmount")
     */
    private $calculatedAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $typeCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("ExemptionReason")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getExemptionReason", setter="setExemptionReason")
     */
    private $exemptionReason;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisAmount", setter="setBasisAmount")
     */
    private $basisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("LineTotalBasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineTotalBasisAmount", setter="setLineTotalBasisAmount")
     */
    private $lineTotalBasisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceChargeBasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAllowanceChargeBasisAmount", setter="setAllowanceChargeBasisAmount")
     */
    private $allowanceChargeBasisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("CategoryCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCategoryCode", setter="setCategoryCode")
     */
    private $categoryCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ExemptionReasonCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getExemptionReasonCode", setter="setExemptionReasonCode")
     */
    private $exemptionReasonCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\DateType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxPointDate")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxPointDate", setter="setTaxPointDate")
     */
    private $taxPointDate;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("DueDateTypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDueDateTypeCode", setter="setDueDateTypeCode")
     */
    private $dueDateTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\PercentType")
     * @JMS\Expose
     * @JMS\SerializedName("RateApplicablePercent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getRateApplicablePercent", setter="setRateApplicablePercent")
     */
    private $rateApplicablePercent;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getCalculatedAmount(): ?AmountType
    {
        return $this->calculatedAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getCalculatedAmountWithCreate(): AmountType
    {
        $this->calculatedAmount = is_null($this->calculatedAmount) ? new AmountType() : $this->calculatedAmount;

        return $this->calculatedAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setCalculatedAmount(AmountType $calculatedAmount): self
    {
        $this->calculatedAmount = $calculatedAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType|null
     */
    public function getTypeCode(): ?TaxTypeCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType
     */
    public function getTypeCodeWithCreate(): TaxTypeCodeType
    {
        $this->typeCode = is_null($this->typeCode) ? new TaxTypeCodeType() : $this->typeCode;

        return $this->typeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType
     * @return self
     */
    public function setTypeCode(TaxTypeCodeType $typeCode): self
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getExemptionReason(): ?TextType
    {
        return $this->exemptionReason;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getExemptionReasonWithCreate(): TextType
    {
        $this->exemptionReason = is_null($this->exemptionReason) ? new TextType() : $this->exemptionReason;

        return $this->exemptionReason;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setExemptionReason(TextType $exemptionReason): self
    {
        $this->exemptionReason = $exemptionReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getBasisAmount(): ?AmountType
    {
        return $this->basisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getBasisAmountWithCreate(): AmountType
    {
        $this->basisAmount = is_null($this->basisAmount) ? new AmountType() : $this->basisAmount;

        return $this->basisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setBasisAmount(AmountType $basisAmount): self
    {
        $this->basisAmount = $basisAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getLineTotalBasisAmount(): ?AmountType
    {
        return $this->lineTotalBasisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getLineTotalBasisAmountWithCreate(): AmountType
    {
        $this->lineTotalBasisAmount = is_null($this->lineTotalBasisAmount) ? new AmountType() : $this->lineTotalBasisAmount;

        return $this->lineTotalBasisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setLineTotalBasisAmount(AmountType $lineTotalBasisAmount): self
    {
        $this->lineTotalBasisAmount = $lineTotalBasisAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getAllowanceChargeBasisAmount(): ?AmountType
    {
        return $this->allowanceChargeBasisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getAllowanceChargeBasisAmountWithCreate(): AmountType
    {
        $this->allowanceChargeBasisAmount = is_null($this->allowanceChargeBasisAmount) ? new AmountType() : $this->allowanceChargeBasisAmount;

        return $this->allowanceChargeBasisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setAllowanceChargeBasisAmount(AmountType $allowanceChargeBasisAmount): self
    {
        $this->allowanceChargeBasisAmount = $allowanceChargeBasisAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType|null
     */
    public function getCategoryCode(): ?TaxCategoryCodeType
    {
        return $this->categoryCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType
     */
    public function getCategoryCodeWithCreate(): TaxCategoryCodeType
    {
        $this->categoryCode = is_null($this->categoryCode) ? new TaxCategoryCodeType() : $this->categoryCode;

        return $this->categoryCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType
     * @return self
     */
    public function setCategoryCode(TaxCategoryCodeType $categoryCode): self
    {
        $this->categoryCode = $categoryCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getExemptionReasonCode(): ?CodeType
    {
        return $this->exemptionReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getExemptionReasonCodeWithCreate(): CodeType
    {
        $this->exemptionReasonCode = is_null($this->exemptionReasonCode) ? new CodeType() : $this->exemptionReasonCode;

        return $this->exemptionReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @return self
     */
    public function setExemptionReasonCode(CodeType $exemptionReasonCode): self
    {
        $this->exemptionReasonCode = $exemptionReasonCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateType|null
     */
    public function getTaxPointDate(): ?DateType
    {
        return $this->taxPointDate;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateType
     */
    public function getTaxPointDateWithCreate(): DateType
    {
        $this->taxPointDate = is_null($this->taxPointDate) ? new DateType() : $this->taxPointDate;

        return $this->taxPointDate;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateType
     * @return self
     */
    public function setTaxPointDate(DateType $taxPointDate): self
    {
        $this->taxPointDate = $taxPointDate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType|null
     */
    public function getDueDateTypeCode(): ?TimeReferenceCodeType
    {
        return $this->dueDateTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType
     */
    public function getDueDateTypeCodeWithCreate(): TimeReferenceCodeType
    {
        $this->dueDateTypeCode = is_null($this->dueDateTypeCode) ? new TimeReferenceCodeType() : $this->dueDateTypeCode;

        return $this->dueDateTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType
     * @return self
     */
    public function setDueDateTypeCode(TimeReferenceCodeType $dueDateTypeCode): self
    {
        $this->dueDateTypeCode = $dueDateTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\PercentType|null
     */
    public function getRateApplicablePercent(): ?PercentType
    {
        return $this->rateApplicablePercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     */
    public function getRateApplicablePercentWithCreate(): PercentType
    {
        $this->rateApplicablePercent = is_null($this->rateApplicablePercent) ? new PercentType() : $this->rateApplicablePercent;

        return $this->rateApplicablePercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @return self
     */
    public function setRateApplicablePercent(PercentType $rateApplicablePercent): self
    {
        $this->rateApplicablePercent = $rateApplicablePercent;

        return $this;
    }
}
