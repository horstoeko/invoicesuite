<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;

class DebtorFinancialAccountType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IBANID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIBANID", setter="setIBANID")
     */
    private $iBANID;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getIBANID(): ?IDType
    {
        return $this->iBANID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getIBANIDWithCreate(): IDType
    {
        $this->iBANID = is_null($this->iBANID) ? new IDType() : $this->iBANID;

        return $this->iBANID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setIBANID(IDType $iBANID): self
    {
        $this->iBANID = $iBANID;

        return $this;
    }
}
