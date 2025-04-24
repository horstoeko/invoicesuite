<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;

class CreditorFinancialInstitutionType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("BICID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBICID", setter="setBICID")
     */
    private $bICID;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getBICID(): ?IDType
    {
        return $this->bICID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getBICIDWithCreate(): IDType
    {
        $this->bICID = is_null($this->bICID) ? new IDType() : $this->bICID;

        return $this->bICID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setBICID(IDType $bICID): self
    {
        $this->bICID = $bICID;

        return $this;
    }
}
