<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AccountingCost;
use horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode;
use horstoeko\invoicesuite\models\ubl\cbc\Amount;
use horstoeko\invoicesuite\models\ubl\cbc\CreditLineAmount;
use horstoeko\invoicesuite\models\ubl\cbc\DebitLineAmount;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\Note;
use horstoeko\invoicesuite\models\ubl\cbc\PaymentPurposeCode;
use horstoeko\invoicesuite\models\ubl\cbc\PenaltySurchargePercent;
use horstoeko\invoicesuite\models\ubl\cbc\UUID;

class ReminderLineType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\UUID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("BalanceBroughtForwardIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBalanceBroughtForwardIndicator", setter="setBalanceBroughtForwardIndicator")
     */
    private $balanceBroughtForwardIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DebitLineAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DebitLineAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DebitLineAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDebitLineAmount", setter="setDebitLineAmount")
     */
    private $debitLineAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CreditLineAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CreditLineAmount")
     * @JMS\Expose
     * @JMS\SerializedName("CreditLineAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCreditLineAmount", setter="setCreditLineAmount")
     */
    private $creditLineAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCostCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCostCode", setter="setAccountingCostCode")
     */
    private $accountingCostCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AccountingCost|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AccountingCost")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCost")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCost", setter="setAccountingCost")
     */
    private $accountingCost;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PenaltySurchargePercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PenaltySurchargePercent")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltySurchargePercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPenaltySurchargePercent", setter="setPenaltySurchargePercent")
     */
    private $penaltySurchargePercent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Amount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Amount")
     * @JMS\Expose
     * @JMS\SerializedName("Amount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmount", setter="setAmount")
     */
    private $amount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PaymentPurposeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PaymentPurposeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentPurposeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentPurposeCode", setter="setPaymentPurposeCode")
     */
    private $paymentPurposeCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ReminderPeriod>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ReminderPeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("ReminderPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReminderPeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReminderPeriod", setter="setReminderPeriod")
     */
    private $reminderPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\BillingReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\BillingReference>")
     * @JMS\Expose
     * @JMS\SerializedName("BillingReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BillingReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getBillingReference", setter="setBillingReference")
     */
    private $billingReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ExchangeRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExchangeRate", setter="setExchangeRate")
     */
    private $exchangeRate;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null $note
     * @return self
     */
    public function setNote(?array $note = null): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNote(): self
    {
        $this->note = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Note $note
     * @return self
     */
    public function addToNote(Note $note): self
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Note $note
     * @return self
     */
    public function addOnceToNote(Note $note): self
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ($this->note === []) {
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UUID|null
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\UUID|null $uUID
     * @return self
     */
    public function setUUID(?UUID $uUID = null): self
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBalanceBroughtForwardIndicator(): ?bool
    {
        return $this->balanceBroughtForwardIndicator;
    }

    /**
     * @param bool|null $balanceBroughtForwardIndicator
     * @return self
     */
    public function setBalanceBroughtForwardIndicator(?bool $balanceBroughtForwardIndicator = null): self
    {
        $this->balanceBroughtForwardIndicator = $balanceBroughtForwardIndicator;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DebitLineAmount|null
     */
    public function getDebitLineAmount(): ?DebitLineAmount
    {
        return $this->debitLineAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DebitLineAmount
     */
    public function getDebitLineAmountWithCreate(): DebitLineAmount
    {
        $this->debitLineAmount = is_null($this->debitLineAmount) ? new DebitLineAmount() : $this->debitLineAmount;

        return $this->debitLineAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DebitLineAmount|null $debitLineAmount
     * @return self
     */
    public function setDebitLineAmount(?DebitLineAmount $debitLineAmount = null): self
    {
        $this->debitLineAmount = $debitLineAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CreditLineAmount|null
     */
    public function getCreditLineAmount(): ?CreditLineAmount
    {
        return $this->creditLineAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CreditLineAmount
     */
    public function getCreditLineAmountWithCreate(): CreditLineAmount
    {
        $this->creditLineAmount = is_null($this->creditLineAmount) ? new CreditLineAmount() : $this->creditLineAmount;

        return $this->creditLineAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CreditLineAmount|null $creditLineAmount
     * @return self
     */
    public function setCreditLineAmount(?CreditLineAmount $creditLineAmount = null): self
    {
        $this->creditLineAmount = $creditLineAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode|null
     */
    public function getAccountingCostCode(): ?AccountingCostCode
    {
        return $this->accountingCostCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode
     */
    public function getAccountingCostCodeWithCreate(): AccountingCostCode
    {
        $this->accountingCostCode = is_null($this->accountingCostCode) ? new AccountingCostCode() : $this->accountingCostCode;

        return $this->accountingCostCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode|null $accountingCostCode
     * @return self
     */
    public function setAccountingCostCode(?AccountingCostCode $accountingCostCode = null): self
    {
        $this->accountingCostCode = $accountingCostCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AccountingCost|null
     */
    public function getAccountingCost(): ?AccountingCost
    {
        return $this->accountingCost;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AccountingCost
     */
    public function getAccountingCostWithCreate(): AccountingCost
    {
        $this->accountingCost = is_null($this->accountingCost) ? new AccountingCost() : $this->accountingCost;

        return $this->accountingCost;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AccountingCost|null $accountingCost
     * @return self
     */
    public function setAccountingCost(?AccountingCost $accountingCost = null): self
    {
        $this->accountingCost = $accountingCost;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PenaltySurchargePercent|null
     */
    public function getPenaltySurchargePercent(): ?PenaltySurchargePercent
    {
        return $this->penaltySurchargePercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PenaltySurchargePercent
     */
    public function getPenaltySurchargePercentWithCreate(): PenaltySurchargePercent
    {
        $this->penaltySurchargePercent = is_null($this->penaltySurchargePercent) ? new PenaltySurchargePercent() : $this->penaltySurchargePercent;

        return $this->penaltySurchargePercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PenaltySurchargePercent|null $penaltySurchargePercent
     * @return self
     */
    public function setPenaltySurchargePercent(?PenaltySurchargePercent $penaltySurchargePercent = null): self
    {
        $this->penaltySurchargePercent = $penaltySurchargePercent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Amount|null
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount = is_null($this->amount) ? new Amount() : $this->amount;

        return $this->amount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Amount|null $amount
     * @return self
     */
    public function setAmount(?Amount $amount = null): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentPurposeCode|null
     */
    public function getPaymentPurposeCode(): ?PaymentPurposeCode
    {
        return $this->paymentPurposeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentPurposeCode
     */
    public function getPaymentPurposeCodeWithCreate(): PaymentPurposeCode
    {
        $this->paymentPurposeCode = is_null($this->paymentPurposeCode) ? new PaymentPurposeCode() : $this->paymentPurposeCode;

        return $this->paymentPurposeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PaymentPurposeCode|null $paymentPurposeCode
     * @return self
     */
    public function setPaymentPurposeCode(?PaymentPurposeCode $paymentPurposeCode = null): self
    {
        $this->paymentPurposeCode = $paymentPurposeCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ReminderPeriod>|null
     */
    public function getReminderPeriod(): ?array
    {
        return $this->reminderPeriod;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ReminderPeriod>|null $reminderPeriod
     * @return self
     */
    public function setReminderPeriod(?array $reminderPeriod = null): self
    {
        $this->reminderPeriod = $reminderPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function clearReminderPeriod(): self
    {
        $this->reminderPeriod = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReminderPeriod $reminderPeriod
     * @return self
     */
    public function addToReminderPeriod(ReminderPeriod $reminderPeriod): self
    {
        $this->reminderPeriod[] = $reminderPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReminderPeriod
     */
    public function addToReminderPeriodWithCreate(): ReminderPeriod
    {
        $this->addToreminderPeriod($reminderPeriod = new ReminderPeriod());

        return $reminderPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReminderPeriod $reminderPeriod
     * @return self
     */
    public function addOnceToReminderPeriod(ReminderPeriod $reminderPeriod): self
    {
        if (!is_array($this->reminderPeriod)) {
            $this->reminderPeriod = [];
        }

        $this->reminderPeriod[0] = $reminderPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReminderPeriod
     */
    public function addOnceToReminderPeriodWithCreate(): ReminderPeriod
    {
        if (!is_array($this->reminderPeriod)) {
            $this->reminderPeriod = [];
        }

        if ($this->reminderPeriod === []) {
            $this->addOnceToreminderPeriod(new ReminderPeriod());
        }

        return $this->reminderPeriod[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\BillingReference>|null
     */
    public function getBillingReference(): ?array
    {
        return $this->billingReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\BillingReference>|null $billingReference
     * @return self
     */
    public function setBillingReference(?array $billingReference = null): self
    {
        $this->billingReference = $billingReference;

        return $this;
    }

    /**
     * @return self
     */
    public function clearBillingReference(): self
    {
        $this->billingReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\BillingReference $billingReference
     * @return self
     */
    public function addToBillingReference(BillingReference $billingReference): self
    {
        $this->billingReference[] = $billingReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BillingReference
     */
    public function addToBillingReferenceWithCreate(): BillingReference
    {
        $this->addTobillingReference($billingReference = new BillingReference());

        return $billingReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\BillingReference $billingReference
     * @return self
     */
    public function addOnceToBillingReference(BillingReference $billingReference): self
    {
        if (!is_array($this->billingReference)) {
            $this->billingReference = [];
        }

        $this->billingReference[0] = $billingReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BillingReference
     */
    public function addOnceToBillingReferenceWithCreate(): BillingReference
    {
        if (!is_array($this->billingReference)) {
            $this->billingReference = [];
        }

        if ($this->billingReference === []) {
            $this->addOnceTobillingReference(new BillingReference());
        }

        return $this->billingReference[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExchangeRate|null
     */
    public function getExchangeRate(): ?ExchangeRate
    {
        return $this->exchangeRate;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExchangeRate
     */
    public function getExchangeRateWithCreate(): ExchangeRate
    {
        $this->exchangeRate = is_null($this->exchangeRate) ? new ExchangeRate() : $this->exchangeRate;

        return $this->exchangeRate;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ExchangeRate|null $exchangeRate
     * @return self
     */
    public function setExchangeRate(?ExchangeRate $exchangeRate = null): self
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }
}
