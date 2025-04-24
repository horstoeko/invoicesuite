<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\AccountingAccountTypeCodeType;
use horstoeko\invoicesuite\models\zffx\udt\IDType;

class TradeAccountingAccountType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $idType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\AccountingAccountTypeCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\AccountingAccountTypeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $accountingAccountTypeCodeType;

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
     * @return \horstoeko\invoicesuite\models\zffx\qdt\AccountingAccountTypeCodeType|null
     */
    public function getTypeCode(): ?AccountingAccountTypeCodeType
    {
        return $this->accountingAccountTypeCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\AccountingAccountTypeCodeType
     */
    public function getTypeCodeWithCreate(): AccountingAccountTypeCodeType
    {
        $this->accountingAccountTypeCodeType = is_null($this->accountingAccountTypeCodeType) ? new AccountingAccountTypeCodeType() : $this->accountingAccountTypeCodeType;

        return $this->accountingAccountTypeCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\AccountingAccountTypeCodeType $accountingAccountTypeCodeType
     * @return self
     */
    public function setTypeCode(AccountingAccountTypeCodeType $accountingAccountTypeCodeType): self
    {
        $this->accountingAccountTypeCodeType = $accountingAccountTypeCodeType;

        return $this;
    }
}
