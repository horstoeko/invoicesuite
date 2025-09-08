<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\BalanceAmount;
use horstoeko\invoicesuite\models\ubl\cbc\CreditLineAmount;
use horstoeko\invoicesuite\models\ubl\cbc\DebitLineAmount;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\Note;
use horstoeko\invoicesuite\models\ubl\cbc\PaymentPurposeCode;
use horstoeko\invoicesuite\models\ubl\cbc\UUID;

class StatementLineType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BalanceAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BalanceAmount")
     * @JMS\Expose
     * @JMS\SerializedName("BalanceAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBalanceAmount", setter="setBalanceAmount")
     */
    private $balanceAmount;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\PaymentMeans|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PaymentMeans")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentMeans", setter="setPaymentMeans")
     */
    private $paymentMeans;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PaymentTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PaymentTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentTerms", setter="setPaymentTerms")
     */
    private $paymentTerms;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerCustomerParty", setter="setBuyerCustomerParty")
     */
    private $buyerCustomerParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SellerSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerSupplierParty", setter="setSellerSupplierParty")
     */
    private $sellerSupplierParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\OriginatorCustomerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\OriginatorCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("OriginatorCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginatorCustomerParty", setter="setOriginatorCustomerParty")
     */
    private $originatorCustomerParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AccountingCustomerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AccountingCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCustomerParty", setter="setAccountingCustomerParty")
     */
    private $accountingCustomerParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AccountingSupplierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AccountingSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingSupplierParty", setter="setAccountingSupplierParty")
     */
    private $accountingSupplierParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\PayeeParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PayeeParty")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayeeParty", setter="setPayeeParty")
     */
    private $payeeParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoicePeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getInvoicePeriod", setter="setInvoicePeriod")
     */
    private $invoicePeriod;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\CollectedPayment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\CollectedPayment>")
     * @JMS\Expose
     * @JMS\SerializedName("CollectedPayment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CollectedPayment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCollectedPayment", setter="setCollectedPayment")
     */
    private $collectedPayment;

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
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

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
    public function unsetNote(): self
    {
        $this->note = null;

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
     * @return self
     */
    public function unsetUUID(): self
    {
        $this->uUID = null;

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
     * @return self
     */
    public function unsetBalanceBroughtForwardIndicator(): self
    {
        $this->balanceBroughtForwardIndicator = null;

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
     * @return self
     */
    public function unsetDebitLineAmount(): self
    {
        $this->debitLineAmount = null;

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
     * @return self
     */
    public function unsetCreditLineAmount(): self
    {
        $this->creditLineAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BalanceAmount|null
     */
    public function getBalanceAmount(): ?BalanceAmount
    {
        return $this->balanceAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BalanceAmount
     */
    public function getBalanceAmountWithCreate(): BalanceAmount
    {
        $this->balanceAmount = is_null($this->balanceAmount) ? new BalanceAmount() : $this->balanceAmount;

        return $this->balanceAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BalanceAmount|null $balanceAmount
     * @return self
     */
    public function setBalanceAmount(?BalanceAmount $balanceAmount = null): self
    {
        $this->balanceAmount = $balanceAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBalanceAmount(): self
    {
        $this->balanceAmount = null;

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
     * @return self
     */
    public function unsetPaymentPurposeCode(): self
    {
        $this->paymentPurposeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PaymentMeans|null
     */
    public function getPaymentMeans(): ?PaymentMeans
    {
        return $this->paymentMeans;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PaymentMeans
     */
    public function getPaymentMeansWithCreate(): PaymentMeans
    {
        $this->paymentMeans = is_null($this->paymentMeans) ? new PaymentMeans() : $this->paymentMeans;

        return $this->paymentMeans;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PaymentMeans|null $paymentMeans
     * @return self
     */
    public function setPaymentMeans(?PaymentMeans $paymentMeans = null): self
    {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentMeans(): self
    {
        $this->paymentMeans = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PaymentTerms>|null
     */
    public function getPaymentTerms(): ?array
    {
        return $this->paymentTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PaymentTerms>|null $paymentTerms
     * @return self
     */
    public function setPaymentTerms(?array $paymentTerms = null): self
    {
        $this->paymentTerms = $paymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentTerms(): self
    {
        $this->paymentTerms = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPaymentTerms(): self
    {
        $this->paymentTerms = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PaymentTerms $paymentTerms
     * @return self
     */
    public function addToPaymentTerms(PaymentTerms $paymentTerms): self
    {
        $this->paymentTerms[] = $paymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PaymentTerms
     */
    public function addToPaymentTermsWithCreate(): PaymentTerms
    {
        $this->addTopaymentTerms($paymentTerms = new PaymentTerms());

        return $paymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PaymentTerms $paymentTerms
     * @return self
     */
    public function addOnceToPaymentTerms(PaymentTerms $paymentTerms): self
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        $this->paymentTerms[0] = $paymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PaymentTerms
     */
    public function addOnceToPaymentTermsWithCreate(): PaymentTerms
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        if ($this->paymentTerms === []) {
            $this->addOnceTopaymentTerms(new PaymentTerms());
        }

        return $this->paymentTerms[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty|null
     */
    public function getBuyerCustomerParty(): ?BuyerCustomerParty
    {
        return $this->buyerCustomerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty
     */
    public function getBuyerCustomerPartyWithCreate(): BuyerCustomerParty
    {
        $this->buyerCustomerParty = is_null($this->buyerCustomerParty) ? new BuyerCustomerParty() : $this->buyerCustomerParty;

        return $this->buyerCustomerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty|null $buyerCustomerParty
     * @return self
     */
    public function setBuyerCustomerParty(?BuyerCustomerParty $buyerCustomerParty = null): self
    {
        $this->buyerCustomerParty = $buyerCustomerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBuyerCustomerParty(): self
    {
        $this->buyerCustomerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty|null
     */
    public function getSellerSupplierParty(): ?SellerSupplierParty
    {
        return $this->sellerSupplierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty
     */
    public function getSellerSupplierPartyWithCreate(): SellerSupplierParty
    {
        $this->sellerSupplierParty = is_null($this->sellerSupplierParty) ? new SellerSupplierParty() : $this->sellerSupplierParty;

        return $this->sellerSupplierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty|null $sellerSupplierParty
     * @return self
     */
    public function setSellerSupplierParty(?SellerSupplierParty $sellerSupplierParty = null): self
    {
        $this->sellerSupplierParty = $sellerSupplierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSellerSupplierParty(): self
    {
        $this->sellerSupplierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OriginatorCustomerParty|null
     */
    public function getOriginatorCustomerParty(): ?OriginatorCustomerParty
    {
        return $this->originatorCustomerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OriginatorCustomerParty
     */
    public function getOriginatorCustomerPartyWithCreate(): OriginatorCustomerParty
    {
        $this->originatorCustomerParty = is_null($this->originatorCustomerParty) ? new OriginatorCustomerParty() : $this->originatorCustomerParty;

        return $this->originatorCustomerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OriginatorCustomerParty|null $originatorCustomerParty
     * @return self
     */
    public function setOriginatorCustomerParty(?OriginatorCustomerParty $originatorCustomerParty = null): self
    {
        $this->originatorCustomerParty = $originatorCustomerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOriginatorCustomerParty(): self
    {
        $this->originatorCustomerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AccountingCustomerParty|null
     */
    public function getAccountingCustomerParty(): ?AccountingCustomerParty
    {
        return $this->accountingCustomerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AccountingCustomerParty
     */
    public function getAccountingCustomerPartyWithCreate(): AccountingCustomerParty
    {
        $this->accountingCustomerParty = is_null($this->accountingCustomerParty) ? new AccountingCustomerParty() : $this->accountingCustomerParty;

        return $this->accountingCustomerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AccountingCustomerParty|null $accountingCustomerParty
     * @return self
     */
    public function setAccountingCustomerParty(?AccountingCustomerParty $accountingCustomerParty = null): self
    {
        $this->accountingCustomerParty = $accountingCustomerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccountingCustomerParty(): self
    {
        $this->accountingCustomerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AccountingSupplierParty|null
     */
    public function getAccountingSupplierParty(): ?AccountingSupplierParty
    {
        return $this->accountingSupplierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AccountingSupplierParty
     */
    public function getAccountingSupplierPartyWithCreate(): AccountingSupplierParty
    {
        $this->accountingSupplierParty = is_null($this->accountingSupplierParty) ? new AccountingSupplierParty() : $this->accountingSupplierParty;

        return $this->accountingSupplierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AccountingSupplierParty|null $accountingSupplierParty
     * @return self
     */
    public function setAccountingSupplierParty(?AccountingSupplierParty $accountingSupplierParty = null): self
    {
        $this->accountingSupplierParty = $accountingSupplierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccountingSupplierParty(): self
    {
        $this->accountingSupplierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PayeeParty|null
     */
    public function getPayeeParty(): ?PayeeParty
    {
        return $this->payeeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PayeeParty
     */
    public function getPayeePartyWithCreate(): PayeeParty
    {
        $this->payeeParty = is_null($this->payeeParty) ? new PayeeParty() : $this->payeeParty;

        return $this->payeeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PayeeParty|null $payeeParty
     * @return self
     */
    public function setPayeeParty(?PayeeParty $payeeParty = null): self
    {
        $this->payeeParty = $payeeParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayeeParty(): self
    {
        $this->payeeParty = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod>|null
     */
    public function getInvoicePeriod(): ?array
    {
        return $this->invoicePeriod;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod>|null $invoicePeriod
     * @return self
     */
    public function setInvoicePeriod(?array $invoicePeriod = null): self
    {
        $this->invoicePeriod = $invoicePeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoicePeriod(): self
    {
        $this->invoicePeriod = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInvoicePeriod(): self
    {
        $this->invoicePeriod = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod $invoicePeriod
     * @return self
     */
    public function addToInvoicePeriod(InvoicePeriod $invoicePeriod): self
    {
        $this->invoicePeriod[] = $invoicePeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod
     */
    public function addToInvoicePeriodWithCreate(): InvoicePeriod
    {
        $this->addToinvoicePeriod($invoicePeriod = new InvoicePeriod());

        return $invoicePeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod $invoicePeriod
     * @return self
     */
    public function addOnceToInvoicePeriod(InvoicePeriod $invoicePeriod): self
    {
        if (!is_array($this->invoicePeriod)) {
            $this->invoicePeriod = [];
        }

        $this->invoicePeriod[0] = $invoicePeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod
     */
    public function addOnceToInvoicePeriodWithCreate(): InvoicePeriod
    {
        if (!is_array($this->invoicePeriod)) {
            $this->invoicePeriod = [];
        }

        if ($this->invoicePeriod === []) {
            $this->addOnceToinvoicePeriod(new InvoicePeriod());
        }

        return $this->invoicePeriod[0];
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
    public function unsetBillingReference(): self
    {
        $this->billingReference = null;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DocumentReference>|null
     */
    public function getDocumentReference(): ?array
    {
        return $this->documentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DocumentReference>|null $documentReference
     * @return self
     */
    public function setDocumentReference(?array $documentReference = null): self
    {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDocumentReference(): self
    {
        $this->documentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDocumentReference(): self
    {
        $this->documentReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentReference $documentReference
     * @return self
     */
    public function addToDocumentReference(DocumentReference $documentReference): self
    {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addTodocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentReference $documentReference
     * @return self
     */
    public function addOnceToDocumentReference(DocumentReference $documentReference): self
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        $this->documentReference[0] = $documentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentReference
     */
    public function addOnceToDocumentReferenceWithCreate(): DocumentReference
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        if ($this->documentReference === []) {
            $this->addOnceTodocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
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

    /**
     * @return self
     */
    public function unsetExchangeRate(): self
    {
        $this->exchangeRate = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null $allowanceCharge
     * @return self
     */
    public function setAllowanceCharge(?array $allowanceCharge = null): self
    {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAllowanceCharge(): self
    {
        $this->allowanceCharge = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAllowanceCharge(): self
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addOnceToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ($this->allowanceCharge === []) {
            $this->addOnceToallowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\CollectedPayment>|null
     */
    public function getCollectedPayment(): ?array
    {
        return $this->collectedPayment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\CollectedPayment>|null $collectedPayment
     * @return self
     */
    public function setCollectedPayment(?array $collectedPayment = null): self
    {
        $this->collectedPayment = $collectedPayment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCollectedPayment(): self
    {
        $this->collectedPayment = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCollectedPayment(): self
    {
        $this->collectedPayment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CollectedPayment $collectedPayment
     * @return self
     */
    public function addToCollectedPayment(CollectedPayment $collectedPayment): self
    {
        $this->collectedPayment[] = $collectedPayment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CollectedPayment
     */
    public function addToCollectedPaymentWithCreate(): CollectedPayment
    {
        $this->addTocollectedPayment($collectedPayment = new CollectedPayment());

        return $collectedPayment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CollectedPayment $collectedPayment
     * @return self
     */
    public function addOnceToCollectedPayment(CollectedPayment $collectedPayment): self
    {
        if (!is_array($this->collectedPayment)) {
            $this->collectedPayment = [];
        }

        $this->collectedPayment[0] = $collectedPayment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CollectedPayment
     */
    public function addOnceToCollectedPaymentWithCreate(): CollectedPayment
    {
        if (!is_array($this->collectedPayment)) {
            $this->collectedPayment = [];
        }

        if ($this->collectedPayment === []) {
            $this->addOnceTocollectedPayment(new CollectedPayment());
        }

        return $this->collectedPayment[0];
    }
}
