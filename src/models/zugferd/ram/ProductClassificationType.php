<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\CodeType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class ProductClassificationType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ClassCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getClassCode", setter="setClassCode")
     */
    private $classCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("ClassName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getClassName", setter="setClassName")
     */
    private $className;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getClassCode(): ?CodeType
    {
        return $this->classCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getClassCodeWithCreate(): CodeType
    {
        $this->classCode = is_null($this->classCode) ? new CodeType() : $this->classCode;

        return $this->classCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @return self
     */
    public function setClassCode(CodeType $classCode): self
    {
        $this->classCode = $classCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getClassName(): ?TextType
    {
        return $this->className;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getClassNameWithCreate(): TextType
    {
        $this->className = is_null($this->className) ? new TextType() : $this->className;

        return $this->className;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setClassName(TextType $className): self
    {
        $this->className = $className;

        return $this;
    }
}
