<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalAmount;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class BudgetAccountLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $iD;

    /**
     * @var null|TotalAmount
     */
    #[JMS\Accessor(getter: 'getTotalAmount', setter: 'setTotalAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalAmount')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $totalAmount;

    /**
     * @var null|array<BudgetAccount>
     */
    #[JMS\Accessor(getter: 'getBudgetAccount', setter: 'setBudgetAccount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BudgetAccount')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\BudgetAccount>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'BudgetAccount', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $budgetAccount;

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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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
     * @return null|TotalAmount
     */
    public function getTotalAmount(): ?TotalAmount
    {
        return $this->totalAmount;
    }

    /**
     * @return TotalAmount
     */
    public function getTotalAmountWithCreate(): TotalAmount
    {
        $this->totalAmount ??= new TotalAmount();

        return $this->totalAmount;
    }

    /**
     * @param  null|TotalAmount $totalAmount
     * @return static
     */
    public function setTotalAmount(
        ?TotalAmount $totalAmount = null
    ): static {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalAmount(): static
    {
        $this->totalAmount = null;

        return $this;
    }

    /**
     * @return null|array<BudgetAccount>
     */
    public function getBudgetAccount(): ?array
    {
        return $this->budgetAccount;
    }

    /**
     * @param  null|array<BudgetAccount> $budgetAccount
     * @return static
     */
    public function setBudgetAccount(
        ?array $budgetAccount = null
    ): static {
        $this->budgetAccount = $budgetAccount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBudgetAccount(): static
    {
        $this->budgetAccount = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearBudgetAccount(): static
    {
        $this->budgetAccount = [];

        return $this;
    }

    /**
     * @return null|BudgetAccount
     */
    public function firstBudgetAccount(): ?BudgetAccount
    {
        $budgetAccount = $this->budgetAccount ?? [];
        $budgetAccount = InvoiceSuiteArrayUtils::first($budgetAccount);

        if (false === $budgetAccount) {
            return null;
        }

        return $budgetAccount;
    }

    /**
     * @return null|BudgetAccount
     */
    public function lastBudgetAccount(): ?BudgetAccount
    {
        $budgetAccount = $this->budgetAccount ?? [];
        $budgetAccount = InvoiceSuiteArrayUtils::last($budgetAccount);

        if (false === $budgetAccount) {
            return null;
        }

        return $budgetAccount;
    }

    /**
     * @param  BudgetAccount $budgetAccount
     * @return static
     */
    public function addToBudgetAccount(
        BudgetAccount $budgetAccount
    ): static {
        $this->budgetAccount[] = $budgetAccount;

        return $this;
    }

    /**
     * @return BudgetAccount
     */
    public function addToBudgetAccountWithCreate(): BudgetAccount
    {
        $this->addToBudgetAccount($budgetAccount = new BudgetAccount());

        return $budgetAccount;
    }

    /**
     * @param  BudgetAccount $budgetAccount
     * @return static
     */
    public function addOnceToBudgetAccount(
        BudgetAccount $budgetAccount
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->budgetAccount)) {
            $this->budgetAccount = [];
        }

        $this->budgetAccount[0] = $budgetAccount;

        return $this;
    }

    /**
     * @return BudgetAccount
     */
    public function addOnceToBudgetAccountWithCreate(): BudgetAccount
    {
        if (!InvoiceSuiteArrayUtils::is($this->budgetAccount)) {
            $this->budgetAccount = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->budgetAccount)) {
            $this->addOnceToBudgetAccount(new BudgetAccount());
        }

        return $this->budgetAccount[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(BudgetAccount): mixed $callback
     * @return static
     */
    public function forEachBudgetAccount(
        callable $callback
    ): static {
        foreach ($this->budgetAccount ?? [] as $budgetAccount) {
            $callback($budgetAccount);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(BudgetAccount): mixed  $callback
     * @return array<array-key, BudgetAccount>
     */
    public function filterBudgetAccounts(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->budgetAccount ?? [], $callback);
    }
}
