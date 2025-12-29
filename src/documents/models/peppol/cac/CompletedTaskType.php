<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AnnualAverageAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PartyCapacityAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalTaskAmount;
use JMS\Serializer\Annotation as JMS;

class CompletedTaskType
{
    use HandlesObjectFlags;

    /**
     * @var null|AnnualAverageAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AnnualAverageAmount")
     * @JMS\Expose
     * @JMS\SerializedName("AnnualAverageAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAnnualAverageAmount", setter="setAnnualAverageAmount")
     */
    private $annualAverageAmount;

    /**
     * @var null|TotalTaskAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TotalTaskAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TotalTaskAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalTaskAmount", setter="setTotalTaskAmount")
     */
    private $totalTaskAmount;

    /**
     * @var null|PartyCapacityAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PartyCapacityAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PartyCapacityAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartyCapacityAmount", setter="setPartyCapacityAmount")
     */
    private $partyCapacityAmount;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|array<EvidenceSupplied>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\EvidenceSupplied>")
     * @JMS\Expose
     * @JMS\SerializedName("EvidenceSupplied")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EvidenceSupplied", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEvidenceSupplied", setter="setEvidenceSupplied")
     */
    private $evidenceSupplied;

    /**
     * @var null|Period
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Period")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @var null|RecipientCustomerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\RecipientCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("RecipientCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRecipientCustomerParty", setter="setRecipientCustomerParty")
     */
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
        $this->annualAverageAmount = is_null($this->annualAverageAmount) ? new AnnualAverageAmount() : $this->annualAverageAmount;

        return $this->annualAverageAmount;
    }

    /**
     * @param  null|AnnualAverageAmount $annualAverageAmount
     * @return static
     */
    public function setAnnualAverageAmount(?AnnualAverageAmount $annualAverageAmount = null): static
    {
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
        $this->totalTaskAmount = is_null($this->totalTaskAmount) ? new TotalTaskAmount() : $this->totalTaskAmount;

        return $this->totalTaskAmount;
    }

    /**
     * @param  null|TotalTaskAmount $totalTaskAmount
     * @return static
     */
    public function setTotalTaskAmount(?TotalTaskAmount $totalTaskAmount = null): static
    {
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
        $this->partyCapacityAmount = is_null($this->partyCapacityAmount) ? new PartyCapacityAmount() : $this->partyCapacityAmount;

        return $this->partyCapacityAmount;
    }

    /**
     * @param  null|PartyCapacityAmount $partyCapacityAmount
     * @return static
     */
    public function setPartyCapacityAmount(?PartyCapacityAmount $partyCapacityAmount = null): static
    {
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
    public function setDescription(?array $description = null): static
    {
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
    public function addToDescription(Description $description): static
    {
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
    public function addOnceToDescription(Description $description): static
    {
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
    public function setEvidenceSupplied(?array $evidenceSupplied = null): static
    {
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
    public function addToEvidenceSupplied(EvidenceSupplied $evidenceSupplied): static
    {
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
    public function addOnceToEvidenceSupplied(EvidenceSupplied $evidenceSupplied): static
    {
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
        $this->period = is_null($this->period) ? new Period() : $this->period;

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(?Period $period = null): static
    {
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
        $this->recipientCustomerParty = is_null($this->recipientCustomerParty) ? new RecipientCustomerParty() : $this->recipientCustomerParty;

        return $this->recipientCustomerParty;
    }

    /**
     * @param  null|RecipientCustomerParty $recipientCustomerParty
     * @return static
     */
    public function setRecipientCustomerParty(?RecipientCustomerParty $recipientCustomerParty = null): static
    {
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
