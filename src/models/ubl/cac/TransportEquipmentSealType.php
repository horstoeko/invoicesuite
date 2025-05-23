<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Condition;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\SealIssuerTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\SealStatusCode;
use horstoeko\invoicesuite\models\ubl\cbc\SealingPartyType;

class TransportEquipmentSealType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SealIssuerTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SealIssuerTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SealIssuerTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSealIssuerTypeCode", setter="setSealIssuerTypeCode")
     */
    private $sealIssuerTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Condition|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Condition")
     * @JMS\Expose
     * @JMS\SerializedName("Condition")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCondition", setter="setCondition")
     */
    private $condition;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SealStatusCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SealStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("SealStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSealStatusCode", setter="setSealStatusCode")
     */
    private $sealStatusCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SealingPartyType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SealingPartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SealingPartyType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSealingPartyType", setter="setSealingPartyType")
     */
    private $sealingPartyType;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SealIssuerTypeCode|null
     */
    public function getSealIssuerTypeCode(): ?SealIssuerTypeCode
    {
        return $this->sealIssuerTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SealIssuerTypeCode
     */
    public function getSealIssuerTypeCodeWithCreate(): SealIssuerTypeCode
    {
        $this->sealIssuerTypeCode = is_null($this->sealIssuerTypeCode) ? new SealIssuerTypeCode() : $this->sealIssuerTypeCode;

        return $this->sealIssuerTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SealIssuerTypeCode|null $sealIssuerTypeCode
     * @return self
     */
    public function setSealIssuerTypeCode(?SealIssuerTypeCode $sealIssuerTypeCode = null): self
    {
        $this->sealIssuerTypeCode = $sealIssuerTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Condition|null
     */
    public function getCondition(): ?Condition
    {
        return $this->condition;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Condition
     */
    public function getConditionWithCreate(): Condition
    {
        $this->condition = is_null($this->condition) ? new Condition() : $this->condition;

        return $this->condition;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Condition|null $condition
     * @return self
     */
    public function setCondition(?Condition $condition = null): self
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SealStatusCode|null
     */
    public function getSealStatusCode(): ?SealStatusCode
    {
        return $this->sealStatusCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SealStatusCode
     */
    public function getSealStatusCodeWithCreate(): SealStatusCode
    {
        $this->sealStatusCode = is_null($this->sealStatusCode) ? new SealStatusCode() : $this->sealStatusCode;

        return $this->sealStatusCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SealStatusCode|null $sealStatusCode
     * @return self
     */
    public function setSealStatusCode(?SealStatusCode $sealStatusCode = null): self
    {
        $this->sealStatusCode = $sealStatusCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SealingPartyType|null
     */
    public function getSealingPartyType(): ?SealingPartyType
    {
        return $this->sealingPartyType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SealingPartyType
     */
    public function getSealingPartyTypeWithCreate(): SealingPartyType
    {
        $this->sealingPartyType = is_null($this->sealingPartyType) ? new SealingPartyType() : $this->sealingPartyType;

        return $this->sealingPartyType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SealingPartyType|null $sealingPartyType
     * @return self
     */
    public function setSealingPartyType(?SealingPartyType $sealingPartyType = null): self
    {
        $this->sealingPartyType = $sealingPartyType;

        return $this;
    }
}
