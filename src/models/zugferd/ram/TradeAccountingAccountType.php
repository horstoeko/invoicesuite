<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;

class TradeAccountingAccountType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $typeCode;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD = is_null($this->iD) ? new IDType() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setID(IDType $iD): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType|null
     */
    public function getTypeCode(): ?AccountingAccountTypeCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType
     */
    public function getTypeCodeWithCreate(): AccountingAccountTypeCodeType
    {
        $this->typeCode = is_null($this->typeCode) ? new AccountingAccountTypeCodeType() : $this->typeCode;

        return $this->typeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType
     * @return self
     */
    public function setTypeCode(AccountingAccountTypeCodeType $typeCode): self
    {
        $this->typeCode = $typeCode;

        return $this;
    }
}
