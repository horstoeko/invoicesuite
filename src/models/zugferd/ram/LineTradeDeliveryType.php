<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\QuantityType;

class LineTradeDeliveryType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BilledQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBilledQuantity", setter="setBilledQuantity")
     */
    private $billedQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeFreeQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeFreeQuantity", setter="setChargeFreeQuantity")
     */
    private $chargeFreeQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("PackageQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPackageQuantity", setter="setPackageQuantity")
     */
    private $packageQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ShipToTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getShipToTradeParty", setter="setShipToTradeParty")
     */
    private $shipToTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("UltimateShipToTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getUltimateShipToTradeParty", setter="setUltimateShipToTradeParty")
     */
    private $ultimateShipToTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainEventType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\SupplyChainEventType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliverySupplyChainEvent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualDeliverySupplyChainEvent", setter="setActualDeliverySupplyChainEvent")
     */
    private $supplyChainEventType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDespatchAdviceReferencedDocument", setter="setDespatchAdviceReferencedDocument")
     */
    private $despatchAdviceReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivingAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReceivingAdviceReferencedDocument", setter="setReceivingAdviceReferencedDocument")
     */
    private $receivingAdviceReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryNoteReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDeliveryNoteReferencedDocument", setter="setDeliveryNoteReferencedDocument")
     */
    private $deliveryNoteReferencedDocument;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType|null
     */
    public function getBilledQuantity(): ?\horstoeko\invoicesuite\models\zugferd\udt\QuantityType
    {
        return $this->billedQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     */
    public function getBilledQuantityWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
    {
        $this->billedQuantity = is_null($this->billedQuantity) ? new QuantityType() : $this->billedQuantity;

        return $this->billedQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @return self
     */
    public function setBilledQuantity(\horstoeko\invoicesuite\models\zugferd\udt\QuantityType $quantityType): self
    {
        $this->billedQuantity = $quantityType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType|null
     */
    public function getChargeFreeQuantity(): ?\horstoeko\invoicesuite\models\zugferd\udt\QuantityType
    {
        return $this->chargeFreeQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     */
    public function getChargeFreeQuantityWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
    {
        $this->chargeFreeQuantity = is_null($this->chargeFreeQuantity) ? new QuantityType() : $this->chargeFreeQuantity;

        return $this->chargeFreeQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @return self
     */
    public function setChargeFreeQuantity(
        \horstoeko\invoicesuite\models\zugferd\udt\QuantityType $quantityType,
    ): self {
        $this->chargeFreeQuantity = $quantityType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType|null
     */
    public function getPackageQuantity(): ?\horstoeko\invoicesuite\models\zugferd\udt\QuantityType
    {
        return $this->packageQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     */
    public function getPackageQuantityWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
    {
        $this->packageQuantity = is_null($this->packageQuantity) ? new QuantityType() : $this->packageQuantity;

        return $this->packageQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @return self
     */
    public function setPackageQuantity(\horstoeko\invoicesuite\models\zugferd\udt\QuantityType $quantityType): self
    {
        $this->packageQuantity = $quantityType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getShipToTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->shipToTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getShipToTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->shipToTradeParty = is_null($this->shipToTradeParty) ? new TradePartyType() : $this->shipToTradeParty;

        return $this->shipToTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setShipToTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->shipToTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getUltimateShipToTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->ultimateShipToTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getUltimateShipToTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->ultimateShipToTradeParty = is_null($this->ultimateShipToTradeParty) ? new TradePartyType() : $this->ultimateShipToTradeParty;

        return $this->ultimateShipToTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setUltimateShipToTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->ultimateShipToTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainEventType|null
     */
    public function getActualDeliverySupplyChainEvent(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\SupplyChainEventType {
        return $this->supplyChainEventType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainEventType
     */
    public function getActualDeliverySupplyChainEventWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainEventType {
        $this->supplyChainEventType = is_null($this->supplyChainEventType) ? new SupplyChainEventType() : $this->supplyChainEventType;

        return $this->supplyChainEventType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainEventType
     * @return self
     */
    public function setActualDeliverySupplyChainEvent(
        \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainEventType $supplyChainEventType,
    ): self {
        $this->supplyChainEventType = $supplyChainEventType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getDespatchAdviceReferencedDocument(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        return $this->despatchAdviceReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getDespatchAdviceReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->despatchAdviceReferencedDocument = is_null($this->despatchAdviceReferencedDocument) ? new ReferencedDocumentType() : $this->despatchAdviceReferencedDocument;

        return $this->despatchAdviceReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setDespatchAdviceReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->despatchAdviceReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getReceivingAdviceReferencedDocument(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        return $this->receivingAdviceReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getReceivingAdviceReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->receivingAdviceReferencedDocument = is_null($this->receivingAdviceReferencedDocument) ? new ReferencedDocumentType() : $this->receivingAdviceReferencedDocument;

        return $this->receivingAdviceReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setReceivingAdviceReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->receivingAdviceReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getDeliveryNoteReferencedDocument(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        return $this->deliveryNoteReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getDeliveryNoteReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->deliveryNoteReferencedDocument = is_null($this->deliveryNoteReferencedDocument) ? new ReferencedDocumentType() : $this->deliveryNoteReferencedDocument;

        return $this->deliveryNoteReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setDeliveryNoteReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->deliveryNoteReferencedDocument = $referencedDocumentType;

        return $this;
    }
}
