<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;

class HeaderTradeDeliveryType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType>")
     * @JMS\Expose
     * @JMS\SerializedName("RelatedSupplyChainConsignment")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=false, entry="SpecifiedLogisticsTransportMovement", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getRelatedSupplyChainConsignment", setter="setRelatedSupplyChainConsignment")
     */
    private $relatedSupplyChainConsignment;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
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
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ShipFromTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getShipFromTradeParty", setter="setShipFromTradeParty")
     */
    private $shipFromTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\SupplyChainEventType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\SupplyChainEventType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliverySupplyChainEvent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualDeliverySupplyChainEvent", setter="setActualDeliverySupplyChainEvent")
     */
    private $supplyChainEventType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDespatchAdviceReferencedDocument", setter="setDespatchAdviceReferencedDocument")
     */
    private $despatchAdviceReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
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
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType>|null
     */
    public function getRelatedSupplyChainConsignment(): ?array
    {
        return $this->relatedSupplyChainConsignment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType> $relatedSupplyChainConsignment
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType $logisticsTransportMovementType
     * @return self
     */
    public function addToRelatedSupplyChainConsignment(
        LogisticsTransportMovementType $logisticsTransportMovementType,
    ): self {
        $this->relatedSupplyChainConsignment[] = $logisticsTransportMovementType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType
     */
    public function addToRelatedSupplyChainConsignmentWithCreate(): LogisticsTransportMovementType
    {
        $this->addTorelatedSupplyChainConsignment($logisticsTransportMovementType = new LogisticsTransportMovementType());

        return $logisticsTransportMovementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType $logisticsTransportMovementType
     * @return self
     */
    public function addOnceToRelatedSupplyChainConsignment(
        LogisticsTransportMovementType $logisticsTransportMovementType,
    ): self {
        $this->relatedSupplyChainConsignment[0] = $logisticsTransportMovementType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType
     */
    public function addOnceToRelatedSupplyChainConsignmentWithCreate(): LogisticsTransportMovementType
    {
        if ($this->relatedSupplyChainConsignment === []) {
            $this->addOnceTorelatedSupplyChainConsignment(new LogisticsTransportMovementType());
        }

        return $this->relatedSupplyChainConsignment[0];
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
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getShipFromTradeParty(): ?TradePartyType
    {
        return $this->shipFromTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getShipFromTradePartyWithCreate(): TradePartyType
    {
        $this->shipFromTradeParty = is_null($this->shipFromTradeParty) ? new TradePartyType() : $this->shipFromTradeParty;

        return $this->shipFromTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setShipFromTradeParty(TradePartyType $tradePartyType): self
    {
        $this->shipFromTradeParty = $tradePartyType;

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
