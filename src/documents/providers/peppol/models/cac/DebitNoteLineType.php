<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCost;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCostCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DebitedQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineExtensionAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentPurposeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class DebitNoteLineType
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
     * @var null|DebitedQuantity
     */
    #[JMS\Accessor(getter: 'getDebitedQuantity', setter: 'setDebitedQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DebitedQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DebitedQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $debitedQuantity;

    /**
     * @var null|LineExtensionAmount
     */
    #[JMS\Accessor(getter: 'getLineExtensionAmount', setter: 'setLineExtensionAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineExtensionAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineExtensionAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $lineExtensionAmount;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getTaxPointDate', setter: 'setTaxPointDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxPointDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxPointDate;

    /**
     * @var null|AccountingCostCode
     */
    #[JMS\Accessor(getter: 'getAccountingCostCode', setter: 'setAccountingCostCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountingCostCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCostCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $accountingCostCode;

    /**
     * @var null|AccountingCost
     */
    #[JMS\Accessor(getter: 'getAccountingCost', setter: 'setAccountingCost')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountingCost')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCost')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $accountingCost;

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
     * @var null|array<DiscrepancyResponse>
     */
    #[JMS\Accessor(getter: 'getDiscrepancyResponse', setter: 'setDiscrepancyResponse')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DiscrepancyResponse')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DiscrepancyResponse>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DiscrepancyResponse', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $discrepancyResponse;

    /**
     * @var null|array<DespatchLineReference>
     */
    #[JMS\Accessor(getter: 'getDespatchLineReference', setter: 'setDespatchLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DespatchLineReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DespatchLineReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DespatchLineReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $despatchLineReference;

    /**
     * @var null|array<ReceiptLineReference>
     */
    #[JMS\Accessor(getter: 'getReceiptLineReference', setter: 'setReceiptLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReceiptLineReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ReceiptLineReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ReceiptLineReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $receiptLineReference;

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
     * @var null|PricingReference
     */
    #[JMS\Accessor(getter: 'getPricingReference', setter: 'setPricingReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PricingReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PricingReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $pricingReference;

    /**
     * @var null|array<Delivery>
     */
    #[JMS\Accessor(getter: 'getDelivery', setter: 'setDelivery')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Delivery')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Delivery>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Delivery', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $delivery;

    /**
     * @var null|array<TaxTotal>
     */
    #[JMS\Accessor(getter: 'getTaxTotal', setter: 'setTaxTotal')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxTotal')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TaxTotal>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TaxTotal', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $taxTotal;

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
     * @var null|Item
     */
    #[JMS\Accessor(getter: 'getItem', setter: 'setItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Item')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Item')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $item;

    /**
     * @var null|Price
     */
    #[JMS\Accessor(getter: 'getPrice', setter: 'setPrice')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Price')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Price')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $price;

    /**
     * @var null|array<SubDebitNoteLine>
     */
    #[JMS\Accessor(getter: 'getSubDebitNoteLine', setter: 'setSubDebitNoteLine')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubDebitNoteLine')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SubDebitNoteLine>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SubDebitNoteLine', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $subDebitNoteLine;

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

        if ([] === $this->note) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return null|DebitedQuantity
     */
    public function getDebitedQuantity(): ?DebitedQuantity
    {
        return $this->debitedQuantity;
    }

    /**
     * @return DebitedQuantity
     */
    public function getDebitedQuantityWithCreate(): DebitedQuantity
    {
        $this->debitedQuantity ??= new DebitedQuantity();

        return $this->debitedQuantity;
    }

    /**
     * @param  null|DebitedQuantity $debitedQuantity
     * @return static
     */
    public function setDebitedQuantity(
        ?DebitedQuantity $debitedQuantity = null
    ): static {
        $this->debitedQuantity = $debitedQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDebitedQuantity(): static
    {
        $this->debitedQuantity = null;

        return $this;
    }

    /**
     * @return null|LineExtensionAmount
     */
    public function getLineExtensionAmount(): ?LineExtensionAmount
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @return LineExtensionAmount
     */
    public function getLineExtensionAmountWithCreate(): LineExtensionAmount
    {
        $this->lineExtensionAmount ??= new LineExtensionAmount();

        return $this->lineExtensionAmount;
    }

    /**
     * @param  null|LineExtensionAmount $lineExtensionAmount
     * @return static
     */
    public function setLineExtensionAmount(
        ?LineExtensionAmount $lineExtensionAmount = null
    ): static {
        $this->lineExtensionAmount = $lineExtensionAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineExtensionAmount(): static
    {
        $this->lineExtensionAmount = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getTaxPointDate(): ?DateTimeInterface
    {
        return $this->taxPointDate;
    }

    /**
     * @param  null|DateTimeInterface $taxPointDate
     * @return static
     */
    public function setTaxPointDate(
        ?DateTimeInterface $taxPointDate = null
    ): static {
        $this->taxPointDate = $taxPointDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxPointDate(): static
    {
        $this->taxPointDate = null;

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
     * @return null|array<DiscrepancyResponse>
     */
    public function getDiscrepancyResponse(): ?array
    {
        return $this->discrepancyResponse;
    }

    /**
     * @param  null|array<DiscrepancyResponse> $discrepancyResponse
     * @return static
     */
    public function setDiscrepancyResponse(
        ?array $discrepancyResponse = null
    ): static {
        $this->discrepancyResponse = $discrepancyResponse;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDiscrepancyResponse(): static
    {
        $this->discrepancyResponse = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDiscrepancyResponse(): static
    {
        $this->discrepancyResponse = [];

        return $this;
    }

    /**
     * @return null|DiscrepancyResponse
     */
    public function firstDiscrepancyResponse(): ?DiscrepancyResponse
    {
        $discrepancyResponse = $this->discrepancyResponse ?? [];
        $discrepancyResponse = reset($discrepancyResponse);

        if (false === $discrepancyResponse) {
            return null;
        }

        return $discrepancyResponse;
    }

    /**
     * @return null|DiscrepancyResponse
     */
    public function lastDiscrepancyResponse(): ?DiscrepancyResponse
    {
        $discrepancyResponse = $this->discrepancyResponse ?? [];
        $discrepancyResponse = end($discrepancyResponse);

        if (false === $discrepancyResponse) {
            return null;
        }

        return $discrepancyResponse;
    }

    /**
     * @param  DiscrepancyResponse $discrepancyResponse
     * @return static
     */
    public function addToDiscrepancyResponse(
        DiscrepancyResponse $discrepancyResponse
    ): static {
        $this->discrepancyResponse[] = $discrepancyResponse;

        return $this;
    }

    /**
     * @return DiscrepancyResponse
     */
    public function addToDiscrepancyResponseWithCreate(): DiscrepancyResponse
    {
        $this->addToDiscrepancyResponse($discrepancyResponse = new DiscrepancyResponse());

        return $discrepancyResponse;
    }

    /**
     * @param  DiscrepancyResponse $discrepancyResponse
     * @return static
     */
    public function addOnceToDiscrepancyResponse(
        DiscrepancyResponse $discrepancyResponse
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->discrepancyResponse)) {
            $this->discrepancyResponse = [];
        }

        $this->discrepancyResponse[0] = $discrepancyResponse;

        return $this;
    }

    /**
     * @return DiscrepancyResponse
     */
    public function addOnceToDiscrepancyResponseWithCreate(): DiscrepancyResponse
    {
        if (!InvoiceSuiteArrayUtils::is($this->discrepancyResponse)) {
            $this->discrepancyResponse = [];
        }

        if ([] === $this->discrepancyResponse) {
            $this->addOnceToDiscrepancyResponse(new DiscrepancyResponse());
        }

        return $this->discrepancyResponse[0];
    }

    /**
     * @return null|array<DespatchLineReference>
     */
    public function getDespatchLineReference(): ?array
    {
        return $this->despatchLineReference;
    }

    /**
     * @param  null|array<DespatchLineReference> $despatchLineReference
     * @return static
     */
    public function setDespatchLineReference(
        ?array $despatchLineReference = null
    ): static {
        $this->despatchLineReference = $despatchLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatchLineReference(): static
    {
        $this->despatchLineReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDespatchLineReference(): static
    {
        $this->despatchLineReference = [];

        return $this;
    }

    /**
     * @return null|DespatchLineReference
     */
    public function firstDespatchLineReference(): ?DespatchLineReference
    {
        $despatchLineReference = $this->despatchLineReference ?? [];
        $despatchLineReference = reset($despatchLineReference);

        if (false === $despatchLineReference) {
            return null;
        }

        return $despatchLineReference;
    }

    /**
     * @return null|DespatchLineReference
     */
    public function lastDespatchLineReference(): ?DespatchLineReference
    {
        $despatchLineReference = $this->despatchLineReference ?? [];
        $despatchLineReference = end($despatchLineReference);

        if (false === $despatchLineReference) {
            return null;
        }

        return $despatchLineReference;
    }

    /**
     * @param  DespatchLineReference $despatchLineReference
     * @return static
     */
    public function addToDespatchLineReference(
        DespatchLineReference $despatchLineReference
    ): static {
        $this->despatchLineReference[] = $despatchLineReference;

        return $this;
    }

    /**
     * @return DespatchLineReference
     */
    public function addToDespatchLineReferenceWithCreate(): DespatchLineReference
    {
        $this->addToDespatchLineReference($despatchLineReference = new DespatchLineReference());

        return $despatchLineReference;
    }

    /**
     * @param  DespatchLineReference $despatchLineReference
     * @return static
     */
    public function addOnceToDespatchLineReference(
        DespatchLineReference $despatchLineReference
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->despatchLineReference)) {
            $this->despatchLineReference = [];
        }

        $this->despatchLineReference[0] = $despatchLineReference;

        return $this;
    }

    /**
     * @return DespatchLineReference
     */
    public function addOnceToDespatchLineReferenceWithCreate(): DespatchLineReference
    {
        if (!InvoiceSuiteArrayUtils::is($this->despatchLineReference)) {
            $this->despatchLineReference = [];
        }

        if ([] === $this->despatchLineReference) {
            $this->addOnceToDespatchLineReference(new DespatchLineReference());
        }

        return $this->despatchLineReference[0];
    }

    /**
     * @return null|array<ReceiptLineReference>
     */
    public function getReceiptLineReference(): ?array
    {
        return $this->receiptLineReference;
    }

    /**
     * @param  null|array<ReceiptLineReference> $receiptLineReference
     * @return static
     */
    public function setReceiptLineReference(
        ?array $receiptLineReference = null
    ): static {
        $this->receiptLineReference = $receiptLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceiptLineReference(): static
    {
        $this->receiptLineReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReceiptLineReference(): static
    {
        $this->receiptLineReference = [];

        return $this;
    }

    /**
     * @return null|ReceiptLineReference
     */
    public function firstReceiptLineReference(): ?ReceiptLineReference
    {
        $receiptLineReference = $this->receiptLineReference ?? [];
        $receiptLineReference = reset($receiptLineReference);

        if (false === $receiptLineReference) {
            return null;
        }

        return $receiptLineReference;
    }

    /**
     * @return null|ReceiptLineReference
     */
    public function lastReceiptLineReference(): ?ReceiptLineReference
    {
        $receiptLineReference = $this->receiptLineReference ?? [];
        $receiptLineReference = end($receiptLineReference);

        if (false === $receiptLineReference) {
            return null;
        }

        return $receiptLineReference;
    }

    /**
     * @param  ReceiptLineReference $receiptLineReference
     * @return static
     */
    public function addToReceiptLineReference(
        ReceiptLineReference $receiptLineReference
    ): static {
        $this->receiptLineReference[] = $receiptLineReference;

        return $this;
    }

    /**
     * @return ReceiptLineReference
     */
    public function addToReceiptLineReferenceWithCreate(): ReceiptLineReference
    {
        $this->addToReceiptLineReference($receiptLineReference = new ReceiptLineReference());

        return $receiptLineReference;
    }

    /**
     * @param  ReceiptLineReference $receiptLineReference
     * @return static
     */
    public function addOnceToReceiptLineReference(
        ReceiptLineReference $receiptLineReference
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->receiptLineReference)) {
            $this->receiptLineReference = [];
        }

        $this->receiptLineReference[0] = $receiptLineReference;

        return $this;
    }

    /**
     * @return ReceiptLineReference
     */
    public function addOnceToReceiptLineReferenceWithCreate(): ReceiptLineReference
    {
        if (!InvoiceSuiteArrayUtils::is($this->receiptLineReference)) {
            $this->receiptLineReference = [];
        }

        if ([] === $this->receiptLineReference) {
            $this->addOnceToReceiptLineReference(new ReceiptLineReference());
        }

        return $this->receiptLineReference[0];
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
        if (!InvoiceSuiteArrayUtils::is($this->documentReference)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->documentReference)) {
            $this->documentReference = [];
        }

        if ([] === $this->documentReference) {
            $this->addOnceToDocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
    }

    /**
     * @return null|PricingReference
     */
    public function getPricingReference(): ?PricingReference
    {
        return $this->pricingReference;
    }

    /**
     * @return PricingReference
     */
    public function getPricingReferenceWithCreate(): PricingReference
    {
        $this->pricingReference ??= new PricingReference();

        return $this->pricingReference;
    }

    /**
     * @param  null|PricingReference $pricingReference
     * @return static
     */
    public function setPricingReference(
        ?PricingReference $pricingReference = null
    ): static {
        $this->pricingReference = $pricingReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPricingReference(): static
    {
        $this->pricingReference = null;

        return $this;
    }

    /**
     * @return null|array<Delivery>
     */
    public function getDelivery(): ?array
    {
        return $this->delivery;
    }

    /**
     * @param  null|array<Delivery> $delivery
     * @return static
     */
    public function setDelivery(
        ?array $delivery = null
    ): static {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDelivery(): static
    {
        $this->delivery = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDelivery(): static
    {
        $this->delivery = [];

        return $this;
    }

    /**
     * @return null|Delivery
     */
    public function firstDelivery(): ?Delivery
    {
        $delivery = $this->delivery ?? [];
        $delivery = reset($delivery);

        if (false === $delivery) {
            return null;
        }

        return $delivery;
    }

    /**
     * @return null|Delivery
     */
    public function lastDelivery(): ?Delivery
    {
        $delivery = $this->delivery ?? [];
        $delivery = end($delivery);

        if (false === $delivery) {
            return null;
        }

        return $delivery;
    }

    /**
     * @param  Delivery $delivery
     * @return static
     */
    public function addToDelivery(
        Delivery $delivery
    ): static {
        $this->delivery[] = $delivery;

        return $this;
    }

    /**
     * @return Delivery
     */
    public function addToDeliveryWithCreate(): Delivery
    {
        $this->addToDelivery($delivery = new Delivery());

        return $delivery;
    }

    /**
     * @param  Delivery $delivery
     * @return static
     */
    public function addOnceToDelivery(
        Delivery $delivery
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->delivery)) {
            $this->delivery = [];
        }

        $this->delivery[0] = $delivery;

        return $this;
    }

    /**
     * @return Delivery
     */
    public function addOnceToDeliveryWithCreate(): Delivery
    {
        if (!InvoiceSuiteArrayUtils::is($this->delivery)) {
            $this->delivery = [];
        }

        if ([] === $this->delivery) {
            $this->addOnceToDelivery(new Delivery());
        }

        return $this->delivery[0];
    }

    /**
     * @return null|array<TaxTotal>
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param  null|array<TaxTotal> $taxTotal
     * @return static
     */
    public function setTaxTotal(
        ?array $taxTotal = null
    ): static {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxTotal(): static
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxTotal(): static
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @return null|TaxTotal
     */
    public function firstTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = reset($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @return null|TaxTotal
     */
    public function lastTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = end($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addToTaxTotal(
        TaxTotal $taxTotal
    ): static {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addToTaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addOnceToTaxTotal(
        TaxTotal $taxTotal
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!InvoiceSuiteArrayUtils::is($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ([] === $this->taxTotal) {
            $this->addOnceToTaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
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
        if (!InvoiceSuiteArrayUtils::is($this->allowanceCharge)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ([] === $this->allowanceCharge) {
            $this->addOnceToAllowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return null|Item
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @return Item
     */
    public function getItemWithCreate(): Item
    {
        $this->item ??= new Item();

        return $this->item;
    }

    /**
     * @param  null|Item $item
     * @return static
     */
    public function setItem(
        ?Item $item = null
    ): static {
        $this->item = $item;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItem(): static
    {
        $this->item = null;

        return $this;
    }

    /**
     * @return null|Price
     */
    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @return Price
     */
    public function getPriceWithCreate(): Price
    {
        $this->price ??= new Price();

        return $this->price;
    }

    /**
     * @param  null|Price $price
     * @return static
     */
    public function setPrice(
        ?Price $price = null
    ): static {
        $this->price = $price;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrice(): static
    {
        $this->price = null;

        return $this;
    }

    /**
     * @return null|array<SubDebitNoteLine>
     */
    public function getSubDebitNoteLine(): ?array
    {
        return $this->subDebitNoteLine;
    }

    /**
     * @param  null|array<SubDebitNoteLine> $subDebitNoteLine
     * @return static
     */
    public function setSubDebitNoteLine(
        ?array $subDebitNoteLine = null
    ): static {
        $this->subDebitNoteLine = $subDebitNoteLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubDebitNoteLine(): static
    {
        $this->subDebitNoteLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSubDebitNoteLine(): static
    {
        $this->subDebitNoteLine = [];

        return $this;
    }

    /**
     * @return null|SubDebitNoteLine
     */
    public function firstSubDebitNoteLine(): ?SubDebitNoteLine
    {
        $subDebitNoteLine = $this->subDebitNoteLine ?? [];
        $subDebitNoteLine = reset($subDebitNoteLine);

        if (false === $subDebitNoteLine) {
            return null;
        }

        return $subDebitNoteLine;
    }

    /**
     * @return null|SubDebitNoteLine
     */
    public function lastSubDebitNoteLine(): ?SubDebitNoteLine
    {
        $subDebitNoteLine = $this->subDebitNoteLine ?? [];
        $subDebitNoteLine = end($subDebitNoteLine);

        if (false === $subDebitNoteLine) {
            return null;
        }

        return $subDebitNoteLine;
    }

    /**
     * @param  SubDebitNoteLine $subDebitNoteLine
     * @return static
     */
    public function addToSubDebitNoteLine(
        SubDebitNoteLine $subDebitNoteLine
    ): static {
        $this->subDebitNoteLine[] = $subDebitNoteLine;

        return $this;
    }

    /**
     * @return SubDebitNoteLine
     */
    public function addToSubDebitNoteLineWithCreate(): SubDebitNoteLine
    {
        $this->addToSubDebitNoteLine($subDebitNoteLine = new SubDebitNoteLine());

        return $subDebitNoteLine;
    }

    /**
     * @param  SubDebitNoteLine $subDebitNoteLine
     * @return static
     */
    public function addOnceToSubDebitNoteLine(
        SubDebitNoteLine $subDebitNoteLine
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->subDebitNoteLine)) {
            $this->subDebitNoteLine = [];
        }

        $this->subDebitNoteLine[0] = $subDebitNoteLine;

        return $this;
    }

    /**
     * @return SubDebitNoteLine
     */
    public function addOnceToSubDebitNoteLineWithCreate(): SubDebitNoteLine
    {
        if (!InvoiceSuiteArrayUtils::is($this->subDebitNoteLine)) {
            $this->subDebitNoteLine = [];
        }

        if ([] === $this->subDebitNoteLine) {
            $this->addOnceToSubDebitNoteLine(new SubDebitNoteLine());
        }

        return $this->subDebitNoteLine[0];
    }
}
