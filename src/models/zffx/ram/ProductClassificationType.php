<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\CodeType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class ProductClassificationType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\CodeType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ClassCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getClassCode", setter="setClassCode")
     */
    private $codeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("ClassName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getClassName", setter="setClassName")
     */
    private $textType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType|null
     */
    public function getClassCode(): ?CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType
     */
    public function getClassCodeWithCreate(): CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\CodeType $codeType
     * @return self
     */
    public function setClassCode(CodeType $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getClassName(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getClassNameWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setClassName(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }
}
