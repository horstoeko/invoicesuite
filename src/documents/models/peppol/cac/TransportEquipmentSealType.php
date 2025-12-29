<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Condition;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SealingPartyType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SealIssuerTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SealStatusCode;
use JMS\Serializer\Annotation as JMS;

class TransportEquipmentSealType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|SealIssuerTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SealIssuerTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SealIssuerTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSealIssuerTypeCode", setter="setSealIssuerTypeCode")
     */
    private $sealIssuerTypeCode;

    /**
     * @var null|Condition
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Condition")
     * @JMS\Expose
     * @JMS\SerializedName("Condition")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCondition", setter="setCondition")
     */
    private $condition;

    /**
     * @var null|SealStatusCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SealStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("SealStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSealStatusCode", setter="setSealStatusCode")
     */
    private $sealStatusCode;

    /**
     * @var null|SealingPartyType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SealingPartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SealingPartyType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSealingPartyType", setter="setSealingPartyType")
     */
    private $sealingPartyType;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|SealIssuerTypeCode
     */
    public function getSealIssuerTypeCode(): ?SealIssuerTypeCode
    {
        return $this->sealIssuerTypeCode;
    }

    /**
     * @return SealIssuerTypeCode
     */
    public function getSealIssuerTypeCodeWithCreate(): SealIssuerTypeCode
    {
        $this->sealIssuerTypeCode = is_null($this->sealIssuerTypeCode) ? new SealIssuerTypeCode() : $this->sealIssuerTypeCode;

        return $this->sealIssuerTypeCode;
    }

    /**
     * @param  null|SealIssuerTypeCode $sealIssuerTypeCode
     * @return static
     */
    public function setSealIssuerTypeCode(?SealIssuerTypeCode $sealIssuerTypeCode = null): static
    {
        $this->sealIssuerTypeCode = $sealIssuerTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSealIssuerTypeCode(): static
    {
        $this->sealIssuerTypeCode = null;

        return $this;
    }

    /**
     * @return null|Condition
     */
    public function getCondition(): ?Condition
    {
        return $this->condition;
    }

    /**
     * @return Condition
     */
    public function getConditionWithCreate(): Condition
    {
        $this->condition = is_null($this->condition) ? new Condition() : $this->condition;

        return $this->condition;
    }

    /**
     * @param  null|Condition $condition
     * @return static
     */
    public function setCondition(?Condition $condition = null): static
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCondition(): static
    {
        $this->condition = null;

        return $this;
    }

    /**
     * @return null|SealStatusCode
     */
    public function getSealStatusCode(): ?SealStatusCode
    {
        return $this->sealStatusCode;
    }

    /**
     * @return SealStatusCode
     */
    public function getSealStatusCodeWithCreate(): SealStatusCode
    {
        $this->sealStatusCode = is_null($this->sealStatusCode) ? new SealStatusCode() : $this->sealStatusCode;

        return $this->sealStatusCode;
    }

    /**
     * @param  null|SealStatusCode $sealStatusCode
     * @return static
     */
    public function setSealStatusCode(?SealStatusCode $sealStatusCode = null): static
    {
        $this->sealStatusCode = $sealStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSealStatusCode(): static
    {
        $this->sealStatusCode = null;

        return $this;
    }

    /**
     * @return null|SealingPartyType
     */
    public function getSealingPartyType(): ?SealingPartyType
    {
        return $this->sealingPartyType;
    }

    /**
     * @return SealingPartyType
     */
    public function getSealingPartyTypeWithCreate(): SealingPartyType
    {
        $this->sealingPartyType = is_null($this->sealingPartyType) ? new SealingPartyType() : $this->sealingPartyType;

        return $this->sealingPartyType;
    }

    /**
     * @param  null|SealingPartyType $sealingPartyType
     * @return static
     */
    public function setSealingPartyType(?SealingPartyType $sealingPartyType = null): static
    {
        $this->sealingPartyType = $sealingPartyType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSealingPartyType(): static
    {
        $this->sealingPartyType = null;

        return $this;
    }
}
