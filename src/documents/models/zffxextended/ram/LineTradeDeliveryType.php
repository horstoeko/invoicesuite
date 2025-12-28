<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType;
use JMS\Serializer\Annotation as JMS;

class LineTradeDeliveryType
{
    use HandlesObjectFlags;

    /**
     * @var null|QuantityType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BilledQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBilledQuantity", setter="setBilledQuantity")
     */
    private $billedQuantity;

    /**
     * @var null|QuantityType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeFreeQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeFreeQuantity", setter="setChargeFreeQuantity")
     */
    private $chargeFreeQuantity;

    /**
     * @var null|QuantityType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("PackageQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPackageQuantity", setter="setPackageQuantity")
     */
    private $packageQuantity;

    /**
     * @var null|QuantityType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("PerPackageUnitQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPerPackageUnitQuantity", setter="setPerPackageUnitQuantity")
     */
    private $perPackageUnitQuantity;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ShipToTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getShipToTradeParty", setter="setShipToTradeParty")
     */
    private $shipToTradeParty;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("UltimateShipToTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getUltimateShipToTradeParty", setter="setUltimateShipToTradeParty")
     */
    private $ultimateShipToTradeParty;

    /**
     * @var null|SupplyChainEventType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainEventType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliverySupplyChainEvent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualDeliverySupplyChainEvent", setter="setActualDeliverySupplyChainEvent")
     */
    private $actualDeliverySupplyChainEvent;

    /**
     * @var null|ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDespatchAdviceReferencedDocument", setter="setDespatchAdviceReferencedDocument")
     */
    private $despatchAdviceReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivingAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReceivingAdviceReferencedDocument", setter="setReceivingAdviceReferencedDocument")
     */
    private $receivingAdviceReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryNoteReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDeliveryNoteReferencedDocument", setter="setDeliveryNoteReferencedDocument")
     */
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
        $this->billedQuantity = is_null($this->billedQuantity) ? new QuantityType() : $this->billedQuantity;

        return $this->billedQuantity;
    }

    /**
     * @param  null|QuantityType $billedQuantity
     * @return static
     */
    public function setBilledQuantity(?QuantityType $billedQuantity = null): static
    {
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
        $this->chargeFreeQuantity = is_null($this->chargeFreeQuantity) ? new QuantityType() : $this->chargeFreeQuantity;

        return $this->chargeFreeQuantity;
    }

    /**
     * @param  null|QuantityType $chargeFreeQuantity
     * @return static
     */
    public function setChargeFreeQuantity(?QuantityType $chargeFreeQuantity = null): static
    {
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
        $this->packageQuantity = is_null($this->packageQuantity) ? new QuantityType() : $this->packageQuantity;

        return $this->packageQuantity;
    }

    /**
     * @param  null|QuantityType $packageQuantity
     * @return static
     */
    public function setPackageQuantity(?QuantityType $packageQuantity = null): static
    {
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
        $this->perPackageUnitQuantity = is_null($this->perPackageUnitQuantity) ? new QuantityType() : $this->perPackageUnitQuantity;

        return $this->perPackageUnitQuantity;
    }

    /**
     * @param  null|QuantityType $perPackageUnitQuantity
     * @return static
     */
    public function setPerPackageUnitQuantity(?QuantityType $perPackageUnitQuantity = null): static
    {
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
        $this->shipToTradeParty = is_null($this->shipToTradeParty) ? new TradePartyType() : $this->shipToTradeParty;

        return $this->shipToTradeParty;
    }

    /**
     * @param  null|TradePartyType $shipToTradeParty
     * @return static
     */
    public function setShipToTradeParty(?TradePartyType $shipToTradeParty = null): static
    {
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
        $this->ultimateShipToTradeParty = is_null($this->ultimateShipToTradeParty) ? new TradePartyType() : $this->ultimateShipToTradeParty;

        return $this->ultimateShipToTradeParty;
    }

    /**
     * @param  null|TradePartyType $ultimateShipToTradeParty
     * @return static
     */
    public function setUltimateShipToTradeParty(?TradePartyType $ultimateShipToTradeParty = null): static
    {
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
        $this->actualDeliverySupplyChainEvent = is_null($this->actualDeliverySupplyChainEvent) ? new SupplyChainEventType() : $this->actualDeliverySupplyChainEvent;

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
        $this->despatchAdviceReferencedDocument = is_null($this->despatchAdviceReferencedDocument) ? new ReferencedDocumentType() : $this->despatchAdviceReferencedDocument;

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
        $this->receivingAdviceReferencedDocument = is_null($this->receivingAdviceReferencedDocument) ? new ReferencedDocumentType() : $this->receivingAdviceReferencedDocument;

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
        $this->deliveryNoteReferencedDocument = is_null($this->deliveryNoteReferencedDocument) ? new ReferencedDocumentType() : $this->deliveryNoteReferencedDocument;

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
