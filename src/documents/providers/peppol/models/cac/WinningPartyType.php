<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Rank;
use JMS\Serializer\Annotation as JMS;

class WinningPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|Rank
     */
    #[JMS\Accessor(getter: 'getRank', setter: 'setRank')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Rank')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Rank')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $rank;

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
        $this->rank ??= new Rank();

        return $this->rank;
    }

    /**
     * @param  null|Rank $rank
     * @return static
     */
    public function setRank(
        ?Rank $rank = null
    ): static {
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
