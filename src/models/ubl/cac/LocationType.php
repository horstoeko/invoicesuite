<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Conditions;
use horstoeko\invoicesuite\models\ubl\cbc\CountrySubentity;
use horstoeko\invoicesuite\models\ubl\cbc\CountrySubentityCode;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\InformationURI;
use horstoeko\invoicesuite\models\ubl\cbc\LocationTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\Name;

class LocationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Conditions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Conditions>")
     * @JMS\Expose
     * @JMS\SerializedName("Conditions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Conditions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getConditions", setter="setConditions")
     */
    private $conditions;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CountrySubentity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CountrySubentity")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubentity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCountrySubentity", setter="setCountrySubentity")
     */
    private $countrySubentity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CountrySubentityCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CountrySubentityCode")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubentityCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCountrySubentityCode", setter="setCountrySubentityCode")
     */
    private $countrySubentityCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LocationTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LocationTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("LocationTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLocationTypeCode", setter="setLocationTypeCode")
     */
    private $locationTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\InformationURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\InformationURI")
     * @JMS\Expose
     * @JMS\SerializedName("InformationURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInformationURI", setter="setInformationURI")
     */
    private $informationURI;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ValidityPeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Address|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Address")
     * @JMS\Expose
     * @JMS\SerializedName("Address")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAddress", setter="setAddress")
     */
    private $address;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SubsidiaryLocation>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SubsidiaryLocation>")
     * @JMS\Expose
     * @JMS\SerializedName("SubsidiaryLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SubsidiaryLocation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSubsidiaryLocation", setter="setSubsidiaryLocation")
     */
    private $subsidiaryLocation;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\LocationCoordinate>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\LocationCoordinate>")
     * @JMS\Expose
     * @JMS\SerializedName("LocationCoordinate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LocationCoordinate", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getLocationCoordinate", setter="setLocationCoordinate")
     */
    private $locationCoordinate;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Conditions>|null
     */
    public function getConditions(): ?array
    {
        return $this->conditions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Conditions>|null $conditions
     * @return self
     */
    public function setConditions(?array $conditions = null): self
    {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConditions(): self
    {
        $this->conditions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearConditions(): self
    {
        $this->conditions = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Conditions $conditions
     * @return self
     */
    public function addToConditions(Conditions $conditions): self
    {
        $this->conditions[] = $conditions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Conditions
     */
    public function addToConditionsWithCreate(): Conditions
    {
        $this->addToconditions($conditions = new Conditions());

        return $conditions;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Conditions $conditions
     * @return self
     */
    public function addOnceToConditions(Conditions $conditions): self
    {
        if (!is_array($this->conditions)) {
            $this->conditions = [];
        }

        $this->conditions[0] = $conditions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Conditions
     */
    public function addOnceToConditionsWithCreate(): Conditions
    {
        if (!is_array($this->conditions)) {
            $this->conditions = [];
        }

        if ($this->conditions === []) {
            $this->addOnceToconditions(new Conditions());
        }

        return $this->conditions[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CountrySubentity|null
     */
    public function getCountrySubentity(): ?CountrySubentity
    {
        return $this->countrySubentity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CountrySubentity
     */
    public function getCountrySubentityWithCreate(): CountrySubentity
    {
        $this->countrySubentity = is_null($this->countrySubentity) ? new CountrySubentity() : $this->countrySubentity;

        return $this->countrySubentity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CountrySubentity|null $countrySubentity
     * @return self
     */
    public function setCountrySubentity(?CountrySubentity $countrySubentity = null): self
    {
        $this->countrySubentity = $countrySubentity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCountrySubentity(): self
    {
        $this->countrySubentity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CountrySubentityCode|null
     */
    public function getCountrySubentityCode(): ?CountrySubentityCode
    {
        return $this->countrySubentityCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CountrySubentityCode
     */
    public function getCountrySubentityCodeWithCreate(): CountrySubentityCode
    {
        $this->countrySubentityCode = is_null($this->countrySubentityCode) ? new CountrySubentityCode() : $this->countrySubentityCode;

        return $this->countrySubentityCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CountrySubentityCode|null $countrySubentityCode
     * @return self
     */
    public function setCountrySubentityCode(?CountrySubentityCode $countrySubentityCode = null): self
    {
        $this->countrySubentityCode = $countrySubentityCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCountrySubentityCode(): self
    {
        $this->countrySubentityCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LocationTypeCode|null
     */
    public function getLocationTypeCode(): ?LocationTypeCode
    {
        return $this->locationTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LocationTypeCode
     */
    public function getLocationTypeCodeWithCreate(): LocationTypeCode
    {
        $this->locationTypeCode = is_null($this->locationTypeCode) ? new LocationTypeCode() : $this->locationTypeCode;

        return $this->locationTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LocationTypeCode|null $locationTypeCode
     * @return self
     */
    public function setLocationTypeCode(?LocationTypeCode $locationTypeCode = null): self
    {
        $this->locationTypeCode = $locationTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLocationTypeCode(): self
    {
        $this->locationTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InformationURI|null
     */
    public function getInformationURI(): ?InformationURI
    {
        return $this->informationURI;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InformationURI
     */
    public function getInformationURIWithCreate(): InformationURI
    {
        $this->informationURI = is_null($this->informationURI) ? new InformationURI() : $this->informationURI;

        return $this->informationURI;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\InformationURI|null $informationURI
     * @return self
     */
    public function setInformationURI(?InformationURI $informationURI = null): self
    {
        $this->informationURI = $informationURI;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInformationURI(): self
    {
        $this->informationURI = null;

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
     * @return self
     */
    public function unsetName(): self
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod>|null
     */
    public function getValidityPeriod(): ?array
    {
        return $this->validityPeriod;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod>|null $validityPeriod
     * @return self
     */
    public function setValidityPeriod(?array $validityPeriod = null): self
    {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetValidityPeriod(): self
    {
        $this->validityPeriod = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearValidityPeriod(): self
    {
        $this->validityPeriod = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod $validityPeriod
     * @return self
     */
    public function addToValidityPeriod(ValidityPeriod $validityPeriod): self
    {
        $this->validityPeriod[] = $validityPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod
     */
    public function addToValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->addTovalidityPeriod($validityPeriod = new ValidityPeriod());

        return $validityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod $validityPeriod
     * @return self
     */
    public function addOnceToValidityPeriod(ValidityPeriod $validityPeriod): self
    {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        $this->validityPeriod[0] = $validityPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod
     */
    public function addOnceToValidityPeriodWithCreate(): ValidityPeriod
    {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        if ($this->validityPeriod === []) {
            $this->addOnceTovalidityPeriod(new ValidityPeriod());
        }

        return $this->validityPeriod[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Address
     */
    public function getAddressWithCreate(): Address
    {
        $this->address = is_null($this->address) ? new Address() : $this->address;

        return $this->address;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Address|null $address
     * @return self
     */
    public function setAddress(?Address $address = null): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAddress(): self
    {
        $this->address = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SubsidiaryLocation>|null
     */
    public function getSubsidiaryLocation(): ?array
    {
        return $this->subsidiaryLocation;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SubsidiaryLocation>|null $subsidiaryLocation
     * @return self
     */
    public function setSubsidiaryLocation(?array $subsidiaryLocation = null): self
    {
        $this->subsidiaryLocation = $subsidiaryLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSubsidiaryLocation(): self
    {
        $this->subsidiaryLocation = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSubsidiaryLocation(): self
    {
        $this->subsidiaryLocation = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SubsidiaryLocation $subsidiaryLocation
     * @return self
     */
    public function addToSubsidiaryLocation(SubsidiaryLocation $subsidiaryLocation): self
    {
        $this->subsidiaryLocation[] = $subsidiaryLocation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SubsidiaryLocation
     */
    public function addToSubsidiaryLocationWithCreate(): SubsidiaryLocation
    {
        $this->addTosubsidiaryLocation($subsidiaryLocation = new SubsidiaryLocation());

        return $subsidiaryLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SubsidiaryLocation $subsidiaryLocation
     * @return self
     */
    public function addOnceToSubsidiaryLocation(SubsidiaryLocation $subsidiaryLocation): self
    {
        if (!is_array($this->subsidiaryLocation)) {
            $this->subsidiaryLocation = [];
        }

        $this->subsidiaryLocation[0] = $subsidiaryLocation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SubsidiaryLocation
     */
    public function addOnceToSubsidiaryLocationWithCreate(): SubsidiaryLocation
    {
        if (!is_array($this->subsidiaryLocation)) {
            $this->subsidiaryLocation = [];
        }

        if ($this->subsidiaryLocation === []) {
            $this->addOnceTosubsidiaryLocation(new SubsidiaryLocation());
        }

        return $this->subsidiaryLocation[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\LocationCoordinate>|null
     */
    public function getLocationCoordinate(): ?array
    {
        return $this->locationCoordinate;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\LocationCoordinate>|null $locationCoordinate
     * @return self
     */
    public function setLocationCoordinate(?array $locationCoordinate = null): self
    {
        $this->locationCoordinate = $locationCoordinate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLocationCoordinate(): self
    {
        $this->locationCoordinate = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearLocationCoordinate(): self
    {
        $this->locationCoordinate = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LocationCoordinate $locationCoordinate
     * @return self
     */
    public function addToLocationCoordinate(LocationCoordinate $locationCoordinate): self
    {
        $this->locationCoordinate[] = $locationCoordinate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LocationCoordinate
     */
    public function addToLocationCoordinateWithCreate(): LocationCoordinate
    {
        $this->addTolocationCoordinate($locationCoordinate = new LocationCoordinate());

        return $locationCoordinate;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LocationCoordinate $locationCoordinate
     * @return self
     */
    public function addOnceToLocationCoordinate(LocationCoordinate $locationCoordinate): self
    {
        if (!is_array($this->locationCoordinate)) {
            $this->locationCoordinate = [];
        }

        $this->locationCoordinate[0] = $locationCoordinate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LocationCoordinate
     */
    public function addOnceToLocationCoordinateWithCreate(): LocationCoordinate
    {
        if (!is_array($this->locationCoordinate)) {
            $this->locationCoordinate = [];
        }

        if ($this->locationCoordinate === []) {
            $this->addOnceTolocationCoordinate(new LocationCoordinate());
        }

        return $this->locationCoordinate[0];
    }
}
