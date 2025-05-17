<?php

namespace horstoeko\invoicesuite\models\zffxcomfort\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxcomfort\udt\IDType;
use horstoeko\invoicesuite\models\zffxcomfort\udt\TextType;

class UniversalCommunicationType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("URIID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIID", setter="setURIID")
     */
    private $uRIID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CompleteNumber")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCompleteNumber", setter="setCompleteNumber")
     */
    private $completeNumber;

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType|null
     */
    public function getURIID(): ?IDType
    {
        return $this->uRIID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType
     */
    public function getURIIDWithCreate(): IDType
    {
        $this->uRIID = is_null($this->uRIID) ? new IDType() : $this->uRIID;

        return $this->uRIID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType $uRIID
     * @return self
     */
    public function setURIID(IDType $uRIID): self
    {
        $this->uRIID = $uRIID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType|null
     */
    public function getCompleteNumber(): ?TextType
    {
        return $this->completeNumber;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType
     */
    public function getCompleteNumberWithCreate(): TextType
    {
        $this->completeNumber = is_null($this->completeNumber) ? new TextType() : $this->completeNumber;

        return $this->completeNumber;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType $completeNumber
     * @return self
     */
    public function setCompleteNumber(TextType $completeNumber): self
    {
        $this->completeNumber = $completeNumber;

        return $this;
    }
}
