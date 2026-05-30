<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ServiceType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ServiceTypeCode;
use JMS\Serializer\Annotation as JMS;

class ServiceProviderPartyType
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
     * @var null|ServiceTypeCode
     */
    #[JMS\Accessor(getter: 'getServiceTypeCode', setter: 'setServiceTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ServiceTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ServiceTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $serviceTypeCode;

    /**
     * @var null|array<ServiceType>
     */
    #[JMS\Accessor(getter: 'getServiceType', setter: 'setServiceType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ServiceType')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ServiceType>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ServiceType', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $serviceType;

    /**
     * @var null|Party
     */
    #[JMS\Accessor(getter: 'getParty', setter: 'setParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Party')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Party')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $party;

    /**
     * @var null|SellerContact
     */
    #[JMS\Accessor(getter: 'getSellerContact', setter: 'setSellerContact')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SellerContact')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SellerContact')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $sellerContact;

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
     * @return null|ServiceTypeCode
     */
    public function getServiceTypeCode(): ?ServiceTypeCode
    {
        return $this->serviceTypeCode;
    }

    /**
     * @return ServiceTypeCode
     */
    public function getServiceTypeCodeWithCreate(): ServiceTypeCode
    {
        $this->serviceTypeCode ??= new ServiceTypeCode();

        return $this->serviceTypeCode;
    }

    /**
     * @param  null|ServiceTypeCode $serviceTypeCode
     * @return static
     */
    public function setServiceTypeCode(
        ?ServiceTypeCode $serviceTypeCode = null
    ): static {
        $this->serviceTypeCode = $serviceTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetServiceTypeCode(): static
    {
        $this->serviceTypeCode = null;

        return $this;
    }

    /**
     * @return null|array<ServiceType>
     */
    public function getServiceType(): ?array
    {
        return $this->serviceType;
    }

    /**
     * @param  null|array<ServiceType> $serviceType
     * @return static
     */
    public function setServiceType(
        ?array $serviceType = null
    ): static {
        $this->serviceType = $serviceType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetServiceType(): static
    {
        $this->serviceType = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearServiceType(): static
    {
        $this->serviceType = [];

        return $this;
    }

    /**
     * @return null|ServiceType
     */
    public function firstServiceType(): ?ServiceType
    {
        $serviceType = $this->serviceType ?? [];
        $serviceType = reset($serviceType);

        if (false === $serviceType) {
            return null;
        }

        return $serviceType;
    }

    /**
     * @return null|ServiceType
     */
    public function lastServiceType(): ?ServiceType
    {
        $serviceType = $this->serviceType ?? [];
        $serviceType = end($serviceType);

        if (false === $serviceType) {
            return null;
        }

        return $serviceType;
    }

    /**
     * @param  ServiceType $serviceType
     * @return static
     */
    public function addToServiceType(
        ServiceType $serviceType
    ): static {
        $this->serviceType[] = $serviceType;

        return $this;
    }

    /**
     * @return ServiceType
     */
    public function addToServiceTypeWithCreate(): ServiceType
    {
        $this->addToserviceType($serviceType = new ServiceType());

        return $serviceType;
    }

    /**
     * @param  ServiceType $serviceType
     * @return static
     */
    public function addOnceToServiceType(
        ServiceType $serviceType
    ): static {
        if (!is_array($this->serviceType)) {
            $this->serviceType = [];
        }

        $this->serviceType[0] = $serviceType;

        return $this;
    }

    /**
     * @return ServiceType
     */
    public function addOnceToServiceTypeWithCreate(): ServiceType
    {
        if (!is_array($this->serviceType)) {
            $this->serviceType = [];
        }

        if ([] === $this->serviceType) {
            $this->addOnceToserviceType(new ServiceType());
        }

        return $this->serviceType[0];
    }

    /**
     * @return null|Party
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party ??= new Party();

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(
        ?Party $party = null
    ): static {
        $this->party = $party;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParty(): static
    {
        $this->party = null;

        return $this;
    }

    /**
     * @return null|SellerContact
     */
    public function getSellerContact(): ?SellerContact
    {
        return $this->sellerContact;
    }

    /**
     * @return SellerContact
     */
    public function getSellerContactWithCreate(): SellerContact
    {
        $this->sellerContact ??= new SellerContact();

        return $this->sellerContact;
    }

    /**
     * @param  null|SellerContact $sellerContact
     * @return static
     */
    public function setSellerContact(
        ?SellerContact $sellerContact = null
    ): static {
        $this->sellerContact = $sellerContact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerContact(): static
    {
        $this->sellerContact = null;

        return $this;
    }
}
