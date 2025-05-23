<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\FreightRateClassCode;
use horstoeko\invoicesuite\models\ubl\cbc\Name;
use horstoeko\invoicesuite\models\ubl\cbc\Priority;
use horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\TariffClassCode;
use horstoeko\invoicesuite\models\ubl\cbc\TransportServiceCode;
use horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDescription;
use horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDetailsURI;

class TransportationServiceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransportServiceCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransportServiceCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportServiceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportServiceCode", setter="setTransportServiceCode")
     */
    private $transportServiceCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TariffClassCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TariffClassCode")
     * @JMS\Expose
     * @JMS\SerializedName("TariffClassCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTariffClassCode", setter="setTariffClassCode")
     */
    private $tariffClassCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Priority|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Priority")
     * @JMS\Expose
     * @JMS\SerializedName("Priority")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriority", setter="setPriority")
     */
    private $priority;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\FreightRateClassCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\FreightRateClassCode")
     * @JMS\Expose
     * @JMS\SerializedName("FreightRateClassCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFreightRateClassCode", setter="setFreightRateClassCode")
     */
    private $freightRateClassCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportationServiceDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportationServiceDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTransportationServiceDescription", setter="setTransportationServiceDescription")
     */
    private $transportationServiceDescription;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDetailsURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDetailsURI")
     * @JMS\Expose
     * @JMS\SerializedName("TransportationServiceDetailsURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportationServiceDetailsURI", setter="setTransportationServiceDetailsURI")
     */
    private $transportationServiceDetailsURI;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("NominationDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNominationDate", setter="setNominationDate")
     */
    private $nominationDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("NominationTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNominationTime", setter="setNominationTime")
     */
    private $nominationTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Name|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TransportEquipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TransportEquipment>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEquipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEquipment", setter="setTransportEquipment")
     */
    private $transportEquipment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SupportedTransportEquipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SupportedTransportEquipment>")
     * @JMS\Expose
     * @JMS\SerializedName("SupportedTransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SupportedTransportEquipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSupportedTransportEquipment", setter="setSupportedTransportEquipment")
     */
    private $supportedTransportEquipment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\UnsupportedTransportEquipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\UnsupportedTransportEquipment>")
     * @JMS\Expose
     * @JMS\SerializedName("UnsupportedTransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="UnsupportedTransportEquipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getUnsupportedTransportEquipment", setter="setUnsupportedTransportEquipment")
     */
    private $unsupportedTransportEquipment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\CommodityClassification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\CommodityClassification>")
     * @JMS\Expose
     * @JMS\SerializedName("CommodityClassification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CommodityClassification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCommodityClassification", setter="setCommodityClassification")
     */
    private $commodityClassification;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SupportedCommodityClassification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SupportedCommodityClassification>")
     * @JMS\Expose
     * @JMS\SerializedName("SupportedCommodityClassification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SupportedCommodityClassification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSupportedCommodityClassification", setter="setSupportedCommodityClassification")
     */
    private $supportedCommodityClassification;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\UnsupportedCommodityClassification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\UnsupportedCommodityClassification>")
     * @JMS\Expose
     * @JMS\SerializedName("UnsupportedCommodityClassification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="UnsupportedCommodityClassification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getUnsupportedCommodityClassification", setter="setUnsupportedCommodityClassification")
     */
    private $unsupportedCommodityClassification;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TotalCapacityDimension|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TotalCapacityDimension")
     * @JMS\Expose
     * @JMS\SerializedName("TotalCapacityDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalCapacityDimension", setter="setTotalCapacityDimension")
     */
    private $totalCapacityDimension;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEvent", setter="setTransportEvent")
     */
    private $transportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ResponsibleTransportServiceProviderParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ResponsibleTransportServiceProviderParty")
     * @JMS\Expose
     * @JMS\SerializedName("ResponsibleTransportServiceProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResponsibleTransportServiceProviderParty", setter="setResponsibleTransportServiceProviderParty")
     */
    private $responsibleTransportServiceProviderParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\EnvironmentalEmission>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\EnvironmentalEmission>")
     * @JMS\Expose
     * @JMS\SerializedName("EnvironmentalEmission")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EnvironmentalEmission", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEnvironmentalEmission", setter="setEnvironmentalEmission")
     */
    private $environmentalEmission;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EstimatedDurationPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EstimatedDurationPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDurationPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDurationPeriod", setter="setEstimatedDurationPeriod")
     */
    private $estimatedDurationPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ScheduledServiceFrequency>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ScheduledServiceFrequency>")
     * @JMS\Expose
     * @JMS\SerializedName("ScheduledServiceFrequency")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ScheduledServiceFrequency", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getScheduledServiceFrequency", setter="setScheduledServiceFrequency")
     */
    private $scheduledServiceFrequency;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportServiceCode|null
     */
    public function getTransportServiceCode(): ?TransportServiceCode
    {
        return $this->transportServiceCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportServiceCode
     */
    public function getTransportServiceCodeWithCreate(): TransportServiceCode
    {
        $this->transportServiceCode = is_null($this->transportServiceCode) ? new TransportServiceCode() : $this->transportServiceCode;

        return $this->transportServiceCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportServiceCode|null $transportServiceCode
     * @return self
     */
    public function setTransportServiceCode(?TransportServiceCode $transportServiceCode = null): self
    {
        $this->transportServiceCode = $transportServiceCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TariffClassCode|null
     */
    public function getTariffClassCode(): ?TariffClassCode
    {
        return $this->tariffClassCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TariffClassCode
     */
    public function getTariffClassCodeWithCreate(): TariffClassCode
    {
        $this->tariffClassCode = is_null($this->tariffClassCode) ? new TariffClassCode() : $this->tariffClassCode;

        return $this->tariffClassCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TariffClassCode|null $tariffClassCode
     * @return self
     */
    public function setTariffClassCode(?TariffClassCode $tariffClassCode = null): self
    {
        $this->tariffClassCode = $tariffClassCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Priority|null
     */
    public function getPriority(): ?Priority
    {
        return $this->priority;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Priority
     */
    public function getPriorityWithCreate(): Priority
    {
        $this->priority = is_null($this->priority) ? new Priority() : $this->priority;

        return $this->priority;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Priority|null $priority
     * @return self
     */
    public function setPriority(?Priority $priority = null): self
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FreightRateClassCode|null
     */
    public function getFreightRateClassCode(): ?FreightRateClassCode
    {
        return $this->freightRateClassCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FreightRateClassCode
     */
    public function getFreightRateClassCodeWithCreate(): FreightRateClassCode
    {
        $this->freightRateClassCode = is_null($this->freightRateClassCode) ? new FreightRateClassCode() : $this->freightRateClassCode;

        return $this->freightRateClassCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\FreightRateClassCode|null $freightRateClassCode
     * @return self
     */
    public function setFreightRateClassCode(?FreightRateClassCode $freightRateClassCode = null): self
    {
        $this->freightRateClassCode = $freightRateClassCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDescription>|null
     */
    public function getTransportationServiceDescription(): ?array
    {
        return $this->transportationServiceDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDescription>|null $transportationServiceDescription
     * @return self
     */
    public function setTransportationServiceDescription(?array $transportationServiceDescription = null): self
    {
        $this->transportationServiceDescription = $transportationServiceDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportationServiceDescription(): self
    {
        $this->transportationServiceDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDescription $transportationServiceDescription
     * @return self
     */
    public function addToTransportationServiceDescription(
        TransportationServiceDescription $transportationServiceDescription,
    ): self {
        $this->transportationServiceDescription[] = $transportationServiceDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDescription
     */
    public function addToTransportationServiceDescriptionWithCreate(): TransportationServiceDescription
    {
        $this->addTotransportationServiceDescription($transportationServiceDescription = new TransportationServiceDescription());

        return $transportationServiceDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDescription $transportationServiceDescription
     * @return self
     */
    public function addOnceToTransportationServiceDescription(
        TransportationServiceDescription $transportationServiceDescription,
    ): self {
        if (!is_array($this->transportationServiceDescription)) {
            $this->transportationServiceDescription = [];
        }

        $this->transportationServiceDescription[0] = $transportationServiceDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDescription
     */
    public function addOnceToTransportationServiceDescriptionWithCreate(): TransportationServiceDescription
    {
        if (!is_array($this->transportationServiceDescription)) {
            $this->transportationServiceDescription = [];
        }

        if ($this->transportationServiceDescription === []) {
            $this->addOnceTotransportationServiceDescription(new TransportationServiceDescription());
        }

        return $this->transportationServiceDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDetailsURI|null
     */
    public function getTransportationServiceDetailsURI(): ?TransportationServiceDetailsURI
    {
        return $this->transportationServiceDetailsURI;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDetailsURI
     */
    public function getTransportationServiceDetailsURIWithCreate(): TransportationServiceDetailsURI
    {
        $this->transportationServiceDetailsURI = is_null($this->transportationServiceDetailsURI) ? new TransportationServiceDetailsURI() : $this->transportationServiceDetailsURI;

        return $this->transportationServiceDetailsURI;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportationServiceDetailsURI|null $transportationServiceDetailsURI
     * @return self
     */
    public function setTransportationServiceDetailsURI(
        ?TransportationServiceDetailsURI $transportationServiceDetailsURI = null,
    ): self {
        $this->transportationServiceDetailsURI = $transportationServiceDetailsURI;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getNominationDate(): ?\DateTimeInterface
    {
        return $this->nominationDate;
    }

    /**
     * @param \DateTimeInterface|null $nominationDate
     * @return self
     */
    public function setNominationDate(?\DateTimeInterface $nominationDate = null): self
    {
        $this->nominationDate = $nominationDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getNominationTime(): ?\DateTimeInterface
    {
        return $this->nominationTime;
    }

    /**
     * @param \DateTimeInterface|null $nominationTime
     * @return self
     */
    public function setNominationTime(?\DateTimeInterface $nominationTime = null): self
    {
        $this->nominationTime = $nominationTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Name|null
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Name|null $name
     * @return self
     */
    public function setName(?Name $name = null): self
    {
        $this->name = $name;

        return $this;
    }

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TransportEquipment>|null
     */
    public function getTransportEquipment(): ?array
    {
        return $this->transportEquipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TransportEquipment>|null $transportEquipment
     * @return self
     */
    public function setTransportEquipment(?array $transportEquipment = null): self
    {
        $this->transportEquipment = $transportEquipment;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportEquipment(): self
    {
        $this->transportEquipment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEquipment $transportEquipment
     * @return self
     */
    public function addToTransportEquipment(TransportEquipment $transportEquipment): self
    {
        $this->transportEquipment[] = $transportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEquipment
     */
    public function addToTransportEquipmentWithCreate(): TransportEquipment
    {
        $this->addTotransportEquipment($transportEquipment = new TransportEquipment());

        return $transportEquipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEquipment $transportEquipment
     * @return self
     */
    public function addOnceToTransportEquipment(TransportEquipment $transportEquipment): self
    {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        $this->transportEquipment[0] = $transportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEquipment
     */
    public function addOnceToTransportEquipmentWithCreate(): TransportEquipment
    {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        if ($this->transportEquipment === []) {
            $this->addOnceTotransportEquipment(new TransportEquipment());
        }

        return $this->transportEquipment[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SupportedTransportEquipment>|null
     */
    public function getSupportedTransportEquipment(): ?array
    {
        return $this->supportedTransportEquipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SupportedTransportEquipment>|null $supportedTransportEquipment
     * @return self
     */
    public function setSupportedTransportEquipment(?array $supportedTransportEquipment = null): self
    {
        $this->supportedTransportEquipment = $supportedTransportEquipment;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSupportedTransportEquipment(): self
    {
        $this->supportedTransportEquipment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SupportedTransportEquipment $supportedTransportEquipment
     * @return self
     */
    public function addToSupportedTransportEquipment(SupportedTransportEquipment $supportedTransportEquipment): self
    {
        $this->supportedTransportEquipment[] = $supportedTransportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupportedTransportEquipment
     */
    public function addToSupportedTransportEquipmentWithCreate(): SupportedTransportEquipment
    {
        $this->addTosupportedTransportEquipment($supportedTransportEquipment = new SupportedTransportEquipment());

        return $supportedTransportEquipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SupportedTransportEquipment $supportedTransportEquipment
     * @return self
     */
    public function addOnceToSupportedTransportEquipment(
        SupportedTransportEquipment $supportedTransportEquipment,
    ): self {
        if (!is_array($this->supportedTransportEquipment)) {
            $this->supportedTransportEquipment = [];
        }

        $this->supportedTransportEquipment[0] = $supportedTransportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupportedTransportEquipment
     */
    public function addOnceToSupportedTransportEquipmentWithCreate(): SupportedTransportEquipment
    {
        if (!is_array($this->supportedTransportEquipment)) {
            $this->supportedTransportEquipment = [];
        }

        if ($this->supportedTransportEquipment === []) {
            $this->addOnceTosupportedTransportEquipment(new SupportedTransportEquipment());
        }

        return $this->supportedTransportEquipment[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\UnsupportedTransportEquipment>|null
     */
    public function getUnsupportedTransportEquipment(): ?array
    {
        return $this->unsupportedTransportEquipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\UnsupportedTransportEquipment>|null $unsupportedTransportEquipment
     * @return self
     */
    public function setUnsupportedTransportEquipment(?array $unsupportedTransportEquipment = null): self
    {
        $this->unsupportedTransportEquipment = $unsupportedTransportEquipment;

        return $this;
    }

    /**
     * @return self
     */
    public function clearUnsupportedTransportEquipment(): self
    {
        $this->unsupportedTransportEquipment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UnsupportedTransportEquipment $unsupportedTransportEquipment
     * @return self
     */
    public function addToUnsupportedTransportEquipment(
        UnsupportedTransportEquipment $unsupportedTransportEquipment,
    ): self {
        $this->unsupportedTransportEquipment[] = $unsupportedTransportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnsupportedTransportEquipment
     */
    public function addToUnsupportedTransportEquipmentWithCreate(): UnsupportedTransportEquipment
    {
        $this->addTounsupportedTransportEquipment($unsupportedTransportEquipment = new UnsupportedTransportEquipment());

        return $unsupportedTransportEquipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UnsupportedTransportEquipment $unsupportedTransportEquipment
     * @return self
     */
    public function addOnceToUnsupportedTransportEquipment(
        UnsupportedTransportEquipment $unsupportedTransportEquipment,
    ): self {
        if (!is_array($this->unsupportedTransportEquipment)) {
            $this->unsupportedTransportEquipment = [];
        }

        $this->unsupportedTransportEquipment[0] = $unsupportedTransportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnsupportedTransportEquipment
     */
    public function addOnceToUnsupportedTransportEquipmentWithCreate(): UnsupportedTransportEquipment
    {
        if (!is_array($this->unsupportedTransportEquipment)) {
            $this->unsupportedTransportEquipment = [];
        }

        if ($this->unsupportedTransportEquipment === []) {
            $this->addOnceTounsupportedTransportEquipment(new UnsupportedTransportEquipment());
        }

        return $this->unsupportedTransportEquipment[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\CommodityClassification>|null
     */
    public function getCommodityClassification(): ?array
    {
        return $this->commodityClassification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\CommodityClassification>|null $commodityClassification
     * @return self
     */
    public function setCommodityClassification(?array $commodityClassification = null): self
    {
        $this->commodityClassification = $commodityClassification;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCommodityClassification(): self
    {
        $this->commodityClassification = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CommodityClassification $commodityClassification
     * @return self
     */
    public function addToCommodityClassification(CommodityClassification $commodityClassification): self
    {
        $this->commodityClassification[] = $commodityClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CommodityClassification
     */
    public function addToCommodityClassificationWithCreate(): CommodityClassification
    {
        $this->addTocommodityClassification($commodityClassification = new CommodityClassification());

        return $commodityClassification;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CommodityClassification $commodityClassification
     * @return self
     */
    public function addOnceToCommodityClassification(CommodityClassification $commodityClassification): self
    {
        if (!is_array($this->commodityClassification)) {
            $this->commodityClassification = [];
        }

        $this->commodityClassification[0] = $commodityClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CommodityClassification
     */
    public function addOnceToCommodityClassificationWithCreate(): CommodityClassification
    {
        if (!is_array($this->commodityClassification)) {
            $this->commodityClassification = [];
        }

        if ($this->commodityClassification === []) {
            $this->addOnceTocommodityClassification(new CommodityClassification());
        }

        return $this->commodityClassification[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SupportedCommodityClassification>|null
     */
    public function getSupportedCommodityClassification(): ?array
    {
        return $this->supportedCommodityClassification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SupportedCommodityClassification>|null $supportedCommodityClassification
     * @return self
     */
    public function setSupportedCommodityClassification(?array $supportedCommodityClassification = null): self
    {
        $this->supportedCommodityClassification = $supportedCommodityClassification;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSupportedCommodityClassification(): self
    {
        $this->supportedCommodityClassification = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SupportedCommodityClassification $supportedCommodityClassification
     * @return self
     */
    public function addToSupportedCommodityClassification(
        SupportedCommodityClassification $supportedCommodityClassification,
    ): self {
        $this->supportedCommodityClassification[] = $supportedCommodityClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupportedCommodityClassification
     */
    public function addToSupportedCommodityClassificationWithCreate(): SupportedCommodityClassification
    {
        $this->addTosupportedCommodityClassification($supportedCommodityClassification = new SupportedCommodityClassification());

        return $supportedCommodityClassification;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SupportedCommodityClassification $supportedCommodityClassification
     * @return self
     */
    public function addOnceToSupportedCommodityClassification(
        SupportedCommodityClassification $supportedCommodityClassification,
    ): self {
        if (!is_array($this->supportedCommodityClassification)) {
            $this->supportedCommodityClassification = [];
        }

        $this->supportedCommodityClassification[0] = $supportedCommodityClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupportedCommodityClassification
     */
    public function addOnceToSupportedCommodityClassificationWithCreate(): SupportedCommodityClassification
    {
        if (!is_array($this->supportedCommodityClassification)) {
            $this->supportedCommodityClassification = [];
        }

        if ($this->supportedCommodityClassification === []) {
            $this->addOnceTosupportedCommodityClassification(new SupportedCommodityClassification());
        }

        return $this->supportedCommodityClassification[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\UnsupportedCommodityClassification>|null
     */
    public function getUnsupportedCommodityClassification(): ?array
    {
        return $this->unsupportedCommodityClassification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\UnsupportedCommodityClassification>|null $unsupportedCommodityClassification
     * @return self
     */
    public function setUnsupportedCommodityClassification(?array $unsupportedCommodityClassification = null): self
    {
        $this->unsupportedCommodityClassification = $unsupportedCommodityClassification;

        return $this;
    }

    /**
     * @return self
     */
    public function clearUnsupportedCommodityClassification(): self
    {
        $this->unsupportedCommodityClassification = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UnsupportedCommodityClassification $unsupportedCommodityClassification
     * @return self
     */
    public function addToUnsupportedCommodityClassification(
        UnsupportedCommodityClassification $unsupportedCommodityClassification,
    ): self {
        $this->unsupportedCommodityClassification[] = $unsupportedCommodityClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnsupportedCommodityClassification
     */
    public function addToUnsupportedCommodityClassificationWithCreate(): UnsupportedCommodityClassification
    {
        $this->addTounsupportedCommodityClassification($unsupportedCommodityClassification = new UnsupportedCommodityClassification());

        return $unsupportedCommodityClassification;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UnsupportedCommodityClassification $unsupportedCommodityClassification
     * @return self
     */
    public function addOnceToUnsupportedCommodityClassification(
        UnsupportedCommodityClassification $unsupportedCommodityClassification,
    ): self {
        if (!is_array($this->unsupportedCommodityClassification)) {
            $this->unsupportedCommodityClassification = [];
        }

        $this->unsupportedCommodityClassification[0] = $unsupportedCommodityClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnsupportedCommodityClassification
     */
    public function addOnceToUnsupportedCommodityClassificationWithCreate(): UnsupportedCommodityClassification
    {
        if (!is_array($this->unsupportedCommodityClassification)) {
            $this->unsupportedCommodityClassification = [];
        }

        if ($this->unsupportedCommodityClassification === []) {
            $this->addOnceTounsupportedCommodityClassification(new UnsupportedCommodityClassification());
        }

        return $this->unsupportedCommodityClassification[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TotalCapacityDimension|null
     */
    public function getTotalCapacityDimension(): ?TotalCapacityDimension
    {
        return $this->totalCapacityDimension;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TotalCapacityDimension
     */
    public function getTotalCapacityDimensionWithCreate(): TotalCapacityDimension
    {
        $this->totalCapacityDimension = is_null($this->totalCapacityDimension) ? new TotalCapacityDimension() : $this->totalCapacityDimension;

        return $this->totalCapacityDimension;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TotalCapacityDimension|null $totalCapacityDimension
     * @return self
     */
    public function setTotalCapacityDimension(?TotalCapacityDimension $totalCapacityDimension = null): self
    {
        $this->totalCapacityDimension = $totalCapacityDimension;

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

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TransportEvent>|null
     */
    public function getTransportEvent(): ?array
    {
        return $this->transportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TransportEvent>|null $transportEvent
     * @return self
     */
    public function setTransportEvent(?array $transportEvent = null): self
    {
        $this->transportEvent = $transportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportEvent(): self
    {
        $this->transportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEvent $transportEvent
     * @return self
     */
    public function addToTransportEvent(TransportEvent $transportEvent): self
    {
        $this->transportEvent[] = $transportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEvent
     */
    public function addToTransportEventWithCreate(): TransportEvent
    {
        $this->addTotransportEvent($transportEvent = new TransportEvent());

        return $transportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEvent $transportEvent
     * @return self
     */
    public function addOnceToTransportEvent(TransportEvent $transportEvent): self
    {
        if (!is_array($this->transportEvent)) {
            $this->transportEvent = [];
        }

        $this->transportEvent[0] = $transportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEvent
     */
    public function addOnceToTransportEventWithCreate(): TransportEvent
    {
        if (!is_array($this->transportEvent)) {
            $this->transportEvent = [];
        }

        if ($this->transportEvent === []) {
            $this->addOnceTotransportEvent(new TransportEvent());
        }

        return $this->transportEvent[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ResponsibleTransportServiceProviderParty|null
     */
    public function getResponsibleTransportServiceProviderParty(): ?ResponsibleTransportServiceProviderParty
    {
        return $this->responsibleTransportServiceProviderParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ResponsibleTransportServiceProviderParty
     */
    public function getResponsibleTransportServiceProviderPartyWithCreate(): ResponsibleTransportServiceProviderParty
    {
        $this->responsibleTransportServiceProviderParty = is_null($this->responsibleTransportServiceProviderParty) ? new ResponsibleTransportServiceProviderParty() : $this->responsibleTransportServiceProviderParty;

        return $this->responsibleTransportServiceProviderParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ResponsibleTransportServiceProviderParty|null $responsibleTransportServiceProviderParty
     * @return self
     */
    public function setResponsibleTransportServiceProviderParty(
        ?ResponsibleTransportServiceProviderParty $responsibleTransportServiceProviderParty = null,
    ): self {
        $this->responsibleTransportServiceProviderParty = $responsibleTransportServiceProviderParty;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\EnvironmentalEmission>|null
     */
    public function getEnvironmentalEmission(): ?array
    {
        return $this->environmentalEmission;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\EnvironmentalEmission>|null $environmentalEmission
     * @return self
     */
    public function setEnvironmentalEmission(?array $environmentalEmission = null): self
    {
        $this->environmentalEmission = $environmentalEmission;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEnvironmentalEmission(): self
    {
        $this->environmentalEmission = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EnvironmentalEmission $environmentalEmission
     * @return self
     */
    public function addToEnvironmentalEmission(EnvironmentalEmission $environmentalEmission): self
    {
        $this->environmentalEmission[] = $environmentalEmission;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EnvironmentalEmission
     */
    public function addToEnvironmentalEmissionWithCreate(): EnvironmentalEmission
    {
        $this->addToenvironmentalEmission($environmentalEmission = new EnvironmentalEmission());

        return $environmentalEmission;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EnvironmentalEmission $environmentalEmission
     * @return self
     */
    public function addOnceToEnvironmentalEmission(EnvironmentalEmission $environmentalEmission): self
    {
        if (!is_array($this->environmentalEmission)) {
            $this->environmentalEmission = [];
        }

        $this->environmentalEmission[0] = $environmentalEmission;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EnvironmentalEmission
     */
    public function addOnceToEnvironmentalEmissionWithCreate(): EnvironmentalEmission
    {
        if (!is_array($this->environmentalEmission)) {
            $this->environmentalEmission = [];
        }

        if ($this->environmentalEmission === []) {
            $this->addOnceToenvironmentalEmission(new EnvironmentalEmission());
        }

        return $this->environmentalEmission[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedDurationPeriod|null
     */
    public function getEstimatedDurationPeriod(): ?EstimatedDurationPeriod
    {
        return $this->estimatedDurationPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedDurationPeriod
     */
    public function getEstimatedDurationPeriodWithCreate(): EstimatedDurationPeriod
    {
        $this->estimatedDurationPeriod = is_null($this->estimatedDurationPeriod) ? new EstimatedDurationPeriod() : $this->estimatedDurationPeriod;

        return $this->estimatedDurationPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EstimatedDurationPeriod|null $estimatedDurationPeriod
     * @return self
     */
    public function setEstimatedDurationPeriod(?EstimatedDurationPeriod $estimatedDurationPeriod = null): self
    {
        $this->estimatedDurationPeriod = $estimatedDurationPeriod;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ScheduledServiceFrequency>|null
     */
    public function getScheduledServiceFrequency(): ?array
    {
        return $this->scheduledServiceFrequency;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ScheduledServiceFrequency>|null $scheduledServiceFrequency
     * @return self
     */
    public function setScheduledServiceFrequency(?array $scheduledServiceFrequency = null): self
    {
        $this->scheduledServiceFrequency = $scheduledServiceFrequency;

        return $this;
    }

    /**
     * @return self
     */
    public function clearScheduledServiceFrequency(): self
    {
        $this->scheduledServiceFrequency = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ScheduledServiceFrequency $scheduledServiceFrequency
     * @return self
     */
    public function addToScheduledServiceFrequency(ScheduledServiceFrequency $scheduledServiceFrequency): self
    {
        $this->scheduledServiceFrequency[] = $scheduledServiceFrequency;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ScheduledServiceFrequency
     */
    public function addToScheduledServiceFrequencyWithCreate(): ScheduledServiceFrequency
    {
        $this->addToscheduledServiceFrequency($scheduledServiceFrequency = new ScheduledServiceFrequency());

        return $scheduledServiceFrequency;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ScheduledServiceFrequency $scheduledServiceFrequency
     * @return self
     */
    public function addOnceToScheduledServiceFrequency(ScheduledServiceFrequency $scheduledServiceFrequency): self
    {
        if (!is_array($this->scheduledServiceFrequency)) {
            $this->scheduledServiceFrequency = [];
        }

        $this->scheduledServiceFrequency[0] = $scheduledServiceFrequency;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ScheduledServiceFrequency
     */
    public function addOnceToScheduledServiceFrequencyWithCreate(): ScheduledServiceFrequency
    {
        if (!is_array($this->scheduledServiceFrequency)) {
            $this->scheduledServiceFrequency = [];
        }

        if ($this->scheduledServiceFrequency === []) {
            $this->addOnceToscheduledServiceFrequency(new ScheduledServiceFrequency());
        }

        return $this->scheduledServiceFrequency[0];
    }
}
