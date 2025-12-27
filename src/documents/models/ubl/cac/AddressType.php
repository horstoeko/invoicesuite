<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AdditionalStreetName;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AddressFormatCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AddressTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\BlockName;
use horstoeko\invoicesuite\documents\models\ubl\cbc\BuildingName;
use horstoeko\invoicesuite\documents\models\ubl\cbc\BuildingNumber;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CityName;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CitySubdivisionName;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CountrySubentity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CountrySubentityCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Department;
use horstoeko\invoicesuite\documents\models\ubl\cbc\District;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Floor;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\InhouseMail;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MarkAttention;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MarkCare;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PlotIdentification;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PostalZone;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Postbox;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Region;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Room;
use horstoeko\invoicesuite\documents\models\ubl\cbc\StreetName;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TimezoneOffset;
use JMS\Serializer\Annotation as JMS;

class AddressType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|AddressTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AddressTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("AddressTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAddressTypeCode", setter="setAddressTypeCode")
     */
    private $addressTypeCode;

    /**
     * @var null|AddressFormatCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AddressFormatCode")
     * @JMS\Expose
     * @JMS\SerializedName("AddressFormatCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAddressFormatCode", setter="setAddressFormatCode")
     */
    private $addressFormatCode;

    /**
     * @var null|Postbox
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\Postbox")
     * @JMS\Expose
     * @JMS\SerializedName("Postbox")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPostbox", setter="setPostbox")
     */
    private $postbox;

    /**
     * @var null|Floor
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\Floor")
     * @JMS\Expose
     * @JMS\SerializedName("Floor")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFloor", setter="setFloor")
     */
    private $floor;

    /**
     * @var null|Room
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\Room")
     * @JMS\Expose
     * @JMS\SerializedName("Room")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRoom", setter="setRoom")
     */
    private $room;

    /**
     * @var null|StreetName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\StreetName")
     * @JMS\Expose
     * @JMS\SerializedName("StreetName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStreetName", setter="setStreetName")
     */
    private $streetName;

    /**
     * @var null|AdditionalStreetName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AdditionalStreetName")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalStreetName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdditionalStreetName", setter="setAdditionalStreetName")
     */
    private $additionalStreetName;

    /**
     * @var null|BlockName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\BlockName")
     * @JMS\Expose
     * @JMS\SerializedName("BlockName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBlockName", setter="setBlockName")
     */
    private $blockName;

    /**
     * @var null|BuildingName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\BuildingName")
     * @JMS\Expose
     * @JMS\SerializedName("BuildingName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuildingName", setter="setBuildingName")
     */
    private $buildingName;

    /**
     * @var null|BuildingNumber
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\BuildingNumber")
     * @JMS\Expose
     * @JMS\SerializedName("BuildingNumber")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuildingNumber", setter="setBuildingNumber")
     */
    private $buildingNumber;

    /**
     * @var null|InhouseMail
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\InhouseMail")
     * @JMS\Expose
     * @JMS\SerializedName("InhouseMail")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInhouseMail", setter="setInhouseMail")
     */
    private $inhouseMail;

    /**
     * @var null|Department
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\Department")
     * @JMS\Expose
     * @JMS\SerializedName("Department")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDepartment", setter="setDepartment")
     */
    private $department;

    /**
     * @var null|MarkAttention
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MarkAttention")
     * @JMS\Expose
     * @JMS\SerializedName("MarkAttention")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarkAttention", setter="setMarkAttention")
     */
    private $markAttention;

    /**
     * @var null|MarkCare
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MarkCare")
     * @JMS\Expose
     * @JMS\SerializedName("MarkCare")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarkCare", setter="setMarkCare")
     */
    private $markCare;

    /**
     * @var null|PlotIdentification
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PlotIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("PlotIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlotIdentification", setter="setPlotIdentification")
     */
    private $plotIdentification;

    /**
     * @var null|CitySubdivisionName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CitySubdivisionName")
     * @JMS\Expose
     * @JMS\SerializedName("CitySubdivisionName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCitySubdivisionName", setter="setCitySubdivisionName")
     */
    private $citySubdivisionName;

    /**
     * @var null|CityName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CityName")
     * @JMS\Expose
     * @JMS\SerializedName("CityName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCityName", setter="setCityName")
     */
    private $cityName;

    /**
     * @var null|PostalZone
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PostalZone")
     * @JMS\Expose
     * @JMS\SerializedName("PostalZone")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPostalZone", setter="setPostalZone")
     */
    private $postalZone;

    /**
     * @var null|CountrySubentity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CountrySubentity")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubentity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCountrySubentity", setter="setCountrySubentity")
     */
    private $countrySubentity;

    /**
     * @var null|CountrySubentityCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CountrySubentityCode")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubentityCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCountrySubentityCode", setter="setCountrySubentityCode")
     */
    private $countrySubentityCode;

    /**
     * @var null|Region
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\Region")
     * @JMS\Expose
     * @JMS\SerializedName("Region")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRegion", setter="setRegion")
     */
    private $region;

    /**
     * @var null|District
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\District")
     * @JMS\Expose
     * @JMS\SerializedName("District")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDistrict", setter="setDistrict")
     */
    private $district;

    /**
     * @var null|TimezoneOffset
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TimezoneOffset")
     * @JMS\Expose
     * @JMS\SerializedName("TimezoneOffset")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimezoneOffset", setter="setTimezoneOffset")
     */
    private $timezoneOffset;

    /**
     * @var null|array<AddressLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\AddressLine>")
     * @JMS\Expose
     * @JMS\SerializedName("AddressLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AddressLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAddressLine", setter="setAddressLine")
     */
    private $addressLine;

    /**
     * @var null|Country
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Country")
     * @JMS\Expose
     * @JMS\SerializedName("Country")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCountry", setter="setCountry")
     */
    private $country;

    /**
     * @var null|array<LocationCoordinate>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\LocationCoordinate>")
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
     * @return null|AddressTypeCode
     */
    public function getAddressTypeCode(): ?AddressTypeCode
    {
        return $this->addressTypeCode;
    }

    /**
     * @return AddressTypeCode
     */
    public function getAddressTypeCodeWithCreate(): AddressTypeCode
    {
        $this->addressTypeCode = is_null($this->addressTypeCode) ? new AddressTypeCode() : $this->addressTypeCode;

        return $this->addressTypeCode;
    }

    /**
     * @param  null|AddressTypeCode $addressTypeCode
     * @return static
     */
    public function setAddressTypeCode(?AddressTypeCode $addressTypeCode = null): static
    {
        $this->addressTypeCode = $addressTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAddressTypeCode(): static
    {
        $this->addressTypeCode = null;

        return $this;
    }

    /**
     * @return null|AddressFormatCode
     */
    public function getAddressFormatCode(): ?AddressFormatCode
    {
        return $this->addressFormatCode;
    }

    /**
     * @return AddressFormatCode
     */
    public function getAddressFormatCodeWithCreate(): AddressFormatCode
    {
        $this->addressFormatCode = is_null($this->addressFormatCode) ? new AddressFormatCode() : $this->addressFormatCode;

        return $this->addressFormatCode;
    }

    /**
     * @param  null|AddressFormatCode $addressFormatCode
     * @return static
     */
    public function setAddressFormatCode(?AddressFormatCode $addressFormatCode = null): static
    {
        $this->addressFormatCode = $addressFormatCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAddressFormatCode(): static
    {
        $this->addressFormatCode = null;

        return $this;
    }

    /**
     * @return null|Postbox
     */
    public function getPostbox(): ?Postbox
    {
        return $this->postbox;
    }

    /**
     * @return Postbox
     */
    public function getPostboxWithCreate(): Postbox
    {
        $this->postbox = is_null($this->postbox) ? new Postbox() : $this->postbox;

        return $this->postbox;
    }

    /**
     * @param  null|Postbox $postbox
     * @return static
     */
    public function setPostbox(?Postbox $postbox = null): static
    {
        $this->postbox = $postbox;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPostbox(): static
    {
        $this->postbox = null;

        return $this;
    }

    /**
     * @return null|Floor
     */
    public function getFloor(): ?Floor
    {
        return $this->floor;
    }

    /**
     * @return Floor
     */
    public function getFloorWithCreate(): Floor
    {
        $this->floor = is_null($this->floor) ? new Floor() : $this->floor;

        return $this->floor;
    }

    /**
     * @param  null|Floor $floor
     * @return static
     */
    public function setFloor(?Floor $floor = null): static
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFloor(): static
    {
        $this->floor = null;

        return $this;
    }

    /**
     * @return null|Room
     */
    public function getRoom(): ?Room
    {
        return $this->room;
    }

    /**
     * @return Room
     */
    public function getRoomWithCreate(): Room
    {
        $this->room = is_null($this->room) ? new Room() : $this->room;

        return $this->room;
    }

    /**
     * @param  null|Room $room
     * @return static
     */
    public function setRoom(?Room $room = null): static
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRoom(): static
    {
        $this->room = null;

        return $this;
    }

    /**
     * @return null|StreetName
     */
    public function getStreetName(): ?StreetName
    {
        return $this->streetName;
    }

    /**
     * @return StreetName
     */
    public function getStreetNameWithCreate(): StreetName
    {
        $this->streetName = is_null($this->streetName) ? new StreetName() : $this->streetName;

        return $this->streetName;
    }

    /**
     * @param  null|StreetName $streetName
     * @return static
     */
    public function setStreetName(?StreetName $streetName = null): static
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStreetName(): static
    {
        $this->streetName = null;

        return $this;
    }

    /**
     * @return null|AdditionalStreetName
     */
    public function getAdditionalStreetName(): ?AdditionalStreetName
    {
        return $this->additionalStreetName;
    }

    /**
     * @return AdditionalStreetName
     */
    public function getAdditionalStreetNameWithCreate(): AdditionalStreetName
    {
        $this->additionalStreetName = is_null($this->additionalStreetName) ? new AdditionalStreetName() : $this->additionalStreetName;

        return $this->additionalStreetName;
    }

    /**
     * @param  null|AdditionalStreetName $additionalStreetName
     * @return static
     */
    public function setAdditionalStreetName(?AdditionalStreetName $additionalStreetName = null): static
    {
        $this->additionalStreetName = $additionalStreetName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalStreetName(): static
    {
        $this->additionalStreetName = null;

        return $this;
    }

    /**
     * @return null|BlockName
     */
    public function getBlockName(): ?BlockName
    {
        return $this->blockName;
    }

    /**
     * @return BlockName
     */
    public function getBlockNameWithCreate(): BlockName
    {
        $this->blockName = is_null($this->blockName) ? new BlockName() : $this->blockName;

        return $this->blockName;
    }

    /**
     * @param  null|BlockName $blockName
     * @return static
     */
    public function setBlockName(?BlockName $blockName = null): static
    {
        $this->blockName = $blockName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBlockName(): static
    {
        $this->blockName = null;

        return $this;
    }

    /**
     * @return null|BuildingName
     */
    public function getBuildingName(): ?BuildingName
    {
        return $this->buildingName;
    }

    /**
     * @return BuildingName
     */
    public function getBuildingNameWithCreate(): BuildingName
    {
        $this->buildingName = is_null($this->buildingName) ? new BuildingName() : $this->buildingName;

        return $this->buildingName;
    }

    /**
     * @param  null|BuildingName $buildingName
     * @return static
     */
    public function setBuildingName(?BuildingName $buildingName = null): static
    {
        $this->buildingName = $buildingName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuildingName(): static
    {
        $this->buildingName = null;

        return $this;
    }

    /**
     * @return null|BuildingNumber
     */
    public function getBuildingNumber(): ?BuildingNumber
    {
        return $this->buildingNumber;
    }

    /**
     * @return BuildingNumber
     */
    public function getBuildingNumberWithCreate(): BuildingNumber
    {
        $this->buildingNumber = is_null($this->buildingNumber) ? new BuildingNumber() : $this->buildingNumber;

        return $this->buildingNumber;
    }

    /**
     * @param  null|BuildingNumber $buildingNumber
     * @return static
     */
    public function setBuildingNumber(?BuildingNumber $buildingNumber = null): static
    {
        $this->buildingNumber = $buildingNumber;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuildingNumber(): static
    {
        $this->buildingNumber = null;

        return $this;
    }

    /**
     * @return null|InhouseMail
     */
    public function getInhouseMail(): ?InhouseMail
    {
        return $this->inhouseMail;
    }

    /**
     * @return InhouseMail
     */
    public function getInhouseMailWithCreate(): InhouseMail
    {
        $this->inhouseMail = is_null($this->inhouseMail) ? new InhouseMail() : $this->inhouseMail;

        return $this->inhouseMail;
    }

    /**
     * @param  null|InhouseMail $inhouseMail
     * @return static
     */
    public function setInhouseMail(?InhouseMail $inhouseMail = null): static
    {
        $this->inhouseMail = $inhouseMail;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInhouseMail(): static
    {
        $this->inhouseMail = null;

        return $this;
    }

    /**
     * @return null|Department
     */
    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    /**
     * @return Department
     */
    public function getDepartmentWithCreate(): Department
    {
        $this->department = is_null($this->department) ? new Department() : $this->department;

        return $this->department;
    }

    /**
     * @param  null|Department $department
     * @return static
     */
    public function setDepartment(?Department $department = null): static
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDepartment(): static
    {
        $this->department = null;

        return $this;
    }

    /**
     * @return null|MarkAttention
     */
    public function getMarkAttention(): ?MarkAttention
    {
        return $this->markAttention;
    }

    /**
     * @return MarkAttention
     */
    public function getMarkAttentionWithCreate(): MarkAttention
    {
        $this->markAttention = is_null($this->markAttention) ? new MarkAttention() : $this->markAttention;

        return $this->markAttention;
    }

    /**
     * @param  null|MarkAttention $markAttention
     * @return static
     */
    public function setMarkAttention(?MarkAttention $markAttention = null): static
    {
        $this->markAttention = $markAttention;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMarkAttention(): static
    {
        $this->markAttention = null;

        return $this;
    }

    /**
     * @return null|MarkCare
     */
    public function getMarkCare(): ?MarkCare
    {
        return $this->markCare;
    }

    /**
     * @return MarkCare
     */
    public function getMarkCareWithCreate(): MarkCare
    {
        $this->markCare = is_null($this->markCare) ? new MarkCare() : $this->markCare;

        return $this->markCare;
    }

    /**
     * @param  null|MarkCare $markCare
     * @return static
     */
    public function setMarkCare(?MarkCare $markCare = null): static
    {
        $this->markCare = $markCare;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMarkCare(): static
    {
        $this->markCare = null;

        return $this;
    }

    /**
     * @return null|PlotIdentification
     */
    public function getPlotIdentification(): ?PlotIdentification
    {
        return $this->plotIdentification;
    }

    /**
     * @return PlotIdentification
     */
    public function getPlotIdentificationWithCreate(): PlotIdentification
    {
        $this->plotIdentification = is_null($this->plotIdentification) ? new PlotIdentification() : $this->plotIdentification;

        return $this->plotIdentification;
    }

    /**
     * @param  null|PlotIdentification $plotIdentification
     * @return static
     */
    public function setPlotIdentification(?PlotIdentification $plotIdentification = null): static
    {
        $this->plotIdentification = $plotIdentification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlotIdentification(): static
    {
        $this->plotIdentification = null;

        return $this;
    }

    /**
     * @return null|CitySubdivisionName
     */
    public function getCitySubdivisionName(): ?CitySubdivisionName
    {
        return $this->citySubdivisionName;
    }

    /**
     * @return CitySubdivisionName
     */
    public function getCitySubdivisionNameWithCreate(): CitySubdivisionName
    {
        $this->citySubdivisionName = is_null($this->citySubdivisionName) ? new CitySubdivisionName() : $this->citySubdivisionName;

        return $this->citySubdivisionName;
    }

    /**
     * @param  null|CitySubdivisionName $citySubdivisionName
     * @return static
     */
    public function setCitySubdivisionName(?CitySubdivisionName $citySubdivisionName = null): static
    {
        $this->citySubdivisionName = $citySubdivisionName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCitySubdivisionName(): static
    {
        $this->citySubdivisionName = null;

        return $this;
    }

    /**
     * @return null|CityName
     */
    public function getCityName(): ?CityName
    {
        return $this->cityName;
    }

    /**
     * @return CityName
     */
    public function getCityNameWithCreate(): CityName
    {
        $this->cityName = is_null($this->cityName) ? new CityName() : $this->cityName;

        return $this->cityName;
    }

    /**
     * @param  null|CityName $cityName
     * @return static
     */
    public function setCityName(?CityName $cityName = null): static
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCityName(): static
    {
        $this->cityName = null;

        return $this;
    }

    /**
     * @return null|PostalZone
     */
    public function getPostalZone(): ?PostalZone
    {
        return $this->postalZone;
    }

    /**
     * @return PostalZone
     */
    public function getPostalZoneWithCreate(): PostalZone
    {
        $this->postalZone = is_null($this->postalZone) ? new PostalZone() : $this->postalZone;

        return $this->postalZone;
    }

    /**
     * @param  null|PostalZone $postalZone
     * @return static
     */
    public function setPostalZone(?PostalZone $postalZone = null): static
    {
        $this->postalZone = $postalZone;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPostalZone(): static
    {
        $this->postalZone = null;

        return $this;
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
     * @return null|Region
     */
    public function getRegion(): ?Region
    {
        return $this->region;
    }

    /**
     * @return Region
     */
    public function getRegionWithCreate(): Region
    {
        $this->region = is_null($this->region) ? new Region() : $this->region;

        return $this->region;
    }

    /**
     * @param  null|Region $region
     * @return static
     */
    public function setRegion(?Region $region = null): static
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegion(): static
    {
        $this->region = null;

        return $this;
    }

    /**
     * @return null|District
     */
    public function getDistrict(): ?District
    {
        return $this->district;
    }

    /**
     * @return District
     */
    public function getDistrictWithCreate(): District
    {
        $this->district = is_null($this->district) ? new District() : $this->district;

        return $this->district;
    }

    /**
     * @param  null|District $district
     * @return static
     */
    public function setDistrict(?District $district = null): static
    {
        $this->district = $district;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDistrict(): static
    {
        $this->district = null;

        return $this;
    }

    /**
     * @return null|TimezoneOffset
     */
    public function getTimezoneOffset(): ?TimezoneOffset
    {
        return $this->timezoneOffset;
    }

    /**
     * @return TimezoneOffset
     */
    public function getTimezoneOffsetWithCreate(): TimezoneOffset
    {
        $this->timezoneOffset = is_null($this->timezoneOffset) ? new TimezoneOffset() : $this->timezoneOffset;

        return $this->timezoneOffset;
    }

    /**
     * @param  null|TimezoneOffset $timezoneOffset
     * @return static
     */
    public function setTimezoneOffset(?TimezoneOffset $timezoneOffset = null): static
    {
        $this->timezoneOffset = $timezoneOffset;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTimezoneOffset(): static
    {
        $this->timezoneOffset = null;

        return $this;
    }

    /**
     * @return null|array<AddressLine>
     */
    public function getAddressLine(): ?array
    {
        return $this->addressLine;
    }

    /**
     * @param  null|array<AddressLine> $addressLine
     * @return static
     */
    public function setAddressLine(?array $addressLine = null): static
    {
        $this->addressLine = $addressLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAddressLine(): static
    {
        $this->addressLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAddressLine(): static
    {
        $this->addressLine = [];

        return $this;
    }

    /**
     * @return null|AddressLine
     */
    public function firstAddressLine(): ?AddressLine
    {
        $addressLine = $this->addressLine ?? [];
        $addressLine = reset($addressLine);

        if (false === $addressLine) {
            return null;
        }

        return $addressLine;
    }

    /**
     * @return null|AddressLine
     */
    public function lastAddressLine(): ?AddressLine
    {
        $addressLine = $this->addressLine ?? [];
        $addressLine = end($addressLine);

        if (false === $addressLine) {
            return null;
        }

        return $addressLine;
    }

    /**
     * @param  AddressLine $addressLine
     * @return static
     */
    public function addToAddressLine(AddressLine $addressLine): static
    {
        $this->addressLine[] = $addressLine;

        return $this;
    }

    /**
     * @return AddressLine
     */
    public function addToAddressLineWithCreate(): AddressLine
    {
        $this->addToaddressLine($addressLine = new AddressLine());

        return $addressLine;
    }

    /**
     * @param  AddressLine $addressLine
     * @return static
     */
    public function addOnceToAddressLine(AddressLine $addressLine): static
    {
        if (!is_array($this->addressLine)) {
            $this->addressLine = [];
        }

        $this->addressLine[0] = $addressLine;

        return $this;
    }

    /**
     * @return AddressLine
     */
    public function addOnceToAddressLineWithCreate(): AddressLine
    {
        if (!is_array($this->addressLine)) {
            $this->addressLine = [];
        }

        if ([] === $this->addressLine) {
            $this->addOnceToaddressLine(new AddressLine());
        }

        return $this->addressLine[0];
    }

    /**
     * @return null|Country
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @return Country
     */
    public function getCountryWithCreate(): Country
    {
        $this->country = is_null($this->country) ? new Country() : $this->country;

        return $this->country;
    }

    /**
     * @param  null|Country $country
     * @return static
     */
    public function setCountry(?Country $country = null): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCountry(): static
    {
        $this->country = null;

        return $this;
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
