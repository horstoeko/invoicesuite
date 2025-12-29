<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PartecipationPercent;
use JMS\Serializer\Annotation as JMS;

class ShareholderPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|PartecipationPercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PartecipationPercent")
     * @JMS\Expose
     * @JMS\SerializedName("PartecipationPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartecipationPercent", setter="setPartecipationPercent")
     */
    private $partecipationPercent;

    /**
     * @var null|Party
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
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
        $this->partecipationPercent = is_null($this->partecipationPercent) ? new PartecipationPercent() : $this->partecipationPercent;

        return $this->partecipationPercent;
    }

    /**
     * @param  null|PartecipationPercent $partecipationPercent
     * @return static
     */
    public function setPartecipationPercent(?PartecipationPercent $partecipationPercent = null): static
    {
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
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(?Party $party = null): static
    {
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
