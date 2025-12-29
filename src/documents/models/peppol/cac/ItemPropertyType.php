<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ImportanceCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ListValue;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NameCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TestMethod;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Value;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ValueQualifier;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ValueQuantity;
use JMS\Serializer\Annotation as JMS;

class ItemPropertyType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

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
     * @var null|TestMethod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TestMethod")
     * @JMS\Expose
     * @JMS\SerializedName("TestMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTestMethod", setter="setTestMethod")
     */
    private $testMethod;

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
     * @var null|ImportanceCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ImportanceCode")
     * @JMS\Expose
     * @JMS\SerializedName("ImportanceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getImportanceCode", setter="setImportanceCode")
     */
    private $importanceCode;

    /**
     * @var null|array<ListValue>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ListValue>")
     * @JMS\Expose
     * @JMS\SerializedName("ListValue")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ListValue", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getListValue", setter="setListValue")
     */
    private $listValue;

    /**
     * @var null|UsabilityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\UsabilityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("UsabilityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUsabilityPeriod", setter="setUsabilityPeriod")
     */
    private $usabilityPeriod;

    /**
     * @var null|array<ItemPropertyGroup>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ItemPropertyGroup>")
     * @JMS\Expose
     * @JMS\SerializedName("ItemPropertyGroup")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ItemPropertyGroup", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItemPropertyGroup", setter="setItemPropertyGroup")
     */
    private $itemPropertyGroup;

    /**
     * @var null|RangeDimension
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\RangeDimension")
     * @JMS\Expose
     * @JMS\SerializedName("RangeDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRangeDimension", setter="setRangeDimension")
     */
    private $rangeDimension;

    /**
     * @var null|ItemPropertyRange
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ItemPropertyRange")
     * @JMS\Expose
     * @JMS\SerializedName("ItemPropertyRange")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItemPropertyRange", setter="setItemPropertyRange")
     */
    private $itemPropertyRange;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

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
     * @return null|TestMethod
     */
    public function getTestMethod(): ?TestMethod
    {
        return $this->testMethod;
    }

    /**
     * @return TestMethod
     */
    public function getTestMethodWithCreate(): TestMethod
    {
        $this->testMethod = is_null($this->testMethod) ? new TestMethod() : $this->testMethod;

        return $this->testMethod;
    }

    /**
     * @param  null|TestMethod $testMethod
     * @return static
     */
    public function setTestMethod(?TestMethod $testMethod = null): static
    {
        $this->testMethod = $testMethod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTestMethod(): static
    {
        $this->testMethod = null;

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

    /**
     * @return null|ImportanceCode
     */
    public function getImportanceCode(): ?ImportanceCode
    {
        return $this->importanceCode;
    }

    /**
     * @return ImportanceCode
     */
    public function getImportanceCodeWithCreate(): ImportanceCode
    {
        $this->importanceCode = is_null($this->importanceCode) ? new ImportanceCode() : $this->importanceCode;

        return $this->importanceCode;
    }

    /**
     * @param  null|ImportanceCode $importanceCode
     * @return static
     */
    public function setImportanceCode(?ImportanceCode $importanceCode = null): static
    {
        $this->importanceCode = $importanceCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetImportanceCode(): static
    {
        $this->importanceCode = null;

        return $this;
    }

    /**
     * @return null|array<ListValue>
     */
    public function getListValue(): ?array
    {
        return $this->listValue;
    }

    /**
     * @param  null|array<ListValue> $listValue
     * @return static
     */
    public function setListValue(?array $listValue = null): static
    {
        $this->listValue = $listValue;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetListValue(): static
    {
        $this->listValue = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearListValue(): static
    {
        $this->listValue = [];

        return $this;
    }

    /**
     * @return null|ListValue
     */
    public function firstListValue(): ?ListValue
    {
        $listValue = $this->listValue ?? [];
        $listValue = reset($listValue);

        if (false === $listValue) {
            return null;
        }

        return $listValue;
    }

    /**
     * @return null|ListValue
     */
    public function lastListValue(): ?ListValue
    {
        $listValue = $this->listValue ?? [];
        $listValue = end($listValue);

        if (false === $listValue) {
            return null;
        }

        return $listValue;
    }

    /**
     * @param  ListValue $listValue
     * @return static
     */
    public function addToListValue(ListValue $listValue): static
    {
        $this->listValue[] = $listValue;

        return $this;
    }

    /**
     * @return ListValue
     */
    public function addToListValueWithCreate(): ListValue
    {
        $this->addTolistValue($listValue = new ListValue());

        return $listValue;
    }

    /**
     * @param  ListValue $listValue
     * @return static
     */
    public function addOnceToListValue(ListValue $listValue): static
    {
        if (!is_array($this->listValue)) {
            $this->listValue = [];
        }

        $this->listValue[0] = $listValue;

        return $this;
    }

    /**
     * @return ListValue
     */
    public function addOnceToListValueWithCreate(): ListValue
    {
        if (!is_array($this->listValue)) {
            $this->listValue = [];
        }

        if ([] === $this->listValue) {
            $this->addOnceTolistValue(new ListValue());
        }

        return $this->listValue[0];
    }

    /**
     * @return null|UsabilityPeriod
     */
    public function getUsabilityPeriod(): ?UsabilityPeriod
    {
        return $this->usabilityPeriod;
    }

    /**
     * @return UsabilityPeriod
     */
    public function getUsabilityPeriodWithCreate(): UsabilityPeriod
    {
        $this->usabilityPeriod = is_null($this->usabilityPeriod) ? new UsabilityPeriod() : $this->usabilityPeriod;

        return $this->usabilityPeriod;
    }

    /**
     * @param  null|UsabilityPeriod $usabilityPeriod
     * @return static
     */
    public function setUsabilityPeriod(?UsabilityPeriod $usabilityPeriod = null): static
    {
        $this->usabilityPeriod = $usabilityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUsabilityPeriod(): static
    {
        $this->usabilityPeriod = null;

        return $this;
    }

    /**
     * @return null|array<ItemPropertyGroup>
     */
    public function getItemPropertyGroup(): ?array
    {
        return $this->itemPropertyGroup;
    }

    /**
     * @param  null|array<ItemPropertyGroup> $itemPropertyGroup
     * @return static
     */
    public function setItemPropertyGroup(?array $itemPropertyGroup = null): static
    {
        $this->itemPropertyGroup = $itemPropertyGroup;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItemPropertyGroup(): static
    {
        $this->itemPropertyGroup = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearItemPropertyGroup(): static
    {
        $this->itemPropertyGroup = [];

        return $this;
    }

    /**
     * @return null|ItemPropertyGroup
     */
    public function firstItemPropertyGroup(): ?ItemPropertyGroup
    {
        $itemPropertyGroup = $this->itemPropertyGroup ?? [];
        $itemPropertyGroup = reset($itemPropertyGroup);

        if (false === $itemPropertyGroup) {
            return null;
        }

        return $itemPropertyGroup;
    }

    /**
     * @return null|ItemPropertyGroup
     */
    public function lastItemPropertyGroup(): ?ItemPropertyGroup
    {
        $itemPropertyGroup = $this->itemPropertyGroup ?? [];
        $itemPropertyGroup = end($itemPropertyGroup);

        if (false === $itemPropertyGroup) {
            return null;
        }

        return $itemPropertyGroup;
    }

    /**
     * @param  ItemPropertyGroup $itemPropertyGroup
     * @return static
     */
    public function addToItemPropertyGroup(ItemPropertyGroup $itemPropertyGroup): static
    {
        $this->itemPropertyGroup[] = $itemPropertyGroup;

        return $this;
    }

    /**
     * @return ItemPropertyGroup
     */
    public function addToItemPropertyGroupWithCreate(): ItemPropertyGroup
    {
        $this->addToitemPropertyGroup($itemPropertyGroup = new ItemPropertyGroup());

        return $itemPropertyGroup;
    }

    /**
     * @param  ItemPropertyGroup $itemPropertyGroup
     * @return static
     */
    public function addOnceToItemPropertyGroup(ItemPropertyGroup $itemPropertyGroup): static
    {
        if (!is_array($this->itemPropertyGroup)) {
            $this->itemPropertyGroup = [];
        }

        $this->itemPropertyGroup[0] = $itemPropertyGroup;

        return $this;
    }

    /**
     * @return ItemPropertyGroup
     */
    public function addOnceToItemPropertyGroupWithCreate(): ItemPropertyGroup
    {
        if (!is_array($this->itemPropertyGroup)) {
            $this->itemPropertyGroup = [];
        }

        if ([] === $this->itemPropertyGroup) {
            $this->addOnceToitemPropertyGroup(new ItemPropertyGroup());
        }

        return $this->itemPropertyGroup[0];
    }

    /**
     * @return null|RangeDimension
     */
    public function getRangeDimension(): ?RangeDimension
    {
        return $this->rangeDimension;
    }

    /**
     * @return RangeDimension
     */
    public function getRangeDimensionWithCreate(): RangeDimension
    {
        $this->rangeDimension = is_null($this->rangeDimension) ? new RangeDimension() : $this->rangeDimension;

        return $this->rangeDimension;
    }

    /**
     * @param  null|RangeDimension $rangeDimension
     * @return static
     */
    public function setRangeDimension(?RangeDimension $rangeDimension = null): static
    {
        $this->rangeDimension = $rangeDimension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRangeDimension(): static
    {
        $this->rangeDimension = null;

        return $this;
    }

    /**
     * @return null|ItemPropertyRange
     */
    public function getItemPropertyRange(): ?ItemPropertyRange
    {
        return $this->itemPropertyRange;
    }

    /**
     * @return ItemPropertyRange
     */
    public function getItemPropertyRangeWithCreate(): ItemPropertyRange
    {
        $this->itemPropertyRange = is_null($this->itemPropertyRange) ? new ItemPropertyRange() : $this->itemPropertyRange;

        return $this->itemPropertyRange;
    }

    /**
     * @param  null|ItemPropertyRange $itemPropertyRange
     * @return static
     */
    public function setItemPropertyRange(?ItemPropertyRange $itemPropertyRange = null): static
    {
        $this->itemPropertyRange = $itemPropertyRange;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItemPropertyRange(): static
    {
        $this->itemPropertyRange = null;

        return $this;
    }
}
