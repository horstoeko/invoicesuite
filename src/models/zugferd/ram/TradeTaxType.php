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
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("CalculatedAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCalculatedAmount", setter="setCalculatedAmount")
     */
    private $calculatedAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\TaxTypeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $taxTypeCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("ExemptionReason")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getExemptionReason", setter="setExemptionReason")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisAmount", setter="setBasisAmount")
     */
    private $basisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("LineTotalBasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineTotalBasisAmount", setter="setLineTotalBasisAmount")
     */
    private $lineTotalBasisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceChargeBasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAllowanceChargeBasisAmount", setter="setAllowanceChargeBasisAmount")
     */
    private $allowanceChargeBasisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\TaxCategoryCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("CategoryCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCategoryCode", setter="setCategoryCode")
     */
    private $taxCategoryCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ExemptionReasonCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getExemptionReasonCode", setter="setExemptionReasonCode")
     */
    private $codeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\DateType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxPointDate")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxPointDate", setter="setTaxPointDate")
     */
    private $dateType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\TimeReferenceCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("DueDateTypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDueDateTypeCode", setter="setDueDateTypeCode")
     */
    private $timeReferenceCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\PercentType")
     * @JMS\Expose
     * @JMS\SerializedName("RateApplicablePercent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getRateApplicablePercent", setter="setRateApplicablePercent")
     */
    private $percentType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getCalculatedAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->calculatedAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getCalculatedAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->calculatedAmount = is_null($this->calculatedAmount) ? new AmountType() : $this->calculatedAmount;

        return $this->calculatedAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setCalculatedAmount(\horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType): self
    {
        $this->calculatedAmount = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType|null
     */
    public function getTypeCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType
    {
        return $this->taxTypeCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType
     */
    public function getTypeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType
    {
        $this->taxTypeCodeType = is_null($this->taxTypeCodeType) ? new TaxTypeCodeType() : $this->taxTypeCodeType;

        return $this->taxTypeCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType
     * @return self
     */
    public function setTypeCode(\horstoeko\invoicesuite\models\zugferd\qdt\TaxTypeCodeType $taxTypeCodeType): self
    {
        $this->taxTypeCodeType = $taxTypeCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getExemptionReason(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getExemptionReasonWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setExemptionReason(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getBasisAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->basisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getBasisAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->basisAmount = is_null($this->basisAmount) ? new AmountType() : $this->basisAmount;

        return $this->basisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setBasisAmount(\horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType): self
    {
        $this->basisAmount = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getLineTotalBasisAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->lineTotalBasisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getLineTotalBasisAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->lineTotalBasisAmount = is_null($this->lineTotalBasisAmount) ? new AmountType() : $this->lineTotalBasisAmount;

        return $this->lineTotalBasisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setLineTotalBasisAmount(
        \horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType,
    ): self {
        $this->lineTotalBasisAmount = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getAllowanceChargeBasisAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->allowanceChargeBasisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getAllowanceChargeBasisAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->allowanceChargeBasisAmount = is_null($this->allowanceChargeBasisAmount) ? new AmountType() : $this->allowanceChargeBasisAmount;

        return $this->allowanceChargeBasisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setAllowanceChargeBasisAmount(
        \horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType,
    ): self {
        $this->allowanceChargeBasisAmount = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType|null
     */
    public function getCategoryCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType
    {
        return $this->taxCategoryCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType
     */
    public function getCategoryCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType
    {
        $this->taxCategoryCodeType = is_null($this->taxCategoryCodeType) ? new TaxCategoryCodeType() : $this->taxCategoryCodeType;

        return $this->taxCategoryCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType
     * @return self
     */
    public function setCategoryCode(\horstoeko\invoicesuite\models\zugferd\qdt\TaxCategoryCodeType $taxCategoryCodeType): self
    {
        $this->taxCategoryCodeType = $taxCategoryCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getExemptionReasonCode(): ?\horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getExemptionReasonCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @return self
     */
    public function setExemptionReasonCode(
        \horstoeko\invoicesuite\models\zugferd\udt\CodeType $codeType,
    ): self {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateType|null
     */
    public function getTaxPointDate(): ?\horstoeko\invoicesuite\models\zugferd\udt\DateType
    {
        return $this->dateType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateType
     */
    public function getTaxPointDateWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\DateType
    {
        $this->dateType = is_null($this->dateType) ? new DateType() : $this->dateType;

        return $this->dateType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateType
     * @return self
     */
    public function setTaxPointDate(\horstoeko\invoicesuite\models\zugferd\udt\DateType $dateType): self
    {
        $this->dateType = $dateType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType|null
     */
    public function getDueDateTypeCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType
    {
        return $this->timeReferenceCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType
     */
    public function getDueDateTypeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType
    {
        $this->timeReferenceCodeType = is_null($this->timeReferenceCodeType) ? new TimeReferenceCodeType() : $this->timeReferenceCodeType;

        return $this->timeReferenceCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType
     * @return self
     */
    public function setDueDateTypeCode(
        \horstoeko\invoicesuite\models\zugferd\qdt\TimeReferenceCodeType $timeReferenceCodeType,
    ): self {
        $this->timeReferenceCodeType = $timeReferenceCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\PercentType|null
     */
    public function getRateApplicablePercent(): ?\horstoeko\invoicesuite\models\zugferd\udt\PercentType
    {
        return $this->percentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     */
    public function getRateApplicablePercentWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\PercentType
    {
        $this->percentType = is_null($this->percentType) ? new PercentType() : $this->percentType;

        return $this->percentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @return self
     */
    public function setRateApplicablePercent(
        \horstoeko\invoicesuite\models\zugferd\udt\PercentType $percentType,
    ): self {
        $this->percentType = $percentType;

        return $this;
    }
}
