<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NameCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Value;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ValueQualifier;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ValueQuantity;
use JMS\Serializer\Annotation as JMS;

class MeterPropertyType
{
    use HandlesObjectFlags;

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
     * @var null|NameCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\NameCode")
     * @JMS\Expose
     * @JMS\SerializedName("NameCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNameCode", setter="setNameCode")
     */
    private $nameCode;

    /**
     * @var null|Value
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Value")
     * @JMS\Expose
     * @JMS\SerializedName("Value")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @var null|ValueQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ValueQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ValueQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValueQuantity", setter="setValueQuantity")
     */
    private $valueQuantity;

    /**
     * @var null|array<ValueQualifier>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ValueQualifier>")
     * @JMS\Expose
     * @JMS\SerializedName("ValueQualifier")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ValueQualifier", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getValueQualifier", setter="setValueQualifier")
     */
    private $valueQualifier;

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

    /**
     * @return null|NameCode
     */
    public function getNameCode(): ?NameCode
    {
        return $this->nameCode;
    }

    /**
     * @return NameCode
     */
    public function getNameCodeWithCreate(): NameCode
    {
        $this->nameCode = is_null($this->nameCode) ? new NameCode() : $this->nameCode;

        return $this->nameCode;
    }

    /**
     * @param  null|NameCode $nameCode
     * @return static
     */
    public function setNameCode(?NameCode $nameCode = null): static
    {
        $this->nameCode = $nameCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNameCode(): static
    {
        $this->nameCode = null;

        return $this;
    }

    /**
     * @return null|Value
     */
    public function getValue(): ?Value
    {
        return $this->value;
    }

    /**
     * @return Value
     */
    public function getValueWithCreate(): Value
    {
        $this->value = is_null($this->value) ? new Value() : $this->value;

        return $this->value;
    }

    /**
     * @param  null|Value $value
     * @return static
     */
    public function setValue(?Value $value = null): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValue(): static
    {
        $this->value = null;

        return $this;
    }

    /**
     * @return null|ValueQuantity
     */
    public function getValueQuantity(): ?ValueQuantity
    {
        return $this->valueQuantity;
    }

    /**
     * @return ValueQuantity
     */
    public function getValueQuantityWithCreate(): ValueQuantity
    {
        $this->valueQuantity = is_null($this->valueQuantity) ? new ValueQuantity() : $this->valueQuantity;

        return $this->valueQuantity;
    }

    /**
     * @param  null|ValueQuantity $valueQuantity
     * @return static
     */
    public function setValueQuantity(?ValueQuantity $valueQuantity = null): static
    {
        $this->valueQuantity = $valueQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValueQuantity(): static
    {
        $this->valueQuantity = null;

        return $this;
    }

    /**
     * @return null|array<ValueQualifier>
     */
    public function getValueQualifier(): ?array
    {
        return $this->valueQualifier;
    }

    /**
     * @param  null|array<ValueQualifier> $valueQualifier
     * @return static
     */
    public function setValueQualifier(?array $valueQualifier = null): static
    {
        $this->valueQualifier = $valueQualifier;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValueQualifier(): static
    {
        $this->valueQualifier = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearValueQualifier(): static
    {
        $this->valueQualifier = [];

        return $this;
    }

    /**
     * @return null|ValueQualifier
     */
    public function firstValueQualifier(): ?ValueQualifier
    {
        $valueQualifier = $this->valueQualifier ?? [];
        $valueQualifier = reset($valueQualifier);

        if (false === $valueQualifier) {
            return null;
        }

        return $valueQualifier;
    }

    /**
     * @return null|ValueQualifier
     */
    public function lastValueQualifier(): ?ValueQualifier
    {
        $valueQualifier = $this->valueQualifier ?? [];
        $valueQualifier = end($valueQualifier);

        if (false === $valueQualifier) {
            return null;
        }

        return $valueQualifier;
    }

    /**
     * @param  ValueQualifier $valueQualifier
     * @return static
     */
    public function addToValueQualifier(ValueQualifier $valueQualifier): static
    {
        $this->valueQualifier[] = $valueQualifier;

        return $this;
    }

    /**
     * @return ValueQualifier
     */
    public function addToValueQualifierWithCreate(): ValueQualifier
    {
        $this->addTovalueQualifier($valueQualifier = new ValueQualifier());

        return $valueQualifier;
    }

    /**
     * @param  ValueQualifier $valueQualifier
     * @return static
     */
    public function addOnceToValueQualifier(ValueQualifier $valueQualifier): static
    {
        if (!is_array($this->valueQualifier)) {
            $this->valueQualifier = [];
        }

        $this->valueQualifier[0] = $valueQualifier;

        return $this;
    }

    /**
     * @return ValueQualifier
     */
    public function addOnceToValueQualifierWithCreate(): ValueQualifier
    {
        if (!is_array($this->valueQualifier)) {
            $this->valueQualifier = [];
        }

        if ([] === $this->valueQualifier) {
            $this->addOnceTovalueQualifier(new ValueQualifier());
        }

        return $this->valueQualifier[0];
    }
}
