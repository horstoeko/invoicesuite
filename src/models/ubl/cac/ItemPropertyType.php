<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\ImportanceCode;
use horstoeko\invoicesuite\models\ubl\cbc\ListValue;
use horstoeko\invoicesuite\models\ubl\cbc\Name;
use horstoeko\invoicesuite\models\ubl\cbc\NameCode;
use horstoeko\invoicesuite\models\ubl\cbc\TestMethod;
use horstoeko\invoicesuite\models\ubl\cbc\Value;
use horstoeko\invoicesuite\models\ubl\cbc\ValueQualifier;
use horstoeko\invoicesuite\models\ubl\cbc\ValueQuantity;

class ItemPropertyType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TestMethod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TestMethod")
     * @JMS\Expose
     * @JMS\SerializedName("TestMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTestMethod", setter="setTestMethod")
     */
    private $testMethod;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ImportanceCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ImportanceCode")
     * @JMS\Expose
     * @JMS\SerializedName("ImportanceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getImportanceCode", setter="setImportanceCode")
     */
    private $importanceCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\ListValue>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\ListValue>")
     * @JMS\Expose
     * @JMS\SerializedName("ListValue")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ListValue", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getListValue", setter="setListValue")
     */
    private $listValue;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\UsabilityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\UsabilityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("UsabilityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUsabilityPeriod", setter="setUsabilityPeriod")
     */
    private $usabilityPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ItemPropertyGroup>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ItemPropertyGroup>")
     * @JMS\Expose
     * @JMS\SerializedName("ItemPropertyGroup")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ItemPropertyGroup", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItemPropertyGroup", setter="setItemPropertyGroup")
     */
    private $itemPropertyGroup;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RangeDimension|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RangeDimension")
     * @JMS\Expose
     * @JMS\SerializedName("RangeDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRangeDimension", setter="setRangeDimension")
     */
    private $rangeDimension;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ItemPropertyRange|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ItemPropertyRange")
     * @JMS\Expose
     * @JMS\SerializedName("ItemPropertyRange")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItemPropertyRange", setter="setItemPropertyRange")
     */
    private $itemPropertyRange;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

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
     * @return self
     */
    public function unsetNameCode(): self
    {
        $this->nameCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TestMethod|null
     */
    public function getTestMethod(): ?TestMethod
    {
        return $this->testMethod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TestMethod
     */
    public function getTestMethodWithCreate(): TestMethod
    {
        $this->testMethod = is_null($this->testMethod) ? new TestMethod() : $this->testMethod;

        return $this->testMethod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TestMethod|null $testMethod
     * @return self
     */
    public function setTestMethod(?TestMethod $testMethod = null): self
    {
        $this->testMethod = $testMethod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTestMethod(): self
    {
        $this->testMethod = null;

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
     * @return self
     */
    public function unsetValue(): self
    {
        $this->value = null;

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
     * @return self
     */
    public function unsetValueQuantity(): self
    {
        $this->valueQuantity = null;

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
    public function unsetValueQualifier(): self
    {
        $this->valueQualifier = null;

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

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ImportanceCode|null
     */
    public function getImportanceCode(): ?ImportanceCode
    {
        return $this->importanceCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ImportanceCode
     */
    public function getImportanceCodeWithCreate(): ImportanceCode
    {
        $this->importanceCode = is_null($this->importanceCode) ? new ImportanceCode() : $this->importanceCode;

        return $this->importanceCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ImportanceCode|null $importanceCode
     * @return self
     */
    public function setImportanceCode(?ImportanceCode $importanceCode = null): self
    {
        $this->importanceCode = $importanceCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetImportanceCode(): self
    {
        $this->importanceCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\ListValue>|null
     */
    public function getListValue(): ?array
    {
        return $this->listValue;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\ListValue>|null $listValue
     * @return self
     */
    public function setListValue(?array $listValue = null): self
    {
        $this->listValue = $listValue;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetListValue(): self
    {
        $this->listValue = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearListValue(): self
    {
        $this->listValue = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ListValue $listValue
     * @return self
     */
    public function addToListValue(ListValue $listValue): self
    {
        $this->listValue[] = $listValue;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ListValue
     */
    public function addToListValueWithCreate(): ListValue
    {
        $this->addTolistValue($listValue = new ListValue());

        return $listValue;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ListValue $listValue
     * @return self
     */
    public function addOnceToListValue(ListValue $listValue): self
    {
        if (!is_array($this->listValue)) {
            $this->listValue = [];
        }

        $this->listValue[0] = $listValue;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ListValue
     */
    public function addOnceToListValueWithCreate(): ListValue
    {
        if (!is_array($this->listValue)) {
            $this->listValue = [];
        }

        if ($this->listValue === []) {
            $this->addOnceTolistValue(new ListValue());
        }

        return $this->listValue[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UsabilityPeriod|null
     */
    public function getUsabilityPeriod(): ?UsabilityPeriod
    {
        return $this->usabilityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UsabilityPeriod
     */
    public function getUsabilityPeriodWithCreate(): UsabilityPeriod
    {
        $this->usabilityPeriod = is_null($this->usabilityPeriod) ? new UsabilityPeriod() : $this->usabilityPeriod;

        return $this->usabilityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UsabilityPeriod|null $usabilityPeriod
     * @return self
     */
    public function setUsabilityPeriod(?UsabilityPeriod $usabilityPeriod = null): self
    {
        $this->usabilityPeriod = $usabilityPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUsabilityPeriod(): self
    {
        $this->usabilityPeriod = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ItemPropertyGroup>|null
     */
    public function getItemPropertyGroup(): ?array
    {
        return $this->itemPropertyGroup;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ItemPropertyGroup>|null $itemPropertyGroup
     * @return self
     */
    public function setItemPropertyGroup(?array $itemPropertyGroup = null): self
    {
        $this->itemPropertyGroup = $itemPropertyGroup;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetItemPropertyGroup(): self
    {
        $this->itemPropertyGroup = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearItemPropertyGroup(): self
    {
        $this->itemPropertyGroup = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ItemPropertyGroup $itemPropertyGroup
     * @return self
     */
    public function addToItemPropertyGroup(ItemPropertyGroup $itemPropertyGroup): self
    {
        $this->itemPropertyGroup[] = $itemPropertyGroup;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ItemPropertyGroup
     */
    public function addToItemPropertyGroupWithCreate(): ItemPropertyGroup
    {
        $this->addToitemPropertyGroup($itemPropertyGroup = new ItemPropertyGroup());

        return $itemPropertyGroup;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ItemPropertyGroup $itemPropertyGroup
     * @return self
     */
    public function addOnceToItemPropertyGroup(ItemPropertyGroup $itemPropertyGroup): self
    {
        if (!is_array($this->itemPropertyGroup)) {
            $this->itemPropertyGroup = [];
        }

        $this->itemPropertyGroup[0] = $itemPropertyGroup;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ItemPropertyGroup
     */
    public function addOnceToItemPropertyGroupWithCreate(): ItemPropertyGroup
    {
        if (!is_array($this->itemPropertyGroup)) {
            $this->itemPropertyGroup = [];
        }

        if ($this->itemPropertyGroup === []) {
            $this->addOnceToitemPropertyGroup(new ItemPropertyGroup());
        }

        return $this->itemPropertyGroup[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RangeDimension|null
     */
    public function getRangeDimension(): ?RangeDimension
    {
        return $this->rangeDimension;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RangeDimension
     */
    public function getRangeDimensionWithCreate(): RangeDimension
    {
        $this->rangeDimension = is_null($this->rangeDimension) ? new RangeDimension() : $this->rangeDimension;

        return $this->rangeDimension;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RangeDimension|null $rangeDimension
     * @return self
     */
    public function setRangeDimension(?RangeDimension $rangeDimension = null): self
    {
        $this->rangeDimension = $rangeDimension;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRangeDimension(): self
    {
        $this->rangeDimension = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ItemPropertyRange|null
     */
    public function getItemPropertyRange(): ?ItemPropertyRange
    {
        return $this->itemPropertyRange;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ItemPropertyRange
     */
    public function getItemPropertyRangeWithCreate(): ItemPropertyRange
    {
        $this->itemPropertyRange = is_null($this->itemPropertyRange) ? new ItemPropertyRange() : $this->itemPropertyRange;

        return $this->itemPropertyRange;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ItemPropertyRange|null $itemPropertyRange
     * @return self
     */
    public function setItemPropertyRange(?ItemPropertyRange $itemPropertyRange = null): self
    {
        $this->itemPropertyRange = $itemPropertyRange;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetItemPropertyRange(): self
    {
        $this->itemPropertyRange = null;

        return $this;
    }
}
