<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TotalAmount;
use JMS\Serializer\Annotation as JMS;

class BudgetAccountLineType
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
     * @var null|TotalAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TotalAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TotalAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalAmount", setter="setTotalAmount")
     */
    private $totalAmount;

    /**
     * @var null|array<BudgetAccount>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\BudgetAccount>")
     * @JMS\Expose
     * @JMS\SerializedName("BudgetAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BudgetAccount", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getBudgetAccount", setter="setBudgetAccount")
     */
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
        $this->totalAmount = is_null($this->totalAmount) ? new TotalAmount() : $this->totalAmount;

        return $this->totalAmount;
    }

    /**
     * @param  null|TotalAmount $totalAmount
     * @return static
     */
    public function setTotalAmount(?TotalAmount $totalAmount = null): static
    {
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
    public function setBudgetAccount(?array $budgetAccount = null): static
    {
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
        $budgetAccount = reset($budgetAccount);

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
        $budgetAccount = end($budgetAccount);

        if (false === $budgetAccount) {
            return null;
        }

        return $budgetAccount;
    }

    /**
     * @param  BudgetAccount $budgetAccount
     * @return static
     */
    public function addToBudgetAccount(BudgetAccount $budgetAccount): static
    {
        $this->budgetAccount[] = $budgetAccount;

        return $this;
    }

    /**
     * @return BudgetAccount
     */
    public function addToBudgetAccountWithCreate(): BudgetAccount
    {
        $this->addTobudgetAccount($budgetAccount = new BudgetAccount());

        return $budgetAccount;
    }

    /**
     * @param  BudgetAccount $budgetAccount
     * @return static
     */
    public function addOnceToBudgetAccount(BudgetAccount $budgetAccount): static
    {
        if (!is_array($this->budgetAccount)) {
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
        if (!is_array($this->budgetAccount)) {
            $this->budgetAccount = [];
        }

        if ([] === $this->budgetAccount) {
            $this->addOnceTobudgetAccount(new BudgetAccount());
        }

        return $this->budgetAccount[0];
    }
}
