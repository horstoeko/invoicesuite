<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Information;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Reference;
use JMS\Serializer\Annotation as JMS;

class TradingTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<Information>
     */
    #[JMS\Accessor(getter: 'getInformation', setter: 'setInformation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Information')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Information>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Information', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $information;

    /**
     * @var null|Reference
     */
    #[JMS\Accessor(getter: 'getReference', setter: 'setReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Reference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Reference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $reference;

    /**
     * @var null|ApplicableAddress
     */
    #[JMS\Accessor(getter: 'getApplicableAddress', setter: 'setApplicableAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ApplicableAddress')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ApplicableAddress')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
    public function setInformation(
        ?array $information = null
    ): static {
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
    public function addToInformation(
        Information $information
    ): static {
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
    public function addOnceToInformation(
        Information $information
    ): static {
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
        $this->reference ??= new Reference();

        return $this->reference;
    }

    /**
     * @param  null|Reference $reference
     * @return static
     */
    public function setReference(
        ?Reference $reference = null
    ): static {
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
        $this->applicableAddress ??= new ApplicableAddress();

        return $this->applicableAddress;
    }

    /**
     * @param  null|ApplicableAddress $applicableAddress
     * @return static
     */
    public function setApplicableAddress(
        ?ApplicableAddress $applicableAddress = null
    ): static {
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
