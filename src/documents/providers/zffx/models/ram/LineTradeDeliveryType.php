<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType;
use JMS\Serializer\Annotation as JMS;

class LineTradeDeliveryType
{
    use HandlesObjectFlags;

    /**
     * @var null|QuantityType
     */
    #[JMS\Accessor(getter: 'getBilledQuantity', setter: 'setBilledQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BilledQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $billedQuantity;

    /**
     * @var null|QuantityType
     */
    #[JMS\Accessor(getter: 'getChargeFreeQuantity', setter: 'setChargeFreeQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ChargeFreeQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $chargeFreeQuantity;

    /**
     * @var null|QuantityType
     */
    #[JMS\Accessor(getter: 'getPackageQuantity', setter: 'setPackageQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PackageQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $packageQuantity;

    /**
     * @var null|QuantityType
     */
    #[JMS\Accessor(getter: 'getPerPackageUnitQuantity', setter: 'setPerPackageUnitQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PerPackageUnitQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $perPackageUnitQuantity;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getShipToTradeParty', setter: 'setShipToTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ShipToTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $shipToTradeParty;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getUltimateShipToTradeParty', setter: 'setUltimateShipToTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('UltimateShipToTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $ultimateShipToTradeParty;

    /**
     * @var null|SupplyChainEventType
     */
    #[JMS\Accessor(getter: 'getActualDeliverySupplyChainEvent', setter: 'setActualDeliverySupplyChainEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ActualDeliverySupplyChainEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainEventType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $actualDeliverySupplyChainEvent;

    /**
     * @var null|ReferencedDocumentType
     */
    #[JMS\Accessor(getter: 'getDespatchAdviceReferencedDocument', setter: 'setDespatchAdviceReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DespatchAdviceReferencedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $despatchAdviceReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     */
    #[JMS\Accessor(getter: 'getReceivingAdviceReferencedDocument', setter: 'setReceivingAdviceReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ReceivingAdviceReferencedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $receivingAdviceReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     */
    #[JMS\Accessor(getter: 'getDeliveryNoteReferencedDocument', setter: 'setDeliveryNoteReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DeliveryNoteReferencedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $deliveryNoteReferencedDocument;

    /**
     * @return null|QuantityType
     */
    public function getBilledQuantity(): ?QuantityType
    {
        return $this->billedQuantity;
    }

    /**
     * @return QuantityType
     */
    public function getBilledQuantityWithCreate(): QuantityType
    {
        $this->billedQuantity ??= new QuantityType();

        return $this->billedQuantity;
    }

    /**
     * @param  null|QuantityType $billedQuantity
     * @return static
     */
    public function setBilledQuantity(
        ?QuantityType $billedQuantity = null
    ): static {
        $this->billedQuantity = $billedQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBilledQuantity(): static
    {
        $this->billedQuantity = null;

        return $this;
    }

    /**
     * @return null|QuantityType
     */
    public function getChargeFreeQuantity(): ?QuantityType
    {
        return $this->chargeFreeQuantity;
    }

    /**
     * @return QuantityType
     */
    public function getChargeFreeQuantityWithCreate(): QuantityType
    {
        $this->chargeFreeQuantity ??= new QuantityType();

        return $this->chargeFreeQuantity;
    }

    /**
     * @param  null|QuantityType $chargeFreeQuantity
     * @return static
     */
    public function setChargeFreeQuantity(
        ?QuantityType $chargeFreeQuantity = null
    ): static {
        $this->chargeFreeQuantity = $chargeFreeQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChargeFreeQuantity(): static
    {
        $this->chargeFreeQuantity = null;

        return $this;
    }

    /**
     * @return null|QuantityType
     */
    public function getPackageQuantity(): ?QuantityType
    {
        return $this->packageQuantity;
    }

    /**
     * @return QuantityType
     */
    public function getPackageQuantityWithCreate(): QuantityType
    {
        $this->packageQuantity ??= new QuantityType();

        return $this->packageQuantity;
    }

    /**
     * @param  null|QuantityType $packageQuantity
     * @return static
     */
    public function setPackageQuantity(
        ?QuantityType $packageQuantity = null
    ): static {
        $this->packageQuantity = $packageQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackageQuantity(): static
    {
        $this->packageQuantity = null;

        return $this;
    }

    /**
     * @return null|QuantityType
     */
    public function getPerPackageUnitQuantity(): ?QuantityType
    {
        return $this->perPackageUnitQuantity;
    }

    /**
     * @return QuantityType
     */
    public function getPerPackageUnitQuantityWithCreate(): QuantityType
    {
        $this->perPackageUnitQuantity ??= new QuantityType();

        return $this->perPackageUnitQuantity;
    }

    /**
     * @param  null|QuantityType $perPackageUnitQuantity
     * @return static
     */
    public function setPerPackageUnitQuantity(
        ?QuantityType $perPackageUnitQuantity = null
    ): static {
        $this->perPackageUnitQuantity = $perPackageUnitQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPerPackageUnitQuantity(): static
    {
        $this->perPackageUnitQuantity = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getShipToTradeParty(): ?TradePartyType
    {
        return $this->shipToTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getShipToTradePartyWithCreate(): TradePartyType
    {
        $this->shipToTradeParty ??= new TradePartyType();

        return $this->shipToTradeParty;
    }

    /**
     * @param  null|TradePartyType $shipToTradeParty
     * @return static
     */
    public function setShipToTradeParty(
        ?TradePartyType $shipToTradeParty = null
    ): static {
        $this->shipToTradeParty = $shipToTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipToTradeParty(): static
    {
        $this->shipToTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getUltimateShipToTradeParty(): ?TradePartyType
    {
        return $this->ultimateShipToTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getUltimateShipToTradePartyWithCreate(): TradePartyType
    {
        $this->ultimateShipToTradeParty ??= new TradePartyType();

        return $this->ultimateShipToTradeParty;
    }

    /**
     * @param  null|TradePartyType $ultimateShipToTradeParty
     * @return static
     */
    public function setUltimateShipToTradeParty(
        ?TradePartyType $ultimateShipToTradeParty = null
    ): static {
        $this->ultimateShipToTradeParty = $ultimateShipToTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUltimateShipToTradeParty(): static
    {
        $this->ultimateShipToTradeParty = null;

        return $this;
    }

    /**
     * @return null|SupplyChainEventType
     */
    public function getActualDeliverySupplyChainEvent(): ?SupplyChainEventType
    {
        return $this->actualDeliverySupplyChainEvent;
    }

    /**
     * @return SupplyChainEventType
     */
    public function getActualDeliverySupplyChainEventWithCreate(): SupplyChainEventType
    {
        $this->actualDeliverySupplyChainEvent ??= new SupplyChainEventType();

        return $this->actualDeliverySupplyChainEvent;
    }

    /**
     * @param  null|SupplyChainEventType $actualDeliverySupplyChainEvent
     * @return static
     */
    public function setActualDeliverySupplyChainEvent(
        ?SupplyChainEventType $actualDeliverySupplyChainEvent = null,
    ): static {
        $this->actualDeliverySupplyChainEvent = $actualDeliverySupplyChainEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualDeliverySupplyChainEvent(): static
    {
        $this->actualDeliverySupplyChainEvent = null;

        return $this;
    }

    /**
     * @return null|ReferencedDocumentType
     */
    public function getDespatchAdviceReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->despatchAdviceReferencedDocument;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function getDespatchAdviceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->despatchAdviceReferencedDocument ??= new ReferencedDocumentType();

        return $this->despatchAdviceReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $despatchAdviceReferencedDocument
     * @return static
     */
    public function setDespatchAdviceReferencedDocument(
        ?ReferencedDocumentType $despatchAdviceReferencedDocument = null,
    ): static {
        $this->despatchAdviceReferencedDocument = $despatchAdviceReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatchAdviceReferencedDocument(): static
    {
        $this->despatchAdviceReferencedDocument = null;

        return $this;
    }

    /**
     * @return null|ReferencedDocumentType
     */
    public function getReceivingAdviceReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->receivingAdviceReferencedDocument;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function getReceivingAdviceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->receivingAdviceReferencedDocument ??= new ReferencedDocumentType();

        return $this->receivingAdviceReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $receivingAdviceReferencedDocument
     * @return static
     */
    public function setReceivingAdviceReferencedDocument(
        ?ReferencedDocumentType $receivingAdviceReferencedDocument = null,
    ): static {
        $this->receivingAdviceReferencedDocument = $receivingAdviceReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivingAdviceReferencedDocument(): static
    {
        $this->receivingAdviceReferencedDocument = null;

        return $this;
    }

    /**
     * @return null|ReferencedDocumentType
     */
    public function getDeliveryNoteReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->deliveryNoteReferencedDocument;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function getDeliveryNoteReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->deliveryNoteReferencedDocument ??= new ReferencedDocumentType();

        return $this->deliveryNoteReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $deliveryNoteReferencedDocument
     * @return static
     */
    public function setDeliveryNoteReferencedDocument(
        ?ReferencedDocumentType $deliveryNoteReferencedDocument = null,
    ): static {
        $this->deliveryNoteReferencedDocument = $deliveryNoteReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryNoteReferencedDocument(): static
    {
        $this->deliveryNoteReferencedDocument = null;

        return $this;
    }
}
