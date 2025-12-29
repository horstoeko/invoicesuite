<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Conditions;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CountrySubentity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CountrySubentityCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\InformationURI;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LocationTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use JMS\Serializer\Annotation as JMS;

class LocationType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|array<Conditions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Conditions>")
     * @JMS\Expose
     * @JMS\SerializedName("Conditions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Conditions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getConditions", setter="setConditions")
     */
    private $conditions;

    /**
     * @var null|CountrySubentity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CountrySubentity")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubentity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCountrySubentity", setter="setCountrySubentity")
     */
    private $countrySubentity;

    /**
     * @var null|CountrySubentityCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CountrySubentityCode")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubentityCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCountrySubentityCode", setter="setCountrySubentityCode")
     */
    private $countrySubentityCode;

    /**
     * @var null|LocationTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\LocationTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("LocationTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLocationTypeCode", setter="setLocationTypeCode")
     */
    private $locationTypeCode;

    /**
     * @var null|InformationURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\InformationURI")
     * @JMS\Expose
     * @JMS\SerializedName("InformationURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInformationURI", setter="setInformationURI")
     */
    private $informationURI;

    /**
     * @var null|Name
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|array<ValidityPeriod>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ValidityPeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ValidityPeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

    /**
     * @var null|Address
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Address")
     * @JMS\Expose
     * @JMS\SerializedName("Address")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAddress", setter="setAddress")
     */
    private $address;

    /**
     * @var null|array<SubsidiaryLocation>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\SubsidiaryLocation>")
     * @JMS\Expose
     * @JMS\SerializedName("SubsidiaryLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SubsidiaryLocation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSubsidiaryLocation", setter="setSubsidiaryLocation")
     */
    private $subsidiaryLocation;

    /**
     * @var null|array<LocationCoordinate>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\LocationCoordinate>")
     * @JMS\Expose
     * @JMS\SerializedName("LocationCoordinate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LocationCoordinate", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getLocationCoordinate", setter="setLocationCoordinate")
     */
    private $locationCoordinate;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|array<Conditions>
     */
    public function getConditions(): ?array
    {
        return $this->conditions;
    }

    /**
     * @param  null|array<Conditions> $conditions
     * @return static
     */
    public function setConditions(?array $conditions = null): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConditions(): static
    {
        $this->conditions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearConditions(): static
    {
        $this->conditions = [];

        return $this;
    }

    /**
     * @return null|Conditions
     */
    public function firstConditions(): ?Conditions
    {
        $conditions = $this->conditions ?? [];
        $conditions = reset($conditions);

        if (false === $conditions) {
            return null;
        }

        return $conditions;
    }

    /**
     * @return null|Conditions
     */
    public function lastConditions(): ?Conditions
    {
        $conditions = $this->conditions ?? [];
        $conditions = end($conditions);

        if (false === $conditions) {
            return null;
        }

        return $conditions;
    }

    /**
     * @param  Conditions $conditions
     * @return static
     */
    public function addToConditions(Conditions $conditions): static
    {
        $this->conditions[] = $conditions;

        return $this;
    }

    /**
     * @return Conditions
     */
    public function addToConditionsWithCreate(): Conditions
    {
        $this->addToconditions($conditions = new Conditions());

        return $conditions;
    }

    /**
     * @param  Conditions $conditions
     * @return static
     */
    public function addOnceToConditions(Conditions $conditions): static
    {
        if (!is_array($this->conditions)) {
            $this->conditions = [];
        }

        $this->conditions[0] = $conditions;

        return $this;
    }

    /**
     * @return Conditions
     */
    public function addOnceToConditionsWithCreate(): Conditions
    {
        if (!is_array($this->conditions)) {
            $this->conditions = [];
        }

        if ([] === $this->conditions) {
            $this->addOnceToconditions(new Conditions());
        }

        return $this->conditions[0];
    }

    /**
     * @return null|CountrySubentity
     */
    public function getCountrySubentity(): ?CountrySubentity
    {
        return $this->countrySubentity;
    }

    /**
     * @return CountrySubentity
     */
    public function getCountrySubentityWithCreate(): CountrySubentity
    {
        $this->countrySubentity = is_null($this->countrySubentity) ? new CountrySubentity() : $this->countrySubentity;

        return $this->countrySubentity;
    }

    /**
     * @param  null|CountrySubentity $countrySubentity
     * @return static
     */
    public function setCountrySubentity(?CountrySubentity $countrySubentity = null): static
    {
        $this->countrySubentity = $countrySubentity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCountrySubentity(): static
    {
        $this->countrySubentity = null;

        return $this;
    }

    /**
     * @return null|CountrySubentityCode
     */
    public function getCountrySubentityCode(): ?CountrySubentityCode
    {
        return $this->countrySubentityCode;
    }

    /**
     * @return CountrySubentityCode
     */
    public function getCountrySubentityCodeWithCreate(): CountrySubentityCode
    {
        $this->countrySubentityCode = is_null($this->countrySubentityCode) ? new CountrySubentityCode() : $this->countrySubentityCode;

        return $this->countrySubentityCode;
    }

    /**
     * @param  null|CountrySubentityCode $countrySubentityCode
     * @return static
     */
    public function setCountrySubentityCode(?CountrySubentityCode $countrySubentityCode = null): static
    {
        $this->countrySubentityCode = $countrySubentityCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCountrySubentityCode(): static
    {
        $this->countrySubentityCode = null;

        return $this;
    }

    /**
     * @return null|LocationTypeCode
     */
    public function getLocationTypeCode(): ?LocationTypeCode
    {
        return $this->locationTypeCode;
    }

    /**
     * @return LocationTypeCode
     */
    public function getLocationTypeCodeWithCreate(): LocationTypeCode
    {
        $this->locationTypeCode = is_null($this->locationTypeCode) ? new LocationTypeCode() : $this->locationTypeCode;

        return $this->locationTypeCode;
    }

    /**
     * @param  null|LocationTypeCode $locationTypeCode
     * @return static
     */
    public function setLocationTypeCode(?LocationTypeCode $locationTypeCode = null): static
    {
        $this->locationTypeCode = $locationTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLocationTypeCode(): static
    {
        $this->locationTypeCode = null;

        return $this;
    }

    /**
     * @return null|InformationURI
     */
    public function getInformationURI(): ?InformationURI
    {
        return $this->informationURI;
    }

    /**
     * @return InformationURI
     */
    public function getInformationURIWithCreate(): InformationURI
    {
        $this->informationURI = is_null($this->informationURI) ? new InformationURI() : $this->informationURI;

        return $this->informationURI;
    }

    /**
     * @param  null|InformationURI $informationURI
     * @return static
     */
    public function setInformationURI(?InformationURI $informationURI = null): static
    {
        $this->informationURI = $informationURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInformationURI(): static
    {
        $this->informationURI = null;

        return $this;
    }

    /**
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(?Name $name = null): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return null|array<ValidityPeriod>
     */
    public function getValidityPeriod(): ?array
    {
        return $this->validityPeriod;
    }

    /**
     * @param  null|array<ValidityPeriod> $validityPeriod
     * @return static
     */
    public function setValidityPeriod(?array $validityPeriod = null): static
    {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidityPeriod(): static
    {
        $this->validityPeriod = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearValidityPeriod(): static
    {
        $this->validityPeriod = [];

        return $this;
    }

    /**
     * @return null|ValidityPeriod
     */
    public function firstValidityPeriod(): ?ValidityPeriod
    {
        $validityPeriod = $this->validityPeriod ?? [];
        $validityPeriod = reset($validityPeriod);

        if (false === $validityPeriod) {
            return null;
        }

        return $validityPeriod;
    }

    /**
     * @return null|ValidityPeriod
     */
    public function lastValidityPeriod(): ?ValidityPeriod
    {
        $validityPeriod = $this->validityPeriod ?? [];
        $validityPeriod = end($validityPeriod);

        if (false === $validityPeriod) {
            return null;
        }

        return $validityPeriod;
    }

    /**
     * @param  ValidityPeriod $validityPeriod
     * @return static
     */
    public function addToValidityPeriod(ValidityPeriod $validityPeriod): static
    {
        $this->validityPeriod[] = $validityPeriod;

        return $this;
    }

    /**
     * @return ValidityPeriod
     */
    public function addToValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->addTovalidityPeriod($validityPeriod = new ValidityPeriod());

        return $validityPeriod;
    }

    /**
     * @param  ValidityPeriod $validityPeriod
     * @return static
     */
    public function addOnceToValidityPeriod(ValidityPeriod $validityPeriod): static
    {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        $this->validityPeriod[0] = $validityPeriod;

        return $this;
    }

    /**
     * @return ValidityPeriod
     */
    public function addOnceToValidityPeriodWithCreate(): ValidityPeriod
    {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        if ([] === $this->validityPeriod) {
            $this->addOnceTovalidityPeriod(new ValidityPeriod());
        }

        return $this->validityPeriod[0];
    }

    /**
     * @return null|Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @return Address
     */
    public function getAddressWithCreate(): Address
    {
        $this->address = is_null($this->address) ? new Address() : $this->address;

        return $this->address;
    }

    /**
     * @param  null|Address $address
     * @return static
     */
    public function setAddress(?Address $address = null): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAddress(): static
    {
        $this->address = null;

        return $this;
    }

    /**
     * @return null|array<SubsidiaryLocation>
     */
    public function getSubsidiaryLocation(): ?array
    {
        return $this->subsidiaryLocation;
    }

    /**
     * @param  null|array<SubsidiaryLocation> $subsidiaryLocation
     * @return static
     */
    public function setSubsidiaryLocation(?array $subsidiaryLocation = null): static
    {
        $this->subsidiaryLocation = $subsidiaryLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubsidiaryLocation(): static
    {
        $this->subsidiaryLocation = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSubsidiaryLocation(): static
    {
        $this->subsidiaryLocation = [];

        return $this;
    }

    /**
     * @return null|SubsidiaryLocation
     */
    public function firstSubsidiaryLocation(): ?SubsidiaryLocation
    {
        $subsidiaryLocation = $this->subsidiaryLocation ?? [];
        $subsidiaryLocation = reset($subsidiaryLocation);

        if (false === $subsidiaryLocation) {
            return null;
        }

        return $subsidiaryLocation;
    }

    /**
     * @return null|SubsidiaryLocation
     */
    public function lastSubsidiaryLocation(): ?SubsidiaryLocation
    {
        $subsidiaryLocation = $this->subsidiaryLocation ?? [];
        $subsidiaryLocation = end($subsidiaryLocation);

        if (false === $subsidiaryLocation) {
            return null;
        }

        return $subsidiaryLocation;
    }

    /**
     * @param  SubsidiaryLocation $subsidiaryLocation
     * @return static
     */
    public function addToSubsidiaryLocation(SubsidiaryLocation $subsidiaryLocation): static
    {
        $this->subsidiaryLocation[] = $subsidiaryLocation;

        return $this;
    }

    /**
     * @return SubsidiaryLocation
     */
    public function addToSubsidiaryLocationWithCreate(): SubsidiaryLocation
    {
        $this->addTosubsidiaryLocation($subsidiaryLocation = new SubsidiaryLocation());

        return $subsidiaryLocation;
    }

    /**
     * @param  SubsidiaryLocation $subsidiaryLocation
     * @return static
     */
    public function addOnceToSubsidiaryLocation(SubsidiaryLocation $subsidiaryLocation): static
    {
        if (!is_array($this->subsidiaryLocation)) {
            $this->subsidiaryLocation = [];
        }

        $this->subsidiaryLocation[0] = $subsidiaryLocation;

        return $this;
    }

    /**
     * @return SubsidiaryLocation
     */
    public function addOnceToSubsidiaryLocationWithCreate(): SubsidiaryLocation
    {
        if (!is_array($this->subsidiaryLocation)) {
            $this->subsidiaryLocation = [];
        }

        if ([] === $this->subsidiaryLocation) {
            $this->addOnceTosubsidiaryLocation(new SubsidiaryLocation());
        }

        return $this->subsidiaryLocation[0];
    }

    /**
     * @return null|array<LocationCoordinate>
     */
    public function getLocationCoordinate(): ?array
    {
        return $this->locationCoordinate;
    }

    /**
     * @param  null|array<LocationCoordinate> $locationCoordinate
     * @return static
     */
    public function setLocationCoordinate(?array $locationCoordinate = null): static
    {
        $this->locationCoordinate = $locationCoordinate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLocationCoordinate(): static
    {
        $this->locationCoordinate = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearLocationCoordinate(): static
    {
        $this->locationCoordinate = [];

        return $this;
    }

    /**
     * @return null|LocationCoordinate
     */
    public function firstLocationCoordinate(): ?LocationCoordinate
    {
        $locationCoordinate = $this->locationCoordinate ?? [];
        $locationCoordinate = reset($locationCoordinate);

        if (false === $locationCoordinate) {
            return null;
        }

        return $locationCoordinate;
    }

    /**
     * @return null|LocationCoordinate
     */
    public function lastLocationCoordinate(): ?LocationCoordinate
    {
        $locationCoordinate = $this->locationCoordinate ?? [];
        $locationCoordinate = end($locationCoordinate);

        if (false === $locationCoordinate) {
            return null;
        }

        return $locationCoordinate;
    }

    /**
     * @param  LocationCoordinate $locationCoordinate
     * @return static
     */
    public function addToLocationCoordinate(LocationCoordinate $locationCoordinate): static
    {
        $this->locationCoordinate[] = $locationCoordinate;

        return $this;
    }

    /**
     * @return LocationCoordinate
     */
    public function addToLocationCoordinateWithCreate(): LocationCoordinate
    {
        $this->addTolocationCoordinate($locationCoordinate = new LocationCoordinate());

        return $locationCoordinate;
    }

    /**
     * @param  LocationCoordinate $locationCoordinate
     * @return static
     */
    public function addOnceToLocationCoordinate(LocationCoordinate $locationCoordinate): static
    {
        if (!is_array($this->locationCoordinate)) {
            $this->locationCoordinate = [];
        }

        $this->locationCoordinate[0] = $locationCoordinate;

        return $this;
    }

    /**
     * @return LocationCoordinate
     */
    public function addOnceToLocationCoordinateWithCreate(): LocationCoordinate
    {
        if (!is_array($this->locationCoordinate)) {
            $this->locationCoordinate = [];
        }

        if ([] === $this->locationCoordinate) {
            $this->addOnceTolocationCoordinate(new LocationCoordinate());
        }

        return $this->locationCoordinate[0];
    }
}
