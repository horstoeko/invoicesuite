<?php

namespace horstoeko\invoicesuite\models\zffxcomfort\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxcomfort\udt\CodeType;

class ProductClassificationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\CodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ClassCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getClassCode", setter="setClassCode")
     */
    private $classCode;

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\CodeType|null
     */
    public function getClassCode(): ?CodeType
    {
        return $this->classCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\CodeType
     */
    public function getClassCodeWithCreate(): CodeType
    {
        $this->classCode = is_null($this->classCode) ? new CodeType() : $this->classCode;

        return $this->classCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\CodeType|null $classCode
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
}
