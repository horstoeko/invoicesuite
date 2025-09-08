<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\PartyType;
use horstoeko\invoicesuite\models\ubl\cbc\PartyTypeCode;

class ContractingPartyTypeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PartyTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PartyTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PartyTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartyTypeCode", setter="setPartyTypeCode")
     */
    private $partyTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PartyType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PartyType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartyType", setter="setPartyType")
     */
    private $partyType;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartyTypeCode|null
     */
    public function getPartyTypeCode(): ?PartyTypeCode
    {
        return $this->partyTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartyTypeCode
     */
    public function getPartyTypeCodeWithCreate(): PartyTypeCode
    {
        $this->partyTypeCode = is_null($this->partyTypeCode) ? new PartyTypeCode() : $this->partyTypeCode;

        return $this->partyTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PartyTypeCode|null $partyTypeCode
     * @return self
     */
    public function setPartyTypeCode(?PartyTypeCode $partyTypeCode = null): self
    {
        $this->partyTypeCode = $partyTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPartyTypeCode(): self
    {
        $this->partyTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartyType|null
     */
    public function getPartyType(): ?PartyType
    {
        return $this->partyType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartyType
     */
    public function getPartyTypeWithCreate(): PartyType
    {
        $this->partyType = is_null($this->partyType) ? new PartyType() : $this->partyType;

        return $this->partyType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PartyType|null $partyType
     * @return self
     */
    public function setPartyType(?PartyType $partyType = null): self
    {
        $this->partyType = $partyType;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPartyType(): self
    {
        $this->partyType = null;

        return $this;
    }
}
