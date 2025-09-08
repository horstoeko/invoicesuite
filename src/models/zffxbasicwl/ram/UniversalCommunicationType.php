<?php

namespace horstoeko\invoicesuite\models\zffxbasicwl\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType;

class UniversalCommunicationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("URIID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIID", setter="setURIID")
     */
    private $uRIID;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType|null
     */
    public function getURIID(): ?IDType
    {
        return $this->uRIID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType
     */
    public function getURIIDWithCreate(): IDType
    {
        $this->uRIID = is_null($this->uRIID) ? new IDType() : $this->uRIID;

        return $this->uRIID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType|null $uRIID
     * @return self
     */
    public function setURIID(?IDType $uRIID = null): self
    {
        $this->uRIID = $uRIID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetURIID(): self
    {
        $this->uRIID = null;

        return $this;
    }
}
