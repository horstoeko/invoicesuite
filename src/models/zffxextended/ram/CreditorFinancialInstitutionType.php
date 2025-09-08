<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxextended\udt\IDType;

class CreditorFinancialInstitutionType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("BICID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBICID", setter="setBICID")
     */
    private $bICID;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getBICID(): ?IDType
    {
        return $this->bICID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getBICIDWithCreate(): IDType
    {
        $this->bICID = is_null($this->bICID) ? new IDType() : $this->bICID;

        return $this->bICID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null $bICID
     * @return self
     */
    public function setBICID(?IDType $bICID = null): self
    {
        $this->bICID = $bICID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBICID(): self
    {
        $this->bICID = null;

        return $this;
    }
}
