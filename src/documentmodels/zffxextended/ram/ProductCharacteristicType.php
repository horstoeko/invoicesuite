<?php

namespace horstoeko\invoicesuite\documentmodels\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\MeasureType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType;

class ProductCharacteristicType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $typeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\MeasureType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\MeasureType")
     * @JMS\Expose
     * @JMS\SerializedName("ValueMeasure")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getValueMeasure", setter="setValueMeasure")
     */
    private $valueMeasure;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Value")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType|null
     */
    public function getTypeCode(): ?CodeType
    {
        return $this->typeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType
     */
    public function getTypeCodeWithCreate(): CodeType
    {
        $this->typeCode = is_null($this->typeCode) ? new CodeType() : $this->typeCode;

        return $this->typeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType|null $typeCode
     * @return self
     */
    public function setTypeCode(?CodeType $typeCode = null): self
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTypeCode(): self
    {
        $this->typeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $description
     * @return self
     */
    public function setDescription(?TextType $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\MeasureType|null
     */
    public function getValueMeasure(): ?MeasureType
    {
        return $this->valueMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\MeasureType
     */
    public function getValueMeasureWithCreate(): MeasureType
    {
        $this->valueMeasure = is_null($this->valueMeasure) ? new MeasureType() : $this->valueMeasure;

        return $this->valueMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\MeasureType|null $valueMeasure
     * @return self
     */
    public function setValueMeasure(?MeasureType $valueMeasure = null): self
    {
        $this->valueMeasure = $valueMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetValueMeasure(): self
    {
        $this->valueMeasure = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getValue(): ?TextType
    {
        return $this->value;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getValueWithCreate(): TextType
    {
        $this->value = is_null($this->value) ? new TextType() : $this->value;

        return $this->value;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $value
     * @return self
     */
    public function setValue(?TextType $value = null): self
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
}
