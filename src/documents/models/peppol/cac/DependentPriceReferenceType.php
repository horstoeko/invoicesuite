<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Percent;
use JMS\Serializer\Annotation as JMS;

class DependentPriceReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|Percent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Percent")
     * @JMS\Expose
     * @JMS\SerializedName("Percent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPercent", setter="setPercent")
     */
    private $percent;

    /**
     * @var null|LocationAddress
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\LocationAddress")
     * @JMS\Expose
     * @JMS\SerializedName("LocationAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLocationAddress", setter="setLocationAddress")
     */
    private $locationAddress;

    /**
     * @var null|DependentLineReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\DependentLineReference")
     * @JMS\Expose
     * @JMS\SerializedName("DependentLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDependentLineReference", setter="setDependentLineReference")
     */
    private $dependentLineReference;

    /**
     * @return null|Percent
     */
    public function getPercent(): ?Percent
    {
        return $this->percent;
    }

    /**
     * @return Percent
     */
    public function getPercentWithCreate(): Percent
    {
        $this->percent = is_null($this->percent) ? new Percent() : $this->percent;

        return $this->percent;
    }

    /**
     * @param  null|Percent $percent
     * @return static
     */
    public function setPercent(?Percent $percent = null): static
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPercent(): static
    {
        $this->percent = null;

        return $this;
    }

    /**
     * @return null|LocationAddress
     */
    public function getLocationAddress(): ?LocationAddress
    {
        return $this->locationAddress;
    }

    /**
     * @return LocationAddress
     */
    public function getLocationAddressWithCreate(): LocationAddress
    {
        $this->locationAddress = is_null($this->locationAddress) ? new LocationAddress() : $this->locationAddress;

        return $this->locationAddress;
    }

    /**
     * @param  null|LocationAddress $locationAddress
     * @return static
     */
    public function setLocationAddress(?LocationAddress $locationAddress = null): static
    {
        $this->locationAddress = $locationAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLocationAddress(): static
    {
        $this->locationAddress = null;

        return $this;
    }

    /**
     * @return null|DependentLineReference
     */
    public function getDependentLineReference(): ?DependentLineReference
    {
        return $this->dependentLineReference;
    }

    /**
     * @return DependentLineReference
     */
    public function getDependentLineReferenceWithCreate(): DependentLineReference
    {
        $this->dependentLineReference = is_null($this->dependentLineReference) ? new DependentLineReference() : $this->dependentLineReference;

        return $this->dependentLineReference;
    }

    /**
     * @param  null|DependentLineReference $dependentLineReference
     * @return static
     */
    public function setDependentLineReference(?DependentLineReference $dependentLineReference = null): static
    {
        $this->dependentLineReference = $dependentLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDependentLineReference(): static
    {
        $this->dependentLineReference = null;

        return $this;
    }
}
