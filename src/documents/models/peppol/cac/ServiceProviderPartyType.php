<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ServiceType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ServiceTypeCode;
use JMS\Serializer\Annotation as JMS;

class ServiceProviderPartyType
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
     * @var null|ServiceTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ServiceTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getServiceTypeCode", setter="setServiceTypeCode")
     */
    private $serviceTypeCode;

    /**
     * @var null|array<ServiceType>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ServiceType>")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ServiceType", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getServiceType", setter="setServiceType")
     */
    private $serviceType;

    /**
     * @var null|Party
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @var null|SellerContact
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SellerContact")
     * @JMS\Expose
     * @JMS\SerializedName("SellerContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerContact", setter="setSellerContact")
     */
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
        $this->serviceTypeCode = is_null($this->serviceTypeCode) ? new ServiceTypeCode() : $this->serviceTypeCode;

        return $this->serviceTypeCode;
    }

    /**
     * @param  null|ServiceTypeCode $serviceTypeCode
     * @return static
     */
    public function setServiceTypeCode(?ServiceTypeCode $serviceTypeCode = null): static
    {
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
    public function setServiceType(?array $serviceType = null): static
    {
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
    public function addToServiceType(ServiceType $serviceType): static
    {
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
    public function addOnceToServiceType(ServiceType $serviceType): static
    {
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
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(?Party $party = null): static
    {
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
        $this->sellerContact = is_null($this->sellerContact) ? new SellerContact() : $this->sellerContact;

        return $this->sellerContact;
    }

    /**
     * @param  null|SellerContact $sellerContact
     * @return static
     */
    public function setSellerContact(?SellerContact $sellerContact = null): static
    {
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
