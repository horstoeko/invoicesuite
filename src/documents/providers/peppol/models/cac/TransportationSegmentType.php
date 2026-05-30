<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportExecutionPlanReferenceID;
use JMS\Serializer\Annotation as JMS;

class TransportationSegmentType
{
    use HandlesObjectFlags;

    /**
     * @var null|SequenceNumeric
     */
    #[JMS\Accessor(getter: 'getSequenceNumeric', setter: 'setSequenceNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SequenceNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sequenceNumeric;

    /**
     * @var null|TransportExecutionPlanReferenceID
     */
    #[JMS\Accessor(getter: 'getTransportExecutionPlanReferenceID', setter: 'setTransportExecutionPlanReferenceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportExecutionPlanReferenceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportExecutionPlanReferenceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $transportExecutionPlanReferenceID;

    /**
     * @var null|TransportationService
     */
    #[JMS\Accessor(getter: 'getTransportationService', setter: 'setTransportationService')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportationService')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportationService')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $transportationService;

    /**
     * @var null|TransportServiceProviderParty
     */
    #[JMS\Accessor(getter: 'getTransportServiceProviderParty', setter: 'setTransportServiceProviderParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportServiceProviderParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportServiceProviderParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $transportServiceProviderParty;

    /**
     * @var null|ReferencedConsignment
     */
    #[JMS\Accessor(getter: 'getReferencedConsignment', setter: 'setReferencedConsignment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReferencedConsignment')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ReferencedConsignment')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $referencedConsignment;

    /**
     * @var null|array<ShipmentStage>
     */
    #[JMS\Accessor(getter: 'getShipmentStage', setter: 'setShipmentStage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShipmentStage')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ShipmentStage>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ShipmentStage', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $shipmentStage;

    /**
     * @return null|SequenceNumeric
     */
    public function getSequenceNumeric(): ?SequenceNumeric
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return SequenceNumeric
     */
    public function getSequenceNumericWithCreate(): SequenceNumeric
    {
        $this->sequenceNumeric ??= new SequenceNumeric();

        return $this->sequenceNumeric;
    }

    /**
     * @param  null|SequenceNumeric $sequenceNumeric
     * @return static
     */
    public function setSequenceNumeric(
        ?SequenceNumeric $sequenceNumeric = null
    ): static {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSequenceNumeric(): static
    {
        $this->sequenceNumeric = null;

        return $this;
    }

    /**
     * @return null|TransportExecutionPlanReferenceID
     */
    public function getTransportExecutionPlanReferenceID(): ?TransportExecutionPlanReferenceID
    {
        return $this->transportExecutionPlanReferenceID;
    }

    /**
     * @return TransportExecutionPlanReferenceID
     */
    public function getTransportExecutionPlanReferenceIDWithCreate(): TransportExecutionPlanReferenceID
    {
        $this->transportExecutionPlanReferenceID ??= new TransportExecutionPlanReferenceID();

        return $this->transportExecutionPlanReferenceID;
    }

    /**
     * @param  null|TransportExecutionPlanReferenceID $transportExecutionPlanReferenceID
     * @return static
     */
    public function setTransportExecutionPlanReferenceID(
        ?TransportExecutionPlanReferenceID $transportExecutionPlanReferenceID = null,
    ): static {
        $this->transportExecutionPlanReferenceID = $transportExecutionPlanReferenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportExecutionPlanReferenceID(): static
    {
        $this->transportExecutionPlanReferenceID = null;

        return $this;
    }

    /**
     * @return null|TransportationService
     */
    public function getTransportationService(): ?TransportationService
    {
        return $this->transportationService;
    }

    /**
     * @return TransportationService
     */
    public function getTransportationServiceWithCreate(): TransportationService
    {
        $this->transportationService ??= new TransportationService();

        return $this->transportationService;
    }

    /**
     * @param  null|TransportationService $transportationService
     * @return static
     */
    public function setTransportationService(
        ?TransportationService $transportationService = null
    ): static {
        $this->transportationService = $transportationService;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportationService(): static
    {
        $this->transportationService = null;

        return $this;
    }

    /**
     * @return null|TransportServiceProviderParty
     */
    public function getTransportServiceProviderParty(): ?TransportServiceProviderParty
    {
        return $this->transportServiceProviderParty;
    }

    /**
     * @return TransportServiceProviderParty
     */
    public function getTransportServiceProviderPartyWithCreate(): TransportServiceProviderParty
    {
        $this->transportServiceProviderParty ??= new TransportServiceProviderParty();

        return $this->transportServiceProviderParty;
    }

    /**
     * @param  null|TransportServiceProviderParty $transportServiceProviderParty
     * @return static
     */
    public function setTransportServiceProviderParty(
        ?TransportServiceProviderParty $transportServiceProviderParty = null,
    ): static {
        $this->transportServiceProviderParty = $transportServiceProviderParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportServiceProviderParty(): static
    {
        $this->transportServiceProviderParty = null;

        return $this;
    }

    /**
     * @return null|ReferencedConsignment
     */
    public function getReferencedConsignment(): ?ReferencedConsignment
    {
        return $this->referencedConsignment;
    }

    /**
     * @return ReferencedConsignment
     */
    public function getReferencedConsignmentWithCreate(): ReferencedConsignment
    {
        $this->referencedConsignment ??= new ReferencedConsignment();

        return $this->referencedConsignment;
    }

    /**
     * @param  null|ReferencedConsignment $referencedConsignment
     * @return static
     */
    public function setReferencedConsignment(
        ?ReferencedConsignment $referencedConsignment = null
    ): static {
        $this->referencedConsignment = $referencedConsignment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferencedConsignment(): static
    {
        $this->referencedConsignment = null;

        return $this;
    }

    /**
     * @return null|array<ShipmentStage>
     */
    public function getShipmentStage(): ?array
    {
        return $this->shipmentStage;
    }

    /**
     * @param  null|array<ShipmentStage> $shipmentStage
     * @return static
     */
    public function setShipmentStage(
        ?array $shipmentStage = null
    ): static {
        $this->shipmentStage = $shipmentStage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipmentStage(): static
    {
        $this->shipmentStage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearShipmentStage(): static
    {
        $this->shipmentStage = [];

        return $this;
    }

    /**
     * @return null|ShipmentStage
     */
    public function firstShipmentStage(): ?ShipmentStage
    {
        $shipmentStage = $this->shipmentStage ?? [];
        $shipmentStage = reset($shipmentStage);

        if (false === $shipmentStage) {
            return null;
        }

        return $shipmentStage;
    }

    /**
     * @return null|ShipmentStage
     */
    public function lastShipmentStage(): ?ShipmentStage
    {
        $shipmentStage = $this->shipmentStage ?? [];
        $shipmentStage = end($shipmentStage);

        if (false === $shipmentStage) {
            return null;
        }

        return $shipmentStage;
    }

    /**
     * @param  ShipmentStage $shipmentStage
     * @return static
     */
    public function addToShipmentStage(
        ShipmentStage $shipmentStage
    ): static {
        $this->shipmentStage[] = $shipmentStage;

        return $this;
    }

    /**
     * @return ShipmentStage
     */
    public function addToShipmentStageWithCreate(): ShipmentStage
    {
        $this->addToshipmentStage($shipmentStage = new ShipmentStage());

        return $shipmentStage;
    }

    /**
     * @param  ShipmentStage $shipmentStage
     * @return static
     */
    public function addOnceToShipmentStage(
        ShipmentStage $shipmentStage
    ): static {
        if (!is_array($this->shipmentStage)) {
            $this->shipmentStage = [];
        }

        $this->shipmentStage[0] = $shipmentStage;

        return $this;
    }

    /**
     * @return ShipmentStage
     */
    public function addOnceToShipmentStageWithCreate(): ShipmentStage
    {
        if (!is_array($this->shipmentStage)) {
            $this->shipmentStage = [];
        }

        if ([] === $this->shipmentStage) {
            $this->addOnceToshipmentStage(new ShipmentStage());
        }

        return $this->shipmentStage[0];
    }
}
