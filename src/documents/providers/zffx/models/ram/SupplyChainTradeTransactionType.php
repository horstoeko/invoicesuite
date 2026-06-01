<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class SupplyChainTradeTransactionType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<SupplyChainTradeLineItemType>
     */
    #[JMS\Accessor(getter: 'getIncludedSupplyChainTradeLineItem', setter: 'setIncludedSupplyChainTradeLineItem')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IncludedSupplyChainTradeLineItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainTradeLineItemType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'IncludedSupplyChainTradeLineItem', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $includedSupplyChainTradeLineItem;

    /**
     * @var null|HeaderTradeAgreementType
     */
    #[JMS\Accessor(getter: 'getApplicableHeaderTradeAgreement', setter: 'setApplicableHeaderTradeAgreement')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ApplicableHeaderTradeAgreement')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\HeaderTradeAgreementType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $applicableHeaderTradeAgreement;

    /**
     * @var null|HeaderTradeDeliveryType
     */
    #[JMS\Accessor(getter: 'getApplicableHeaderTradeDelivery', setter: 'setApplicableHeaderTradeDelivery')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ApplicableHeaderTradeDelivery')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\HeaderTradeDeliveryType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $applicableHeaderTradeDelivery;

    /**
     * @var null|HeaderTradeSettlementType
     */
    #[JMS\Accessor(getter: 'getApplicableHeaderTradeSettlement', setter: 'setApplicableHeaderTradeSettlement')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ApplicableHeaderTradeSettlement')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\HeaderTradeSettlementType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $applicableHeaderTradeSettlement;

    /**
     * @return null|array<SupplyChainTradeLineItemType>
     */
    public function getIncludedSupplyChainTradeLineItem(): ?array
    {
        return $this->includedSupplyChainTradeLineItem;
    }

    /**
     * @param  null|array<SupplyChainTradeLineItemType> $includedSupplyChainTradeLineItem
     * @return static
     */
    public function setIncludedSupplyChainTradeLineItem(
        ?array $includedSupplyChainTradeLineItem = null
    ): static {
        $this->includedSupplyChainTradeLineItem = $includedSupplyChainTradeLineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIncludedSupplyChainTradeLineItem(): static
    {
        $this->includedSupplyChainTradeLineItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearIncludedSupplyChainTradeLineItem(): static
    {
        $this->includedSupplyChainTradeLineItem = [];

        return $this;
    }

    /**
     * @param  SupplyChainTradeLineItemType $includedSupplyChainTradeLineItem
     * @return static
     */
    public function addToIncludedSupplyChainTradeLineItem(
        SupplyChainTradeLineItemType $includedSupplyChainTradeLineItem,
    ): static {
        $this->includedSupplyChainTradeLineItem[] = $includedSupplyChainTradeLineItem;

        return $this;
    }

    /**
     * @return SupplyChainTradeLineItemType
     */
    public function addToIncludedSupplyChainTradeLineItemWithCreate(): SupplyChainTradeLineItemType
    {
        $this->addToIncludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItem = new SupplyChainTradeLineItemType());

        return $includedSupplyChainTradeLineItem;
    }

    /**
     * @param  SupplyChainTradeLineItemType $includedSupplyChainTradeLineItem
     * @return static
     */
    public function addOnceToIncludedSupplyChainTradeLineItem(
        SupplyChainTradeLineItemType $includedSupplyChainTradeLineItem,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->includedSupplyChainTradeLineItem)) {
            $this->includedSupplyChainTradeLineItem = [];
        }

        $this->includedSupplyChainTradeLineItem[0] = $includedSupplyChainTradeLineItem;

        return $this;
    }

    /**
     * @return SupplyChainTradeLineItemType
     */
    public function addOnceToIncludedSupplyChainTradeLineItemWithCreate(): SupplyChainTradeLineItemType
    {
        if (!InvoiceSuiteArrayUtils::is($this->includedSupplyChainTradeLineItem)) {
            $this->includedSupplyChainTradeLineItem = [];
        }

        if ([] === $this->includedSupplyChainTradeLineItem) {
            $this->addOnceToIncludedSupplyChainTradeLineItem(new SupplyChainTradeLineItemType());
        }

        return $this->includedSupplyChainTradeLineItem[0];
    }

    /**
     * @return null|HeaderTradeAgreementType
     */
    public function getApplicableHeaderTradeAgreement(): ?HeaderTradeAgreementType
    {
        return $this->applicableHeaderTradeAgreement;
    }

    /**
     * @return HeaderTradeAgreementType
     */
    public function getApplicableHeaderTradeAgreementWithCreate(): HeaderTradeAgreementType
    {
        $this->applicableHeaderTradeAgreement ??= new HeaderTradeAgreementType();

        return $this->applicableHeaderTradeAgreement;
    }

    /**
     * @param  null|HeaderTradeAgreementType $applicableHeaderTradeAgreement
     * @return static
     */
    public function setApplicableHeaderTradeAgreement(
        ?HeaderTradeAgreementType $applicableHeaderTradeAgreement = null,
    ): static {
        $this->applicableHeaderTradeAgreement = $applicableHeaderTradeAgreement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableHeaderTradeAgreement(): static
    {
        $this->applicableHeaderTradeAgreement = null;

        return $this;
    }

    /**
     * @return null|HeaderTradeDeliveryType
     */
    public function getApplicableHeaderTradeDelivery(): ?HeaderTradeDeliveryType
    {
        return $this->applicableHeaderTradeDelivery;
    }

    /**
     * @return HeaderTradeDeliveryType
     */
    public function getApplicableHeaderTradeDeliveryWithCreate(): HeaderTradeDeliveryType
    {
        $this->applicableHeaderTradeDelivery ??= new HeaderTradeDeliveryType();

        return $this->applicableHeaderTradeDelivery;
    }

    /**
     * @param  null|HeaderTradeDeliveryType $applicableHeaderTradeDelivery
     * @return static
     */
    public function setApplicableHeaderTradeDelivery(
        ?HeaderTradeDeliveryType $applicableHeaderTradeDelivery = null,
    ): static {
        $this->applicableHeaderTradeDelivery = $applicableHeaderTradeDelivery;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableHeaderTradeDelivery(): static
    {
        $this->applicableHeaderTradeDelivery = null;

        return $this;
    }

    /**
     * @return null|HeaderTradeSettlementType
     */
    public function getApplicableHeaderTradeSettlement(): ?HeaderTradeSettlementType
    {
        return $this->applicableHeaderTradeSettlement;
    }

    /**
     * @return HeaderTradeSettlementType
     */
    public function getApplicableHeaderTradeSettlementWithCreate(): HeaderTradeSettlementType
    {
        $this->applicableHeaderTradeSettlement ??= new HeaderTradeSettlementType();

        return $this->applicableHeaderTradeSettlement;
    }

    /**
     * @param  null|HeaderTradeSettlementType $applicableHeaderTradeSettlement
     * @return static
     */
    public function setApplicableHeaderTradeSettlement(
        ?HeaderTradeSettlementType $applicableHeaderTradeSettlement = null,
    ): static {
        $this->applicableHeaderTradeSettlement = $applicableHeaderTradeSettlement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableHeaderTradeSettlement(): static
    {
        $this->applicableHeaderTradeSettlement = null;

        return $this;
    }

    /**
     * @return null|SupplyChainTradeLineItemType
     */
    public function getLatestIncludedSupplyChainTradeLineItem(): ?SupplyChainTradeLineItemType
    {
        $supplyChainTradeLineItems = $this->getIncludedSupplyChainTradeLineItem() ?? [];
        $supplyChainTradeLineItem = end($supplyChainTradeLineItems);

        if (false === $supplyChainTradeLineItem) {
            return null;
        }

        return $supplyChainTradeLineItem;
    }

    /**
     * @return SupplyChainTradeLineItemType
     */
    public function getLatestIncludedSupplyChainTradeLineItemWithCreate(): SupplyChainTradeLineItemType
    {
        if (is_null($supplyChainTradeLineItem = $this->getLatestIncludedSupplyChainTradeLineItem())) {
            $supplyChainTradeLineItem = $this->addToIncludedSupplyChainTradeLineItemWithCreate();
        }

        return $supplyChainTradeLineItem;
    }

    /**
     * @return bool
     */
    public function hasLatestIncludedSupplyChainTradeLineItem(): bool
    {
        $supplyChainTradeLineItems = $this->getIncludedSupplyChainTradeLineItem() ?? [];

        return [] !== $supplyChainTradeLineItems;
    }

    /**
     * @return bool
     */
    public function hasNotLatestIncludedSupplyChainTradeLineItem(): bool
    {
        $supplyChainTradeLineItems = $this->getIncludedSupplyChainTradeLineItem() ?? [];

        return [] === $supplyChainTradeLineItems;
    }
}
