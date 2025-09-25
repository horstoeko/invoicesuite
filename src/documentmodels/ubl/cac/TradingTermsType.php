<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Information;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Reference;

class TradingTermsType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Information>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Information>")
     * @JMS\Expose
     * @JMS\SerializedName("Information")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Information", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInformation", setter="setInformation")
     */
    private $information;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Reference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Reference")
     * @JMS\Expose
     * @JMS\SerializedName("Reference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReference", setter="setReference")
     */
    private $reference;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ApplicableAddress|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ApplicableAddress")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getApplicableAddress", setter="setApplicableAddress")
     */
    private $applicableAddress;

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Information>|null
     */
    public function getInformation(): ?array
    {
        return $this->information;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Information>|null $information
     * @return self
     */
    public function setInformation(?array $information = null): self
    {
        $this->information = $information;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInformation(): self
    {
        $this->information = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInformation(): self
    {
        $this->information = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information|null
     */
    public function firstInformation(): ?Information
    {
        $information = $this->information ?? [];
        $information = reset($information);

        if ($information === false) {
            return null;
        }

        return $information;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information|null
     */
    public function lastInformation(): ?Information
    {
        $information = $this->information ?? [];
        $information = end($information);

        if ($information === false) {
            return null;
        }

        return $information;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information $information
     * @return self
     */
    public function addToInformation(Information $information): self
    {
        $this->information[] = $information;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information
     */
    public function addToInformationWithCreate(): Information
    {
        $this->addToinformation($information = new Information());

        return $information;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information $information
     * @return self
     */
    public function addOnceToInformation(Information $information): self
    {
        if (!is_array($this->information)) {
            $this->information = [];
        }

        $this->information[0] = $information;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information
     */
    public function addOnceToInformationWithCreate(): Information
    {
        if (!is_array($this->information)) {
            $this->information = [];
        }

        if ($this->information === []) {
            $this->addOnceToinformation(new Information());
        }

        return $this->information[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Reference|null
     */
    public function getReference(): ?Reference
    {
        return $this->reference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Reference
     */
    public function getReferenceWithCreate(): Reference
    {
        $this->reference = is_null($this->reference) ? new Reference() : $this->reference;

        return $this->reference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Reference|null $reference
     * @return self
     */
    public function setReference(?Reference $reference = null): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReference(): self
    {
        $this->reference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ApplicableAddress|null
     */
    public function getApplicableAddress(): ?ApplicableAddress
    {
        return $this->applicableAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ApplicableAddress
     */
    public function getApplicableAddressWithCreate(): ApplicableAddress
    {
        $this->applicableAddress = is_null($this->applicableAddress) ? new ApplicableAddress() : $this->applicableAddress;

        return $this->applicableAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ApplicableAddress|null $applicableAddress
     * @return self
     */
    public function setApplicableAddress(?ApplicableAddress $applicableAddress = null): self
    {
        $this->applicableAddress = $applicableAddress;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetApplicableAddress(): self
    {
        $this->applicableAddress = null;

        return $this;
    }
}
