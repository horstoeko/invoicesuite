<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCost;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCostCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CreditLineAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DebitLineAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentPurposeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PenaltySurchargePercent;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ReminderLineType
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
     * @var null|array<Note>
     */
    #[JMS\Accessor(getter: 'getNote', setter: 'setNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Note')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'Note', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $note;

    /**
     * @var null|UUID
     */
    #[JMS\Accessor(getter: 'getUUID', setter: 'setUUID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UUID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $uUID;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getBalanceBroughtForwardIndicator', setter: 'setBalanceBroughtForwardIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BalanceBroughtForwardIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $balanceBroughtForwardIndicator;

    /**
     * @var null|DebitLineAmount
     */
    #[JMS\Accessor(getter: 'getDebitLineAmount', setter: 'setDebitLineAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DebitLineAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DebitLineAmount')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $debitLineAmount;

    /**
     * @var null|CreditLineAmount
     */
    #[JMS\Accessor(getter: 'getCreditLineAmount', setter: 'setCreditLineAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CreditLineAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CreditLineAmount')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $creditLineAmount;

    /**
     * @var null|AccountingCostCode
     */
    #[JMS\Accessor(getter: 'getAccountingCostCode', setter: 'setAccountingCostCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountingCostCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCostCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $accountingCostCode;

    /**
     * @var null|AccountingCost
     */
    #[JMS\Accessor(getter: 'getAccountingCost', setter: 'setAccountingCost')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountingCost')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCost')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $accountingCost;

    /**
     * @var null|PenaltySurchargePercent
     */
    #[JMS\Accessor(getter: 'getPenaltySurchargePercent', setter: 'setPenaltySurchargePercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PenaltySurchargePercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PenaltySurchargePercent')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $penaltySurchargePercent;

    /**
     * @var null|Amount
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Amount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $amount;

    /**
     * @var null|PaymentPurposeCode
     */
    #[JMS\Accessor(getter: 'getPaymentPurposeCode', setter: 'setPaymentPurposeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentPurposeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentPurposeCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $paymentPurposeCode;

    /**
     * @var null|array<ReminderPeriod>
     */
    #[JMS\Accessor(getter: 'getReminderPeriod', setter: 'setReminderPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReminderPeriod')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ReminderPeriod>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'ReminderPeriod', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $reminderPeriod;

    /**
     * @var null|array<BillingReference>
     */
    #[JMS\Accessor(getter: 'getBillingReference', setter: 'setBillingReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BillingReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\BillingReference>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'BillingReference', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $billingReference;

    /**
     * @var null|ExchangeRate
     */
    #[JMS\Accessor(getter: 'getExchangeRate', setter: 'setExchangeRate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExchangeRate')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ExchangeRate')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $exchangeRate;

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
     * @return null|array<Note>
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param  null|array<Note> $note
     * @return static
     */
    public function setNote(
        ?array $note = null
    ): static {
        $this->note = $note;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNote(): static
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNote(): static
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return null|Note
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = InvoiceSuiteArrayUtils::first($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @return null|Note
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = InvoiceSuiteArrayUtils::last($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addToNote(
        Note $note
    ): static {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addToNote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(
        Note $note
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!InvoiceSuiteArrayUtils::is($this->note)) {
            $this->note = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->note)) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Note): mixed $callback
     * @return static
     */
    public function forEachNote(
        callable $callback
    ): static {
        foreach ($this->note ?? [] as $note) {
            $callback($note);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(Note): mixed  $callback
     * @return array<array-key, Note>
     */
    public function filterNotes(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->note ?? [], $callback);
    }

    /**
     * @return null|UUID
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID ??= new UUID();

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(
        ?UUID $uUID = null
    ): static {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUUID(): static
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getBalanceBroughtForwardIndicator(): ?bool
    {
        return $this->balanceBroughtForwardIndicator;
    }

    /**
     * @param  null|bool $balanceBroughtForwardIndicator
     * @return static
     */
    public function setBalanceBroughtForwardIndicator(
        ?bool $balanceBroughtForwardIndicator = null
    ): static {
        $this->balanceBroughtForwardIndicator = $balanceBroughtForwardIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBalanceBroughtForwardIndicator(): static
    {
        $this->balanceBroughtForwardIndicator = null;

        return $this;
    }

    /**
     * @return null|DebitLineAmount
     */
    public function getDebitLineAmount(): ?DebitLineAmount
    {
        return $this->debitLineAmount;
    }

    /**
     * @return DebitLineAmount
     */
    public function getDebitLineAmountWithCreate(): DebitLineAmount
    {
        $this->debitLineAmount ??= new DebitLineAmount();

        return $this->debitLineAmount;
    }

    /**
     * @param  null|DebitLineAmount $debitLineAmount
     * @return static
     */
    public function setDebitLineAmount(
        ?DebitLineAmount $debitLineAmount = null
    ): static {
        $this->debitLineAmount = $debitLineAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDebitLineAmount(): static
    {
        $this->debitLineAmount = null;

        return $this;
    }

    /**
     * @return null|CreditLineAmount
     */
    public function getCreditLineAmount(): ?CreditLineAmount
    {
        return $this->creditLineAmount;
    }

    /**
     * @return CreditLineAmount
     */
    public function getCreditLineAmountWithCreate(): CreditLineAmount
    {
        $this->creditLineAmount ??= new CreditLineAmount();

        return $this->creditLineAmount;
    }

    /**
     * @param  null|CreditLineAmount $creditLineAmount
     * @return static
     */
    public function setCreditLineAmount(
        ?CreditLineAmount $creditLineAmount = null
    ): static {
        $this->creditLineAmount = $creditLineAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCreditLineAmount(): static
    {
        $this->creditLineAmount = null;

        return $this;
    }

    /**
     * @return null|AccountingCostCode
     */
    public function getAccountingCostCode(): ?AccountingCostCode
    {
        return $this->accountingCostCode;
    }

    /**
     * @return AccountingCostCode
     */
    public function getAccountingCostCodeWithCreate(): AccountingCostCode
    {
        $this->accountingCostCode ??= new AccountingCostCode();

        return $this->accountingCostCode;
    }

    /**
     * @param  null|AccountingCostCode $accountingCostCode
     * @return static
     */
    public function setAccountingCostCode(
        ?AccountingCostCode $accountingCostCode = null
    ): static {
        $this->accountingCostCode = $accountingCostCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCostCode(): static
    {
        $this->accountingCostCode = null;

        return $this;
    }

    /**
     * @return null|AccountingCost
     */
    public function getAccountingCost(): ?AccountingCost
    {
        return $this->accountingCost;
    }

    /**
     * @return AccountingCost
     */
    public function getAccountingCostWithCreate(): AccountingCost
    {
        $this->accountingCost ??= new AccountingCost();

        return $this->accountingCost;
    }

    /**
     * @param  null|AccountingCost $accountingCost
     * @return static
     */
    public function setAccountingCost(
        ?AccountingCost $accountingCost = null
    ): static {
        $this->accountingCost = $accountingCost;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCost(): static
    {
        $this->accountingCost = null;

        return $this;
    }

    /**
     * @return null|PenaltySurchargePercent
     */
    public function getPenaltySurchargePercent(): ?PenaltySurchargePercent
    {
        return $this->penaltySurchargePercent;
    }

    /**
     * @return PenaltySurchargePercent
     */
    public function getPenaltySurchargePercentWithCreate(): PenaltySurchargePercent
    {
        $this->penaltySurchargePercent ??= new PenaltySurchargePercent();

        return $this->penaltySurchargePercent;
    }

    /**
     * @param  null|PenaltySurchargePercent $penaltySurchargePercent
     * @return static
     */
    public function setPenaltySurchargePercent(
        ?PenaltySurchargePercent $penaltySurchargePercent = null
    ): static {
        $this->penaltySurchargePercent = $penaltySurchargePercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPenaltySurchargePercent(): static
    {
        $this->penaltySurchargePercent = null;

        return $this;
    }

    /**
     * @return null|Amount
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount ??= new Amount();

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(
        ?Amount $amount = null
    ): static {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAmount(): static
    {
        $this->amount = null;

        return $this;
    }

    /**
     * @return null|PaymentPurposeCode
     */
    public function getPaymentPurposeCode(): ?PaymentPurposeCode
    {
        return $this->paymentPurposeCode;
    }

    /**
     * @return PaymentPurposeCode
     */
    public function getPaymentPurposeCodeWithCreate(): PaymentPurposeCode
    {
        $this->paymentPurposeCode ??= new PaymentPurposeCode();

        return $this->paymentPurposeCode;
    }

    /**
     * @param  null|PaymentPurposeCode $paymentPurposeCode
     * @return static
     */
    public function setPaymentPurposeCode(
        ?PaymentPurposeCode $paymentPurposeCode = null
    ): static {
        $this->paymentPurposeCode = $paymentPurposeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentPurposeCode(): static
    {
        $this->paymentPurposeCode = null;

        return $this;
    }

    /**
     * @return null|array<ReminderPeriod>
     */
    public function getReminderPeriod(): ?array
    {
        return $this->reminderPeriod;
    }

    /**
     * @param  null|array<ReminderPeriod> $reminderPeriod
     * @return static
     */
    public function setReminderPeriod(
        ?array $reminderPeriod = null
    ): static {
        $this->reminderPeriod = $reminderPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReminderPeriod(): static
    {
        $this->reminderPeriod = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReminderPeriod(): static
    {
        $this->reminderPeriod = [];

        return $this;
    }

    /**
     * @return null|ReminderPeriod
     */
    public function firstReminderPeriod(): ?ReminderPeriod
    {
        $reminderPeriod = $this->reminderPeriod ?? [];
        $reminderPeriod = InvoiceSuiteArrayUtils::first($reminderPeriod);

        if (false === $reminderPeriod) {
            return null;
        }

        return $reminderPeriod;
    }

    /**
     * @return null|ReminderPeriod
     */
    public function lastReminderPeriod(): ?ReminderPeriod
    {
        $reminderPeriod = $this->reminderPeriod ?? [];
        $reminderPeriod = InvoiceSuiteArrayUtils::last($reminderPeriod);

        if (false === $reminderPeriod) {
            return null;
        }

        return $reminderPeriod;
    }

    /**
     * @param  ReminderPeriod $reminderPeriod
     * @return static
     */
    public function addToReminderPeriod(
        ReminderPeriod $reminderPeriod
    ): static {
        $this->reminderPeriod[] = $reminderPeriod;

        return $this;
    }

    /**
     * @return ReminderPeriod
     */
    public function addToReminderPeriodWithCreate(): ReminderPeriod
    {
        $this->addToReminderPeriod($reminderPeriod = new ReminderPeriod());

        return $reminderPeriod;
    }

    /**
     * @param  ReminderPeriod $reminderPeriod
     * @return static
     */
    public function addOnceToReminderPeriod(
        ReminderPeriod $reminderPeriod
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->reminderPeriod)) {
            $this->reminderPeriod = [];
        }

        $this->reminderPeriod[0] = $reminderPeriod;

        return $this;
    }

    /**
     * @return ReminderPeriod
     */
    public function addOnceToReminderPeriodWithCreate(): ReminderPeriod
    {
        if (!InvoiceSuiteArrayUtils::is($this->reminderPeriod)) {
            $this->reminderPeriod = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->reminderPeriod)) {
            $this->addOnceToReminderPeriod(new ReminderPeriod());
        }

        return $this->reminderPeriod[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(ReminderPeriod): mixed $callback
     * @return static
     */
    public function forEachReminderPeriod(
        callable $callback
    ): static {
        foreach ($this->reminderPeriod ?? [] as $reminderPeriod) {
            $callback($reminderPeriod);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(ReminderPeriod): mixed  $callback
     * @return array<array-key, ReminderPeriod>
     */
    public function filterReminderPeriods(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->reminderPeriod ?? [], $callback);
    }

    /**
     * @return null|array<BillingReference>
     */
    public function getBillingReference(): ?array
    {
        return $this->billingReference;
    }

    /**
     * @param  null|array<BillingReference> $billingReference
     * @return static
     */
    public function setBillingReference(
        ?array $billingReference = null
    ): static {
        $this->billingReference = $billingReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBillingReference(): static
    {
        $this->billingReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearBillingReference(): static
    {
        $this->billingReference = [];

        return $this;
    }

    /**
     * @return null|BillingReference
     */
    public function firstBillingReference(): ?BillingReference
    {
        $billingReference = $this->billingReference ?? [];
        $billingReference = InvoiceSuiteArrayUtils::first($billingReference);

        if (false === $billingReference) {
            return null;
        }

        return $billingReference;
    }

    /**
     * @return null|BillingReference
     */
    public function lastBillingReference(): ?BillingReference
    {
        $billingReference = $this->billingReference ?? [];
        $billingReference = InvoiceSuiteArrayUtils::last($billingReference);

        if (false === $billingReference) {
            return null;
        }

        return $billingReference;
    }

    /**
     * @param  BillingReference $billingReference
     * @return static
     */
    public function addToBillingReference(
        BillingReference $billingReference
    ): static {
        $this->billingReference[] = $billingReference;

        return $this;
    }

    /**
     * @return BillingReference
     */
    public function addToBillingReferenceWithCreate(): BillingReference
    {
        $this->addToBillingReference($billingReference = new BillingReference());

        return $billingReference;
    }

    /**
     * @param  BillingReference $billingReference
     * @return static
     */
    public function addOnceToBillingReference(
        BillingReference $billingReference
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->billingReference)) {
            $this->billingReference = [];
        }

        $this->billingReference[0] = $billingReference;

        return $this;
    }

    /**
     * @return BillingReference
     */
    public function addOnceToBillingReferenceWithCreate(): BillingReference
    {
        if (!InvoiceSuiteArrayUtils::is($this->billingReference)) {
            $this->billingReference = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->billingReference)) {
            $this->addOnceToBillingReference(new BillingReference());
        }

        return $this->billingReference[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(BillingReference): mixed $callback
     * @return static
     */
    public function forEachBillingReference(
        callable $callback
    ): static {
        foreach ($this->billingReference ?? [] as $billingReference) {
            $callback($billingReference);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(BillingReference): mixed  $callback
     * @return array<array-key, BillingReference>
     */
    public function filterBillingReferences(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->billingReference ?? [], $callback);
    }

    /**
     * @return null|ExchangeRate
     */
    public function getExchangeRate(): ?ExchangeRate
    {
        return $this->exchangeRate;
    }

    /**
     * @return ExchangeRate
     */
    public function getExchangeRateWithCreate(): ExchangeRate
    {
        $this->exchangeRate ??= new ExchangeRate();

        return $this->exchangeRate;
    }

    /**
     * @param  null|ExchangeRate $exchangeRate
     * @return static
     */
    public function setExchangeRate(
        ?ExchangeRate $exchangeRate = null
    ): static {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExchangeRate(): static
    {
        $this->exchangeRate = null;

        return $this;
    }
}
