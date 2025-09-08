<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\DirectionCode;
use horstoeko\invoicesuite\models\ubl\cbc\JourneyID;
use horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationality;
use horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationalityID;
use horstoeko\invoicesuite\models\ubl\cbc\TradeServiceCode;
use horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode;

class TransportMeansType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\JourneyID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\JourneyID")
     * @JMS\Expose
     * @JMS\SerializedName("JourneyID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getJourneyID", setter="setJourneyID")
     */
    private $journeyID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationalityID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationalityID")
     * @JMS\Expose
     * @JMS\SerializedName("RegistrationNationalityID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRegistrationNationalityID", setter="setRegistrationNationalityID")
     */
    private $registrationNationalityID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationality>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationality>")
     * @JMS\Expose
     * @JMS\SerializedName("RegistrationNationality")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RegistrationNationality", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRegistrationNationality", setter="setRegistrationNationality")
     */
    private $registrationNationality;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DirectionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DirectionCode")
     * @JMS\Expose
     * @JMS\SerializedName("DirectionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDirectionCode", setter="setDirectionCode")
     */
    private $directionCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportMeansTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportMeansTypeCode", setter="setTransportMeansTypeCode")
     */
    private $transportMeansTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TradeServiceCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TradeServiceCode")
     * @JMS\Expose
     * @JMS\SerializedName("TradeServiceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTradeServiceCode", setter="setTradeServiceCode")
     */
    private $tradeServiceCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Stowage|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Stowage")
     * @JMS\Expose
     * @JMS\SerializedName("Stowage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStowage", setter="setStowage")
     */
    private $stowage;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AirTransport|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AirTransport")
     * @JMS\Expose
     * @JMS\SerializedName("AirTransport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAirTransport", setter="setAirTransport")
     */
    private $airTransport;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RoadTransport|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RoadTransport")
     * @JMS\Expose
     * @JMS\SerializedName("RoadTransport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRoadTransport", setter="setRoadTransport")
     */
    private $roadTransport;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RailTransport|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RailTransport")
     * @JMS\Expose
     * @JMS\SerializedName("RailTransport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRailTransport", setter="setRailTransport")
     */
    private $railTransport;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\MaritimeTransport|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MaritimeTransport")
     * @JMS\Expose
     * @JMS\SerializedName("MaritimeTransport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaritimeTransport", setter="setMaritimeTransport")
     */
    private $maritimeTransport;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\OwnerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\OwnerParty")
     * @JMS\Expose
     * @JMS\SerializedName("OwnerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOwnerParty", setter="setOwnerParty")
     */
    private $ownerParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeasurementDimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeasurementDimension", setter="setMeasurementDimension")
     */
    private $measurementDimension;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\JourneyID|null
     */
    public function getJourneyID(): ?JourneyID
    {
        return $this->journeyID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\JourneyID
     */
    public function getJourneyIDWithCreate(): JourneyID
    {
        $this->journeyID = is_null($this->journeyID) ? new JourneyID() : $this->journeyID;

        return $this->journeyID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\JourneyID|null $journeyID
     * @return self
     */
    public function setJourneyID(?JourneyID $journeyID = null): self
    {
        $this->journeyID = $journeyID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetJourneyID(): self
    {
        $this->journeyID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationalityID|null
     */
    public function getRegistrationNationalityID(): ?RegistrationNationalityID
    {
        return $this->registrationNationalityID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationalityID
     */
    public function getRegistrationNationalityIDWithCreate(): RegistrationNationalityID
    {
        $this->registrationNationalityID = is_null($this->registrationNationalityID) ? new RegistrationNationalityID() : $this->registrationNationalityID;

        return $this->registrationNationalityID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationalityID|null $registrationNationalityID
     * @return self
     */
    public function setRegistrationNationalityID(?RegistrationNationalityID $registrationNationalityID = null): self
    {
        $this->registrationNationalityID = $registrationNationalityID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRegistrationNationalityID(): self
    {
        $this->registrationNationalityID = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationality>|null
     */
    public function getRegistrationNationality(): ?array
    {
        return $this->registrationNationality;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationality>|null $registrationNationality
     * @return self
     */
    public function setRegistrationNationality(?array $registrationNationality = null): self
    {
        $this->registrationNationality = $registrationNationality;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRegistrationNationality(): self
    {
        $this->registrationNationality = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRegistrationNationality(): self
    {
        $this->registrationNationality = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationality $registrationNationality
     * @return self
     */
    public function addToRegistrationNationality(RegistrationNationality $registrationNationality): self
    {
        $this->registrationNationality[] = $registrationNationality;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationality
     */
    public function addToRegistrationNationalityWithCreate(): RegistrationNationality
    {
        $this->addToregistrationNationality($registrationNationality = new RegistrationNationality());

        return $registrationNationality;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationality $registrationNationality
     * @return self
     */
    public function addOnceToRegistrationNationality(RegistrationNationality $registrationNationality): self
    {
        if (!is_array($this->registrationNationality)) {
            $this->registrationNationality = [];
        }

        $this->registrationNationality[0] = $registrationNationality;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RegistrationNationality
     */
    public function addOnceToRegistrationNationalityWithCreate(): RegistrationNationality
    {
        if (!is_array($this->registrationNationality)) {
            $this->registrationNationality = [];
        }

        if ($this->registrationNationality === []) {
            $this->addOnceToregistrationNationality(new RegistrationNationality());
        }

        return $this->registrationNationality[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DirectionCode|null
     */
    public function getDirectionCode(): ?DirectionCode
    {
        return $this->directionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DirectionCode
     */
    public function getDirectionCodeWithCreate(): DirectionCode
    {
        $this->directionCode = is_null($this->directionCode) ? new DirectionCode() : $this->directionCode;

        return $this->directionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DirectionCode|null $directionCode
     * @return self
     */
    public function setDirectionCode(?DirectionCode $directionCode = null): self
    {
        $this->directionCode = $directionCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDirectionCode(): self
    {
        $this->directionCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode|null
     */
    public function getTransportMeansTypeCode(): ?TransportMeansTypeCode
    {
        return $this->transportMeansTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode
     */
    public function getTransportMeansTypeCodeWithCreate(): TransportMeansTypeCode
    {
        $this->transportMeansTypeCode = is_null($this->transportMeansTypeCode) ? new TransportMeansTypeCode() : $this->transportMeansTypeCode;

        return $this->transportMeansTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode|null $transportMeansTypeCode
     * @return self
     */
    public function setTransportMeansTypeCode(?TransportMeansTypeCode $transportMeansTypeCode = null): self
    {
        $this->transportMeansTypeCode = $transportMeansTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportMeansTypeCode(): self
    {
        $this->transportMeansTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TradeServiceCode|null
     */
    public function getTradeServiceCode(): ?TradeServiceCode
    {
        return $this->tradeServiceCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TradeServiceCode
     */
    public function getTradeServiceCodeWithCreate(): TradeServiceCode
    {
        $this->tradeServiceCode = is_null($this->tradeServiceCode) ? new TradeServiceCode() : $this->tradeServiceCode;

        return $this->tradeServiceCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TradeServiceCode|null $tradeServiceCode
     * @return self
     */
    public function setTradeServiceCode(?TradeServiceCode $tradeServiceCode = null): self
    {
        $this->tradeServiceCode = $tradeServiceCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTradeServiceCode(): self
    {
        $this->tradeServiceCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Stowage|null
     */
    public function getStowage(): ?Stowage
    {
        return $this->stowage;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Stowage
     */
    public function getStowageWithCreate(): Stowage
    {
        $this->stowage = is_null($this->stowage) ? new Stowage() : $this->stowage;

        return $this->stowage;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Stowage|null $stowage
     * @return self
     */
    public function setStowage(?Stowage $stowage = null): self
    {
        $this->stowage = $stowage;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStowage(): self
    {
        $this->stowage = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AirTransport|null
     */
    public function getAirTransport(): ?AirTransport
    {
        return $this->airTransport;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AirTransport
     */
    public function getAirTransportWithCreate(): AirTransport
    {
        $this->airTransport = is_null($this->airTransport) ? new AirTransport() : $this->airTransport;

        return $this->airTransport;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AirTransport|null $airTransport
     * @return self
     */
    public function setAirTransport(?AirTransport $airTransport = null): self
    {
        $this->airTransport = $airTransport;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAirTransport(): self
    {
        $this->airTransport = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RoadTransport|null
     */
    public function getRoadTransport(): ?RoadTransport
    {
        return $this->roadTransport;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RoadTransport
     */
    public function getRoadTransportWithCreate(): RoadTransport
    {
        $this->roadTransport = is_null($this->roadTransport) ? new RoadTransport() : $this->roadTransport;

        return $this->roadTransport;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RoadTransport|null $roadTransport
     * @return self
     */
    public function setRoadTransport(?RoadTransport $roadTransport = null): self
    {
        $this->roadTransport = $roadTransport;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRoadTransport(): self
    {
        $this->roadTransport = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RailTransport|null
     */
    public function getRailTransport(): ?RailTransport
    {
        return $this->railTransport;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RailTransport
     */
    public function getRailTransportWithCreate(): RailTransport
    {
        $this->railTransport = is_null($this->railTransport) ? new RailTransport() : $this->railTransport;

        return $this->railTransport;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RailTransport|null $railTransport
     * @return self
     */
    public function setRailTransport(?RailTransport $railTransport = null): self
    {
        $this->railTransport = $railTransport;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRailTransport(): self
    {
        $this->railTransport = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MaritimeTransport|null
     */
    public function getMaritimeTransport(): ?MaritimeTransport
    {
        return $this->maritimeTransport;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MaritimeTransport
     */
    public function getMaritimeTransportWithCreate(): MaritimeTransport
    {
        $this->maritimeTransport = is_null($this->maritimeTransport) ? new MaritimeTransport() : $this->maritimeTransport;

        return $this->maritimeTransport;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MaritimeTransport|null $maritimeTransport
     * @return self
     */
    public function setMaritimeTransport(?MaritimeTransport $maritimeTransport = null): self
    {
        $this->maritimeTransport = $maritimeTransport;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaritimeTransport(): self
    {
        $this->maritimeTransport = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OwnerParty|null
     */
    public function getOwnerParty(): ?OwnerParty
    {
        return $this->ownerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OwnerParty
     */
    public function getOwnerPartyWithCreate(): OwnerParty
    {
        $this->ownerParty = is_null($this->ownerParty) ? new OwnerParty() : $this->ownerParty;

        return $this->ownerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OwnerParty|null $ownerParty
     * @return self
     */
    public function setOwnerParty(?OwnerParty $ownerParty = null): self
    {
        $this->ownerParty = $ownerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOwnerParty(): self
    {
        $this->ownerParty = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>|null
     */
    public function getMeasurementDimension(): ?array
    {
        return $this->measurementDimension;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>|null $measurementDimension
     * @return self
     */
    public function setMeasurementDimension(?array $measurementDimension = null): self
    {
        $this->measurementDimension = $measurementDimension;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeasurementDimension(): self
    {
        $this->measurementDimension = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearMeasurementDimension(): self
    {
        $this->measurementDimension = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension $measurementDimension
     * @return self
     */
    public function addToMeasurementDimension(MeasurementDimension $measurementDimension): self
    {
        $this->measurementDimension[] = $measurementDimension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension
     */
    public function addToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        $this->addTomeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension $measurementDimension
     * @return self
     */
    public function addOnceToMeasurementDimension(MeasurementDimension $measurementDimension): self
    {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        $this->measurementDimension[0] = $measurementDimension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension
     */
    public function addOnceToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        if ($this->measurementDimension === []) {
            $this->addOnceTomeasurementDimension(new MeasurementDimension());
        }

        return $this->measurementDimension[0];
    }
}
