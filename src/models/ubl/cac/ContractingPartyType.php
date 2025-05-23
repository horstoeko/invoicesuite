<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cac\ContractingPartyType as ContractingPartyType1;
use horstoeko\invoicesuite\models\ubl\cbc\BuyerProfileURI;

class ContractingPartyType extends ContractingPartyTypeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BuyerProfileURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BuyerProfileURI")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerProfileURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerProfileURI", setter="setBuyerProfileURI")
     */
    private $buyerProfileURI;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ContractingPartyType>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ContractingPartyType>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractingPartyType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractingPartyType", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractingPartyType", setter="setContractingPartyType")
     */
    private $contractingPartyType;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ContractingActivity>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ContractingActivity>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractingActivity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractingActivity", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractingActivity", setter="setContractingActivity")
     */
    private $contractingActivity;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BuyerProfileURI|null
     */
    public function getBuyerProfileURI(): ?BuyerProfileURI
    {
        return $this->buyerProfileURI;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BuyerProfileURI
     */
    public function getBuyerProfileURIWithCreate(): BuyerProfileURI
    {
        $this->buyerProfileURI = is_null($this->buyerProfileURI) ? new BuyerProfileURI() : $this->buyerProfileURI;

        return $this->buyerProfileURI;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BuyerProfileURI|null $buyerProfileURI
     * @return self
     */
    public function setBuyerProfileURI(?BuyerProfileURI $buyerProfileURI = null): self
    {
        $this->buyerProfileURI = $buyerProfileURI;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ContractingPartyType>|null
     */
    public function getContractingPartyType(): ?array
    {
        return $this->contractingPartyType;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ContractingPartyType>|null $contractingPartyType
     * @return self
     */
    public function setContractingPartyType(?array $contractingPartyType = null): self
    {
        $this->contractingPartyType = $contractingPartyType;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContractingPartyType(): self
    {
        $this->contractingPartyType = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractingPartyType $contractingPartyType
     * @return self
     */
    public function addToContractingPartyType(ContractingPartyType $contractingPartyType): self
    {
        $this->contractingPartyType[] = $contractingPartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractingPartyType
     */
    public function addToContractingPartyTypeWithCreate(): ContractingPartyType
    {
        $this->addTocontractingPartyType($contractingPartyType = new ContractingPartyType());

        return $contractingPartyType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractingPartyType $contractingPartyType
     * @return self
     */
    public function addOnceToContractingPartyType(ContractingPartyType $contractingPartyType): self
    {
        if (!is_array($this->contractingPartyType)) {
            $this->contractingPartyType = [];
        }

        $this->contractingPartyType[0] = $contractingPartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractingPartyType
     */
    public function addOnceToContractingPartyTypeWithCreate(): ContractingPartyType
    {
        if (!is_array($this->contractingPartyType)) {
            $this->contractingPartyType = [];
        }

        if ($this->contractingPartyType === []) {
            $this->addOnceTocontractingPartyType(new ContractingPartyType());
        }

        return $this->contractingPartyType[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ContractingActivity>|null
     */
    public function getContractingActivity(): ?array
    {
        return $this->contractingActivity;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ContractingActivity>|null $contractingActivity
     * @return self
     */
    public function setContractingActivity(?array $contractingActivity = null): self
    {
        $this->contractingActivity = $contractingActivity;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContractingActivity(): self
    {
        $this->contractingActivity = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractingActivity $contractingActivity
     * @return self
     */
    public function addToContractingActivity(ContractingActivity $contractingActivity): self
    {
        $this->contractingActivity[] = $contractingActivity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractingActivity
     */
    public function addToContractingActivityWithCreate(): ContractingActivity
    {
        $this->addTocontractingActivity($contractingActivity = new ContractingActivity());

        return $contractingActivity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractingActivity $contractingActivity
     * @return self
     */
    public function addOnceToContractingActivity(ContractingActivity $contractingActivity): self
    {
        if (!is_array($this->contractingActivity)) {
            $this->contractingActivity = [];
        }

        $this->contractingActivity[0] = $contractingActivity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractingActivity
     */
    public function addOnceToContractingActivityWithCreate(): ContractingActivity
    {
        if (!is_array($this->contractingActivity)) {
            $this->contractingActivity = [];
        }

        if ($this->contractingActivity === []) {
            $this->addOnceTocontractingActivity(new ContractingActivity());
        }

        return $this->contractingActivity[0];
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
