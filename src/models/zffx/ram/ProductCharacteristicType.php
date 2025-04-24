<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\CodeType;
use horstoeko\invoicesuite\models\zffx\udt\MeasureType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class ProductCharacteristicType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\CodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $codeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\MeasureType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\MeasureType")
     * @JMS\Expose
     * @JMS\SerializedName("ValueMeasure")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getValueMeasure", setter="setValueMeasure")
     */
    private $measureType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Value")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType|null
     */
    public function getTypeCode(): ?CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType
     */
    public function getTypeCodeWithCreate(): CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\CodeType $codeType
     * @return self
     */
    public function setTypeCode(CodeType $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setDescription(TextType $textType): self
    {
        $this->description = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\MeasureType|null
     */
    public function getValueMeasure(): ?MeasureType
    {
        return $this->measureType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\MeasureType
     */
    public function getValueMeasureWithCreate(): MeasureType
    {
        $this->measureType = is_null($this->measureType) ? new MeasureType() : $this->measureType;

        return $this->measureType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\MeasureType $measureType
     * @return self
     */
    public function setValueMeasure(MeasureType $measureType): self
    {
        $this->measureType = $measureType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getValue(): ?TextType
    {
        return $this->value;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getValueWithCreate(): TextType
    {
        $this->value = is_null($this->value) ? new TextType() : $this->value;

        return $this->value;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setValue(TextType $textType): self
    {
        $this->value = $textType;

        return $this;
    }
}
