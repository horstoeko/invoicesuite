<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdditionalStreetName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AddressFormatCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AddressTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BlockName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BuildingName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BuildingNumber;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CityName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CitySubdivisionName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CountrySubentity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CountrySubentityCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Department;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\District;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Floor;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InhouseMail;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MarkAttention;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MarkCare;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PlotIdentification;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PostalZone;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Postbox;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Region;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Room;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\StreetName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimezoneOffset;
use JMS\Serializer\Annotation as JMS;

class AddressType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|AddressTypeCode
     */
    #[JMS\Accessor(getter: 'getAddressTypeCode', setter: 'setAddressTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AddressTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AddressTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $addressTypeCode;

    /**
     * @var null|AddressFormatCode
     */
    #[JMS\Accessor(getter: 'getAddressFormatCode', setter: 'setAddressFormatCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AddressFormatCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AddressFormatCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $addressFormatCode;

    /**
     * @var null|Postbox
     */
    #[JMS\Accessor(getter: 'getPostbox', setter: 'setPostbox')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Postbox')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Postbox')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $postbox;

    /**
     * @var null|Floor
     */
    #[JMS\Accessor(getter: 'getFloor', setter: 'setFloor')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Floor')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Floor')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $floor;

    /**
     * @var null|Room
     */
    #[JMS\Accessor(getter: 'getRoom', setter: 'setRoom')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Room')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Room')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $room;

    /**
     * @var null|StreetName
     */
    #[JMS\Accessor(getter: 'getStreetName', setter: 'setStreetName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('StreetName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\StreetName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $streetName;

    /**
     * @var null|AdditionalStreetName
     */
    #[JMS\Accessor(getter: 'getAdditionalStreetName', setter: 'setAdditionalStreetName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AdditionalStreetName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdditionalStreetName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $additionalStreetName;

    /**
     * @var null|BlockName
     */
    #[JMS\Accessor(getter: 'getBlockName', setter: 'setBlockName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BlockName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BlockName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $blockName;

    /**
     * @var null|BuildingName
     */
    #[JMS\Accessor(getter: 'getBuildingName', setter: 'setBuildingName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BuildingName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BuildingName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $buildingName;

    /**
     * @var null|BuildingNumber
     */
    #[JMS\Accessor(getter: 'getBuildingNumber', setter: 'setBuildingNumber')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BuildingNumber')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BuildingNumber')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $buildingNumber;

    /**
     * @var null|InhouseMail
     */
    #[JMS\Accessor(getter: 'getInhouseMail', setter: 'setInhouseMail')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InhouseMail')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InhouseMail')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $inhouseMail;

    /**
     * @var null|Department
     */
    #[JMS\Accessor(getter: 'getDepartment', setter: 'setDepartment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Department')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Department')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $department;

    /**
     * @var null|MarkAttention
     */
    #[JMS\Accessor(getter: 'getMarkAttention', setter: 'setMarkAttention')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MarkAttention')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MarkAttention')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $markAttention;

    /**
     * @var null|MarkCare
     */
    #[JMS\Accessor(getter: 'getMarkCare', setter: 'setMarkCare')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MarkCare')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MarkCare')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $markCare;

    /**
     * @var null|PlotIdentification
     */
    #[JMS\Accessor(getter: 'getPlotIdentification', setter: 'setPlotIdentification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlotIdentification')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PlotIdentification')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $plotIdentification;

    /**
     * @var null|CitySubdivisionName
     */
    #[JMS\Accessor(getter: 'getCitySubdivisionName', setter: 'setCitySubdivisionName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CitySubdivisionName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CitySubdivisionName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $citySubdivisionName;

    /**
     * @var null|CityName
     */
    #[JMS\Accessor(getter: 'getCityName', setter: 'setCityName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CityName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CityName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $cityName;

    /**
     * @var null|PostalZone
     */
    #[JMS\Accessor(getter: 'getPostalZone', setter: 'setPostalZone')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PostalZone')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PostalZone')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $postalZone;

    /**
     * @var null|CountrySubentity
     */
    #[JMS\Accessor(getter: 'getCountrySubentity', setter: 'setCountrySubentity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CountrySubentity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CountrySubentity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $countrySubentity;

    /**
     * @var null|CountrySubentityCode
     */
    #[JMS\Accessor(getter: 'getCountrySubentityCode', setter: 'setCountrySubentityCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CountrySubentityCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CountrySubentityCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $countrySubentityCode;

    /**
     * @var null|Region
     */
    #[JMS\Accessor(getter: 'getRegion', setter: 'setRegion')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Region')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Region')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $region;

    /**
     * @var null|District
     */
    #[JMS\Accessor(getter: 'getDistrict', setter: 'setDistrict')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('District')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\District')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $district;

    /**
     * @var null|TimezoneOffset
     */
    #[JMS\Accessor(getter: 'getTimezoneOffset', setter: 'setTimezoneOffset')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TimezoneOffset')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimezoneOffset')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $timezoneOffset;

    /**
     * @var null|array<AddressLine>
     */
    #[JMS\Accessor(getter: 'getAddressLine', setter: 'setAddressLine')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AddressLine')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AddressLine>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AddressLine', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $addressLine;

    /**
     * @var null|Country
     */
    #[JMS\Accessor(getter: 'getCountry', setter: 'setCountry')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Country')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Country')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $country;

    /**
     * @var null|array<LocationCoordinate>
     */
    #[JMS\Accessor(getter: 'getLocationCoordinate', setter: 'setLocationCoordinate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LocationCoordinate')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\LocationCoordinate>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'LocationCoordinate', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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
        $this->addressTypeCode ??= new AddressTypeCode();

        return $this->addressTypeCode;
    }

    /**
     * @param  null|AddressTypeCode $addressTypeCode
     * @return static
     */
    public function setAddressTypeCode(
        ?AddressTypeCode $addressTypeCode = null
    ): static {
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
        $this->addressFormatCode ??= new AddressFormatCode();

        return $this->addressFormatCode;
    }

    /**
     * @param  null|AddressFormatCode $addressFormatCode
     * @return static
     */
    public function setAddressFormatCode(
        ?AddressFormatCode $addressFormatCode = null
    ): static {
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
        $this->postbox ??= new Postbox();

        return $this->postbox;
    }

    /**
     * @param  null|Postbox $postbox
     * @return static
     */
    public function setPostbox(
        ?Postbox $postbox = null
    ): static {
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
        $this->floor ??= new Floor();

        return $this->floor;
    }

    /**
     * @param  null|Floor $floor
     * @return static
     */
    public function setFloor(
        ?Floor $floor = null
    ): static {
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
        $this->room ??= new Room();

        return $this->room;
    }

    /**
     * @param  null|Room $room
     * @return static
     */
    public function setRoom(
        ?Room $room = null
    ): static {
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
        $this->streetName ??= new StreetName();

        return $this->streetName;
    }

    /**
     * @param  null|StreetName $streetName
     * @return static
     */
    public function setStreetName(
        ?StreetName $streetName = null
    ): static {
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
        $this->additionalStreetName ??= new AdditionalStreetName();

        return $this->additionalStreetName;
    }

    /**
     * @param  null|AdditionalStreetName $additionalStreetName
     * @return static
     */
    public function setAdditionalStreetName(
        ?AdditionalStreetName $additionalStreetName = null
    ): static {
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
        $this->blockName ??= new BlockName();

        return $this->blockName;
    }

    /**
     * @param  null|BlockName $blockName
     * @return static
     */
    public function setBlockName(
        ?BlockName $blockName = null
    ): static {
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
        $this->buildingName ??= new BuildingName();

        return $this->buildingName;
    }

    /**
     * @param  null|BuildingName $buildingName
     * @return static
     */
    public function setBuildingName(
        ?BuildingName $buildingName = null
    ): static {
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
        $this->buildingNumber ??= new BuildingNumber();

        return $this->buildingNumber;
    }

    /**
     * @param  null|BuildingNumber $buildingNumber
     * @return static
     */
    public function setBuildingNumber(
        ?BuildingNumber $buildingNumber = null
    ): static {
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
        $this->inhouseMail ??= new InhouseMail();

        return $this->inhouseMail;
    }

    /**
     * @param  null|InhouseMail $inhouseMail
     * @return static
     */
    public function setInhouseMail(
        ?InhouseMail $inhouseMail = null
    ): static {
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
        $this->department ??= new Department();

        return $this->department;
    }

    /**
     * @param  null|Department $department
     * @return static
     */
    public function setDepartment(
        ?Department $department = null
    ): static {
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
        $this->markAttention ??= new MarkAttention();

        return $this->markAttention;
    }

    /**
     * @param  null|MarkAttention $markAttention
     * @return static
     */
    public function setMarkAttention(
        ?MarkAttention $markAttention = null
    ): static {
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
        $this->markCare ??= new MarkCare();

        return $this->markCare;
    }

    /**
     * @param  null|MarkCare $markCare
     * @return static
     */
    public function setMarkCare(
        ?MarkCare $markCare = null
    ): static {
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
        $this->plotIdentification ??= new PlotIdentification();

        return $this->plotIdentification;
    }

    /**
     * @param  null|PlotIdentification $plotIdentification
     * @return static
     */
    public function setPlotIdentification(
        ?PlotIdentification $plotIdentification = null
    ): static {
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
        $this->citySubdivisionName ??= new CitySubdivisionName();

        return $this->citySubdivisionName;
    }

    /**
     * @param  null|CitySubdivisionName $citySubdivisionName
     * @return static
     */
    public function setCitySubdivisionName(
        ?CitySubdivisionName $citySubdivisionName = null
    ): static {
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
        $this->cityName ??= new CityName();

        return $this->cityName;
    }

    /**
     * @param  null|CityName $cityName
     * @return static
     */
    public function setCityName(
        ?CityName $cityName = null
    ): static {
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
        $this->postalZone ??= new PostalZone();

        return $this->postalZone;
    }

    /**
     * @param  null|PostalZone $postalZone
     * @return static
     */
    public function setPostalZone(
        ?PostalZone $postalZone = null
    ): static {
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
        $this->countrySubentity ??= new CountrySubentity();

        return $this->countrySubentity;
    }

    /**
     * @param  null|CountrySubentity $countrySubentity
     * @return static
     */
    public function setCountrySubentity(
        ?CountrySubentity $countrySubentity = null
    ): static {
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
        $this->countrySubentityCode ??= new CountrySubentityCode();

        return $this->countrySubentityCode;
    }

    /**
     * @param  null|CountrySubentityCode $countrySubentityCode
     * @return static
     */
    public function setCountrySubentityCode(
        ?CountrySubentityCode $countrySubentityCode = null
    ): static {
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
        $this->region ??= new Region();

        return $this->region;
    }

    /**
     * @param  null|Region $region
     * @return static
     */
    public function setRegion(
        ?Region $region = null
    ): static {
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
        $this->district ??= new District();

        return $this->district;
    }

    /**
     * @param  null|District $district
     * @return static
     */
    public function setDistrict(
        ?District $district = null
    ): static {
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
        $this->timezoneOffset ??= new TimezoneOffset();

        return $this->timezoneOffset;
    }

    /**
     * @param  null|TimezoneOffset $timezoneOffset
     * @return static
     */
    public function setTimezoneOffset(
        ?TimezoneOffset $timezoneOffset = null
    ): static {
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
    public function setAddressLine(
        ?array $addressLine = null
    ): static {
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
    public function addToAddressLine(
        AddressLine $addressLine
    ): static {
        $this->addressLine[] = $addressLine;

        return $this;
    }

    /**
     * @return AddressLine
     */
    public function addToAddressLineWithCreate(): AddressLine
    {
        $this->addToAddressLine($addressLine = new AddressLine());

        return $addressLine;
    }

    /**
     * @param  AddressLine $addressLine
     * @return static
     */
    public function addOnceToAddressLine(
        AddressLine $addressLine
    ): static {
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
            $this->addOnceToAddressLine(new AddressLine());
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
        $this->country ??= new Country();

        return $this->country;
    }

    /**
     * @param  null|Country $country
     * @return static
     */
    public function setCountry(
        ?Country $country = null
    ): static {
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
    public function setLocationCoordinate(
        ?array $locationCoordinate = null
    ): static {
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
    public function addToLocationCoordinate(
        LocationCoordinate $locationCoordinate
    ): static {
        $this->locationCoordinate[] = $locationCoordinate;

        return $this;
    }

    /**
     * @return LocationCoordinate
     */
    public function addToLocationCoordinateWithCreate(): LocationCoordinate
    {
        $this->addToLocationCoordinate($locationCoordinate = new LocationCoordinate());

        return $locationCoordinate;
    }

    /**
     * @param  LocationCoordinate $locationCoordinate
     * @return static
     */
    public function addOnceToLocationCoordinate(
        LocationCoordinate $locationCoordinate
    ): static {
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
            $this->addOnceToLocationCoordinate(new LocationCoordinate());
        }

        return $this->locationCoordinate[0];
    }
}
