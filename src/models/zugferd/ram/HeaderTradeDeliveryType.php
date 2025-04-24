<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;

class HeaderTradeDeliveryType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\LogisticsTransportMovementType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\LogisticsTransportMovementType>")
     * @JMS\Expose
     * @JMS\SerializedName("RelatedSupplyChainConsignment")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=false, entry="SpecifiedLogisticsTransportMovement", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getRelatedSupplyChainConsignment", setter="setRelatedSupplyChainConsignment")
     */
    private $relatedSupplyChainConsignment;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
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
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ShipFromTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getShipFromTradeParty", setter="setShipFromTradeParty")
     */
    private $shipFromTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainEventType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\SupplyChainEventType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliverySupplyChainEvent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualDeliverySupplyChainEvent", setter="setActualDeliverySupplyChainEvent")
     */
    private $supplyChainEventType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDespatchAdviceReferencedDocument", setter="setDespatchAdviceReferencedDocument")
     */
    private $despatchAdviceReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
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
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\LogisticsTransportMovementType>|null
     */
    public function getRelatedSupplyChainConsignment(): ?array
    {
        return $this->relatedSupplyChainConsignment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\LogisticsTransportMovementType>
     * @return self
     */
    public function setRelatedSupplyChainConsignment(array $relatedSupplyChainConsignment): self
    {
        $this->relatedSupplyChainConsignment = $relatedSupplyChainConsignment;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRelatedSupplyChainConsignment(): self
    {
        $this->relatedSupplyChainConsignment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LogisticsTransportMovementType $logisticsTransportMovementType
     * @return self
     */
    public function addToRelatedSupplyChainConsignment(
        \horstoeko\invoicesuite\models\zugferd\ram\LogisticsTransportMovementType $logisticsTransportMovementType,
    ): self {
        $this->relatedSupplyChainConsignment[] = $logisticsTransportMovementType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LogisticsTransportMovementType
     */
    public function addToRelatedSupplyChainConsignmentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\LogisticsTransportMovementType {
        $this->addTorelatedSupplyChainConsignment($logisticsTransportMovementType = new LogisticsTransportMovementType());

        return $logisticsTransportMovementType;
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
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getShipFromTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->shipFromTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getShipFromTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->shipFromTradeParty = is_null($this->shipFromTradeParty) ? new TradePartyType() : $this->shipFromTradeParty;

        return $this->shipFromTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setShipFromTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->shipFromTradeParty = $tradePartyType;

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
