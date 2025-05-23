<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AnnualAverageAmount;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\PartyCapacityAmount;
use horstoeko\invoicesuite\models\ubl\cbc\TotalTaskAmount;

class CompletedTaskType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AnnualAverageAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AnnualAverageAmount")
     * @JMS\Expose
     * @JMS\SerializedName("AnnualAverageAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAnnualAverageAmount", setter="setAnnualAverageAmount")
     */
    private $annualAverageAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TotalTaskAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TotalTaskAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TotalTaskAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalTaskAmount", setter="setTotalTaskAmount")
     */
    private $totalTaskAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PartyCapacityAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PartyCapacityAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PartyCapacityAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartyCapacityAmount", setter="setPartyCapacityAmount")
     */
    private $partyCapacityAmount;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\EvidenceSupplied>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\EvidenceSupplied>")
     * @JMS\Expose
     * @JMS\SerializedName("EvidenceSupplied")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EvidenceSupplied", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEvidenceSupplied", setter="setEvidenceSupplied")
     */
    private $evidenceSupplied;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Period|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Period")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RecipientCustomerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RecipientCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("RecipientCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRecipientCustomerParty", setter="setRecipientCustomerParty")
     */
    private $recipientCustomerParty;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AnnualAverageAmount|null
     */
    public function getAnnualAverageAmount(): ?AnnualAverageAmount
    {
        return $this->annualAverageAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AnnualAverageAmount
     */
    public function getAnnualAverageAmountWithCreate(): AnnualAverageAmount
    {
        $this->annualAverageAmount = is_null($this->annualAverageAmount) ? new AnnualAverageAmount() : $this->annualAverageAmount;

        return $this->annualAverageAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AnnualAverageAmount|null $annualAverageAmount
     * @return self
     */
    public function setAnnualAverageAmount(?AnnualAverageAmount $annualAverageAmount = null): self
    {
        $this->annualAverageAmount = $annualAverageAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalTaskAmount|null
     */
    public function getTotalTaskAmount(): ?TotalTaskAmount
    {
        return $this->totalTaskAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalTaskAmount
     */
    public function getTotalTaskAmountWithCreate(): TotalTaskAmount
    {
        $this->totalTaskAmount = is_null($this->totalTaskAmount) ? new TotalTaskAmount() : $this->totalTaskAmount;

        return $this->totalTaskAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TotalTaskAmount|null $totalTaskAmount
     * @return self
     */
    public function setTotalTaskAmount(?TotalTaskAmount $totalTaskAmount = null): self
    {
        $this->totalTaskAmount = $totalTaskAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartyCapacityAmount|null
     */
    public function getPartyCapacityAmount(): ?PartyCapacityAmount
    {
        return $this->partyCapacityAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartyCapacityAmount
     */
    public function getPartyCapacityAmountWithCreate(): PartyCapacityAmount
    {
        $this->partyCapacityAmount = is_null($this->partyCapacityAmount) ? new PartyCapacityAmount() : $this->partyCapacityAmount;

        return $this->partyCapacityAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PartyCapacityAmount|null $partyCapacityAmount
     * @return self
     */
    public function setPartyCapacityAmount(?PartyCapacityAmount $partyCapacityAmount = null): self
    {
        $this->partyCapacityAmount = $partyCapacityAmount;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\EvidenceSupplied>|null
     */
    public function getEvidenceSupplied(): ?array
    {
        return $this->evidenceSupplied;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\EvidenceSupplied>|null $evidenceSupplied
     * @return self
     */
    public function setEvidenceSupplied(?array $evidenceSupplied = null): self
    {
        $this->evidenceSupplied = $evidenceSupplied;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEvidenceSupplied(): self
    {
        $this->evidenceSupplied = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EvidenceSupplied $evidenceSupplied
     * @return self
     */
    public function addToEvidenceSupplied(EvidenceSupplied $evidenceSupplied): self
    {
        $this->evidenceSupplied[] = $evidenceSupplied;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EvidenceSupplied
     */
    public function addToEvidenceSuppliedWithCreate(): EvidenceSupplied
    {
        $this->addToevidenceSupplied($evidenceSupplied = new EvidenceSupplied());

        return $evidenceSupplied;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EvidenceSupplied $evidenceSupplied
     * @return self
     */
    public function addOnceToEvidenceSupplied(EvidenceSupplied $evidenceSupplied): self
    {
        if (!is_array($this->evidenceSupplied)) {
            $this->evidenceSupplied = [];
        }

        $this->evidenceSupplied[0] = $evidenceSupplied;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EvidenceSupplied
     */
    public function addOnceToEvidenceSuppliedWithCreate(): EvidenceSupplied
    {
        if (!is_array($this->evidenceSupplied)) {
            $this->evidenceSupplied = [];
        }

        if ($this->evidenceSupplied === []) {
            $this->addOnceToevidenceSupplied(new EvidenceSupplied());
        }

        return $this->evidenceSupplied[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period|null
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period = is_null($this->period) ? new Period() : $this->period;

        return $this->period;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Period|null $period
     * @return self
     */
    public function setPeriod(?Period $period = null): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RecipientCustomerParty|null
     */
    public function getRecipientCustomerParty(): ?RecipientCustomerParty
    {
        return $this->recipientCustomerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RecipientCustomerParty
     */
    public function getRecipientCustomerPartyWithCreate(): RecipientCustomerParty
    {
        $this->recipientCustomerParty = is_null($this->recipientCustomerParty) ? new RecipientCustomerParty() : $this->recipientCustomerParty;

        return $this->recipientCustomerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RecipientCustomerParty|null $recipientCustomerParty
     * @return self
     */
    public function setRecipientCustomerParty(?RecipientCustomerParty $recipientCustomerParty = null): self
    {
        $this->recipientCustomerParty = $recipientCustomerParty;

        return $this;
    }
}
