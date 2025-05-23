<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Name;
use horstoeko\invoicesuite\models\ubl\cbc\NameCode;
use horstoeko\invoicesuite\models\ubl\cbc\Value;
use horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier;
use horstoeko\invoicesuite\models\ubl\cbc\ValueQuantity;

class MeterPropertyType
{
    use HandlesObjectFlags;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\NameCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\NameCode")
     * @JMS\Expose
     * @JMS\SerializedName("NameCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNameCode", setter="setNameCode")
     */
    private $nameCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Value|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Value")
     * @JMS\Expose
     * @JMS\SerializedName("Value")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ValueQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ValueQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ValueQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValueQuantity", setter="setValueQuantity")
     */
    private $valueQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier>")
     * @JMS\Expose
     * @JMS\SerializedName("ValueQualifier")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ValueQualifier", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getValueQualifier", setter="setValueQualifier")
     */
    private $valueQualifier;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NameCode|null
     */
    public function getNameCode(): ?NameCode
    {
        return $this->nameCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NameCode
     */
    public function getNameCodeWithCreate(): NameCode
    {
        $this->nameCode = is_null($this->nameCode) ? new NameCode() : $this->nameCode;

        return $this->nameCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NameCode|null $nameCode
     * @return self
     */
    public function setNameCode(?NameCode $nameCode = null): self
    {
        $this->nameCode = $nameCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Value|null
     */
    public function getValue(): ?Value
    {
        return $this->value;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Value
     */
    public function getValueWithCreate(): Value
    {
        $this->value = is_null($this->value) ? new Value() : $this->value;

        return $this->value;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Value|null $value
     * @return self
     */
    public function setValue(?Value $value = null): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValueQuantity|null
     */
    public function getValueQuantity(): ?ValueQuantity
    {
        return $this->valueQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValueQuantity
     */
    public function getValueQuantityWithCreate(): ValueQuantity
    {
        $this->valueQuantity = is_null($this->valueQuantity) ? new ValueQuantity() : $this->valueQuantity;

        return $this->valueQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ValueQuantity|null $valueQuantity
     * @return self
     */
    public function setValueQuantity(?ValueQuantity $valueQuantity = null): self
    {
        $this->valueQuantity = $valueQuantity;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier>|null
     */
    public function getValueQualifier(): ?array
    {
        return $this->valueQualifier;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier>|null $valueQualifier
     * @return self
     */
    public function setValueQualifier(?array $valueQualifier = null): self
    {
        $this->valueQualifier = $valueQualifier;

        return $this;
    }

    /**
     * @return self
     */
    public function clearValueQualifier(): self
    {
        $this->valueQualifier = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier $valueQualifier
     * @return self
     */
    public function addToValueQualifier(ValueQualifier $valueQualifier): self
    {
        $this->valueQualifier[] = $valueQualifier;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier
     */
    public function addToValueQualifierWithCreate(): ValueQualifier
    {
        $this->addTovalueQualifier($valueQualifier = new ValueQualifier());

        return $valueQualifier;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier $valueQualifier
     * @return self
     */
    public function addOnceToValueQualifier(ValueQualifier $valueQualifier): self
    {
        if (!is_array($this->valueQualifier)) {
            $this->valueQualifier = [];
        }

        $this->valueQualifier[0] = $valueQualifier;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier
     */
    public function addOnceToValueQualifierWithCreate(): ValueQualifier
    {
        if (!is_array($this->valueQualifier)) {
            $this->valueQualifier = [];
        }

        if ($this->valueQualifier === []) {
            $this->addOnceTovalueQualifier(new ValueQualifier());
        }

        return $this->valueQualifier[0];
    }
}
