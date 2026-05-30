<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Condition;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SealingPartyType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SealIssuerTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SealStatusCode;
use JMS\Serializer\Annotation as JMS;

class TransportEquipmentSealType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|SealIssuerTypeCode
     */
    #[JMS\Accessor(getter: 'getSealIssuerTypeCode', setter: 'setSealIssuerTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SealIssuerTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SealIssuerTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sealIssuerTypeCode;

    /**
     * @var null|Condition
     */
    #[JMS\Accessor(getter: 'getCondition', setter: 'setCondition')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Condition')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Condition')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $condition;

    /**
     * @var null|SealStatusCode
     */
    #[JMS\Accessor(getter: 'getSealStatusCode', setter: 'setSealStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SealStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SealStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sealStatusCode;

    /**
     * @var null|SealingPartyType
     */
    #[JMS\Accessor(getter: 'getSealingPartyType', setter: 'setSealingPartyType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SealingPartyType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SealingPartyType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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
        $this->sealIssuerTypeCode ??= new SealIssuerTypeCode();

        return $this->sealIssuerTypeCode;
    }

    /**
     * @param  null|SealIssuerTypeCode $sealIssuerTypeCode
     * @return static
     */
    public function setSealIssuerTypeCode(
        ?SealIssuerTypeCode $sealIssuerTypeCode = null
    ): static {
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
        $this->condition ??= new Condition();

        return $this->condition;
    }

    /**
     * @param  null|Condition $condition
     * @return static
     */
    public function setCondition(
        ?Condition $condition = null
    ): static {
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
        $this->sealStatusCode ??= new SealStatusCode();

        return $this->sealStatusCode;
    }

    /**
     * @param  null|SealStatusCode $sealStatusCode
     * @return static
     */
    public function setSealStatusCode(
        ?SealStatusCode $sealStatusCode = null
    ): static {
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
        $this->sealingPartyType ??= new SealingPartyType();

        return $this->sealingPartyType;
    }

    /**
     * @param  null|SealingPartyType $sealingPartyType
     * @return static
     */
    public function setSealingPartyType(
        ?SealingPartyType $sealingPartyType = null
    ): static {
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
