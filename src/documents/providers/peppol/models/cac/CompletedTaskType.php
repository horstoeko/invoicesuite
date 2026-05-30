<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AnnualAverageAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PartyCapacityAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTaskAmount;
use JMS\Serializer\Annotation as JMS;

class CompletedTaskType
{
    use HandlesObjectFlags;

    /**
     * @var null|AnnualAverageAmount
     */
    #[JMS\Accessor(getter: 'getAnnualAverageAmount', setter: 'setAnnualAverageAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AnnualAverageAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AnnualAverageAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $annualAverageAmount;

    /**
     * @var null|TotalTaskAmount
     */
    #[JMS\Accessor(getter: 'getTotalTaskAmount', setter: 'setTotalTaskAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalTaskAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTaskAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalTaskAmount;

    /**
     * @var null|PartyCapacityAmount
     */
    #[JMS\Accessor(getter: 'getPartyCapacityAmount', setter: 'setPartyCapacityAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PartyCapacityAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PartyCapacityAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $partyCapacityAmount;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|array<EvidenceSupplied>
     */
    #[JMS\Accessor(getter: 'getEvidenceSupplied', setter: 'setEvidenceSupplied')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EvidenceSupplied')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\EvidenceSupplied>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'EvidenceSupplied', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $evidenceSupplied;

    /**
     * @var null|Period
     */
    #[JMS\Accessor(getter: 'getPeriod', setter: 'setPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Period')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Period')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $period;

    /**
     * @var null|RecipientCustomerParty
     */
    #[JMS\Accessor(getter: 'getRecipientCustomerParty', setter: 'setRecipientCustomerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RecipientCustomerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RecipientCustomerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $recipientCustomerParty;

    /**
     * @return null|AnnualAverageAmount
     */
    public function getAnnualAverageAmount(): ?AnnualAverageAmount
    {
        return $this->annualAverageAmount;
    }

    /**
     * @return AnnualAverageAmount
     */
    public function getAnnualAverageAmountWithCreate(): AnnualAverageAmount
    {
        $this->annualAverageAmount ??= new AnnualAverageAmount();

        return $this->annualAverageAmount;
    }

    /**
     * @param  null|AnnualAverageAmount $annualAverageAmount
     * @return static
     */
    public function setAnnualAverageAmount(
        ?AnnualAverageAmount $annualAverageAmount = null
    ): static {
        $this->annualAverageAmount = $annualAverageAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAnnualAverageAmount(): static
    {
        $this->annualAverageAmount = null;

        return $this;
    }

    /**
     * @return null|TotalTaskAmount
     */
    public function getTotalTaskAmount(): ?TotalTaskAmount
    {
        return $this->totalTaskAmount;
    }

    /**
     * @return TotalTaskAmount
     */
    public function getTotalTaskAmountWithCreate(): TotalTaskAmount
    {
        $this->totalTaskAmount ??= new TotalTaskAmount();

        return $this->totalTaskAmount;
    }

    /**
     * @param  null|TotalTaskAmount $totalTaskAmount
     * @return static
     */
    public function setTotalTaskAmount(
        ?TotalTaskAmount $totalTaskAmount = null
    ): static {
        $this->totalTaskAmount = $totalTaskAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalTaskAmount(): static
    {
        $this->totalTaskAmount = null;

        return $this;
    }

    /**
     * @return null|PartyCapacityAmount
     */
    public function getPartyCapacityAmount(): ?PartyCapacityAmount
    {
        return $this->partyCapacityAmount;
    }

    /**
     * @return PartyCapacityAmount
     */
    public function getPartyCapacityAmountWithCreate(): PartyCapacityAmount
    {
        $this->partyCapacityAmount ??= new PartyCapacityAmount();

        return $this->partyCapacityAmount;
    }

    /**
     * @param  null|PartyCapacityAmount $partyCapacityAmount
     * @return static
     */
    public function setPartyCapacityAmount(
        ?PartyCapacityAmount $partyCapacityAmount = null
    ): static {
        $this->partyCapacityAmount = $partyCapacityAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartyCapacityAmount(): static
    {
        $this->partyCapacityAmount = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(
        ?array $description = null
    ): static {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(
        Description $description
    ): static {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|array<EvidenceSupplied>
     */
    public function getEvidenceSupplied(): ?array
    {
        return $this->evidenceSupplied;
    }

    /**
     * @param  null|array<EvidenceSupplied> $evidenceSupplied
     * @return static
     */
    public function setEvidenceSupplied(
        ?array $evidenceSupplied = null
    ): static {
        $this->evidenceSupplied = $evidenceSupplied;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEvidenceSupplied(): static
    {
        $this->evidenceSupplied = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEvidenceSupplied(): static
    {
        $this->evidenceSupplied = [];

        return $this;
    }

    /**
     * @return null|EvidenceSupplied
     */
    public function firstEvidenceSupplied(): ?EvidenceSupplied
    {
        $evidenceSupplied = $this->evidenceSupplied ?? [];
        $evidenceSupplied = reset($evidenceSupplied);

        if (false === $evidenceSupplied) {
            return null;
        }

        return $evidenceSupplied;
    }

    /**
     * @return null|EvidenceSupplied
     */
    public function lastEvidenceSupplied(): ?EvidenceSupplied
    {
        $evidenceSupplied = $this->evidenceSupplied ?? [];
        $evidenceSupplied = end($evidenceSupplied);

        if (false === $evidenceSupplied) {
            return null;
        }

        return $evidenceSupplied;
    }

    /**
     * @param  EvidenceSupplied $evidenceSupplied
     * @return static
     */
    public function addToEvidenceSupplied(
        EvidenceSupplied $evidenceSupplied
    ): static {
        $this->evidenceSupplied[] = $evidenceSupplied;

        return $this;
    }

    /**
     * @return EvidenceSupplied
     */
    public function addToEvidenceSuppliedWithCreate(): EvidenceSupplied
    {
        $this->addToevidenceSupplied($evidenceSupplied = new EvidenceSupplied());

        return $evidenceSupplied;
    }

    /**
     * @param  EvidenceSupplied $evidenceSupplied
     * @return static
     */
    public function addOnceToEvidenceSupplied(
        EvidenceSupplied $evidenceSupplied
    ): static {
        if (!is_array($this->evidenceSupplied)) {
            $this->evidenceSupplied = [];
        }

        $this->evidenceSupplied[0] = $evidenceSupplied;

        return $this;
    }

    /**
     * @return EvidenceSupplied
     */
    public function addOnceToEvidenceSuppliedWithCreate(): EvidenceSupplied
    {
        if (!is_array($this->evidenceSupplied)) {
            $this->evidenceSupplied = [];
        }

        if ([] === $this->evidenceSupplied) {
            $this->addOnceToevidenceSupplied(new EvidenceSupplied());
        }

        return $this->evidenceSupplied[0];
    }

    /**
     * @return null|Period
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period ??= new Period();

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(
        ?Period $period = null
    ): static {
        $this->period = $period;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPeriod(): static
    {
        $this->period = null;

        return $this;
    }

    /**
     * @return null|RecipientCustomerParty
     */
    public function getRecipientCustomerParty(): ?RecipientCustomerParty
    {
        return $this->recipientCustomerParty;
    }

    /**
     * @return RecipientCustomerParty
     */
    public function getRecipientCustomerPartyWithCreate(): RecipientCustomerParty
    {
        $this->recipientCustomerParty ??= new RecipientCustomerParty();

        return $this->recipientCustomerParty;
    }

    /**
     * @param  null|RecipientCustomerParty $recipientCustomerParty
     * @return static
     */
    public function setRecipientCustomerParty(
        ?RecipientCustomerParty $recipientCustomerParty = null
    ): static {
        $this->recipientCustomerParty = $recipientCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRecipientCustomerParty(): static
    {
        $this->recipientCustomerParty = null;

        return $this;
    }
}
