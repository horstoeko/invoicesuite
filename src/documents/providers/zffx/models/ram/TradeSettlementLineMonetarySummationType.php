<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use JMS\Serializer\Annotation as JMS;

class TradeSettlementLineMonetarySummationType
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
    #[JMS\Accessor(getter: 'getTaxTotalAmount', setter: 'setTaxTotalAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TaxTotalAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $taxTotalAmount;

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
    #[JMS\Accessor(getter: 'getTotalAllowanceChargeAmount', setter: 'setTotalAllowanceChargeAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TotalAllowanceChargeAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $totalAllowanceChargeAmount;

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
    public function getTaxTotalAmount(): ?AmountType
    {
        return $this->taxTotalAmount;
    }

    /**
     * @return AmountType
     */
    public function getTaxTotalAmountWithCreate(): AmountType
    {
        $this->taxTotalAmount ??= new AmountType();

        return $this->taxTotalAmount;
    }

    /**
     * @param  null|AmountType $taxTotalAmount
     * @return static
     */
    public function setTaxTotalAmount(
        ?AmountType $taxTotalAmount = null
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
    public function getTotalAllowanceChargeAmount(): ?AmountType
    {
        return $this->totalAllowanceChargeAmount;
    }

    /**
     * @return AmountType
     */
    public function getTotalAllowanceChargeAmountWithCreate(): AmountType
    {
        $this->totalAllowanceChargeAmount ??= new AmountType();

        return $this->totalAllowanceChargeAmount;
    }

    /**
     * @param  null|AmountType $totalAllowanceChargeAmount
     * @return static
     */
    public function setTotalAllowanceChargeAmount(
        ?AmountType $totalAllowanceChargeAmount = null
    ): static {
        $this->totalAllowanceChargeAmount = $totalAllowanceChargeAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalAllowanceChargeAmount(): static
    {
        $this->totalAllowanceChargeAmount = null;

        return $this;
    }
}
