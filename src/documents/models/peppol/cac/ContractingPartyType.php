<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cac\ContractingPartyType as ContractingPartyType1;
use horstoeko\invoicesuite\documents\models\peppol\cbc\BuyerProfileURI;
use JMS\Serializer\Annotation as JMS;

class ContractingPartyType extends ContractingPartyTypeType
{
    use HandlesObjectFlags;

    /**
     * @var null|BuyerProfileURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\BuyerProfileURI")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerProfileURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerProfileURI", setter="setBuyerProfileURI")
     */
    private $buyerProfileURI;

    /**
     * @var null|array<ContractingPartyType1>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ContractingPartyType>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractingPartyType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractingPartyType", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractingPartyType", setter="setContractingPartyType")
     */
    private $contractingPartyType;

    /**
     * @var null|array<ContractingActivity>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ContractingActivity>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractingActivity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractingActivity", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractingActivity", setter="setContractingActivity")
     */
    private $contractingActivity;

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
     * @return null|BuyerProfileURI
     */
    public function getBuyerProfileURI(): ?BuyerProfileURI
    {
        return $this->buyerProfileURI;
    }

    /**
     * @return BuyerProfileURI
     */
    public function getBuyerProfileURIWithCreate(): BuyerProfileURI
    {
        $this->buyerProfileURI = is_null($this->buyerProfileURI) ? new BuyerProfileURI() : $this->buyerProfileURI;

        return $this->buyerProfileURI;
    }

    /**
     * @param  null|BuyerProfileURI $buyerProfileURI
     * @return static
     */
    public function setBuyerProfileURI(?BuyerProfileURI $buyerProfileURI = null): static
    {
        $this->buyerProfileURI = $buyerProfileURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerProfileURI(): static
    {
        $this->buyerProfileURI = null;

        return $this;
    }

    /**
     * @return null|array<ContractingPartyType1>
     */
    public function getContractingPartyType(): ?array
    {
        return $this->contractingPartyType;
    }

    /**
     * @param  null|array<ContractingPartyType1> $contractingPartyType
     * @return static
     */
    public function setContractingPartyType(?array $contractingPartyType = null): static
    {
        $this->contractingPartyType = $contractingPartyType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractingPartyType(): static
    {
        $this->contractingPartyType = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContractingPartyType(): static
    {
        $this->contractingPartyType = [];

        return $this;
    }

    /**
     * @return null|ContractingPartyType1
     */
    public function firstContractingPartyType(): ?ContractingPartyType1
    {
        $contractingPartyType = $this->contractingPartyType ?? [];
        $contractingPartyType = reset($contractingPartyType);

        if (false === $contractingPartyType) {
            return null;
        }

        return $contractingPartyType;
    }

    /**
     * @return null|ContractingPartyType1
     */
    public function lastContractingPartyType(): ?ContractingPartyType1
    {
        $contractingPartyType = $this->contractingPartyType ?? [];
        $contractingPartyType = end($contractingPartyType);

        if (false === $contractingPartyType) {
            return null;
        }

        return $contractingPartyType;
    }

    /**
     * @param  ContractingPartyType1 $contractingPartyType
     * @return static
     */
    public function addToContractingPartyType(ContractingPartyType1 $contractingPartyType): static
    {
        $this->contractingPartyType[] = $contractingPartyType;

        return $this;
    }

    /**
     * @return ContractingPartyType1
     */
    public function addToContractingPartyTypeWithCreate(): ContractingPartyType1
    {
        $this->addTocontractingPartyType($contractingPartyType = new ContractingPartyType1());

        return $contractingPartyType;
    }

    /**
     * @param  ContractingPartyType1 $contractingPartyType
     * @return static
     */
    public function addOnceToContractingPartyType(ContractingPartyType1 $contractingPartyType): static
    {
        if (!is_array($this->contractingPartyType)) {
            $this->contractingPartyType = [];
        }

        $this->contractingPartyType[0] = $contractingPartyType;

        return $this;
    }

    /**
     * @return ContractingPartyType1
     */
    public function addOnceToContractingPartyTypeWithCreate(): ContractingPartyType1
    {
        if (!is_array($this->contractingPartyType)) {
            $this->contractingPartyType = [];
        }

        if ([] === $this->contractingPartyType) {
            $this->addOnceTocontractingPartyType(new ContractingPartyType1());
        }

        return $this->contractingPartyType[0];
    }

    /**
     * @return null|array<ContractingActivity>
     */
    public function getContractingActivity(): ?array
    {
        return $this->contractingActivity;
    }

    /**
     * @param  null|array<ContractingActivity> $contractingActivity
     * @return static
     */
    public function setContractingActivity(?array $contractingActivity = null): static
    {
        $this->contractingActivity = $contractingActivity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractingActivity(): static
    {
        $this->contractingActivity = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContractingActivity(): static
    {
        $this->contractingActivity = [];

        return $this;
    }

    /**
     * @return null|ContractingActivity
     */
    public function firstContractingActivity(): ?ContractingActivity
    {
        $contractingActivity = $this->contractingActivity ?? [];
        $contractingActivity = reset($contractingActivity);

        if (false === $contractingActivity) {
            return null;
        }

        return $contractingActivity;
    }

    /**
     * @return null|ContractingActivity
     */
    public function lastContractingActivity(): ?ContractingActivity
    {
        $contractingActivity = $this->contractingActivity ?? [];
        $contractingActivity = end($contractingActivity);

        if (false === $contractingActivity) {
            return null;
        }

        return $contractingActivity;
    }

    /**
     * @param  ContractingActivity $contractingActivity
     * @return static
     */
    public function addToContractingActivity(ContractingActivity $contractingActivity): static
    {
        $this->contractingActivity[] = $contractingActivity;

        return $this;
    }

    /**
     * @return ContractingActivity
     */
    public function addToContractingActivityWithCreate(): ContractingActivity
    {
        $this->addTocontractingActivity($contractingActivity = new ContractingActivity());

        return $contractingActivity;
    }

    /**
     * @param  ContractingActivity $contractingActivity
     * @return static
     */
    public function addOnceToContractingActivity(ContractingActivity $contractingActivity): static
    {
        if (!is_array($this->contractingActivity)) {
            $this->contractingActivity = [];
        }

        $this->contractingActivity[0] = $contractingActivity;

        return $this;
    }

    /**
     * @return ContractingActivity
     */
    public function addOnceToContractingActivityWithCreate(): ContractingActivity
    {
        if (!is_array($this->contractingActivity)) {
            $this->contractingActivity = [];
        }

        if ([] === $this->contractingActivity) {
            $this->addOnceTocontractingActivity(new ContractingActivity());
        }

        return $this->contractingActivity[0];
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
