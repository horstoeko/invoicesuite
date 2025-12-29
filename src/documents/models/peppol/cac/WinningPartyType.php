<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Rank;
use JMS\Serializer\Annotation as JMS;

class WinningPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|Rank
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Rank")
     * @JMS\Expose
     * @JMS\SerializedName("Rank")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRank", setter="setRank")
     */
    private $rank;

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
     * @return null|Rank
     */
    public function getRank(): ?Rank
    {
        return $this->rank;
    }

    /**
     * @return Rank
     */
    public function getRankWithCreate(): Rank
    {
        $this->rank = is_null($this->rank) ? new Rank() : $this->rank;

        return $this->rank;
    }

    /**
     * @param  null|Rank $rank
     * @return static
     */
    public function setRank(?Rank $rank = null): static
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRank(): static
    {
        $this->rank = null;

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
