<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DirectionCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\JourneyID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\RegistrationNationality;
use horstoeko\invoicesuite\documents\models\peppol\cbc\RegistrationNationalityID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TradeServiceCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TransportMeansTypeCode;
use JMS\Serializer\Annotation as JMS;

class TransportMeansType
{
    use HandlesObjectFlags;

    /**
     * @var null|JourneyID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\JourneyID")
     * @JMS\Expose
     * @JMS\SerializedName("JourneyID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getJourneyID", setter="setJourneyID")
     */
    private $journeyID;

    /**
     * @var null|RegistrationNationalityID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\RegistrationNationalityID")
     * @JMS\Expose
     * @JMS\SerializedName("RegistrationNationalityID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRegistrationNationalityID", setter="setRegistrationNationalityID")
     */
    private $registrationNationalityID;

    /**
     * @var null|array<RegistrationNationality>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\RegistrationNationality>")
     * @JMS\Expose
     * @JMS\SerializedName("RegistrationNationality")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RegistrationNationality", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRegistrationNationality", setter="setRegistrationNationality")
     */
    private $registrationNationality;

    /**
     * @var null|DirectionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DirectionCode")
     * @JMS\Expose
     * @JMS\SerializedName("DirectionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDirectionCode", setter="setDirectionCode")
     */
    private $directionCode;

    /**
     * @var null|TransportMeansTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TransportMeansTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportMeansTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportMeansTypeCode", setter="setTransportMeansTypeCode")
     */
    private $transportMeansTypeCode;

    /**
     * @var null|TradeServiceCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TradeServiceCode")
     * @JMS\Expose
     * @JMS\SerializedName("TradeServiceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTradeServiceCode", setter="setTradeServiceCode")
     */
    private $tradeServiceCode;

    /**
     * @var null|Stowage
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Stowage")
     * @JMS\Expose
     * @JMS\SerializedName("Stowage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStowage", setter="setStowage")
     */
    private $stowage;

    /**
     * @var null|AirTransport
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\AirTransport")
     * @JMS\Expose
     * @JMS\SerializedName("AirTransport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAirTransport", setter="setAirTransport")
     */
    private $airTransport;

    /**
     * @var null|RoadTransport
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\RoadTransport")
     * @JMS\Expose
     * @JMS\SerializedName("RoadTransport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRoadTransport", setter="setRoadTransport")
     */
    private $roadTransport;

    /**
     * @var null|RailTransport
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\RailTransport")
     * @JMS\Expose
     * @JMS\SerializedName("RailTransport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRailTransport", setter="setRailTransport")
     */
    private $railTransport;

    /**
     * @var null|MaritimeTransport
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\MaritimeTransport")
     * @JMS\Expose
     * @JMS\SerializedName("MaritimeTransport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaritimeTransport", setter="setMaritimeTransport")
     */
    private $maritimeTransport;

    /**
     * @var null|OwnerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\OwnerParty")
     * @JMS\Expose
     * @JMS\SerializedName("OwnerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOwnerParty", setter="setOwnerParty")
     */
    private $ownerParty;

    /**
     * @var null|array<MeasurementDimension>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\MeasurementDimension>")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeasurementDimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeasurementDimension", setter="setMeasurementDimension")
     */
    private $measurementDimension;

    /**
     * @return null|JourneyID
     */
    public function getJourneyID(): ?JourneyID
    {
        return $this->journeyID;
    }

    /**
     * @return JourneyID
     */
    public function getJourneyIDWithCreate(): JourneyID
    {
        $this->journeyID = is_null($this->journeyID) ? new JourneyID() : $this->journeyID;

        return $this->journeyID;
    }

    /**
     * @param  null|JourneyID $journeyID
     * @return static
     */
    public function setJourneyID(?JourneyID $journeyID = null): static
    {
        $this->journeyID = $journeyID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetJourneyID(): static
    {
        $this->journeyID = null;

        return $this;
    }

    /**
     * @return null|RegistrationNationalityID
     */
    public function getRegistrationNationalityID(): ?RegistrationNationalityID
    {
        return $this->registrationNationalityID;
    }

    /**
     * @return RegistrationNationalityID
     */
    public function getRegistrationNationalityIDWithCreate(): RegistrationNationalityID
    {
        $this->registrationNationalityID = is_null($this->registrationNationalityID) ? new RegistrationNationalityID() : $this->registrationNationalityID;

        return $this->registrationNationalityID;
    }

    /**
     * @param  null|RegistrationNationalityID $registrationNationalityID
     * @return static
     */
    public function setRegistrationNationalityID(?RegistrationNationalityID $registrationNationalityID = null): static
    {
        $this->registrationNationalityID = $registrationNationalityID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegistrationNationalityID(): static
    {
        $this->registrationNationalityID = null;

        return $this;
    }

    /**
     * @return null|array<RegistrationNationality>
     */
    public function getRegistrationNationality(): ?array
    {
        return $this->registrationNationality;
    }

    /**
     * @param  null|array<RegistrationNationality> $registrationNationality
     * @return static
     */
    public function setRegistrationNationality(?array $registrationNationality = null): static
    {
        $this->registrationNationality = $registrationNationality;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegistrationNationality(): static
    {
        $this->registrationNationality = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRegistrationNationality(): static
    {
        $this->registrationNationality = [];

        return $this;
    }

    /**
     * @return null|RegistrationNationality
     */
    public function firstRegistrationNationality(): ?RegistrationNationality
    {
        $registrationNationality = $this->registrationNationality ?? [];
        $registrationNationality = reset($registrationNationality);

        if (false === $registrationNationality) {
            return null;
        }

        return $registrationNationality;
    }

    /**
     * @return null|RegistrationNationality
     */
    public function lastRegistrationNationality(): ?RegistrationNationality
    {
        $registrationNationality = $this->registrationNationality ?? [];
        $registrationNationality = end($registrationNationality);

        if (false === $registrationNationality) {
            return null;
        }

        return $registrationNationality;
    }

    /**
     * @param  RegistrationNationality $registrationNationality
     * @return static
     */
    public function addToRegistrationNationality(RegistrationNationality $registrationNationality): static
    {
        $this->registrationNationality[] = $registrationNationality;

        return $this;
    }

    /**
     * @return RegistrationNationality
     */
    public function addToRegistrationNationalityWithCreate(): RegistrationNationality
    {
        $this->addToregistrationNationality($registrationNationality = new RegistrationNationality());

        return $registrationNationality;
    }

    /**
     * @param  RegistrationNationality $registrationNationality
     * @return static
     */
    public function addOnceToRegistrationNationality(RegistrationNationality $registrationNationality): static
    {
        if (!is_array($this->registrationNationality)) {
            $this->registrationNationality = [];
        }

        $this->registrationNationality[0] = $registrationNationality;

        return $this;
    }

    /**
     * @return RegistrationNationality
     */
    public function addOnceToRegistrationNationalityWithCreate(): RegistrationNationality
    {
        if (!is_array($this->registrationNationality)) {
            $this->registrationNationality = [];
        }

        if ([] === $this->registrationNationality) {
            $this->addOnceToregistrationNationality(new RegistrationNationality());
        }

        return $this->registrationNationality[0];
    }

    /**
     * @return null|DirectionCode
     */
    public function getDirectionCode(): ?DirectionCode
    {
        return $this->directionCode;
    }

    /**
     * @return DirectionCode
     */
    public function getDirectionCodeWithCreate(): DirectionCode
    {
        $this->directionCode = is_null($this->directionCode) ? new DirectionCode() : $this->directionCode;

        return $this->directionCode;
    }

    /**
     * @param  null|DirectionCode $directionCode
     * @return static
     */
    public function setDirectionCode(?DirectionCode $directionCode = null): static
    {
        $this->directionCode = $directionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDirectionCode(): static
    {
        $this->directionCode = null;

        return $this;
    }

    /**
     * @return null|TransportMeansTypeCode
     */
    public function getTransportMeansTypeCode(): ?TransportMeansTypeCode
    {
        return $this->transportMeansTypeCode;
    }

    /**
     * @return TransportMeansTypeCode
     */
    public function getTransportMeansTypeCodeWithCreate(): TransportMeansTypeCode
    {
        $this->transportMeansTypeCode = is_null($this->transportMeansTypeCode) ? new TransportMeansTypeCode() : $this->transportMeansTypeCode;

        return $this->transportMeansTypeCode;
    }

    /**
     * @param  null|TransportMeansTypeCode $transportMeansTypeCode
     * @return static
     */
    public function setTransportMeansTypeCode(?TransportMeansTypeCode $transportMeansTypeCode = null): static
    {
        $this->transportMeansTypeCode = $transportMeansTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportMeansTypeCode(): static
    {
        $this->transportMeansTypeCode = null;

        return $this;
    }

    /**
     * @return null|TradeServiceCode
     */
    public function getTradeServiceCode(): ?TradeServiceCode
    {
        return $this->tradeServiceCode;
    }

    /**
     * @return TradeServiceCode
     */
    public function getTradeServiceCodeWithCreate(): TradeServiceCode
    {
        $this->tradeServiceCode = is_null($this->tradeServiceCode) ? new TradeServiceCode() : $this->tradeServiceCode;

        return $this->tradeServiceCode;
    }

    /**
     * @param  null|TradeServiceCode $tradeServiceCode
     * @return static
     */
    public function setTradeServiceCode(?TradeServiceCode $tradeServiceCode = null): static
    {
        $this->tradeServiceCode = $tradeServiceCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTradeServiceCode(): static
    {
        $this->tradeServiceCode = null;

        return $this;
    }

    /**
     * @return null|Stowage
     */
    public function getStowage(): ?Stowage
    {
        return $this->stowage;
    }

    /**
     * @return Stowage
     */
    public function getStowageWithCreate(): Stowage
    {
        $this->stowage = is_null($this->stowage) ? new Stowage() : $this->stowage;

        return $this->stowage;
    }

    /**
     * @param  null|Stowage $stowage
     * @return static
     */
    public function setStowage(?Stowage $stowage = null): static
    {
        $this->stowage = $stowage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStowage(): static
    {
        $this->stowage = null;

        return $this;
    }

    /**
     * @return null|AirTransport
     */
    public function getAirTransport(): ?AirTransport
    {
        return $this->airTransport;
    }

    /**
     * @return AirTransport
     */
    public function getAirTransportWithCreate(): AirTransport
    {
        $this->airTransport = is_null($this->airTransport) ? new AirTransport() : $this->airTransport;

        return $this->airTransport;
    }

    /**
     * @param  null|AirTransport $airTransport
     * @return static
     */
    public function setAirTransport(?AirTransport $airTransport = null): static
    {
        $this->airTransport = $airTransport;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAirTransport(): static
    {
        $this->airTransport = null;

        return $this;
    }

    /**
     * @return null|RoadTransport
     */
    public function getRoadTransport(): ?RoadTransport
    {
        return $this->roadTransport;
    }

    /**
     * @return RoadTransport
     */
    public function getRoadTransportWithCreate(): RoadTransport
    {
        $this->roadTransport = is_null($this->roadTransport) ? new RoadTransport() : $this->roadTransport;

        return $this->roadTransport;
    }

    /**
     * @param  null|RoadTransport $roadTransport
     * @return static
     */
    public function setRoadTransport(?RoadTransport $roadTransport = null): static
    {
        $this->roadTransport = $roadTransport;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRoadTransport(): static
    {
        $this->roadTransport = null;

        return $this;
    }

    /**
     * @return null|RailTransport
     */
    public function getRailTransport(): ?RailTransport
    {
        return $this->railTransport;
    }

    /**
     * @return RailTransport
     */
    public function getRailTransportWithCreate(): RailTransport
    {
        $this->railTransport = is_null($this->railTransport) ? new RailTransport() : $this->railTransport;

        return $this->railTransport;
    }

    /**
     * @param  null|RailTransport $railTransport
     * @return static
     */
    public function setRailTransport(?RailTransport $railTransport = null): static
    {
        $this->railTransport = $railTransport;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRailTransport(): static
    {
        $this->railTransport = null;

        return $this;
    }

    /**
     * @return null|MaritimeTransport
     */
    public function getMaritimeTransport(): ?MaritimeTransport
    {
        return $this->maritimeTransport;
    }

    /**
     * @return MaritimeTransport
     */
    public function getMaritimeTransportWithCreate(): MaritimeTransport
    {
        $this->maritimeTransport = is_null($this->maritimeTransport) ? new MaritimeTransport() : $this->maritimeTransport;

        return $this->maritimeTransport;
    }

    /**
     * @param  null|MaritimeTransport $maritimeTransport
     * @return static
     */
    public function setMaritimeTransport(?MaritimeTransport $maritimeTransport = null): static
    {
        $this->maritimeTransport = $maritimeTransport;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaritimeTransport(): static
    {
        $this->maritimeTransport = null;

        return $this;
    }

    /**
     * @return null|OwnerParty
     */
    public function getOwnerParty(): ?OwnerParty
    {
        return $this->ownerParty;
    }

    /**
     * @return OwnerParty
     */
    public function getOwnerPartyWithCreate(): OwnerParty
    {
        $this->ownerParty = is_null($this->ownerParty) ? new OwnerParty() : $this->ownerParty;

        return $this->ownerParty;
    }

    /**
     * @param  null|OwnerParty $ownerParty
     * @return static
     */
    public function setOwnerParty(?OwnerParty $ownerParty = null): static
    {
        $this->ownerParty = $ownerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOwnerParty(): static
    {
        $this->ownerParty = null;

        return $this;
    }

    /**
     * @return null|array<MeasurementDimension>
     */
    public function getMeasurementDimension(): ?array
    {
        return $this->measurementDimension;
    }

    /**
     * @param  null|array<MeasurementDimension> $measurementDimension
     * @return static
     */
    public function setMeasurementDimension(?array $measurementDimension = null): static
    {
        $this->measurementDimension = $measurementDimension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeasurementDimension(): static
    {
        $this->measurementDimension = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMeasurementDimension(): static
    {
        $this->measurementDimension = [];

        return $this;
    }

    /**
     * @return null|MeasurementDimension
     */
    public function firstMeasurementDimension(): ?MeasurementDimension
    {
        $measurementDimension = $this->measurementDimension ?? [];
        $measurementDimension = reset($measurementDimension);

        if (false === $measurementDimension) {
            return null;
        }

        return $measurementDimension;
    }

    /**
     * @return null|MeasurementDimension
     */
    public function lastMeasurementDimension(): ?MeasurementDimension
    {
        $measurementDimension = $this->measurementDimension ?? [];
        $measurementDimension = end($measurementDimension);

        if (false === $measurementDimension) {
            return null;
        }

        return $measurementDimension;
    }

    /**
     * @param  MeasurementDimension $measurementDimension
     * @return static
     */
    public function addToMeasurementDimension(MeasurementDimension $measurementDimension): static
    {
        $this->measurementDimension[] = $measurementDimension;

        return $this;
    }

    /**
     * @return MeasurementDimension
     */
    public function addToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        $this->addTomeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param  MeasurementDimension $measurementDimension
     * @return static
     */
    public function addOnceToMeasurementDimension(MeasurementDimension $measurementDimension): static
    {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        $this->measurementDimension[0] = $measurementDimension;

        return $this;
    }

    /**
     * @return MeasurementDimension
     */
    public function addOnceToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        if ([] === $this->measurementDimension) {
            $this->addOnceTomeasurementDimension(new MeasurementDimension());
        }

        return $this->measurementDimension[0];
    }
}
