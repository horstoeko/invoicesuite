<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\CodeType;
use horstoeko\invoicesuite\models\zugferd\udt\MeasureType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class ProductCharacteristicType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $codeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\MeasureType")
     * @JMS\Expose
     * @JMS\SerializedName("ValueMeasure")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getValueMeasure", setter="setValueMeasure")
     */
    private $measureType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Value")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getTypeCode(): ?\horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getTypeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @return self
     */
    public function setTypeCode(\horstoeko\invoicesuite\models\zugferd\udt\CodeType $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getDescription(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getDescriptionWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setDescription(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->description = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\MeasureType|null
     */
    public function getValueMeasure(): ?\horstoeko\invoicesuite\models\zugferd\udt\MeasureType
    {
        return $this->measureType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
     */
    public function getValueMeasureWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
    {
        $this->measureType = is_null($this->measureType) ? new MeasureType() : $this->measureType;

        return $this->measureType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
     * @return self
     */
    public function setValueMeasure(\horstoeko\invoicesuite\models\zugferd\udt\MeasureType $measureType): self
    {
        $this->measureType = $measureType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getValue(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->value;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getValueWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->value = is_null($this->value) ? new TextType() : $this->value;

        return $this->value;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setValue(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->value = $textType;

        return $this;
    }
}
