<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractingPartyType as ContractingPartyType1;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BuyerProfileURI;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ContractingPartyType extends ContractingPartyTypeType
{
    use HandlesObjectFlags;

    /**
     * @var null|BuyerProfileURI
     */
    #[JMS\Accessor(getter: 'getBuyerProfileURI', setter: 'setBuyerProfileURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BuyerProfileURI')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BuyerProfileURI')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $buyerProfileURI;

    /**
     * @var null|array<ContractingPartyType1>
     */
    #[JMS\Accessor(getter: 'getContractingPartyType', setter: 'setContractingPartyType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractingPartyType')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractingPartyType>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'ContractingPartyType', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $contractingPartyType;

    /**
     * @var null|array<ContractingActivity>
     */
    #[JMS\Accessor(getter: 'getContractingActivity', setter: 'setContractingActivity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractingActivity')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractingActivity>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'ContractingActivity', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $contractingActivity;

    /**
     * @var null|Party
     */
    #[JMS\Accessor(getter: 'getParty', setter: 'setParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Party')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Party')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->buyerProfileURI ??= new BuyerProfileURI();

        return $this->buyerProfileURI;
    }

    /**
     * @param  null|BuyerProfileURI $buyerProfileURI
     * @return static
     */
    public function setBuyerProfileURI(
        ?BuyerProfileURI $buyerProfileURI = null
    ): static {
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
    public function setContractingPartyType(
        ?array $contractingPartyType = null
    ): static {
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
        $contractingPartyType = InvoiceSuiteArrayUtils::first($contractingPartyType);

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
        $contractingPartyType = InvoiceSuiteArrayUtils::last($contractingPartyType);

        if (false === $contractingPartyType) {
            return null;
        }

        return $contractingPartyType;
    }

    /**
     * @param  ContractingPartyType1 $contractingPartyType
     * @return static
     */
    public function addToContractingPartyType(
        ContractingPartyType1 $contractingPartyType
    ): static {
        $this->contractingPartyType[] = $contractingPartyType;

        return $this;
    }

    /**
     * @return ContractingPartyType1
     */
    public function addToContractingPartyTypeWithCreate(): ContractingPartyType1
    {
        $this->addToContractingPartyType($contractingPartyType = new ContractingPartyType1());

        return $contractingPartyType;
    }

    /**
     * @param  ContractingPartyType1 $contractingPartyType
     * @return static
     */
    public function addOnceToContractingPartyType(
        ContractingPartyType1 $contractingPartyType
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->contractingPartyType)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->contractingPartyType)) {
            $this->contractingPartyType = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->contractingPartyType)) {
            $this->addOnceToContractingPartyType(new ContractingPartyType1());
        }

        return $this->contractingPartyType[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(ContractingPartyType1): mixed $callback
     * @return static
     */
    public function forEachContractingPartyType(
        callable $callback
    ): static {
        foreach ($this->contractingPartyType ?? [] as $contractingPartyType) {
            $callback($contractingPartyType);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(ContractingPartyType1): mixed  $callback
     * @return array<array-key, ContractingPartyType1>
     */
    public function filterContractingPartyTypes(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->contractingPartyType ?? [], $callback);
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
    public function setContractingActivity(
        ?array $contractingActivity = null
    ): static {
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
        $contractingActivity = InvoiceSuiteArrayUtils::first($contractingActivity);

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
        $contractingActivity = InvoiceSuiteArrayUtils::last($contractingActivity);

        if (false === $contractingActivity) {
            return null;
        }

        return $contractingActivity;
    }

    /**
     * @param  ContractingActivity $contractingActivity
     * @return static
     */
    public function addToContractingActivity(
        ContractingActivity $contractingActivity
    ): static {
        $this->contractingActivity[] = $contractingActivity;

        return $this;
    }

    /**
     * @return ContractingActivity
     */
    public function addToContractingActivityWithCreate(): ContractingActivity
    {
        $this->addToContractingActivity($contractingActivity = new ContractingActivity());

        return $contractingActivity;
    }

    /**
     * @param  ContractingActivity $contractingActivity
     * @return static
     */
    public function addOnceToContractingActivity(
        ContractingActivity $contractingActivity
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->contractingActivity)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->contractingActivity)) {
            $this->contractingActivity = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->contractingActivity)) {
            $this->addOnceToContractingActivity(new ContractingActivity());
        }

        return $this->contractingActivity[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(ContractingActivity): mixed $callback
     * @return static
     */
    public function forEachContractingActivity(
        callable $callback
    ): static {
        foreach ($this->contractingActivity ?? [] as $contractingActivity) {
            $callback($contractingActivity);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(ContractingActivity): mixed  $callback
     * @return array<array-key, ContractingActivity>
     */
    public function filterContractingActivities(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->contractingActivity ?? [], $callback);
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
