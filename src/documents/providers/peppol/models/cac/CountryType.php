<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\IdentificationCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use JMS\Serializer\Annotation as JMS;

class CountryType
{
    use HandlesObjectFlags;

    /**
     * @var null|IdentificationCode
     */
    #[JMS\Accessor(getter: 'getIdentificationCode', setter: 'setIdentificationCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IdentificationCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\IdentificationCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $identificationCode;

    /**
     * @var null|Name
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $name;

    /**
     * @return null|IdentificationCode
     */
    public function getIdentificationCode(): ?IdentificationCode
    {
        return $this->identificationCode;
    }

    /**
     * @return IdentificationCode
     */
    public function getIdentificationCodeWithCreate(): IdentificationCode
    {
        $this->identificationCode ??= new IdentificationCode();

        return $this->identificationCode;
    }

    /**
     * @param  null|IdentificationCode $identificationCode
     * @return static
     */
    public function setIdentificationCode(
        ?IdentificationCode $identificationCode = null
    ): static {
        $this->identificationCode = $identificationCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIdentificationCode(): static
    {
        $this->identificationCode = null;

        return $this;
    }

    /**
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name ??= new Name();

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(
        ?Name $name = null
    ): static {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }
}
