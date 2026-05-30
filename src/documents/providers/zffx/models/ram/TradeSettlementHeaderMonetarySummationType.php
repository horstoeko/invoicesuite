<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use JMS\Serializer\Annotation as JMS;

class TradeSettlementHeaderMonetarySummationType
{
    use HandlesObjectFlags;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getLineTotalAmount', setter: 'setLineTotalAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LineTotalAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $lineTotalAmount;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getChargeTotalAmount', setter: 'setChargeTotalAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ChargeTotalAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $chargeTotalAmount;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getAllowanceTotalAmount', setter: 'setAllowanceTotalAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('AllowanceTotalAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $allowanceTotalAmount;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getTaxBasisTotalAmount', setter: 'setTaxBasisTotalAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TaxBasisTotalAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $taxBasisTotalAmount;

    /**
     * @var null|array<AmountType>
     */
    #[JMS\Accessor(getter: 'getTaxTotalAmount', setter: 'setTaxTotalAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TaxTotalAmount')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TaxTotalAmount', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $taxTotalAmount;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getRoundingAmount', setter: 'setRoundingAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('RoundingAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $roundingAmount;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getGrandTotalAmount', setter: 'setGrandTotalAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('GrandTotalAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $grandTotalAmount;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getTotalPrepaidAmount', setter: 'setTotalPrepaidAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TotalPrepaidAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $totalPrepaidAmount;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getDuePayableAmount', setter: 'setDuePayableAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DuePayableAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $duePayableAmount;

    /**
     * @return null|AmountType
     */
    public function getLineTotalAmount(): ?AmountType
    {
        return $this->lineTotalAmount;
    }

    /**
     * @return AmountType
     */
    public function getLineTotalAmountWithCreate(): AmountType
    {
        $this->lineTotalAmount ??= new AmountType();

        return $this->lineTotalAmount;
    }

    /**
     * @param  null|AmountType $lineTotalAmount
     * @return static
     */
    public function setLineTotalAmount(
        ?AmountType $lineTotalAmount = null
    ): static {
        $this->lineTotalAmount = $lineTotalAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineTotalAmount(): static
    {
        $this->lineTotalAmount = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getChargeTotalAmount(): ?AmountType
    {
        return $this->chargeTotalAmount;
    }

    /**
     * @return AmountType
     */
    public function getChargeTotalAmountWithCreate(): AmountType
    {
        $this->chargeTotalAmount ??= new AmountType();

        return $this->chargeTotalAmount;
    }

    /**
     * @param  null|AmountType $chargeTotalAmount
     * @return static
     */
    public function setChargeTotalAmount(
        ?AmountType $chargeTotalAmount = null
    ): static {
        $this->chargeTotalAmount = $chargeTotalAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChargeTotalAmount(): static
    {
        $this->chargeTotalAmount = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getAllowanceTotalAmount(): ?AmountType
    {
        return $this->allowanceTotalAmount;
    }

    /**
     * @return AmountType
     */
    public function getAllowanceTotalAmountWithCreate(): AmountType
    {
        $this->allowanceTotalAmount ??= new AmountType();

        return $this->allowanceTotalAmount;
    }

    /**
     * @param  null|AmountType $allowanceTotalAmount
     * @return static
     */
    public function setAllowanceTotalAmount(
        ?AmountType $allowanceTotalAmount = null
    ): static {
        $this->allowanceTotalAmount = $allowanceTotalAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceTotalAmount(): static
    {
        $this->allowanceTotalAmount = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getTaxBasisTotalAmount(): ?AmountType
    {
        return $this->taxBasisTotalAmount;
    }

    /**
     * @return AmountType
     */
    public function getTaxBasisTotalAmountWithCreate(): AmountType
    {
        $this->taxBasisTotalAmount ??= new AmountType();

        return $this->taxBasisTotalAmount;
    }

    /**
     * @param  null|AmountType $taxBasisTotalAmount
     * @return static
     */
    public function setTaxBasisTotalAmount(
        ?AmountType $taxBasisTotalAmount = null
    ): static {
        $this->taxBasisTotalAmount = $taxBasisTotalAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxBasisTotalAmount(): static
    {
        $this->taxBasisTotalAmount = null;

        return $this;
    }

    /**
     * @return null|array<AmountType>
     */
    public function getTaxTotalAmount(): ?array
    {
        return $this->taxTotalAmount;
    }

    /**
     * @param  null|array<AmountType> $taxTotalAmount
     * @return static
     */
    public function setTaxTotalAmount(
        ?array $taxTotalAmount = null
    ): static {
        $this->taxTotalAmount = $taxTotalAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxTotalAmount(): static
    {
        $this->taxTotalAmount = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxTotalAmount(): static
    {
        $this->taxTotalAmount = [];

        return $this;
    }

    /**
     * @param  AmountType $taxTotalAmount
     * @return static
     */
    public function addToTaxTotalAmount(
        AmountType $taxTotalAmount
    ): static {
        $this->taxTotalAmount[] = $taxTotalAmount;

        return $this;
    }

    /**
     * @return AmountType
     */
    public function addToTaxTotalAmountWithCreate(): AmountType
    {
        $this->addTotaxTotalAmount($taxTotalAmount = new AmountType());

        return $taxTotalAmount;
    }

    /**
     * @param  AmountType $taxTotalAmount
     * @return static
     */
    public function addOnceToTaxTotalAmount(
        AmountType $taxTotalAmount
    ): static {
        if (!is_array($this->taxTotalAmount)) {
            $this->taxTotalAmount = [];
        }

        $this->taxTotalAmount[0] = $taxTotalAmount;

        return $this;
    }

    /**
     * @return AmountType
     */
    public function addOnceToTaxTotalAmountWithCreate(): AmountType
    {
        if (!is_array($this->taxTotalAmount)) {
            $this->taxTotalAmount = [];
        }

        if ([] === $this->taxTotalAmount) {
            $this->addOnceTotaxTotalAmount(new AmountType());
        }

        return $this->taxTotalAmount[0];
    }

    /**
     * @return null|AmountType
     */
    public function getRoundingAmount(): ?AmountType
    {
        return $this->roundingAmount;
    }

    /**
     * @return AmountType
     */
    public function getRoundingAmountWithCreate(): AmountType
    {
        $this->roundingAmount ??= new AmountType();

        return $this->roundingAmount;
    }

    /**
     * @param  null|AmountType $roundingAmount
     * @return static
     */
    public function setRoundingAmount(
        ?AmountType $roundingAmount = null
    ): static {
        $this->roundingAmount = $roundingAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRoundingAmount(): static
    {
        $this->roundingAmount = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getGrandTotalAmount(): ?AmountType
    {
        return $this->grandTotalAmount;
    }

    /**
     * @return AmountType
     */
    public function getGrandTotalAmountWithCreate(): AmountType
    {
        $this->grandTotalAmount ??= new AmountType();

        return $this->grandTotalAmount;
    }

    /**
     * @param  null|AmountType $grandTotalAmount
     * @return static
     */
    public function setGrandTotalAmount(
        ?AmountType $grandTotalAmount = null
    ): static {
        $this->grandTotalAmount = $grandTotalAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGrandTotalAmount(): static
    {
        $this->grandTotalAmount = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getTotalPrepaidAmount(): ?AmountType
    {
        return $this->totalPrepaidAmount;
    }

    /**
     * @return AmountType
     */
    public function getTotalPrepaidAmountWithCreate(): AmountType
    {
        $this->totalPrepaidAmount ??= new AmountType();

        return $this->totalPrepaidAmount;
    }

    /**
     * @param  null|AmountType $totalPrepaidAmount
     * @return static
     */
    public function setTotalPrepaidAmount(
        ?AmountType $totalPrepaidAmount = null
    ): static {
        $this->totalPrepaidAmount = $totalPrepaidAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalPrepaidAmount(): static
    {
        $this->totalPrepaidAmount = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getDuePayableAmount(): ?AmountType
    {
        return $this->duePayableAmount;
    }

    /**
     * @return AmountType
     */
    public function getDuePayableAmountWithCreate(): AmountType
    {
        $this->duePayableAmount ??= new AmountType();

        return $this->duePayableAmount;
    }

    /**
     * @param  null|AmountType $duePayableAmount
     * @return static
     */
    public function setDuePayableAmount(
        ?AmountType $duePayableAmount = null
    ): static {
        $this->duePayableAmount = $duePayableAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDuePayableAmount(): static
    {
        $this->duePayableAmount = null;

        return $this;
    }
}
