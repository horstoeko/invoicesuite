<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NameCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Value;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueQualifier;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueQuantity;
use JMS\Serializer\Annotation as JMS;

class MeterPropertyType
{
    use HandlesObjectFlags;

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
     * @var null|NameCode
     */
    #[JMS\Accessor(getter: 'getNameCode', setter: 'setNameCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NameCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NameCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $nameCode;

    /**
     * @var null|Value
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Value')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Value')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $value;

    /**
     * @var null|ValueQuantity
     */
    #[JMS\Accessor(getter: 'getValueQuantity', setter: 'setValueQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValueQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $valueQuantity;

    /**
     * @var null|array<ValueQualifier>
     */
    #[JMS\Accessor(getter: 'getValueQualifier', setter: 'setValueQualifier')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValueQualifier')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueQualifier>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ValueQualifier', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
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
        $this->nameCode ??= new NameCode();

        return $this->nameCode;
    }

    /**
     * @param  null|NameCode $nameCode
     * @return static
     */
    public function setNameCode(
        ?NameCode $nameCode = null
    ): static {
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
        $this->value ??= new Value();

        return $this->value;
    }

    /**
     * @param  null|Value $value
     * @return static
     */
    public function setValue(
        ?Value $value = null
    ): static {
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
        $this->valueQuantity ??= new ValueQuantity();

        return $this->valueQuantity;
    }

    /**
     * @param  null|ValueQuantity $valueQuantity
     * @return static
     */
    public function setValueQuantity(
        ?ValueQuantity $valueQuantity = null
    ): static {
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
    public function setValueQualifier(
        ?array $valueQualifier = null
    ): static {
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
    public function addToValueQualifier(
        ValueQualifier $valueQualifier
    ): static {
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
    public function addOnceToValueQualifier(
        ValueQualifier $valueQualifier
    ): static {
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
