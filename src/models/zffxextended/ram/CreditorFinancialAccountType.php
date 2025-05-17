<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxextended\udt\IDType;
use horstoeko\invoicesuite\models\zffxextended\udt\TextType;

class CreditorFinancialAccountType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IBANID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIBANID", setter="setIBANID")
     */
    private $iBANID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("AccountName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAccountName", setter="setAccountName")
     */
    private $accountName;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ProprietaryID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getProprietaryID", setter="setProprietaryID")
     */
    private $proprietaryID;

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
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $iBANID
     * @return self
     */
    public function setIBANID(IDType $iBANID): self
    {
        $this->iBANID = $iBANID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getAccountName(): ?TextType
    {
        return $this->accountName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getAccountNameWithCreate(): TextType
    {
        $this->accountName = is_null($this->accountName) ? new TextType() : $this->accountName;

        return $this->accountName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType $accountName
     * @return self
     */
    public function setAccountName(TextType $accountName): self
    {
        $this->accountName = $accountName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getProprietaryID(): ?IDType
    {
        return $this->proprietaryID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getProprietaryIDWithCreate(): IDType
    {
        $this->proprietaryID = is_null($this->proprietaryID) ? new IDType() : $this->proprietaryID;

        return $this->proprietaryID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $proprietaryID
     * @return self
     */
    public function setProprietaryID(IDType $proprietaryID): self
    {
        $this->proprietaryID = $proprietaryID;

        return $this;
    }
}
