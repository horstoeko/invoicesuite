<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\IdentificationCode;
use horstoeko\invoicesuite\models\ubl\cbc\Name;

class CountryType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\IdentificationCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\IdentificationCode")
     * @JMS\Expose
     * @JMS\SerializedName("IdentificationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIdentificationCode", setter="setIdentificationCode")
     */
    private $identificationCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Name|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IdentificationCode|null
     */
    public function getIdentificationCode(): ?IdentificationCode
    {
        return $this->identificationCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IdentificationCode
     */
    public function getIdentificationCodeWithCreate(): IdentificationCode
    {
        $this->identificationCode = is_null($this->identificationCode) ? new IdentificationCode() : $this->identificationCode;

        return $this->identificationCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\IdentificationCode|null $identificationCode
     * @return self
     */
    public function setIdentificationCode(?IdentificationCode $identificationCode = null): self
    {
        $this->identificationCode = $identificationCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIdentificationCode(): self
    {
        $this->identificationCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Name|null
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Name|null $name
     * @return self
     */
    public function setName(?Name $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetName(): self
    {
        $this->name = null;

        return $this;
    }
}
