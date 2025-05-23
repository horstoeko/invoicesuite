<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\PartecipationPercent;

class ShareholderPartyType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PartecipationPercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PartecipationPercent")
     * @JMS\Expose
     * @JMS\SerializedName("PartecipationPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartecipationPercent", setter="setPartecipationPercent")
     */
    private $partecipationPercent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Party|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartecipationPercent|null
     */
    public function getPartecipationPercent(): ?PartecipationPercent
    {
        return $this->partecipationPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartecipationPercent
     */
    public function getPartecipationPercentWithCreate(): PartecipationPercent
    {
        $this->partecipationPercent = is_null($this->partecipationPercent) ? new PartecipationPercent() : $this->partecipationPercent;

        return $this->partecipationPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PartecipationPercent|null $partecipationPercent
     * @return self
     */
    public function setPartecipationPercent(?PartecipationPercent $partecipationPercent = null): self
    {
        $this->partecipationPercent = $partecipationPercent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Party|null
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Party|null $party
     * @return self
     */
    public function setParty(?Party $party = null): self
    {
        $this->party = $party;

        return $this;
    }
}
