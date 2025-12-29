<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Information;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Reference;
use JMS\Serializer\Annotation as JMS;

class TradingTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<Information>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Information>")
     * @JMS\Expose
     * @JMS\SerializedName("Information")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Information", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInformation", setter="setInformation")
     */
    private $information;

    /**
     * @var null|Reference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Reference")
     * @JMS\Expose
     * @JMS\SerializedName("Reference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReference", setter="setReference")
     */
    private $reference;

    /**
     * @var null|ApplicableAddress
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ApplicableAddress")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getApplicableAddress", setter="setApplicableAddress")
     */
    private $applicableAddress;

    /**
     * @return null|array<Information>
     */
    public function getInformation(): ?array
    {
        return $this->information;
    }

    /**
     * @param  null|array<Information> $information
     * @return static
     */
    public function setInformation(?array $information = null): static
    {
        $this->information = $information;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInformation(): static
    {
        $this->information = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInformation(): static
    {
        $this->information = [];

        return $this;
    }

    /**
     * @return null|Information
     */
    public function firstInformation(): ?Information
    {
        $information = $this->information ?? [];
        $information = reset($information);

        if (false === $information) {
            return null;
        }

        return $information;
    }

    /**
     * @return null|Information
     */
    public function lastInformation(): ?Information
    {
        $information = $this->information ?? [];
        $information = end($information);

        if (false === $information) {
            return null;
        }

        return $information;
    }

    /**
     * @param  Information $information
     * @return static
     */
    public function addToInformation(Information $information): static
    {
        $this->information[] = $information;

        return $this;
    }

    /**
     * @return Information
     */
    public function addToInformationWithCreate(): Information
    {
        $this->addToinformation($information = new Information());

        return $information;
    }

    /**
     * @param  Information $information
     * @return static
     */
    public function addOnceToInformation(Information $information): static
    {
        if (!is_array($this->information)) {
            $this->information = [];
        }

        $this->information[0] = $information;

        return $this;
    }

    /**
     * @return Information
     */
    public function addOnceToInformationWithCreate(): Information
    {
        if (!is_array($this->information)) {
            $this->information = [];
        }

        if ([] === $this->information) {
            $this->addOnceToinformation(new Information());
        }

        return $this->information[0];
    }

    /**
     * @return null|Reference
     */
    public function getReference(): ?Reference
    {
        return $this->reference;
    }

    /**
     * @return Reference
     */
    public function getReferenceWithCreate(): Reference
    {
        $this->reference = is_null($this->reference) ? new Reference() : $this->reference;

        return $this->reference;
    }

    /**
     * @param  null|Reference $reference
     * @return static
     */
    public function setReference(?Reference $reference = null): static
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReference(): static
    {
        $this->reference = null;

        return $this;
    }

    /**
     * @return null|ApplicableAddress
     */
    public function getApplicableAddress(): ?ApplicableAddress
    {
        return $this->applicableAddress;
    }

    /**
     * @return ApplicableAddress
     */
    public function getApplicableAddressWithCreate(): ApplicableAddress
    {
        $this->applicableAddress = is_null($this->applicableAddress) ? new ApplicableAddress() : $this->applicableAddress;

        return $this->applicableAddress;
    }

    /**
     * @param  null|ApplicableAddress $applicableAddress
     * @return static
     */
    public function setApplicableAddress(?ApplicableAddress $applicableAddress = null): static
    {
        $this->applicableAddress = $applicableAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableAddress(): static
    {
        $this->applicableAddress = null;

        return $this;
    }
}
