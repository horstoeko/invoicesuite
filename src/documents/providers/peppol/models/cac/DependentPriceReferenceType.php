<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Percent;
use JMS\Serializer\Annotation as JMS;

class DependentPriceReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|Percent
     */
    #[JMS\Accessor(getter: 'getPercent', setter: 'setPercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Percent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Percent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $percent;

    /**
     * @var null|LocationAddress
     */
    #[JMS\Accessor(getter: 'getLocationAddress', setter: 'setLocationAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LocationAddress')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LocationAddress')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $locationAddress;

    /**
     * @var null|DependentLineReference
     */
    #[JMS\Accessor(getter: 'getDependentLineReference', setter: 'setDependentLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DependentLineReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DependentLineReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->percent ??= new Percent();

        return $this->percent;
    }

    /**
     * @param  null|Percent $percent
     * @return static
     */
    public function setPercent(
        ?Percent $percent = null
    ): static {
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
        $this->locationAddress ??= new LocationAddress();

        return $this->locationAddress;
    }

    /**
     * @param  null|LocationAddress $locationAddress
     * @return static
     */
    public function setLocationAddress(
        ?LocationAddress $locationAddress = null
    ): static {
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
        $this->dependentLineReference ??= new DependentLineReference();

        return $this->dependentLineReference;
    }

    /**
     * @param  null|DependentLineReference $dependentLineReference
     * @return static
     */
    public function setDependentLineReference(
        ?DependentLineReference $dependentLineReference = null
    ): static {
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
