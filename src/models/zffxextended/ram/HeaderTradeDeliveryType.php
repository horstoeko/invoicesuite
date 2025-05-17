<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;

class HeaderTradeDeliveryType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType>")
     * @JMS\Expose
     * @JMS\SerializedName("RelatedSupplyChainConsignment")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=false, entry="SpecifiedLogisticsTransportMovement", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getRelatedSupplyChainConsignment", setter="setRelatedSupplyChainConsignment")
     */
    private $relatedSupplyChainConsignment;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ShipToTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getShipToTradeParty", setter="setShipToTradeParty")
     */
    private $shipToTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("UltimateShipToTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getUltimateShipToTradeParty", setter="setUltimateShipToTradeParty")
     */
    private $ultimateShipToTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ShipFromTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getShipFromTradeParty", setter="setShipFromTradeParty")
     */
    private $shipFromTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\SupplyChainEventType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\SupplyChainEventType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliverySupplyChainEvent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualDeliverySupplyChainEvent", setter="setActualDeliverySupplyChainEvent")
     */
    private $actualDeliverySupplyChainEvent;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDespatchAdviceReferencedDocument", setter="setDespatchAdviceReferencedDocument")
     */
    private $despatchAdviceReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivingAdviceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReceivingAdviceReferencedDocument", setter="setReceivingAdviceReferencedDocument")
     */
    private $receivingAdviceReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryNoteReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDeliveryNoteReferencedDocument", setter="setDeliveryNoteReferencedDocument")
     */
    private $deliveryNoteReferencedDocument;

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType>|null
     */
    public function getRelatedSupplyChainConsignment(): ?array
    {
        return $this->relatedSupplyChainConsignment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType> $relatedSupplyChainConsignment
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
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType $relatedSupplyChainConsignment
     * @return self
     */
    public function addToRelatedSupplyChainConsignment(
        LogisticsTransportMovementType $relatedSupplyChainConsignment,
    ): self {
        $this->relatedSupplyChainConsignment[] = $relatedSupplyChainConsignment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType
     */
    public function addToRelatedSupplyChainConsignmentWithCreate(): LogisticsTransportMovementType
    {
        $this->addTorelatedSupplyChainConsignment($relatedSupplyChainConsignment = new LogisticsTransportMovementType());

        return $relatedSupplyChainConsignment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType $relatedSupplyChainConsignment
     * @return self
     */
    public function addOnceToRelatedSupplyChainConsignment(
        LogisticsTransportMovementType $relatedSupplyChainConsignment,
    ): self {
        if (!is_array($this->relatedSupplyChainConsignment)) {
            $this->relatedSupplyChainConsignment = [];
        }

        $this->relatedSupplyChainConsignment[0] = $relatedSupplyChainConsignment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType
     */
    public function addOnceToRelatedSupplyChainConsignmentWithCreate(): LogisticsTransportMovementType
    {
        if (!is_array($this->relatedSupplyChainConsignment)) {
            $this->relatedSupplyChainConsignment = [];
        }

        if ($this->relatedSupplyChainConsignment === []) {
            $this->addOnceTorelatedSupplyChainConsignment(new LogisticsTransportMovementType());
        }

        return $this->relatedSupplyChainConsignment[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType|null
     */
    public function getShipToTradeParty(): ?TradePartyType
    {
        return $this->shipToTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType
     */
    public function getShipToTradePartyWithCreate(): TradePartyType
    {
        $this->shipToTradeParty = is_null($this->shipToTradeParty) ? new TradePartyType() : $this->shipToTradeParty;

        return $this->shipToTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType $shipToTradeParty
     * @return self
     */
    public function setShipToTradeParty(TradePartyType $shipToTradeParty): self
    {
        $this->shipToTradeParty = $shipToTradeParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType|null
     */
    public function getUltimateShipToTradeParty(): ?TradePartyType
    {
        return $this->ultimateShipToTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType
     */
    public function getUltimateShipToTradePartyWithCreate(): TradePartyType
    {
        $this->ultimateShipToTradeParty = is_null($this->ultimateShipToTradeParty) ? new TradePartyType() : $this->ultimateShipToTradeParty;

        return $this->ultimateShipToTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType $ultimateShipToTradeParty
     * @return self
     */
    public function setUltimateShipToTradeParty(TradePartyType $ultimateShipToTradeParty): self
    {
        $this->ultimateShipToTradeParty = $ultimateShipToTradeParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType|null
     */
    public function getShipFromTradeParty(): ?TradePartyType
    {
        return $this->shipFromTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType
     */
    public function getShipFromTradePartyWithCreate(): TradePartyType
    {
        $this->shipFromTradeParty = is_null($this->shipFromTradeParty) ? new TradePartyType() : $this->shipFromTradeParty;

        return $this->shipFromTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradePartyType $shipFromTradeParty
     * @return self
     */
    public function setShipFromTradeParty(TradePartyType $shipFromTradeParty): self
    {
        $this->shipFromTradeParty = $shipFromTradeParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\SupplyChainEventType|null
     */
    public function getActualDeliverySupplyChainEvent(): ?SupplyChainEventType
    {
        return $this->actualDeliverySupplyChainEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\SupplyChainEventType
     */
    public function getActualDeliverySupplyChainEventWithCreate(): SupplyChainEventType
    {
        $this->actualDeliverySupplyChainEvent = is_null($this->actualDeliverySupplyChainEvent) ? new SupplyChainEventType() : $this->actualDeliverySupplyChainEvent;

        return $this->actualDeliverySupplyChainEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\SupplyChainEventType $actualDeliverySupplyChainEvent
     * @return self
     */
    public function setActualDeliverySupplyChainEvent(SupplyChainEventType $actualDeliverySupplyChainEvent): self
    {
        $this->actualDeliverySupplyChainEvent = $actualDeliverySupplyChainEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType|null
     */
    public function getDespatchAdviceReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->despatchAdviceReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
     */
    public function getDespatchAdviceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->despatchAdviceReferencedDocument = is_null($this->despatchAdviceReferencedDocument) ? new ReferencedDocumentType() : $this->despatchAdviceReferencedDocument;

        return $this->despatchAdviceReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType $despatchAdviceReferencedDocument
     * @return self
     */
    public function setDespatchAdviceReferencedDocument(
        ReferencedDocumentType $despatchAdviceReferencedDocument,
    ): self {
        $this->despatchAdviceReferencedDocument = $despatchAdviceReferencedDocument;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType|null
     */
    public function getReceivingAdviceReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->receivingAdviceReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
     */
    public function getReceivingAdviceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->receivingAdviceReferencedDocument = is_null($this->receivingAdviceReferencedDocument) ? new ReferencedDocumentType() : $this->receivingAdviceReferencedDocument;

        return $this->receivingAdviceReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType $receivingAdviceReferencedDocument
     * @return self
     */
    public function setReceivingAdviceReferencedDocument(
        ReferencedDocumentType $receivingAdviceReferencedDocument,
    ): self {
        $this->receivingAdviceReferencedDocument = $receivingAdviceReferencedDocument;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType|null
     */
    public function getDeliveryNoteReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->deliveryNoteReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
     */
    public function getDeliveryNoteReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->deliveryNoteReferencedDocument = is_null($this->deliveryNoteReferencedDocument) ? new ReferencedDocumentType() : $this->deliveryNoteReferencedDocument;

        return $this->deliveryNoteReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType $deliveryNoteReferencedDocument
     * @return self
     */
    public function setDeliveryNoteReferencedDocument(ReferencedDocumentType $deliveryNoteReferencedDocument): self
    {
        $this->deliveryNoteReferencedDocument = $deliveryNoteReferencedDocument;

        return $this;
    }
}
