<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\TransportExecutionPlanReferenceID;

class TransportationSegmentType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumeric", setter="setSequenceNumeric")
     */
    private $sequenceNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransportExecutionPlanReferenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransportExecutionPlanReferenceID")
     * @JMS\Expose
     * @JMS\SerializedName("TransportExecutionPlanReferenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportExecutionPlanReferenceID", setter="setTransportExecutionPlanReferenceID")
     */
    private $transportExecutionPlanReferenceID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TransportationService|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TransportationService")
     * @JMS\Expose
     * @JMS\SerializedName("TransportationService")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportationService", setter="setTransportationService")
     */
    private $transportationService;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TransportServiceProviderParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TransportServiceProviderParty")
     * @JMS\Expose
     * @JMS\SerializedName("TransportServiceProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportServiceProviderParty", setter="setTransportServiceProviderParty")
     */
    private $transportServiceProviderParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ReferencedConsignment|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ReferencedConsignment")
     * @JMS\Expose
     * @JMS\SerializedName("ReferencedConsignment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferencedConsignment", setter="setReferencedConsignment")
     */
    private $referencedConsignment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ShipmentStage>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ShipmentStage>")
     * @JMS\Expose
     * @JMS\SerializedName("ShipmentStage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ShipmentStage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getShipmentStage", setter="setShipmentStage")
     */
    private $shipmentStage;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric|null
     */
    public function getSequenceNumeric(): ?SequenceNumeric
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric
     */
    public function getSequenceNumericWithCreate(): SequenceNumeric
    {
        $this->sequenceNumeric = is_null($this->sequenceNumeric) ? new SequenceNumeric() : $this->sequenceNumeric;

        return $this->sequenceNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric|null $sequenceNumeric
     * @return self
     */
    public function setSequenceNumeric(?SequenceNumeric $sequenceNumeric = null): self
    {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSequenceNumeric(): self
    {
        $this->sequenceNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportExecutionPlanReferenceID|null
     */
    public function getTransportExecutionPlanReferenceID(): ?TransportExecutionPlanReferenceID
    {
        return $this->transportExecutionPlanReferenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportExecutionPlanReferenceID
     */
    public function getTransportExecutionPlanReferenceIDWithCreate(): TransportExecutionPlanReferenceID
    {
        $this->transportExecutionPlanReferenceID = is_null($this->transportExecutionPlanReferenceID) ? new TransportExecutionPlanReferenceID() : $this->transportExecutionPlanReferenceID;

        return $this->transportExecutionPlanReferenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportExecutionPlanReferenceID|null $transportExecutionPlanReferenceID
     * @return self
     */
    public function setTransportExecutionPlanReferenceID(
        ?TransportExecutionPlanReferenceID $transportExecutionPlanReferenceID = null,
    ): self {
        $this->transportExecutionPlanReferenceID = $transportExecutionPlanReferenceID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportExecutionPlanReferenceID(): self
    {
        $this->transportExecutionPlanReferenceID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportationService|null
     */
    public function getTransportationService(): ?TransportationService
    {
        return $this->transportationService;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportationService
     */
    public function getTransportationServiceWithCreate(): TransportationService
    {
        $this->transportationService = is_null($this->transportationService) ? new TransportationService() : $this->transportationService;

        return $this->transportationService;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportationService|null $transportationService
     * @return self
     */
    public function setTransportationService(?TransportationService $transportationService = null): self
    {
        $this->transportationService = $transportationService;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportationService(): self
    {
        $this->transportationService = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportServiceProviderParty|null
     */
    public function getTransportServiceProviderParty(): ?TransportServiceProviderParty
    {
        return $this->transportServiceProviderParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportServiceProviderParty
     */
    public function getTransportServiceProviderPartyWithCreate(): TransportServiceProviderParty
    {
        $this->transportServiceProviderParty = is_null($this->transportServiceProviderParty) ? new TransportServiceProviderParty() : $this->transportServiceProviderParty;

        return $this->transportServiceProviderParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportServiceProviderParty|null $transportServiceProviderParty
     * @return self
     */
    public function setTransportServiceProviderParty(
        ?TransportServiceProviderParty $transportServiceProviderParty = null,
    ): self {
        $this->transportServiceProviderParty = $transportServiceProviderParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportServiceProviderParty(): self
    {
        $this->transportServiceProviderParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReferencedConsignment|null
     */
    public function getReferencedConsignment(): ?ReferencedConsignment
    {
        return $this->referencedConsignment;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReferencedConsignment
     */
    public function getReferencedConsignmentWithCreate(): ReferencedConsignment
    {
        $this->referencedConsignment = is_null($this->referencedConsignment) ? new ReferencedConsignment() : $this->referencedConsignment;

        return $this->referencedConsignment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReferencedConsignment|null $referencedConsignment
     * @return self
     */
    public function setReferencedConsignment(?ReferencedConsignment $referencedConsignment = null): self
    {
        $this->referencedConsignment = $referencedConsignment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReferencedConsignment(): self
    {
        $this->referencedConsignment = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ShipmentStage>|null
     */
    public function getShipmentStage(): ?array
    {
        return $this->shipmentStage;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ShipmentStage>|null $shipmentStage
     * @return self
     */
    public function setShipmentStage(?array $shipmentStage = null): self
    {
        $this->shipmentStage = $shipmentStage;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetShipmentStage(): self
    {
        $this->shipmentStage = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearShipmentStage(): self
    {
        $this->shipmentStage = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ShipmentStage $shipmentStage
     * @return self
     */
    public function addToShipmentStage(ShipmentStage $shipmentStage): self
    {
        $this->shipmentStage[] = $shipmentStage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipmentStage
     */
    public function addToShipmentStageWithCreate(): ShipmentStage
    {
        $this->addToshipmentStage($shipmentStage = new ShipmentStage());

        return $shipmentStage;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ShipmentStage $shipmentStage
     * @return self
     */
    public function addOnceToShipmentStage(ShipmentStage $shipmentStage): self
    {
        if (!is_array($this->shipmentStage)) {
            $this->shipmentStage = [];
        }

        $this->shipmentStage[0] = $shipmentStage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipmentStage
     */
    public function addOnceToShipmentStageWithCreate(): ShipmentStage
    {
        if (!is_array($this->shipmentStage)) {
            $this->shipmentStage = [];
        }

        if ($this->shipmentStage === []) {
            $this->addOnceToshipmentStage(new ShipmentStage());
        }

        return $this->shipmentStage[0];
    }
}
