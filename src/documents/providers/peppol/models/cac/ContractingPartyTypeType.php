<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PartyType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PartyTypeCode;
use JMS\Serializer\Annotation as JMS;

class ContractingPartyTypeType
{
    use HandlesObjectFlags;

    /**
     * @var null|PartyTypeCode
     */
    #[JMS\Accessor(getter: 'getPartyTypeCode', setter: 'setPartyTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PartyTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PartyTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $partyTypeCode;

    /**
     * @var null|PartyType
     */
    #[JMS\Accessor(getter: 'getPartyType', setter: 'setPartyType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PartyType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PartyType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->partyTypeCode ??= new PartyTypeCode();

        return $this->partyTypeCode;
    }

    /**
     * @param  null|PartyTypeCode $partyTypeCode
     * @return static
     */
    public function setPartyTypeCode(
        ?PartyTypeCode $partyTypeCode = null
    ): static {
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
        $this->partyType ??= new PartyType();

        return $this->partyType;
    }

    /**
     * @param  null|PartyType $partyType
     * @return static
     */
    public function setPartyType(
        ?PartyType $partyType = null
    ): static {
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
