<?php

namespace horstoeko\invoicesuite\documentmodels\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType;

class ProductClassificationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ClassCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getClassCode", setter="setClassCode")
     */
    private $classCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("ClassName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getClassName", setter="setClassName")
     */
    private $className;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType|null
     */
    public function getClassCode(): ?CodeType
    {
        return $this->classCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType
     */
    public function getClassCodeWithCreate(): CodeType
    {
        $this->classCode = is_null($this->classCode) ? new CodeType() : $this->classCode;

        return $this->classCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType|null $classCode
     * @return self
     */
    public function setClassCode(?CodeType $classCode = null): self
    {
        $this->classCode = $classCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetClassCode(): self
    {
        $this->classCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getClassName(): ?TextType
    {
        return $this->className;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getClassNameWithCreate(): TextType
    {
        $this->className = is_null($this->className) ? new TextType() : $this->className;

        return $this->className;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $className
     * @return self
     */
    public function setClassName(?TextType $className = null): self
    {
        $this->className = $className;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetClassName(): self
    {
        $this->className = null;

        return $this;
    }
}
