<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TaxCategoryCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TaxTypeCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TimeReferenceCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\PercentType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradeTaxType
{
    use HandlesObjectFlags;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getCalculatedAmount', setter: 'setCalculatedAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CalculatedAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $calculatedAmount;

    /**
     * @var null|TaxTypeCodeType
     */
    #[JMS\Accessor(getter: 'getTypeCode', setter: 'setTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TaxTypeCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $typeCode;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getExemptionReason', setter: 'setExemptionReason')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ExemptionReason')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $exemptionReason;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getBasisAmount', setter: 'setBasisAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BasisAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $basisAmount;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getLineTotalBasisAmount', setter: 'setLineTotalBasisAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LineTotalBasisAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $lineTotalBasisAmount;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getAllowanceChargeBasisAmount', setter: 'setAllowanceChargeBasisAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('AllowanceChargeBasisAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $allowanceChargeBasisAmount;

    /**
     * @var null|TaxCategoryCodeType
     */
    #[JMS\Accessor(getter: 'getCategoryCode', setter: 'setCategoryCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CategoryCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TaxCategoryCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $categoryCode;

    /**
     * @var null|CodeType
     */
    #[JMS\Accessor(getter: 'getExemptionReasonCode', setter: 'setExemptionReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ExemptionReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $exemptionReasonCode;

    /**
     * @var null|DateType
     */
    #[JMS\Accessor(getter: 'getTaxPointDate', setter: 'setTaxPointDate')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TaxPointDate')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $taxPointDate;

    /**
     * @var null|TimeReferenceCodeType
     */
    #[JMS\Accessor(getter: 'getDueDateTypeCode', setter: 'setDueDateTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DueDateTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TimeReferenceCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $dueDateTypeCode;

    /**
     * @var null|PercentType
     */
    #[JMS\Accessor(getter: 'getRateApplicablePercent', setter: 'setRateApplicablePercent')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('RateApplicablePercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\PercentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $rateApplicablePercent;

    /**
     * @return null|AmountType
     */
    public function getCalculatedAmount(): ?AmountType
    {
        return $this->calculatedAmount;
    }

    /**
     * @return AmountType
     */
    public function getCalculatedAmountWithCreate(): AmountType
    {
        $this->calculatedAmount ??= new AmountType();

        return $this->calculatedAmount;
    }

    /**
     * @param  null|AmountType $calculatedAmount
     * @return static
     */
    public function setCalculatedAmount(
        ?AmountType $calculatedAmount = null
    ): static {
        $this->calculatedAmount = $calculatedAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCalculatedAmount(): static
    {
        $this->calculatedAmount = null;

        return $this;
    }

    /**
     * @return null|TaxTypeCodeType
     */
    public function getTypeCode(): ?TaxTypeCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return TaxTypeCodeType
     */
    public function getTypeCodeWithCreate(): TaxTypeCodeType
    {
        $this->typeCode ??= new TaxTypeCodeType();

        return $this->typeCode;
    }

    /**
     * @param  null|TaxTypeCodeType $typeCode
     * @return static
     */
    public function setTypeCode(
        ?TaxTypeCodeType $typeCode = null
    ): static {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTypeCode(): static
    {
        $this->typeCode = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getExemptionReason(): ?TextType
    {
        return $this->exemptionReason;
    }

    /**
     * @return TextType
     */
    public function getExemptionReasonWithCreate(): TextType
    {
        $this->exemptionReason ??= new TextType();

        return $this->exemptionReason;
    }

    /**
     * @param  null|TextType $exemptionReason
     * @return static
     */
    public function setExemptionReason(
        ?TextType $exemptionReason = null
    ): static {
        $this->exemptionReason = $exemptionReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExemptionReason(): static
    {
        $this->exemptionReason = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getBasisAmount(): ?AmountType
    {
        return $this->basisAmount;
    }

    /**
     * @return AmountType
     */
    public function getBasisAmountWithCreate(): AmountType
    {
        $this->basisAmount ??= new AmountType();

        return $this->basisAmount;
    }

    /**
     * @param  null|AmountType $basisAmount
     * @return static
     */
    public function setBasisAmount(
        ?AmountType $basisAmount = null
    ): static {
        $this->basisAmount = $basisAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBasisAmount(): static
    {
        $this->basisAmount = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getLineTotalBasisAmount(): ?AmountType
    {
        return $this->lineTotalBasisAmount;
    }

    /**
     * @return AmountType
     */
    public function getLineTotalBasisAmountWithCreate(): AmountType
    {
        $this->lineTotalBasisAmount ??= new AmountType();

        return $this->lineTotalBasisAmount;
    }

    /**
     * @param  null|AmountType $lineTotalBasisAmount
     * @return static
     */
    public function setLineTotalBasisAmount(
        ?AmountType $lineTotalBasisAmount = null
    ): static {
        $this->lineTotalBasisAmount = $lineTotalBasisAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineTotalBasisAmount(): static
    {
        $this->lineTotalBasisAmount = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getAllowanceChargeBasisAmount(): ?AmountType
    {
        return $this->allowanceChargeBasisAmount;
    }

    /**
     * @return AmountType
     */
    public function getAllowanceChargeBasisAmountWithCreate(): AmountType
    {
        $this->allowanceChargeBasisAmount ??= new AmountType();

        return $this->allowanceChargeBasisAmount;
    }

    /**
     * @param  null|AmountType $allowanceChargeBasisAmount
     * @return static
     */
    public function setAllowanceChargeBasisAmount(
        ?AmountType $allowanceChargeBasisAmount = null
    ): static {
        $this->allowanceChargeBasisAmount = $allowanceChargeBasisAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceChargeBasisAmount(): static
    {
        $this->allowanceChargeBasisAmount = null;

        return $this;
    }

    /**
     * @return null|TaxCategoryCodeType
     */
    public function getCategoryCode(): ?TaxCategoryCodeType
    {
        return $this->categoryCode;
    }

    /**
     * @return TaxCategoryCodeType
     */
    public function getCategoryCodeWithCreate(): TaxCategoryCodeType
    {
        $this->categoryCode ??= new TaxCategoryCodeType();

        return $this->categoryCode;
    }

    /**
     * @param  null|TaxCategoryCodeType $categoryCode
     * @return static
     */
    public function setCategoryCode(
        ?TaxCategoryCodeType $categoryCode = null
    ): static {
        $this->categoryCode = $categoryCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCategoryCode(): static
    {
        $this->categoryCode = null;

        return $this;
    }

    /**
     * @return null|CodeType
     */
    public function getExemptionReasonCode(): ?CodeType
    {
        return $this->exemptionReasonCode;
    }

    /**
     * @return CodeType
     */
    public function getExemptionReasonCodeWithCreate(): CodeType
    {
        $this->exemptionReasonCode ??= new CodeType();

        return $this->exemptionReasonCode;
    }

    /**
     * @param  null|CodeType $exemptionReasonCode
     * @return static
     */
    public function setExemptionReasonCode(
        ?CodeType $exemptionReasonCode = null
    ): static {
        $this->exemptionReasonCode = $exemptionReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExemptionReasonCode(): static
    {
        $this->exemptionReasonCode = null;

        return $this;
    }

    /**
     * @return null|DateType
     */
    public function getTaxPointDate(): ?DateType
    {
        return $this->taxPointDate;
    }

    /**
     * @return DateType
     */
    public function getTaxPointDateWithCreate(): DateType
    {
        $this->taxPointDate ??= new DateType();

        return $this->taxPointDate;
    }

    /**
     * @param  null|DateType $taxPointDate
     * @return static
     */
    public function setTaxPointDate(
        ?DateType $taxPointDate = null
    ): static {
        $this->taxPointDate = $taxPointDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxPointDate(): static
    {
        $this->taxPointDate = null;

        return $this;
    }

    /**
     * @return null|TimeReferenceCodeType
     */
    public function getDueDateTypeCode(): ?TimeReferenceCodeType
    {
        return $this->dueDateTypeCode;
    }

    /**
     * @return TimeReferenceCodeType
     */
    public function getDueDateTypeCodeWithCreate(): TimeReferenceCodeType
    {
        $this->dueDateTypeCode ??= new TimeReferenceCodeType();

        return $this->dueDateTypeCode;
    }

    /**
     * @param  null|TimeReferenceCodeType $dueDateTypeCode
     * @return static
     */
    public function setDueDateTypeCode(
        ?TimeReferenceCodeType $dueDateTypeCode = null
    ): static {
        $this->dueDateTypeCode = $dueDateTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDueDateTypeCode(): static
    {
        $this->dueDateTypeCode = null;

        return $this;
    }

    /**
     * @return null|PercentType
     */
    public function getRateApplicablePercent(): ?PercentType
    {
        return $this->rateApplicablePercent;
    }

    /**
     * @return PercentType
     */
    public function getRateApplicablePercentWithCreate(): PercentType
    {
        $this->rateApplicablePercent ??= new PercentType();

        return $this->rateApplicablePercent;
    }

    /**
     * @param  null|PercentType $rateApplicablePercent
     * @return static
     */
    public function setRateApplicablePercent(
        ?PercentType $rateApplicablePercent = null
    ): static {
        $this->rateApplicablePercent = $rateApplicablePercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRateApplicablePercent(): static
    {
        $this->rateApplicablePercent = null;

        return $this;
    }
}
