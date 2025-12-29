<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\IdentificationCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use JMS\Serializer\Annotation as JMS;

class CountryType
{
    use HandlesObjectFlags;

    /**
     * @var null|IdentificationCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\IdentificationCode")
     * @JMS\Expose
     * @JMS\SerializedName("IdentificationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIdentificationCode", setter="setIdentificationCode")
     */
    private $identificationCode;

    /**
     * @var null|Name
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
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
        $this->identificationCode = is_null($this->identificationCode) ? new IdentificationCode() : $this->identificationCode;

        return $this->identificationCode;
    }

    /**
     * @param  null|IdentificationCode $identificationCode
     * @return static
     */
    public function setIdentificationCode(?IdentificationCode $identificationCode = null): static
    {
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
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(?Name $name = null): static
    {
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
