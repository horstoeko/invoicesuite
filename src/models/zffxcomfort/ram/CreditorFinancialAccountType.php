<?php

namespace horstoeko\invoicesuite\models\zffxcomfort\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxcomfort\udt\IDType;
use horstoeko\invoicesuite\models\zffxcomfort\udt\TextType;

class CreditorFinancialAccountType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IBANID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIBANID", setter="setIBANID")
     */
    private $iBANID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("AccountName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAccountName", setter="setAccountName")
     */
    private $accountName;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ProprietaryID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getProprietaryID", setter="setProprietaryID")
     */
    private $proprietaryID;

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType|null
     */
    public function getIBANID(): ?IDType
    {
        return $this->iBANID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType
     */
    public function getIBANIDWithCreate(): IDType
    {
        $this->iBANID = is_null($this->iBANID) ? new IDType() : $this->iBANID;

        return $this->iBANID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType|null $iBANID
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

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType|null
     */
    public function getAccountName(): ?TextType
    {
        return $this->accountName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType
     */
    public function getAccountNameWithCreate(): TextType
    {
        $this->accountName = is_null($this->accountName) ? new TextType() : $this->accountName;

        return $this->accountName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType|null $accountName
     * @return self
     */
    public function setAccountName(?TextType $accountName = null): self
    {
        $this->accountName = $accountName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccountName(): self
    {
        $this->accountName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType|null
     */
    public function getProprietaryID(): ?IDType
    {
        return $this->proprietaryID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType
     */
    public function getProprietaryIDWithCreate(): IDType
    {
        $this->proprietaryID = is_null($this->proprietaryID) ? new IDType() : $this->proprietaryID;

        return $this->proprietaryID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType|null $proprietaryID
     * @return self
     */
    public function setProprietaryID(?IDType $proprietaryID = null): self
    {
        $this->proprietaryID = $proprietaryID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProprietaryID(): self
    {
        $this->proprietaryID = null;

        return $this;
    }
}
