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
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $idType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\AccountingAccountTypeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $accountingAccountTypeCodeType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->idType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->idType = is_null($this->idType) ? new IDType() : $this->idType;

        return $this->idType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType|null
     */
    public function getTypeCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType
    {
        return $this->accountingAccountTypeCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType
     */
    public function getTypeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType
    {
        $this->accountingAccountTypeCodeType = is_null($this->accountingAccountTypeCodeType) ? new AccountingAccountTypeCodeType() : $this->accountingAccountTypeCodeType;

        return $this->accountingAccountTypeCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType
     * @return self
     */
    public function setTypeCode(
        \horstoeko\invoicesuite\models\zugferd\qdt\AccountingAccountTypeCodeType $accountingAccountTypeCodeType,
    ): self {
        $this->accountingAccountTypeCodeType = $accountingAccountTypeCodeType;

        return $this;
    }
}
