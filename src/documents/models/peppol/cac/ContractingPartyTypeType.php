<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PartyType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PartyTypeCode;
use JMS\Serializer\Annotation as JMS;

class ContractingPartyTypeType
{
    use HandlesObjectFlags;

    /**
     * @var null|PartyTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PartyTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PartyTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartyTypeCode", setter="setPartyTypeCode")
     */
    private $partyTypeCode;

    /**
     * @var null|PartyType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PartyType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartyType", setter="setPartyType")
     */
    private $partyType;

    /**
     * @return null|PartyTypeCode
     */
    public function getPartyTypeCode(): ?PartyTypeCode
    {
        return $this->partyTypeCode;
    }

    /**
     * @return PartyTypeCode
     */
    public function getPartyTypeCodeWithCreate(): PartyTypeCode
    {
        $this->partyTypeCode = is_null($this->partyTypeCode) ? new PartyTypeCode() : $this->partyTypeCode;

        return $this->partyTypeCode;
    }

    /**
     * @param  null|PartyTypeCode $partyTypeCode
     * @return static
     */
    public function setPartyTypeCode(?PartyTypeCode $partyTypeCode = null): static
    {
        $this->partyTypeCode = $partyTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartyTypeCode(): static
    {
        $this->partyTypeCode = null;

        return $this;
    }

    /**
     * @return null|PartyType
     */
    public function getPartyType(): ?PartyType
    {
        return $this->partyType;
    }

    /**
     * @return PartyType
     */
    public function getPartyTypeWithCreate(): PartyType
    {
        $this->partyType = is_null($this->partyType) ? new PartyType() : $this->partyType;

        return $this->partyType;
    }

    /**
     * @param  null|PartyType $partyType
     * @return static
     */
    public function setPartyType(?PartyType $partyType = null): static
    {
        $this->partyType = $partyType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartyType(): static
    {
        $this->partyType = null;

        return $this;
    }
}
