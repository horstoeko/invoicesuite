<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\IDType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class ProcuringProjectType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $idType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $textType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getID(): ?IDType
    {
        return $this->idType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->idType = is_null($this->idType) ? new IDType() : $this->idType;

        return $this->idType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setID(IDType $idType): self
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getName(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setName(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }
}
