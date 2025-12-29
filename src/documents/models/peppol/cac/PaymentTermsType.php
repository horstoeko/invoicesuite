<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Amount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\InvoicingPartyReference;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Note;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentMeansID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentPercent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentTermsDetailsURI;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PenaltyAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PenaltySurchargePercent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PrepaidPaymentReferenceID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ReferenceEventCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SettlementDiscountAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SettlementDiscountPercent;
use JMS\Serializer\Annotation as JMS;

class PaymentTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|array<PaymentMeansID>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentMeansID>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentMeansID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentMeansID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPaymentMeansID", setter="setPaymentMeansID")
     */
    private $paymentMeansID;

    /**
     * @var null|PrepaidPaymentReferenceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PrepaidPaymentReferenceID")
     * @JMS\Expose
     * @JMS\SerializedName("PrepaidPaymentReferenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrepaidPaymentReferenceID", setter="setPrepaidPaymentReferenceID")
     */
    private $prepaidPaymentReferenceID;

    /**
     * @var null|array<Note>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var null|ReferenceEventCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ReferenceEventCode")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceEventCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceEventCode", setter="setReferenceEventCode")
     */
    private $referenceEventCode;

    /**
     * @var null|SettlementDiscountPercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SettlementDiscountPercent")
     * @JMS\Expose
     * @JMS\SerializedName("SettlementDiscountPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSettlementDiscountPercent", setter="setSettlementDiscountPercent")
     */
    private $settlementDiscountPercent;

    /**
     * @var null|PenaltySurchargePercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PenaltySurchargePercent")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltySurchargePercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPenaltySurchargePercent", setter="setPenaltySurchargePercent")
     */
    private $penaltySurchargePercent;

    /**
     * @var null|PaymentPercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentPercent")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentPercent", setter="setPaymentPercent")
     */
    private $paymentPercent;

    /**
     * @var null|Amount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Amount")
     * @JMS\Expose
     * @JMS\SerializedName("Amount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmount", setter="setAmount")
     */
    private $amount;

    /**
     * @var null|SettlementDiscountAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SettlementDiscountAmount")
     * @JMS\Expose
     * @JMS\SerializedName("SettlementDiscountAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSettlementDiscountAmount", setter="setSettlementDiscountAmount")
     */
    private $settlementDiscountAmount;

    /**
     * @var null|PenaltyAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PenaltyAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltyAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPenaltyAmount", setter="setPenaltyAmount")
     */
    private $penaltyAmount;

    /**
     * @var null|PaymentTermsDetailsURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentTermsDetailsURI")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTermsDetailsURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentTermsDetailsURI", setter="setPaymentTermsDetailsURI")
     */
    private $paymentTermsDetailsURI;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentDueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentDueDate", setter="setPaymentDueDate")
     */
    private $paymentDueDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("InstallmentDueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInstallmentDueDate", setter="setInstallmentDueDate")
     */
    private $installmentDueDate;

    /**
     * @var null|InvoicingPartyReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\InvoicingPartyReference")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicingPartyReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInvoicingPartyReference", setter="setInvoicingPartyReference")
     */
    private $invoicingPartyReference;

    /**
     * @var null|SettlementPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SettlementPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("SettlementPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSettlementPeriod", setter="setSettlementPeriod")
     */
    private $settlementPeriod;

    /**
     * @var null|PenaltyPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PenaltyPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltyPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPenaltyPeriod", setter="setPenaltyPeriod")
     */
    private $penaltyPeriod;

    /**
     * @var null|ExchangeRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExchangeRate", setter="setExchangeRate")
     */
    private $exchangeRate;

    /**
     * @var null|ValidityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

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
     * @return null|array<PaymentMeansID>
     */
    public function getPaymentMeansID(): ?array
    {
        return $this->paymentMeansID;
    }

    /**
     * @param  null|array<PaymentMeansID> $paymentMeansID
     * @return static
     */
    public function setPaymentMeansID(?array $paymentMeansID = null): static
    {
        $this->paymentMeansID = $paymentMeansID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentMeansID(): static
    {
        $this->paymentMeansID = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPaymentMeansID(): static
    {
        $this->paymentMeansID = [];

        return $this;
    }

    /**
     * @return null|PaymentMeansID
     */
    public function firstPaymentMeansID(): ?PaymentMeansID
    {
        $paymentMeansID = $this->paymentMeansID ?? [];
        $paymentMeansID = reset($paymentMeansID);

        if (false === $paymentMeansID) {
            return null;
        }

        return $paymentMeansID;
    }

    /**
     * @return null|PaymentMeansID
     */
    public function lastPaymentMeansID(): ?PaymentMeansID
    {
        $paymentMeansID = $this->paymentMeansID ?? [];
        $paymentMeansID = end($paymentMeansID);

        if (false === $paymentMeansID) {
            return null;
        }

        return $paymentMeansID;
    }

    /**
     * @param  PaymentMeansID $paymentMeansID
     * @return static
     */
    public function addToPaymentMeansID(PaymentMeansID $paymentMeansID): static
    {
        $this->paymentMeansID[] = $paymentMeansID;

        return $this;
    }

    /**
     * @return PaymentMeansID
     */
    public function addToPaymentMeansIDWithCreate(): PaymentMeansID
    {
        $this->addTopaymentMeansID($paymentMeansID = new PaymentMeansID());

        return $paymentMeansID;
    }

    /**
     * @param  PaymentMeansID $paymentMeansID
     * @return static
     */
    public function addOnceToPaymentMeansID(PaymentMeansID $paymentMeansID): static
    {
        if (!is_array($this->paymentMeansID)) {
            $this->paymentMeansID = [];
        }

        $this->paymentMeansID[0] = $paymentMeansID;

        return $this;
    }

    /**
     * @return PaymentMeansID
     */
    public function addOnceToPaymentMeansIDWithCreate(): PaymentMeansID
    {
        if (!is_array($this->paymentMeansID)) {
            $this->paymentMeansID = [];
        }

        if ([] === $this->paymentMeansID) {
            $this->addOnceTopaymentMeansID(new PaymentMeansID());
        }

        return $this->paymentMeansID[0];
    }

    /**
     * @return null|PrepaidPaymentReferenceID
     */
    public function getPrepaidPaymentReferenceID(): ?PrepaidPaymentReferenceID
    {
        return $this->prepaidPaymentReferenceID;
    }

    /**
     * @return PrepaidPaymentReferenceID
     */
    public function getPrepaidPaymentReferenceIDWithCreate(): PrepaidPaymentReferenceID
    {
        $this->prepaidPaymentReferenceID = is_null($this->prepaidPaymentReferenceID) ? new PrepaidPaymentReferenceID() : $this->prepaidPaymentReferenceID;

        return $this->prepaidPaymentReferenceID;
    }

    /**
     * @param  null|PrepaidPaymentReferenceID $prepaidPaymentReferenceID
     * @return static
     */
    public function setPrepaidPaymentReferenceID(?PrepaidPaymentReferenceID $prepaidPaymentReferenceID = null): static
    {
        $this->prepaidPaymentReferenceID = $prepaidPaymentReferenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrepaidPaymentReferenceID(): static
    {
        $this->prepaidPaymentReferenceID = null;

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
    public function setNote(?array $note = null): static
    {
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
    public function addToNote(Note $note): static
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(Note $note): static
    {
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
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return null|ReferenceEventCode
     */
    public function getReferenceEventCode(): ?ReferenceEventCode
    {
        return $this->referenceEventCode;
    }

    /**
     * @return ReferenceEventCode
     */
    public function getReferenceEventCodeWithCreate(): ReferenceEventCode
    {
        $this->referenceEventCode = is_null($this->referenceEventCode) ? new ReferenceEventCode() : $this->referenceEventCode;

        return $this->referenceEventCode;
    }

    /**
     * @param  null|ReferenceEventCode $referenceEventCode
     * @return static
     */
    public function setReferenceEventCode(?ReferenceEventCode $referenceEventCode = null): static
    {
        $this->referenceEventCode = $referenceEventCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferenceEventCode(): static
    {
        $this->referenceEventCode = null;

        return $this;
    }

    /**
     * @return null|SettlementDiscountPercent
     */
    public function getSettlementDiscountPercent(): ?SettlementDiscountPercent
    {
        return $this->settlementDiscountPercent;
    }

    /**
     * @return SettlementDiscountPercent
     */
    public function getSettlementDiscountPercentWithCreate(): SettlementDiscountPercent
    {
        $this->settlementDiscountPercent = is_null($this->settlementDiscountPercent) ? new SettlementDiscountPercent() : $this->settlementDiscountPercent;

        return $this->settlementDiscountPercent;
    }

    /**
     * @param  null|SettlementDiscountPercent $settlementDiscountPercent
     * @return static
     */
    public function setSettlementDiscountPercent(?SettlementDiscountPercent $settlementDiscountPercent = null): static
    {
        $this->settlementDiscountPercent = $settlementDiscountPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSettlementDiscountPercent(): static
    {
        $this->settlementDiscountPercent = null;

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
        $this->penaltySurchargePercent = is_null($this->penaltySurchargePercent) ? new PenaltySurchargePercent() : $this->penaltySurchargePercent;

        return $this->penaltySurchargePercent;
    }

    /**
     * @param  null|PenaltySurchargePercent $penaltySurchargePercent
     * @return static
     */
    public function setPenaltySurchargePercent(?PenaltySurchargePercent $penaltySurchargePercent = null): static
    {
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
     * @return null|PaymentPercent
     */
    public function getPaymentPercent(): ?PaymentPercent
    {
        return $this->paymentPercent;
    }

    /**
     * @return PaymentPercent
     */
    public function getPaymentPercentWithCreate(): PaymentPercent
    {
        $this->paymentPercent = is_null($this->paymentPercent) ? new PaymentPercent() : $this->paymentPercent;

        return $this->paymentPercent;
    }

    /**
     * @param  null|PaymentPercent $paymentPercent
     * @return static
     */
    public function setPaymentPercent(?PaymentPercent $paymentPercent = null): static
    {
        $this->paymentPercent = $paymentPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentPercent(): static
    {
        $this->paymentPercent = null;

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
        $this->amount = is_null($this->amount) ? new Amount() : $this->amount;

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(?Amount $amount = null): static
    {
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
     * @return null|SettlementDiscountAmount
     */
    public function getSettlementDiscountAmount(): ?SettlementDiscountAmount
    {
        return $this->settlementDiscountAmount;
    }

    /**
     * @return SettlementDiscountAmount
     */
    public function getSettlementDiscountAmountWithCreate(): SettlementDiscountAmount
    {
        $this->settlementDiscountAmount = is_null($this->settlementDiscountAmount) ? new SettlementDiscountAmount() : $this->settlementDiscountAmount;

        return $this->settlementDiscountAmount;
    }

    /**
     * @param  null|SettlementDiscountAmount $settlementDiscountAmount
     * @return static
     */
    public function setSettlementDiscountAmount(?SettlementDiscountAmount $settlementDiscountAmount = null): static
    {
        $this->settlementDiscountAmount = $settlementDiscountAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSettlementDiscountAmount(): static
    {
        $this->settlementDiscountAmount = null;

        return $this;
    }

    /**
     * @return null|PenaltyAmount
     */
    public function getPenaltyAmount(): ?PenaltyAmount
    {
        return $this->penaltyAmount;
    }

    /**
     * @return PenaltyAmount
     */
    public function getPenaltyAmountWithCreate(): PenaltyAmount
    {
        $this->penaltyAmount = is_null($this->penaltyAmount) ? new PenaltyAmount() : $this->penaltyAmount;

        return $this->penaltyAmount;
    }

    /**
     * @param  null|PenaltyAmount $penaltyAmount
     * @return static
     */
    public function setPenaltyAmount(?PenaltyAmount $penaltyAmount = null): static
    {
        $this->penaltyAmount = $penaltyAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPenaltyAmount(): static
    {
        $this->penaltyAmount = null;

        return $this;
    }

    /**
     * @return null|PaymentTermsDetailsURI
     */
    public function getPaymentTermsDetailsURI(): ?PaymentTermsDetailsURI
    {
        return $this->paymentTermsDetailsURI;
    }

    /**
     * @return PaymentTermsDetailsURI
     */
    public function getPaymentTermsDetailsURIWithCreate(): PaymentTermsDetailsURI
    {
        $this->paymentTermsDetailsURI = is_null($this->paymentTermsDetailsURI) ? new PaymentTermsDetailsURI() : $this->paymentTermsDetailsURI;

        return $this->paymentTermsDetailsURI;
    }

    /**
     * @param  null|PaymentTermsDetailsURI $paymentTermsDetailsURI
     * @return static
     */
    public function setPaymentTermsDetailsURI(?PaymentTermsDetailsURI $paymentTermsDetailsURI = null): static
    {
        $this->paymentTermsDetailsURI = $paymentTermsDetailsURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentTermsDetailsURI(): static
    {
        $this->paymentTermsDetailsURI = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getPaymentDueDate(): ?DateTimeInterface
    {
        return $this->paymentDueDate;
    }

    /**
     * @param  null|DateTimeInterface $paymentDueDate
     * @return static
     */
    public function setPaymentDueDate(?DateTimeInterface $paymentDueDate = null): static
    {
        $this->paymentDueDate = $paymentDueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentDueDate(): static
    {
        $this->paymentDueDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getInstallmentDueDate(): ?DateTimeInterface
    {
        return $this->installmentDueDate;
    }

    /**
     * @param  null|DateTimeInterface $installmentDueDate
     * @return static
     */
    public function setInstallmentDueDate(?DateTimeInterface $installmentDueDate = null): static
    {
        $this->installmentDueDate = $installmentDueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInstallmentDueDate(): static
    {
        $this->installmentDueDate = null;

        return $this;
    }

    /**
     * @return null|InvoicingPartyReference
     */
    public function getInvoicingPartyReference(): ?InvoicingPartyReference
    {
        return $this->invoicingPartyReference;
    }

    /**
     * @return InvoicingPartyReference
     */
    public function getInvoicingPartyReferenceWithCreate(): InvoicingPartyReference
    {
        $this->invoicingPartyReference = is_null($this->invoicingPartyReference) ? new InvoicingPartyReference() : $this->invoicingPartyReference;

        return $this->invoicingPartyReference;
    }

    /**
     * @param  null|InvoicingPartyReference $invoicingPartyReference
     * @return static
     */
    public function setInvoicingPartyReference(?InvoicingPartyReference $invoicingPartyReference = null): static
    {
        $this->invoicingPartyReference = $invoicingPartyReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoicingPartyReference(): static
    {
        $this->invoicingPartyReference = null;

        return $this;
    }

    /**
     * @return null|SettlementPeriod
     */
    public function getSettlementPeriod(): ?SettlementPeriod
    {
        return $this->settlementPeriod;
    }

    /**
     * @return SettlementPeriod
     */
    public function getSettlementPeriodWithCreate(): SettlementPeriod
    {
        $this->settlementPeriod = is_null($this->settlementPeriod) ? new SettlementPeriod() : $this->settlementPeriod;

        return $this->settlementPeriod;
    }

    /**
     * @param  null|SettlementPeriod $settlementPeriod
     * @return static
     */
    public function setSettlementPeriod(?SettlementPeriod $settlementPeriod = null): static
    {
        $this->settlementPeriod = $settlementPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSettlementPeriod(): static
    {
        $this->settlementPeriod = null;

        return $this;
    }

    /**
     * @return null|PenaltyPeriod
     */
    public function getPenaltyPeriod(): ?PenaltyPeriod
    {
        return $this->penaltyPeriod;
    }

    /**
     * @return PenaltyPeriod
     */
    public function getPenaltyPeriodWithCreate(): PenaltyPeriod
    {
        $this->penaltyPeriod = is_null($this->penaltyPeriod) ? new PenaltyPeriod() : $this->penaltyPeriod;

        return $this->penaltyPeriod;
    }

    /**
     * @param  null|PenaltyPeriod $penaltyPeriod
     * @return static
     */
    public function setPenaltyPeriod(?PenaltyPeriod $penaltyPeriod = null): static
    {
        $this->penaltyPeriod = $penaltyPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPenaltyPeriod(): static
    {
        $this->penaltyPeriod = null;

        return $this;
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
        $this->exchangeRate = is_null($this->exchangeRate) ? new ExchangeRate() : $this->exchangeRate;

        return $this->exchangeRate;
    }

    /**
     * @param  null|ExchangeRate $exchangeRate
     * @return static
     */
    public function setExchangeRate(?ExchangeRate $exchangeRate = null): static
    {
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
     * @return null|ValidityPeriod
     */
    public function getValidityPeriod(): ?ValidityPeriod
    {
        return $this->validityPeriod;
    }

    /**
     * @return ValidityPeriod
     */
    public function getValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->validityPeriod = is_null($this->validityPeriod) ? new ValidityPeriod() : $this->validityPeriod;

        return $this->validityPeriod;
    }

    /**
     * @param  null|ValidityPeriod $validityPeriod
     * @return static
     */
    public function setValidityPeriod(?ValidityPeriod $validityPeriod = null): static
    {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidityPeriod(): static
    {
        $this->validityPeriod = null;

        return $this;
    }
}
