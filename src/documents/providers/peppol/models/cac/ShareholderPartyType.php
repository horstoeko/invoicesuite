<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PartecipationPercent;
use JMS\Serializer\Annotation as JMS;

class ShareholderPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|PartecipationPercent
     */
    #[JMS\Accessor(getter: 'getPartecipationPercent', setter: 'setPartecipationPercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PartecipationPercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PartecipationPercent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $partecipationPercent;

    /**
     * @var null|Party
     */
    #[JMS\Accessor(getter: 'getParty', setter: 'setParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Party')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Party')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $party;

    /**
     * @return null|PartecipationPercent
     */
    public function getPartecipationPercent(): ?PartecipationPercent
    {
        return $this->partecipationPercent;
    }

    /**
     * @return PartecipationPercent
     */
    public function getPartecipationPercentWithCreate(): PartecipationPercent
    {
        $this->partecipationPercent ??= new PartecipationPercent();

        return $this->partecipationPercent;
    }

    /**
     * @param  null|PartecipationPercent $partecipationPercent
     * @return static
     */
    public function setPartecipationPercent(
        ?PartecipationPercent $partecipationPercent = null
    ): static {
        $this->partecipationPercent = $partecipationPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartecipationPercent(): static
    {
        $this->partecipationPercent = null;

        return $this;
    }

    /**
     * @return null|Party
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party ??= new Party();

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(
        ?Party $party = null
    ): static {
        $this->party = $party;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParty(): static
    {
        $this->party = null;

        return $this;
    }
}
