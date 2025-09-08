<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AdditionalStreetName;
use horstoeko\invoicesuite\models\ubl\cbc\AddressFormatCode;
use horstoeko\invoicesuite\models\ubl\cbc\AddressTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\BlockName;
use horstoeko\invoicesuite\models\ubl\cbc\BuildingName;
use horstoeko\invoicesuite\models\ubl\cbc\BuildingNumber;
use horstoeko\invoicesuite\models\ubl\cbc\CityName;
use horstoeko\invoicesuite\models\ubl\cbc\CitySubdivisionName;
use horstoeko\invoicesuite\models\ubl\cbc\CountrySubentity;
use horstoeko\invoicesuite\models\ubl\cbc\CountrySubentityCode;
use horstoeko\invoicesuite\models\ubl\cbc\Department;
use horstoeko\invoicesuite\models\ubl\cbc\District;
use horstoeko\invoicesuite\models\ubl\cbc\Floor;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\InhouseMail;
use horstoeko\invoicesuite\models\ubl\cbc\MarkAttention;
use horstoeko\invoicesuite\models\ubl\cbc\MarkCare;
use horstoeko\invoicesuite\models\ubl\cbc\PlotIdentification;
use horstoeko\invoicesuite\models\ubl\cbc\PostalZone;
use horstoeko\invoicesuite\models\ubl\cbc\Postbox;
use horstoeko\invoicesuite\models\ubl\cbc\Region;
use horstoeko\invoicesuite\models\ubl\cbc\Room;
use horstoeko\invoicesuite\models\ubl\cbc\StreetName;
use horstoeko\invoicesuite\models\ubl\cbc\TimezoneOffset;

class AddressType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AddressTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AddressTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("AddressTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAddressTypeCode", setter="setAddressTypeCode")
     */
    private $addressTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AddressFormatCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AddressFormatCode")
     * @JMS\Expose
     * @JMS\SerializedName("AddressFormatCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAddressFormatCode", setter="setAddressFormatCode")
     */
    private $addressFormatCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Postbox|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Postbox")
     * @JMS\Expose
     * @JMS\SerializedName("Postbox")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPostbox", setter="setPostbox")
     */
    private $postbox;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Floor|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Floor")
     * @JMS\Expose
     * @JMS\SerializedName("Floor")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFloor", setter="setFloor")
     */
    private $floor;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Room|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Room")
     * @JMS\Expose
     * @JMS\SerializedName("Room")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRoom", setter="setRoom")
     */
    private $room;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\StreetName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\StreetName")
     * @JMS\Expose
     * @JMS\SerializedName("StreetName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStreetName", setter="setStreetName")
     */
    private $streetName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AdditionalStreetName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AdditionalStreetName")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalStreetName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdditionalStreetName", setter="setAdditionalStreetName")
     */
    private $additionalStreetName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BlockName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BlockName")
     * @JMS\Expose
     * @JMS\SerializedName("BlockName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBlockName", setter="setBlockName")
     */
    private $blockName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BuildingName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BuildingName")
     * @JMS\Expose
     * @JMS\SerializedName("BuildingName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuildingName", setter="setBuildingName")
     */
    private $buildingName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BuildingNumber|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BuildingNumber")
     * @JMS\Expose
     * @JMS\SerializedName("BuildingNumber")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuildingNumber", setter="setBuildingNumber")
     */
    private $buildingNumber;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\InhouseMail|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\InhouseMail")
     * @JMS\Expose
     * @JMS\SerializedName("InhouseMail")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInhouseMail", setter="setInhouseMail")
     */
    private $inhouseMail;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Department|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Department")
     * @JMS\Expose
     * @JMS\SerializedName("Department")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDepartment", setter="setDepartment")
     */
    private $department;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MarkAttention|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MarkAttention")
     * @JMS\Expose
     * @JMS\SerializedName("MarkAttention")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarkAttention", setter="setMarkAttention")
     */
    private $markAttention;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MarkCare|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MarkCare")
     * @JMS\Expose
     * @JMS\SerializedName("MarkCare")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarkCare", setter="setMarkCare")
     */
    private $markCare;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PlotIdentification|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PlotIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("PlotIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlotIdentification", setter="setPlotIdentification")
     */
    private $plotIdentification;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CitySubdivisionName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CitySubdivisionName")
     * @JMS\Expose
     * @JMS\SerializedName("CitySubdivisionName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCitySubdivisionName", setter="setCitySubdivisionName")
     */
    private $citySubdivisionName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CityName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CityName")
     * @JMS\Expose
     * @JMS\SerializedName("CityName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCityName", setter="setCityName")
     */
    private $cityName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PostalZone|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PostalZone")
     * @JMS\Expose
     * @JMS\SerializedName("PostalZone")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPostalZone", setter="setPostalZone")
     */
    private $postalZone;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Region|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Region")
     * @JMS\Expose
     * @JMS\SerializedName("Region")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRegion", setter="setRegion")
     */
    private $region;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\District|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\District")
     * @JMS\Expose
     * @JMS\SerializedName("District")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDistrict", setter="setDistrict")
     */
    private $district;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TimezoneOffset|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TimezoneOffset")
     * @JMS\Expose
     * @JMS\SerializedName("TimezoneOffset")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimezoneOffset", setter="setTimezoneOffset")
     */
    private $timezoneOffset;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AddressLine>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AddressLine>")
     * @JMS\Expose
     * @JMS\SerializedName("AddressLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AddressLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAddressLine", setter="setAddressLine")
     */
    private $addressLine;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Country|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Country")
     * @JMS\Expose
     * @JMS\SerializedName("Country")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCountry", setter="setCountry")
     */
    private $country;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AddressTypeCode|null
     */
    public function getAddressTypeCode(): ?AddressTypeCode
    {
        return $this->addressTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AddressTypeCode
     */
    public function getAddressTypeCodeWithCreate(): AddressTypeCode
    {
        $this->addressTypeCode = is_null($this->addressTypeCode) ? new AddressTypeCode() : $this->addressTypeCode;

        return $this->addressTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AddressTypeCode|null $addressTypeCode
     * @return self
     */
    public function setAddressTypeCode(?AddressTypeCode $addressTypeCode = null): self
    {
        $this->addressTypeCode = $addressTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAddressTypeCode(): self
    {
        $this->addressTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AddressFormatCode|null
     */
    public function getAddressFormatCode(): ?AddressFormatCode
    {
        return $this->addressFormatCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AddressFormatCode
     */
    public function getAddressFormatCodeWithCreate(): AddressFormatCode
    {
        $this->addressFormatCode = is_null($this->addressFormatCode) ? new AddressFormatCode() : $this->addressFormatCode;

        return $this->addressFormatCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AddressFormatCode|null $addressFormatCode
     * @return self
     */
    public function setAddressFormatCode(?AddressFormatCode $addressFormatCode = null): self
    {
        $this->addressFormatCode = $addressFormatCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAddressFormatCode(): self
    {
        $this->addressFormatCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Postbox|null
     */
    public function getPostbox(): ?Postbox
    {
        return $this->postbox;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Postbox
     */
    public function getPostboxWithCreate(): Postbox
    {
        $this->postbox = is_null($this->postbox) ? new Postbox() : $this->postbox;

        return $this->postbox;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Postbox|null $postbox
     * @return self
     */
    public function setPostbox(?Postbox $postbox = null): self
    {
        $this->postbox = $postbox;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPostbox(): self
    {
        $this->postbox = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Floor|null
     */
    public function getFloor(): ?Floor
    {
        return $this->floor;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Floor
     */
    public function getFloorWithCreate(): Floor
    {
        $this->floor = is_null($this->floor) ? new Floor() : $this->floor;

        return $this->floor;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Floor|null $floor
     * @return self
     */
    public function setFloor(?Floor $floor = null): self
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFloor(): self
    {
        $this->floor = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Room|null
     */
    public function getRoom(): ?Room
    {
        return $this->room;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Room
     */
    public function getRoomWithCreate(): Room
    {
        $this->room = is_null($this->room) ? new Room() : $this->room;

        return $this->room;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Room|null $room
     * @return self
     */
    public function setRoom(?Room $room = null): self
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRoom(): self
    {
        $this->room = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\StreetName|null
     */
    public function getStreetName(): ?StreetName
    {
        return $this->streetName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\StreetName
     */
    public function getStreetNameWithCreate(): StreetName
    {
        $this->streetName = is_null($this->streetName) ? new StreetName() : $this->streetName;

        return $this->streetName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\StreetName|null $streetName
     * @return self
     */
    public function setStreetName(?StreetName $streetName = null): self
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStreetName(): self
    {
        $this->streetName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdditionalStreetName|null
     */
    public function getAdditionalStreetName(): ?AdditionalStreetName
    {
        return $this->additionalStreetName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdditionalStreetName
     */
    public function getAdditionalStreetNameWithCreate(): AdditionalStreetName
    {
        $this->additionalStreetName = is_null($this->additionalStreetName) ? new AdditionalStreetName() : $this->additionalStreetName;

        return $this->additionalStreetName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdditionalStreetName|null $additionalStreetName
     * @return self
     */
    public function setAdditionalStreetName(?AdditionalStreetName $additionalStreetName = null): self
    {
        $this->additionalStreetName = $additionalStreetName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalStreetName(): self
    {
        $this->additionalStreetName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BlockName|null
     */
    public function getBlockName(): ?BlockName
    {
        return $this->blockName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BlockName
     */
    public function getBlockNameWithCreate(): BlockName
    {
        $this->blockName = is_null($this->blockName) ? new BlockName() : $this->blockName;

        return $this->blockName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BlockName|null $blockName
     * @return self
     */
    public function setBlockName(?BlockName $blockName = null): self
    {
        $this->blockName = $blockName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBlockName(): self
    {
        $this->blockName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BuildingName|null
     */
    public function getBuildingName(): ?BuildingName
    {
        return $this->buildingName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BuildingName
     */
    public function getBuildingNameWithCreate(): BuildingName
    {
        $this->buildingName = is_null($this->buildingName) ? new BuildingName() : $this->buildingName;

        return $this->buildingName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BuildingName|null $buildingName
     * @return self
     */
    public function setBuildingName(?BuildingName $buildingName = null): self
    {
        $this->buildingName = $buildingName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBuildingName(): self
    {
        $this->buildingName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BuildingNumber|null
     */
    public function getBuildingNumber(): ?BuildingNumber
    {
        return $this->buildingNumber;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BuildingNumber
     */
    public function getBuildingNumberWithCreate(): BuildingNumber
    {
        $this->buildingNumber = is_null($this->buildingNumber) ? new BuildingNumber() : $this->buildingNumber;

        return $this->buildingNumber;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BuildingNumber|null $buildingNumber
     * @return self
     */
    public function setBuildingNumber(?BuildingNumber $buildingNumber = null): self
    {
        $this->buildingNumber = $buildingNumber;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBuildingNumber(): self
    {
        $this->buildingNumber = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InhouseMail|null
     */
    public function getInhouseMail(): ?InhouseMail
    {
        return $this->inhouseMail;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InhouseMail
     */
    public function getInhouseMailWithCreate(): InhouseMail
    {
        $this->inhouseMail = is_null($this->inhouseMail) ? new InhouseMail() : $this->inhouseMail;

        return $this->inhouseMail;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\InhouseMail|null $inhouseMail
     * @return self
     */
    public function setInhouseMail(?InhouseMail $inhouseMail = null): self
    {
        $this->inhouseMail = $inhouseMail;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInhouseMail(): self
    {
        $this->inhouseMail = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Department|null
     */
    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Department
     */
    public function getDepartmentWithCreate(): Department
    {
        $this->department = is_null($this->department) ? new Department() : $this->department;

        return $this->department;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Department|null $department
     * @return self
     */
    public function setDepartment(?Department $department = null): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDepartment(): self
    {
        $this->department = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MarkAttention|null
     */
    public function getMarkAttention(): ?MarkAttention
    {
        return $this->markAttention;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MarkAttention
     */
    public function getMarkAttentionWithCreate(): MarkAttention
    {
        $this->markAttention = is_null($this->markAttention) ? new MarkAttention() : $this->markAttention;

        return $this->markAttention;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MarkAttention|null $markAttention
     * @return self
     */
    public function setMarkAttention(?MarkAttention $markAttention = null): self
    {
        $this->markAttention = $markAttention;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMarkAttention(): self
    {
        $this->markAttention = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MarkCare|null
     */
    public function getMarkCare(): ?MarkCare
    {
        return $this->markCare;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MarkCare
     */
    public function getMarkCareWithCreate(): MarkCare
    {
        $this->markCare = is_null($this->markCare) ? new MarkCare() : $this->markCare;

        return $this->markCare;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MarkCare|null $markCare
     * @return self
     */
    public function setMarkCare(?MarkCare $markCare = null): self
    {
        $this->markCare = $markCare;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMarkCare(): self
    {
        $this->markCare = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PlotIdentification|null
     */
    public function getPlotIdentification(): ?PlotIdentification
    {
        return $this->plotIdentification;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PlotIdentification
     */
    public function getPlotIdentificationWithCreate(): PlotIdentification
    {
        $this->plotIdentification = is_null($this->plotIdentification) ? new PlotIdentification() : $this->plotIdentification;

        return $this->plotIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PlotIdentification|null $plotIdentification
     * @return self
     */
    public function setPlotIdentification(?PlotIdentification $plotIdentification = null): self
    {
        $this->plotIdentification = $plotIdentification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPlotIdentification(): self
    {
        $this->plotIdentification = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CitySubdivisionName|null
     */
    public function getCitySubdivisionName(): ?CitySubdivisionName
    {
        return $this->citySubdivisionName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CitySubdivisionName
     */
    public function getCitySubdivisionNameWithCreate(): CitySubdivisionName
    {
        $this->citySubdivisionName = is_null($this->citySubdivisionName) ? new CitySubdivisionName() : $this->citySubdivisionName;

        return $this->citySubdivisionName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CitySubdivisionName|null $citySubdivisionName
     * @return self
     */
    public function setCitySubdivisionName(?CitySubdivisionName $citySubdivisionName = null): self
    {
        $this->citySubdivisionName = $citySubdivisionName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCitySubdivisionName(): self
    {
        $this->citySubdivisionName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CityName|null
     */
    public function getCityName(): ?CityName
    {
        return $this->cityName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CityName
     */
    public function getCityNameWithCreate(): CityName
    {
        $this->cityName = is_null($this->cityName) ? new CityName() : $this->cityName;

        return $this->cityName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CityName|null $cityName
     * @return self
     */
    public function setCityName(?CityName $cityName = null): self
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCityName(): self
    {
        $this->cityName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PostalZone|null
     */
    public function getPostalZone(): ?PostalZone
    {
        return $this->postalZone;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PostalZone
     */
    public function getPostalZoneWithCreate(): PostalZone
    {
        $this->postalZone = is_null($this->postalZone) ? new PostalZone() : $this->postalZone;

        return $this->postalZone;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PostalZone|null $postalZone
     * @return self
     */
    public function setPostalZone(?PostalZone $postalZone = null): self
    {
        $this->postalZone = $postalZone;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPostalZone(): self
    {
        $this->postalZone = null;

        return $this;
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Region|null
     */
    public function getRegion(): ?Region
    {
        return $this->region;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Region
     */
    public function getRegionWithCreate(): Region
    {
        $this->region = is_null($this->region) ? new Region() : $this->region;

        return $this->region;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Region|null $region
     * @return self
     */
    public function setRegion(?Region $region = null): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRegion(): self
    {
        $this->region = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\District|null
     */
    public function getDistrict(): ?District
    {
        return $this->district;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\District
     */
    public function getDistrictWithCreate(): District
    {
        $this->district = is_null($this->district) ? new District() : $this->district;

        return $this->district;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\District|null $district
     * @return self
     */
    public function setDistrict(?District $district = null): self
    {
        $this->district = $district;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDistrict(): self
    {
        $this->district = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TimezoneOffset|null
     */
    public function getTimezoneOffset(): ?TimezoneOffset
    {
        return $this->timezoneOffset;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TimezoneOffset
     */
    public function getTimezoneOffsetWithCreate(): TimezoneOffset
    {
        $this->timezoneOffset = is_null($this->timezoneOffset) ? new TimezoneOffset() : $this->timezoneOffset;

        return $this->timezoneOffset;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TimezoneOffset|null $timezoneOffset
     * @return self
     */
    public function setTimezoneOffset(?TimezoneOffset $timezoneOffset = null): self
    {
        $this->timezoneOffset = $timezoneOffset;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTimezoneOffset(): self
    {
        $this->timezoneOffset = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AddressLine>|null
     */
    public function getAddressLine(): ?array
    {
        return $this->addressLine;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AddressLine>|null $addressLine
     * @return self
     */
    public function setAddressLine(?array $addressLine = null): self
    {
        $this->addressLine = $addressLine;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAddressLine(): self
    {
        $this->addressLine = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAddressLine(): self
    {
        $this->addressLine = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AddressLine $addressLine
     * @return self
     */
    public function addToAddressLine(AddressLine $addressLine): self
    {
        $this->addressLine[] = $addressLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AddressLine
     */
    public function addToAddressLineWithCreate(): AddressLine
    {
        $this->addToaddressLine($addressLine = new AddressLine());

        return $addressLine;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AddressLine $addressLine
     * @return self
     */
    public function addOnceToAddressLine(AddressLine $addressLine): self
    {
        if (!is_array($this->addressLine)) {
            $this->addressLine = [];
        }

        $this->addressLine[0] = $addressLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AddressLine
     */
    public function addOnceToAddressLineWithCreate(): AddressLine
    {
        if (!is_array($this->addressLine)) {
            $this->addressLine = [];
        }

        if ($this->addressLine === []) {
            $this->addOnceToaddressLine(new AddressLine());
        }

        return $this->addressLine[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Country
     */
    public function getCountryWithCreate(): Country
    {
        $this->country = is_null($this->country) ? new Country() : $this->country;

        return $this->country;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Country|null $country
     * @return self
     */
    public function setCountry(?Country $country = null): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCountry(): self
    {
        $this->country = null;

        return $this;
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
