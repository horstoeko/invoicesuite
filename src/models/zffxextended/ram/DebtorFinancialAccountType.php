<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxextended\udt\IDType;

class DebtorFinancialAccountType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IBANID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIBANID", setter="setIBANID")
     */
    private $iBANID;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getIBANID(): ?IDType
    {
        return $this->iBANID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getIBANIDWithCreate(): IDType
    {
        $this->iBANID = is_null($this->iBANID) ? new IDType() : $this->iBANID;

        return $this->iBANID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null $iBANID
     * @return self
     */
    public function setIBANID(?IDType $iBANID = null): self
    {
        $this->iBANID = $iBANID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIBANID(): self
    {
        $this->iBANID = null;

        return $this;
    }
}
