<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class UniversalCommunicationType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("URIID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIID", setter="setURIID")
     */
    private $uRIID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CompleteNumber")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCompleteNumber", setter="setCompleteNumber")
     */
    private $completeNumber;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getURIID(): ?IDType
    {
        return $this->uRIID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getURIIDWithCreate(): IDType
    {
        $this->uRIID = is_null($this->uRIID) ? new IDType() : $this->uRIID;

        return $this->uRIID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setURIID(IDType $uRIID): self
    {
        $this->uRIID = $uRIID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getCompleteNumber(): ?TextType
    {
        return $this->completeNumber;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getCompleteNumberWithCreate(): TextType
    {
        $this->completeNumber = is_null($this->completeNumber) ? new TextType() : $this->completeNumber;

        return $this->completeNumber;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setCompleteNumber(TextType $completeNumber): self
    {
        $this->completeNumber = $completeNumber;

        return $this;
    }
}
