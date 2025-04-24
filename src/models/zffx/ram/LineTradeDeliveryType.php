<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\QuantityType;

class LineTradeDeliveryType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BilledQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBilledQuantity", setter="setBilledQuantity")
     */
    private $billedQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeFreeQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeFreeQuantity", setter="setChargeFreeQuantity")
     */
    private $chargeFreeQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("PackageQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPackageQuantity", setter="setPackageQuantity")
     */
    private $packageQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ShipToTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getShipToTradeParty", setter="setShipToTradeParty")
     */
    private $shipToTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("UltimateShipToTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getUltimateShipToTradeParty", setter="setUltimateShipToTradeParty")
     */
    private $ultimateShipToTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\SupplyChainEventType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\SupplyChainEventType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliverySupplyChainEvent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualDeliverySupplyChainEvent", setter="setActualDeliverySupplyChainEvent")
     */
    private $supplyChainEventType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDespatchAdviceReferencedDocument", setter="setDespatchAdviceReferencedDocument")
     */
    private $despatchAdviceReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivingAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReceivingAdviceReferencedDocument", setter="setReceivingAdviceReferencedDocument")
     */
    private $receivingAdviceReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryNoteReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDeliveryNoteReferencedDocument", setter="setDeliveryNoteReferencedDocument")
     */
    private $deliveryNoteReferencedDocument;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType|null
     */
    public function getBilledQuantity(): ?QuantityType
    {
        return $this->billedQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     */
    public function getBilledQuantityWithCreate(): QuantityType
    {
        $this->billedQuantity = is_null($this->billedQuantity) ? new QuantityType() : $this->billedQuantity;

        return $this->billedQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\QuantityType $quantityType
     * @return self
     */
    public function setBilledQuantity(QuantityType $quantityType): self
    {
        $this->billedQuantity = $quantityType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType|null
     */
    public function getChargeFreeQuantity(): ?QuantityType
    {
        return $this->chargeFreeQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     */
    public function getChargeFreeQuantityWithCreate(): QuantityType
    {
        $this->chargeFreeQuantity = is_null($this->chargeFreeQuantity) ? new QuantityType() : $this->chargeFreeQuantity;

        return $this->chargeFreeQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\QuantityType $quantityType
     * @return self
     */
    public function setChargeFreeQuantity(QuantityType $quantityType): self
    {
        $this->chargeFreeQuantity = $quantityType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType|null
     */
    public function getPackageQuantity(): ?QuantityType
    {
        return $this->packageQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     */
    public function getPackageQuantityWithCreate(): QuantityType
    {
        $this->packageQuantity = is_null($this->packageQuantity) ? new QuantityType() : $this->packageQuantity;

        return $this->packageQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\QuantityType $quantityType
     * @return self
     */
    public function setPackageQuantity(QuantityType $quantityType): self
    {
        $this->packageQuantity = $quantityType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getShipToTradeParty(): ?TradePartyType
    {
        return $this->shipToTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getShipToTradePartyWithCreate(): TradePartyType
    {
        $this->shipToTradeParty = is_null($this->shipToTradeParty) ? new TradePartyType() : $this->shipToTradeParty;

        return $this->shipToTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setShipToTradeParty(TradePartyType $tradePartyType): self
    {
        $this->shipToTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getUltimateShipToTradeParty(): ?TradePartyType
    {
        return $this->ultimateShipToTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getUltimateShipToTradePartyWithCreate(): TradePartyType
    {
        $this->ultimateShipToTradeParty = is_null($this->ultimateShipToTradeParty) ? new TradePartyType() : $this->ultimateShipToTradeParty;

        return $this->ultimateShipToTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setUltimateShipToTradeParty(TradePartyType $tradePartyType): self
    {
        $this->ultimateShipToTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\SupplyChainEventType|null
     */
    public function getActualDeliverySupplyChainEvent(): ?SupplyChainEventType
    {
        return $this->supplyChainEventType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\SupplyChainEventType
     */
    public function getActualDeliverySupplyChainEventWithCreate(): SupplyChainEventType
    {
        $this->supplyChainEventType = is_null($this->supplyChainEventType) ? new SupplyChainEventType() : $this->supplyChainEventType;

        return $this->supplyChainEventType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\SupplyChainEventType $supplyChainEventType
     * @return self
     */
    public function setActualDeliverySupplyChainEvent(SupplyChainEventType $supplyChainEventType): self
    {
        $this->supplyChainEventType = $supplyChainEventType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType|null
     */
    public function getDespatchAdviceReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->despatchAdviceReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function getDespatchAdviceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->despatchAdviceReferencedDocument = is_null($this->despatchAdviceReferencedDocument) ? new ReferencedDocumentType() : $this->despatchAdviceReferencedDocument;

        return $this->despatchAdviceReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function setDespatchAdviceReferencedDocument(
        ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->despatchAdviceReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType|null
     */
    public function getReceivingAdviceReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->receivingAdviceReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function getReceivingAdviceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->receivingAdviceReferencedDocument = is_null($this->receivingAdviceReferencedDocument) ? new ReferencedDocumentType() : $this->receivingAdviceReferencedDocument;

        return $this->receivingAdviceReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function setReceivingAdviceReferencedDocument(
        ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->receivingAdviceReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType|null
     */
    public function getDeliveryNoteReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->deliveryNoteReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function getDeliveryNoteReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->deliveryNoteReferencedDocument = is_null($this->deliveryNoteReferencedDocument) ? new ReferencedDocumentType() : $this->deliveryNoteReferencedDocument;

        return $this->deliveryNoteReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function setDeliveryNoteReferencedDocument(ReferencedDocumentType $referencedDocumentType): self
    {
        $this->deliveryNoteReferencedDocument = $referencedDocumentType;

        return $this;
    }
}
