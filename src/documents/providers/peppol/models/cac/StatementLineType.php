<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BalanceAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CreditLineAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DebitLineAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentPurposeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use JMS\Serializer\Annotation as JMS;

class StatementLineType
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
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|array<Note>
     */
    #[JMS\Accessor(getter: 'getNote', setter: 'setNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Note')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Note', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $note;

    /**
     * @var null|UUID
     */
    #[JMS\Accessor(getter: 'getUUID', setter: 'setUUID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UUID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $uUID;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getBalanceBroughtForwardIndicator', setter: 'setBalanceBroughtForwardIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BalanceBroughtForwardIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $balanceBroughtForwardIndicator;

    /**
     * @var null|DebitLineAmount
     */
    #[JMS\Accessor(getter: 'getDebitLineAmount', setter: 'setDebitLineAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DebitLineAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DebitLineAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $debitLineAmount;

    /**
     * @var null|CreditLineAmount
     */
    #[JMS\Accessor(getter: 'getCreditLineAmount', setter: 'setCreditLineAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CreditLineAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CreditLineAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $creditLineAmount;

    /**
     * @var null|BalanceAmount
     */
    #[JMS\Accessor(getter: 'getBalanceAmount', setter: 'setBalanceAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BalanceAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BalanceAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $balanceAmount;

    /**
     * @var null|PaymentPurposeCode
     */
    #[JMS\Accessor(getter: 'getPaymentPurposeCode', setter: 'setPaymentPurposeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentPurposeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentPurposeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $paymentPurposeCode;

    /**
     * @var null|PaymentMeans
     */
    #[JMS\Accessor(getter: 'getPaymentMeans', setter: 'setPaymentMeans')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentMeans')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PaymentMeans')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $paymentMeans;

    /**
     * @var null|array<PaymentTerms>
     */
    #[JMS\Accessor(getter: 'getPaymentTerms', setter: 'setPaymentTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentTerms')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\PaymentTerms>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PaymentTerms', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $paymentTerms;

    /**
     * @var null|BuyerCustomerParty
     */
    #[JMS\Accessor(getter: 'getBuyerCustomerParty', setter: 'setBuyerCustomerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BuyerCustomerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\BuyerCustomerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $buyerCustomerParty;

    /**
     * @var null|SellerSupplierParty
     */
    #[JMS\Accessor(getter: 'getSellerSupplierParty', setter: 'setSellerSupplierParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SellerSupplierParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SellerSupplierParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $sellerSupplierParty;

    /**
     * @var null|OriginatorCustomerParty
     */
    #[JMS\Accessor(getter: 'getOriginatorCustomerParty', setter: 'setOriginatorCustomerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OriginatorCustomerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OriginatorCustomerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $originatorCustomerParty;

    /**
     * @var null|AccountingCustomerParty
     */
    #[JMS\Accessor(getter: 'getAccountingCustomerParty', setter: 'setAccountingCustomerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountingCustomerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\AccountingCustomerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $accountingCustomerParty;

    /**
     * @var null|AccountingSupplierParty
     */
    #[JMS\Accessor(getter: 'getAccountingSupplierParty', setter: 'setAccountingSupplierParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountingSupplierParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\AccountingSupplierParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $accountingSupplierParty;

    /**
     * @var null|PayeeParty
     */
    #[JMS\Accessor(getter: 'getPayeeParty', setter: 'setPayeeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PayeeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PayeeParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $payeeParty;

    /**
     * @var null|array<InvoicePeriod>
     */
    #[JMS\Accessor(getter: 'getInvoicePeriod', setter: 'setInvoicePeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InvoicePeriod')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\InvoicePeriod>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'InvoicePeriod', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $invoicePeriod;

    /**
     * @var null|array<BillingReference>
     */
    #[JMS\Accessor(getter: 'getBillingReference', setter: 'setBillingReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BillingReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\BillingReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'BillingReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $billingReference;

    /**
     * @var null|array<DocumentReference>
     */
    #[JMS\Accessor(getter: 'getDocumentReference', setter: 'setDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DocumentReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $documentReference;

    /**
     * @var null|ExchangeRate
     */
    #[JMS\Accessor(getter: 'getExchangeRate', setter: 'setExchangeRate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExchangeRate')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ExchangeRate')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $exchangeRate;

    /**
     * @var null|array<AllowanceCharge>
     */
    #[JMS\Accessor(getter: 'getAllowanceCharge', setter: 'setAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AllowanceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AllowanceCharge>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AllowanceCharge', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $allowanceCharge;

    /**
     * @var null|array<CollectedPayment>
     */
    #[JMS\Accessor(getter: 'getCollectedPayment', setter: 'setCollectedPayment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CollectedPayment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\CollectedPayment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CollectedPayment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $collectedPayment;

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
        $note = reset($note);

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
        $note = end($note);

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
        if (!is_array($this->note)) {
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
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
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
     * @return null|BalanceAmount
     */
    public function getBalanceAmount(): ?BalanceAmount
    {
        return $this->balanceAmount;
    }

    /**
     * @return BalanceAmount
     */
    public function getBalanceAmountWithCreate(): BalanceAmount
    {
        $this->balanceAmount ??= new BalanceAmount();

        return $this->balanceAmount;
    }

    /**
     * @param  null|BalanceAmount $balanceAmount
     * @return static
     */
    public function setBalanceAmount(
        ?BalanceAmount $balanceAmount = null
    ): static {
        $this->balanceAmount = $balanceAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBalanceAmount(): static
    {
        $this->balanceAmount = null;

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
     * @return null|PaymentMeans
     */
    public function getPaymentMeans(): ?PaymentMeans
    {
        return $this->paymentMeans;
    }

    /**
     * @return PaymentMeans
     */
    public function getPaymentMeansWithCreate(): PaymentMeans
    {
        $this->paymentMeans ??= new PaymentMeans();

        return $this->paymentMeans;
    }

    /**
     * @param  null|PaymentMeans $paymentMeans
     * @return static
     */
    public function setPaymentMeans(
        ?PaymentMeans $paymentMeans = null
    ): static {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentMeans(): static
    {
        $this->paymentMeans = null;

        return $this;
    }

    /**
     * @return null|array<PaymentTerms>
     */
    public function getPaymentTerms(): ?array
    {
        return $this->paymentTerms;
    }

    /**
     * @param  null|array<PaymentTerms> $paymentTerms
     * @return static
     */
    public function setPaymentTerms(
        ?array $paymentTerms = null
    ): static {
        $this->paymentTerms = $paymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentTerms(): static
    {
        $this->paymentTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPaymentTerms(): static
    {
        $this->paymentTerms = [];

        return $this;
    }

    /**
     * @return null|PaymentTerms
     */
    public function firstPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = reset($paymentTerms);

        if (false === $paymentTerms) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @return null|PaymentTerms
     */
    public function lastPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = end($paymentTerms);

        if (false === $paymentTerms) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @param  PaymentTerms $paymentTerms
     * @return static
     */
    public function addToPaymentTerms(
        PaymentTerms $paymentTerms
    ): static {
        $this->paymentTerms[] = $paymentTerms;

        return $this;
    }

    /**
     * @return PaymentTerms
     */
    public function addToPaymentTermsWithCreate(): PaymentTerms
    {
        $this->addToPaymentTerms($paymentTerms = new PaymentTerms());

        return $paymentTerms;
    }

    /**
     * @param  PaymentTerms $paymentTerms
     * @return static
     */
    public function addOnceToPaymentTerms(
        PaymentTerms $paymentTerms
    ): static {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        $this->paymentTerms[0] = $paymentTerms;

        return $this;
    }

    /**
     * @return PaymentTerms
     */
    public function addOnceToPaymentTermsWithCreate(): PaymentTerms
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        if ([] === $this->paymentTerms) {
            $this->addOnceToPaymentTerms(new PaymentTerms());
        }

        return $this->paymentTerms[0];
    }

    /**
     * @return null|BuyerCustomerParty
     */
    public function getBuyerCustomerParty(): ?BuyerCustomerParty
    {
        return $this->buyerCustomerParty;
    }

    /**
     * @return BuyerCustomerParty
     */
    public function getBuyerCustomerPartyWithCreate(): BuyerCustomerParty
    {
        $this->buyerCustomerParty ??= new BuyerCustomerParty();

        return $this->buyerCustomerParty;
    }

    /**
     * @param  null|BuyerCustomerParty $buyerCustomerParty
     * @return static
     */
    public function setBuyerCustomerParty(
        ?BuyerCustomerParty $buyerCustomerParty = null
    ): static {
        $this->buyerCustomerParty = $buyerCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerCustomerParty(): static
    {
        $this->buyerCustomerParty = null;

        return $this;
    }

    /**
     * @return null|SellerSupplierParty
     */
    public function getSellerSupplierParty(): ?SellerSupplierParty
    {
        return $this->sellerSupplierParty;
    }

    /**
     * @return SellerSupplierParty
     */
    public function getSellerSupplierPartyWithCreate(): SellerSupplierParty
    {
        $this->sellerSupplierParty ??= new SellerSupplierParty();

        return $this->sellerSupplierParty;
    }

    /**
     * @param  null|SellerSupplierParty $sellerSupplierParty
     * @return static
     */
    public function setSellerSupplierParty(
        ?SellerSupplierParty $sellerSupplierParty = null
    ): static {
        $this->sellerSupplierParty = $sellerSupplierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerSupplierParty(): static
    {
        $this->sellerSupplierParty = null;

        return $this;
    }

    /**
     * @return null|OriginatorCustomerParty
     */
    public function getOriginatorCustomerParty(): ?OriginatorCustomerParty
    {
        return $this->originatorCustomerParty;
    }

    /**
     * @return OriginatorCustomerParty
     */
    public function getOriginatorCustomerPartyWithCreate(): OriginatorCustomerParty
    {
        $this->originatorCustomerParty ??= new OriginatorCustomerParty();

        return $this->originatorCustomerParty;
    }

    /**
     * @param  null|OriginatorCustomerParty $originatorCustomerParty
     * @return static
     */
    public function setOriginatorCustomerParty(
        ?OriginatorCustomerParty $originatorCustomerParty = null
    ): static {
        $this->originatorCustomerParty = $originatorCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginatorCustomerParty(): static
    {
        $this->originatorCustomerParty = null;

        return $this;
    }

    /**
     * @return null|AccountingCustomerParty
     */
    public function getAccountingCustomerParty(): ?AccountingCustomerParty
    {
        return $this->accountingCustomerParty;
    }

    /**
     * @return AccountingCustomerParty
     */
    public function getAccountingCustomerPartyWithCreate(): AccountingCustomerParty
    {
        $this->accountingCustomerParty ??= new AccountingCustomerParty();

        return $this->accountingCustomerParty;
    }

    /**
     * @param  null|AccountingCustomerParty $accountingCustomerParty
     * @return static
     */
    public function setAccountingCustomerParty(
        ?AccountingCustomerParty $accountingCustomerParty = null
    ): static {
        $this->accountingCustomerParty = $accountingCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCustomerParty(): static
    {
        $this->accountingCustomerParty = null;

        return $this;
    }

    /**
     * @return null|AccountingSupplierParty
     */
    public function getAccountingSupplierParty(): ?AccountingSupplierParty
    {
        return $this->accountingSupplierParty;
    }

    /**
     * @return AccountingSupplierParty
     */
    public function getAccountingSupplierPartyWithCreate(): AccountingSupplierParty
    {
        $this->accountingSupplierParty ??= new AccountingSupplierParty();

        return $this->accountingSupplierParty;
    }

    /**
     * @param  null|AccountingSupplierParty $accountingSupplierParty
     * @return static
     */
    public function setAccountingSupplierParty(
        ?AccountingSupplierParty $accountingSupplierParty = null
    ): static {
        $this->accountingSupplierParty = $accountingSupplierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingSupplierParty(): static
    {
        $this->accountingSupplierParty = null;

        return $this;
    }

    /**
     * @return null|PayeeParty
     */
    public function getPayeeParty(): ?PayeeParty
    {
        return $this->payeeParty;
    }

    /**
     * @return PayeeParty
     */
    public function getPayeePartyWithCreate(): PayeeParty
    {
        $this->payeeParty ??= new PayeeParty();

        return $this->payeeParty;
    }

    /**
     * @param  null|PayeeParty $payeeParty
     * @return static
     */
    public function setPayeeParty(
        ?PayeeParty $payeeParty = null
    ): static {
        $this->payeeParty = $payeeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPayeeParty(): static
    {
        $this->payeeParty = null;

        return $this;
    }

    /**
     * @return null|array<InvoicePeriod>
     */
    public function getInvoicePeriod(): ?array
    {
        return $this->invoicePeriod;
    }

    /**
     * @param  null|array<InvoicePeriod> $invoicePeriod
     * @return static
     */
    public function setInvoicePeriod(
        ?array $invoicePeriod = null
    ): static {
        $this->invoicePeriod = $invoicePeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoicePeriod(): static
    {
        $this->invoicePeriod = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInvoicePeriod(): static
    {
        $this->invoicePeriod = [];

        return $this;
    }

    /**
     * @return null|InvoicePeriod
     */
    public function firstInvoicePeriod(): ?InvoicePeriod
    {
        $invoicePeriod = $this->invoicePeriod ?? [];
        $invoicePeriod = reset($invoicePeriod);

        if (false === $invoicePeriod) {
            return null;
        }

        return $invoicePeriod;
    }

    /**
     * @return null|InvoicePeriod
     */
    public function lastInvoicePeriod(): ?InvoicePeriod
    {
        $invoicePeriod = $this->invoicePeriod ?? [];
        $invoicePeriod = end($invoicePeriod);

        if (false === $invoicePeriod) {
            return null;
        }

        return $invoicePeriod;
    }

    /**
     * @param  InvoicePeriod $invoicePeriod
     * @return static
     */
    public function addToInvoicePeriod(
        InvoicePeriod $invoicePeriod
    ): static {
        $this->invoicePeriod[] = $invoicePeriod;

        return $this;
    }

    /**
     * @return InvoicePeriod
     */
    public function addToInvoicePeriodWithCreate(): InvoicePeriod
    {
        $this->addToInvoicePeriod($invoicePeriod = new InvoicePeriod());

        return $invoicePeriod;
    }

    /**
     * @param  InvoicePeriod $invoicePeriod
     * @return static
     */
    public function addOnceToInvoicePeriod(
        InvoicePeriod $invoicePeriod
    ): static {
        if (!is_array($this->invoicePeriod)) {
            $this->invoicePeriod = [];
        }

        $this->invoicePeriod[0] = $invoicePeriod;

        return $this;
    }

    /**
     * @return InvoicePeriod
     */
    public function addOnceToInvoicePeriodWithCreate(): InvoicePeriod
    {
        if (!is_array($this->invoicePeriod)) {
            $this->invoicePeriod = [];
        }

        if ([] === $this->invoicePeriod) {
            $this->addOnceToInvoicePeriod(new InvoicePeriod());
        }

        return $this->invoicePeriod[0];
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
        $billingReference = reset($billingReference);

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
        $billingReference = end($billingReference);

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
        if (!is_array($this->billingReference)) {
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
        if (!is_array($this->billingReference)) {
            $this->billingReference = [];
        }

        if ([] === $this->billingReference) {
            $this->addOnceToBillingReference(new BillingReference());
        }

        return $this->billingReference[0];
    }

    /**
     * @return null|array<DocumentReference>
     */
    public function getDocumentReference(): ?array
    {
        return $this->documentReference;
    }

    /**
     * @param  null|array<DocumentReference> $documentReference
     * @return static
     */
    public function setDocumentReference(
        ?array $documentReference = null
    ): static {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentReference(): static
    {
        $this->documentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDocumentReference(): static
    {
        $this->documentReference = [];

        return $this;
    }

    /**
     * @return null|DocumentReference
     */
    public function firstDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = reset($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @return null|DocumentReference
     */
    public function lastDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = end($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addToDocumentReference(
        DocumentReference $documentReference
    ): static {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addToDocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addOnceToDocumentReference(
        DocumentReference $documentReference
    ): static {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        $this->documentReference[0] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addOnceToDocumentReferenceWithCreate(): DocumentReference
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        if ([] === $this->documentReference) {
            $this->addOnceToDocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
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

    /**
     * @return null|array<AllowanceCharge>
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param  null|array<AllowanceCharge> $allowanceCharge
     * @return static
     */
    public function setAllowanceCharge(
        ?array $allowanceCharge = null
    ): static {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceCharge(): static
    {
        $this->allowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAllowanceCharge(): static
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function firstAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = reset($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function lastAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = end($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addToAllowanceCharge(
        AllowanceCharge $allowanceCharge
    ): static {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToAllowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addOnceToAllowanceCharge(
        AllowanceCharge $allowanceCharge
    ): static {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ([] === $this->allowanceCharge) {
            $this->addOnceToAllowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return null|array<CollectedPayment>
     */
    public function getCollectedPayment(): ?array
    {
        return $this->collectedPayment;
    }

    /**
     * @param  null|array<CollectedPayment> $collectedPayment
     * @return static
     */
    public function setCollectedPayment(
        ?array $collectedPayment = null
    ): static {
        $this->collectedPayment = $collectedPayment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCollectedPayment(): static
    {
        $this->collectedPayment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCollectedPayment(): static
    {
        $this->collectedPayment = [];

        return $this;
    }

    /**
     * @return null|CollectedPayment
     */
    public function firstCollectedPayment(): ?CollectedPayment
    {
        $collectedPayment = $this->collectedPayment ?? [];
        $collectedPayment = reset($collectedPayment);

        if (false === $collectedPayment) {
            return null;
        }

        return $collectedPayment;
    }

    /**
     * @return null|CollectedPayment
     */
    public function lastCollectedPayment(): ?CollectedPayment
    {
        $collectedPayment = $this->collectedPayment ?? [];
        $collectedPayment = end($collectedPayment);

        if (false === $collectedPayment) {
            return null;
        }

        return $collectedPayment;
    }

    /**
     * @param  CollectedPayment $collectedPayment
     * @return static
     */
    public function addToCollectedPayment(
        CollectedPayment $collectedPayment
    ): static {
        $this->collectedPayment[] = $collectedPayment;

        return $this;
    }

    /**
     * @return CollectedPayment
     */
    public function addToCollectedPaymentWithCreate(): CollectedPayment
    {
        $this->addToCollectedPayment($collectedPayment = new CollectedPayment());

        return $collectedPayment;
    }

    /**
     * @param  CollectedPayment $collectedPayment
     * @return static
     */
    public function addOnceToCollectedPayment(
        CollectedPayment $collectedPayment
    ): static {
        if (!is_array($this->collectedPayment)) {
            $this->collectedPayment = [];
        }

        $this->collectedPayment[0] = $collectedPayment;

        return $this;
    }

    /**
     * @return CollectedPayment
     */
    public function addOnceToCollectedPaymentWithCreate(): CollectedPayment
    {
        if (!is_array($this->collectedPayment)) {
            $this->collectedPayment = [];
        }

        if ([] === $this->collectedPayment) {
            $this->addOnceToCollectedPayment(new CollectedPayment());
        }

        return $this->collectedPayment[0];
    }
}
