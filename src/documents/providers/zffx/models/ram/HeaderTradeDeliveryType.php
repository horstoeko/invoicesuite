<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class HeaderTradeDeliveryType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<LogisticsTransportMovementType>
     */
    #[JMS\Accessor(getter: 'getRelatedSupplyChainConsignment', setter: 'setRelatedSupplyChainConsignment')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('RelatedSupplyChainConsignment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\LogisticsTransportMovementType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: false, entry: 'SpecifiedLogisticsTransportMovement', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $relatedSupplyChainConsignment;

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
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getShipFromTradeParty', setter: 'setShipFromTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ShipFromTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $shipFromTradeParty;

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
     * @return null|array<LogisticsTransportMovementType>
     */
    public function getRelatedSupplyChainConsignment(): ?array
    {
        return $this->relatedSupplyChainConsignment;
    }

    /**
     * @param  null|array<LogisticsTransportMovementType> $relatedSupplyChainConsignment
     * @return static
     */
    public function setRelatedSupplyChainConsignment(
        ?array $relatedSupplyChainConsignment = null
    ): static {
        $this->relatedSupplyChainConsignment = $relatedSupplyChainConsignment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRelatedSupplyChainConsignment(): static
    {
        $this->relatedSupplyChainConsignment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRelatedSupplyChainConsignment(): static
    {
        $this->relatedSupplyChainConsignment = [];

        return $this;
    }

    /**
     * @param  LogisticsTransportMovementType $relatedSupplyChainConsignment
     * @return static
     */
    public function addToRelatedSupplyChainConsignment(
        LogisticsTransportMovementType $relatedSupplyChainConsignment,
    ): static {
        $this->relatedSupplyChainConsignment[] = $relatedSupplyChainConsignment;

        return $this;
    }

    /**
     * @return LogisticsTransportMovementType
     */
    public function addToRelatedSupplyChainConsignmentWithCreate(): LogisticsTransportMovementType
    {
        $this->addTorelatedSupplyChainConsignment($relatedSupplyChainConsignment = new LogisticsTransportMovementType());

        return $relatedSupplyChainConsignment;
    }

    /**
     * @param  LogisticsTransportMovementType $relatedSupplyChainConsignment
     * @return static
     */
    public function addOnceToRelatedSupplyChainConsignment(
        LogisticsTransportMovementType $relatedSupplyChainConsignment,
    ): static {
        if (!is_array($this->relatedSupplyChainConsignment)) {
            $this->relatedSupplyChainConsignment = [];
        }

        $this->relatedSupplyChainConsignment[0] = $relatedSupplyChainConsignment;

        return $this;
    }

    /**
     * @return LogisticsTransportMovementType
     */
    public function addOnceToRelatedSupplyChainConsignmentWithCreate(): LogisticsTransportMovementType
    {
        if (!is_array($this->relatedSupplyChainConsignment)) {
            $this->relatedSupplyChainConsignment = [];
        }

        if ([] === $this->relatedSupplyChainConsignment) {
            $this->addOnceTorelatedSupplyChainConsignment(new LogisticsTransportMovementType());
        }

        return $this->relatedSupplyChainConsignment[0];
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
     * @return null|TradePartyType
     */
    public function getShipFromTradeParty(): ?TradePartyType
    {
        return $this->shipFromTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getShipFromTradePartyWithCreate(): TradePartyType
    {
        $this->shipFromTradeParty ??= new TradePartyType();

        return $this->shipFromTradeParty;
    }

    /**
     * @param  null|TradePartyType $shipFromTradeParty
     * @return static
     */
    public function setShipFromTradeParty(
        ?TradePartyType $shipFromTradeParty = null
    ): static {
        $this->shipFromTradeParty = $shipFromTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipFromTradeParty(): static
    {
        $this->shipFromTradeParty = null;

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
