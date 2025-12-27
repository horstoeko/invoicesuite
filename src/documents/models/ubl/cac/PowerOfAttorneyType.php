<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class PowerOfAttorneyType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("IssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueTime", setter="setIssueTime")
     */
    private $issueTime;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|NotaryParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\NotaryParty")
     * @JMS\Expose
     * @JMS\SerializedName("NotaryParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNotaryParty", setter="setNotaryParty")
     */
    private $notaryParty;

    /**
     * @var null|AgentParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AgentParty")
     * @JMS\Expose
     * @JMS\SerializedName("AgentParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAgentParty", setter="setAgentParty")
     */
    private $agentParty;

    /**
     * @var null|array<WitnessParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\WitnessParty>")
     * @JMS\Expose
     * @JMS\SerializedName("WitnessParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WitnessParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getWitnessParty", setter="setWitnessParty")
     */
    private $witnessParty;

    /**
     * @var null|array<MandateDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\MandateDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("MandateDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MandateDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMandateDocumentReference", setter="setMandateDocumentReference")
     */
    private $mandateDocumentReference;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param  null|DateTimeInterface $issueDate
     * @return static
     */
    public function setIssueDate(?DateTimeInterface $issueDate = null): static
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueDate(): static
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    /**
     * @param  null|DateTimeInterface $issueTime
     * @return static
     */
    public function setIssueTime(?DateTimeInterface $issueTime = null): static
    {
        $this->issueTime = $issueTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueTime(): static
    {
        $this->issueTime = null;

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
     * @return null|NotaryParty
     */
    public function getNotaryParty(): ?NotaryParty
    {
        return $this->notaryParty;
    }

    /**
     * @return NotaryParty
     */
    public function getNotaryPartyWithCreate(): NotaryParty
    {
        $this->notaryParty = is_null($this->notaryParty) ? new NotaryParty() : $this->notaryParty;

        return $this->notaryParty;
    }

    /**
     * @param  null|NotaryParty $notaryParty
     * @return static
     */
    public function setNotaryParty(?NotaryParty $notaryParty = null): static
    {
        $this->notaryParty = $notaryParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNotaryParty(): static
    {
        $this->notaryParty = null;

        return $this;
    }

    /**
     * @return null|AgentParty
     */
    public function getAgentParty(): ?AgentParty
    {
        return $this->agentParty;
    }

    /**
     * @return AgentParty
     */
    public function getAgentPartyWithCreate(): AgentParty
    {
        $this->agentParty = is_null($this->agentParty) ? new AgentParty() : $this->agentParty;

        return $this->agentParty;
    }

    /**
     * @param  null|AgentParty $agentParty
     * @return static
     */
    public function setAgentParty(?AgentParty $agentParty = null): static
    {
        $this->agentParty = $agentParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAgentParty(): static
    {
        $this->agentParty = null;

        return $this;
    }

    /**
     * @return null|array<WitnessParty>
     */
    public function getWitnessParty(): ?array
    {
        return $this->witnessParty;
    }

    /**
     * @param  null|array<WitnessParty> $witnessParty
     * @return static
     */
    public function setWitnessParty(?array $witnessParty = null): static
    {
        $this->witnessParty = $witnessParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWitnessParty(): static
    {
        $this->witnessParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearWitnessParty(): static
    {
        $this->witnessParty = [];

        return $this;
    }

    /**
     * @return null|WitnessParty
     */
    public function firstWitnessParty(): ?WitnessParty
    {
        $witnessParty = $this->witnessParty ?? [];
        $witnessParty = reset($witnessParty);

        if (false === $witnessParty) {
            return null;
        }

        return $witnessParty;
    }

    /**
     * @return null|WitnessParty
     */
    public function lastWitnessParty(): ?WitnessParty
    {
        $witnessParty = $this->witnessParty ?? [];
        $witnessParty = end($witnessParty);

        if (false === $witnessParty) {
            return null;
        }

        return $witnessParty;
    }

    /**
     * @param  WitnessParty $witnessParty
     * @return static
     */
    public function addToWitnessParty(WitnessParty $witnessParty): static
    {
        $this->witnessParty[] = $witnessParty;

        return $this;
    }

    /**
     * @return WitnessParty
     */
    public function addToWitnessPartyWithCreate(): WitnessParty
    {
        $this->addTowitnessParty($witnessParty = new WitnessParty());

        return $witnessParty;
    }

    /**
     * @param  WitnessParty $witnessParty
     * @return static
     */
    public function addOnceToWitnessParty(WitnessParty $witnessParty): static
    {
        if (!is_array($this->witnessParty)) {
            $this->witnessParty = [];
        }

        $this->witnessParty[0] = $witnessParty;

        return $this;
    }

    /**
     * @return WitnessParty
     */
    public function addOnceToWitnessPartyWithCreate(): WitnessParty
    {
        if (!is_array($this->witnessParty)) {
            $this->witnessParty = [];
        }

        if ([] === $this->witnessParty) {
            $this->addOnceTowitnessParty(new WitnessParty());
        }

        return $this->witnessParty[0];
    }

    /**
     * @return null|array<MandateDocumentReference>
     */
    public function getMandateDocumentReference(): ?array
    {
        return $this->mandateDocumentReference;
    }

    /**
     * @param  null|array<MandateDocumentReference> $mandateDocumentReference
     * @return static
     */
    public function setMandateDocumentReference(?array $mandateDocumentReference = null): static
    {
        $this->mandateDocumentReference = $mandateDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMandateDocumentReference(): static
    {
        $this->mandateDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMandateDocumentReference(): static
    {
        $this->mandateDocumentReference = [];

        return $this;
    }

    /**
     * @return null|MandateDocumentReference
     */
    public function firstMandateDocumentReference(): ?MandateDocumentReference
    {
        $mandateDocumentReference = $this->mandateDocumentReference ?? [];
        $mandateDocumentReference = reset($mandateDocumentReference);

        if (false === $mandateDocumentReference) {
            return null;
        }

        return $mandateDocumentReference;
    }

    /**
     * @return null|MandateDocumentReference
     */
    public function lastMandateDocumentReference(): ?MandateDocumentReference
    {
        $mandateDocumentReference = $this->mandateDocumentReference ?? [];
        $mandateDocumentReference = end($mandateDocumentReference);

        if (false === $mandateDocumentReference) {
            return null;
        }

        return $mandateDocumentReference;
    }

    /**
     * @param  MandateDocumentReference $mandateDocumentReference
     * @return static
     */
    public function addToMandateDocumentReference(MandateDocumentReference $mandateDocumentReference): static
    {
        $this->mandateDocumentReference[] = $mandateDocumentReference;

        return $this;
    }

    /**
     * @return MandateDocumentReference
     */
    public function addToMandateDocumentReferenceWithCreate(): MandateDocumentReference
    {
        $this->addTomandateDocumentReference($mandateDocumentReference = new MandateDocumentReference());

        return $mandateDocumentReference;
    }

    /**
     * @param  MandateDocumentReference $mandateDocumentReference
     * @return static
     */
    public function addOnceToMandateDocumentReference(MandateDocumentReference $mandateDocumentReference): static
    {
        if (!is_array($this->mandateDocumentReference)) {
            $this->mandateDocumentReference = [];
        }

        $this->mandateDocumentReference[0] = $mandateDocumentReference;

        return $this;
    }

    /**
     * @return MandateDocumentReference
     */
    public function addOnceToMandateDocumentReferenceWithCreate(): MandateDocumentReference
    {
        if (!is_array($this->mandateDocumentReference)) {
            $this->mandateDocumentReference = [];
        }

        if ([] === $this->mandateDocumentReference) {
            $this->addOnceTomandateDocumentReference(new MandateDocumentReference());
        }

        return $this->mandateDocumentReference[0];
    }
}
