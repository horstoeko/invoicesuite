<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceTypeCode;

class ServiceProviderPartyType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getServiceTypeCode", setter="setServiceTypeCode")
     */
    private $serviceTypeCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType>")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ServiceType", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getServiceType", setter="setServiceType")
     */
    private $serviceType;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\Party|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\SellerContact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\SellerContact")
     * @JMS\Expose
     * @JMS\SerializedName("SellerContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerContact", setter="setSellerContact")
     */
    private $sellerContact;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceTypeCode|null
     */
    public function getServiceTypeCode(): ?ServiceTypeCode
    {
        return $this->serviceTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceTypeCode
     */
    public function getServiceTypeCodeWithCreate(): ServiceTypeCode
    {
        $this->serviceTypeCode = is_null($this->serviceTypeCode) ? new ServiceTypeCode() : $this->serviceTypeCode;

        return $this->serviceTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceTypeCode|null $serviceTypeCode
     * @return self
     */
    public function setServiceTypeCode(?ServiceTypeCode $serviceTypeCode = null): self
    {
        $this->serviceTypeCode = $serviceTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetServiceTypeCode(): self
    {
        $this->serviceTypeCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType>|null
     */
    public function getServiceType(): ?array
    {
        return $this->serviceType;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType>|null $serviceType
     * @return self
     */
    public function setServiceType(?array $serviceType = null): self
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetServiceType(): self
    {
        $this->serviceType = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearServiceType(): self
    {
        $this->serviceType = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType|null
     */
    public function firstServiceType(): ?ServiceType
    {
        $serviceType = $this->serviceType ?? [];
        $serviceType = reset($serviceType);

        if ($serviceType === false) {
            return null;
        }

        return $serviceType;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType|null
     */
    public function lastServiceType(): ?ServiceType
    {
        $serviceType = $this->serviceType ?? [];
        $serviceType = end($serviceType);

        if ($serviceType === false) {
            return null;
        }

        return $serviceType;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType $serviceType
     * @return self
     */
    public function addToServiceType(ServiceType $serviceType): self
    {
        $this->serviceType[] = $serviceType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType
     */
    public function addToServiceTypeWithCreate(): ServiceType
    {
        $this->addToserviceType($serviceType = new ServiceType());

        return $serviceType;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType $serviceType
     * @return self
     */
    public function addOnceToServiceType(ServiceType $serviceType): self
    {
        if (!is_array($this->serviceType)) {
            $this->serviceType = [];
        }

        $this->serviceType[0] = $serviceType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ServiceType
     */
    public function addOnceToServiceTypeWithCreate(): ServiceType
    {
        if (!is_array($this->serviceType)) {
            $this->serviceType = [];
        }

        if ($this->serviceType === []) {
            $this->addOnceToserviceType(new ServiceType());
        }

        return $this->serviceType[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Party|null
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Party|null $party
     * @return self
     */
    public function setParty(?Party $party = null): self
    {
        $this->party = $party;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetParty(): self
    {
        $this->party = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SellerContact|null
     */
    public function getSellerContact(): ?SellerContact
    {
        return $this->sellerContact;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SellerContact
     */
    public function getSellerContactWithCreate(): SellerContact
    {
        $this->sellerContact = is_null($this->sellerContact) ? new SellerContact() : $this->sellerContact;

        return $this->sellerContact;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\SellerContact|null $sellerContact
     * @return self
     */
    public function setSellerContact(?SellerContact $sellerContact = null): self
    {
        $this->sellerContact = $sellerContact;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSellerContact(): self
    {
        $this->sellerContact = null;

        return $this;
    }
}
