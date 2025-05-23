<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Amount;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\InvoicingPartyReference;
use horstoeko\invoicesuite\models\ubl\cbc\Note;
use horstoeko\invoicesuite\models\ubl\cbc\PaymentMeansID;
use horstoeko\invoicesuite\models\ubl\cbc\PaymentPercent;
use horstoeko\invoicesuite\models\ubl\cbc\PaymentTermsDetailsURI;
use horstoeko\invoicesuite\models\ubl\cbc\PenaltyAmount;
use horstoeko\invoicesuite\models\ubl\cbc\PenaltySurchargePercent;
use horstoeko\invoicesuite\models\ubl\cbc\PrepaidPaymentReferenceID;
use horstoeko\invoicesuite\models\ubl\cbc\ReferenceEventCode;
use horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountAmount;
use horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountPercent;

class PaymentTermsType
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
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\PaymentMeansID>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\PaymentMeansID>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentMeansID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentMeansID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPaymentMeansID", setter="setPaymentMeansID")
     */
    private $paymentMeansID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PrepaidPaymentReferenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PrepaidPaymentReferenceID")
     * @JMS\Expose
     * @JMS\SerializedName("PrepaidPaymentReferenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrepaidPaymentReferenceID", setter="setPrepaidPaymentReferenceID")
     */
    private $prepaidPaymentReferenceID;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ReferenceEventCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ReferenceEventCode")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceEventCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceEventCode", setter="setReferenceEventCode")
     */
    private $referenceEventCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountPercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountPercent")
     * @JMS\Expose
     * @JMS\SerializedName("SettlementDiscountPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSettlementDiscountPercent", setter="setSettlementDiscountPercent")
     */
    private $settlementDiscountPercent;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PaymentPercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PaymentPercent")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentPercent", setter="setPaymentPercent")
     */
    private $paymentPercent;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountAmount")
     * @JMS\Expose
     * @JMS\SerializedName("SettlementDiscountAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSettlementDiscountAmount", setter="setSettlementDiscountAmount")
     */
    private $settlementDiscountAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PenaltyAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PenaltyAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltyAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPenaltyAmount", setter="setPenaltyAmount")
     */
    private $penaltyAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PaymentTermsDetailsURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PaymentTermsDetailsURI")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTermsDetailsURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentTermsDetailsURI", setter="setPaymentTermsDetailsURI")
     */
    private $paymentTermsDetailsURI;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentDueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentDueDate", setter="setPaymentDueDate")
     */
    private $paymentDueDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("InstallmentDueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInstallmentDueDate", setter="setInstallmentDueDate")
     */
    private $installmentDueDate;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\InvoicingPartyReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\InvoicingPartyReference")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicingPartyReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInvoicingPartyReference", setter="setInvoicingPartyReference")
     */
    private $invoicingPartyReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SettlementPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SettlementPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("SettlementPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSettlementPeriod", setter="setSettlementPeriod")
     */
    private $settlementPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\PenaltyPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PenaltyPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltyPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPenaltyPeriod", setter="setPenaltyPeriod")
     */
    private $penaltyPeriod;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\PaymentMeansID>|null
     */
    public function getPaymentMeansID(): ?array
    {
        return $this->paymentMeansID;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\PaymentMeansID>|null $paymentMeansID
     * @return self
     */
    public function setPaymentMeansID(?array $paymentMeansID = null): self
    {
        $this->paymentMeansID = $paymentMeansID;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPaymentMeansID(): self
    {
        $this->paymentMeansID = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PaymentMeansID $paymentMeansID
     * @return self
     */
    public function addToPaymentMeansID(PaymentMeansID $paymentMeansID): self
    {
        $this->paymentMeansID[] = $paymentMeansID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentMeansID
     */
    public function addToPaymentMeansIDWithCreate(): PaymentMeansID
    {
        $this->addTopaymentMeansID($paymentMeansID = new PaymentMeansID());

        return $paymentMeansID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PaymentMeansID $paymentMeansID
     * @return self
     */
    public function addOnceToPaymentMeansID(PaymentMeansID $paymentMeansID): self
    {
        if (!is_array($this->paymentMeansID)) {
            $this->paymentMeansID = [];
        }

        $this->paymentMeansID[0] = $paymentMeansID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentMeansID
     */
    public function addOnceToPaymentMeansIDWithCreate(): PaymentMeansID
    {
        if (!is_array($this->paymentMeansID)) {
            $this->paymentMeansID = [];
        }

        if ($this->paymentMeansID === []) {
            $this->addOnceTopaymentMeansID(new PaymentMeansID());
        }

        return $this->paymentMeansID[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PrepaidPaymentReferenceID|null
     */
    public function getPrepaidPaymentReferenceID(): ?PrepaidPaymentReferenceID
    {
        return $this->prepaidPaymentReferenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PrepaidPaymentReferenceID
     */
    public function getPrepaidPaymentReferenceIDWithCreate(): PrepaidPaymentReferenceID
    {
        $this->prepaidPaymentReferenceID = is_null($this->prepaidPaymentReferenceID) ? new PrepaidPaymentReferenceID() : $this->prepaidPaymentReferenceID;

        return $this->prepaidPaymentReferenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PrepaidPaymentReferenceID|null $prepaidPaymentReferenceID
     * @return self
     */
    public function setPrepaidPaymentReferenceID(?PrepaidPaymentReferenceID $prepaidPaymentReferenceID = null): self
    {
        $this->prepaidPaymentReferenceID = $prepaidPaymentReferenceID;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReferenceEventCode|null
     */
    public function getReferenceEventCode(): ?ReferenceEventCode
    {
        return $this->referenceEventCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReferenceEventCode
     */
    public function getReferenceEventCodeWithCreate(): ReferenceEventCode
    {
        $this->referenceEventCode = is_null($this->referenceEventCode) ? new ReferenceEventCode() : $this->referenceEventCode;

        return $this->referenceEventCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ReferenceEventCode|null $referenceEventCode
     * @return self
     */
    public function setReferenceEventCode(?ReferenceEventCode $referenceEventCode = null): self
    {
        $this->referenceEventCode = $referenceEventCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountPercent|null
     */
    public function getSettlementDiscountPercent(): ?SettlementDiscountPercent
    {
        return $this->settlementDiscountPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountPercent
     */
    public function getSettlementDiscountPercentWithCreate(): SettlementDiscountPercent
    {
        $this->settlementDiscountPercent = is_null($this->settlementDiscountPercent) ? new SettlementDiscountPercent() : $this->settlementDiscountPercent;

        return $this->settlementDiscountPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountPercent|null $settlementDiscountPercent
     * @return self
     */
    public function setSettlementDiscountPercent(?SettlementDiscountPercent $settlementDiscountPercent = null): self
    {
        $this->settlementDiscountPercent = $settlementDiscountPercent;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentPercent|null
     */
    public function getPaymentPercent(): ?PaymentPercent
    {
        return $this->paymentPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentPercent
     */
    public function getPaymentPercentWithCreate(): PaymentPercent
    {
        $this->paymentPercent = is_null($this->paymentPercent) ? new PaymentPercent() : $this->paymentPercent;

        return $this->paymentPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PaymentPercent|null $paymentPercent
     * @return self
     */
    public function setPaymentPercent(?PaymentPercent $paymentPercent = null): self
    {
        $this->paymentPercent = $paymentPercent;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountAmount|null
     */
    public function getSettlementDiscountAmount(): ?SettlementDiscountAmount
    {
        return $this->settlementDiscountAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountAmount
     */
    public function getSettlementDiscountAmountWithCreate(): SettlementDiscountAmount
    {
        $this->settlementDiscountAmount = is_null($this->settlementDiscountAmount) ? new SettlementDiscountAmount() : $this->settlementDiscountAmount;

        return $this->settlementDiscountAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SettlementDiscountAmount|null $settlementDiscountAmount
     * @return self
     */
    public function setSettlementDiscountAmount(?SettlementDiscountAmount $settlementDiscountAmount = null): self
    {
        $this->settlementDiscountAmount = $settlementDiscountAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PenaltyAmount|null
     */
    public function getPenaltyAmount(): ?PenaltyAmount
    {
        return $this->penaltyAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PenaltyAmount
     */
    public function getPenaltyAmountWithCreate(): PenaltyAmount
    {
        $this->penaltyAmount = is_null($this->penaltyAmount) ? new PenaltyAmount() : $this->penaltyAmount;

        return $this->penaltyAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PenaltyAmount|null $penaltyAmount
     * @return self
     */
    public function setPenaltyAmount(?PenaltyAmount $penaltyAmount = null): self
    {
        $this->penaltyAmount = $penaltyAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentTermsDetailsURI|null
     */
    public function getPaymentTermsDetailsURI(): ?PaymentTermsDetailsURI
    {
        return $this->paymentTermsDetailsURI;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentTermsDetailsURI
     */
    public function getPaymentTermsDetailsURIWithCreate(): PaymentTermsDetailsURI
    {
        $this->paymentTermsDetailsURI = is_null($this->paymentTermsDetailsURI) ? new PaymentTermsDetailsURI() : $this->paymentTermsDetailsURI;

        return $this->paymentTermsDetailsURI;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PaymentTermsDetailsURI|null $paymentTermsDetailsURI
     * @return self
     */
    public function setPaymentTermsDetailsURI(?PaymentTermsDetailsURI $paymentTermsDetailsURI = null): self
    {
        $this->paymentTermsDetailsURI = $paymentTermsDetailsURI;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getPaymentDueDate(): ?\DateTimeInterface
    {
        return $this->paymentDueDate;
    }

    /**
     * @param \DateTimeInterface|null $paymentDueDate
     * @return self
     */
    public function setPaymentDueDate(?\DateTimeInterface $paymentDueDate = null): self
    {
        $this->paymentDueDate = $paymentDueDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getInstallmentDueDate(): ?\DateTimeInterface
    {
        return $this->installmentDueDate;
    }

    /**
     * @param \DateTimeInterface|null $installmentDueDate
     * @return self
     */
    public function setInstallmentDueDate(?\DateTimeInterface $installmentDueDate = null): self
    {
        $this->installmentDueDate = $installmentDueDate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InvoicingPartyReference|null
     */
    public function getInvoicingPartyReference(): ?InvoicingPartyReference
    {
        return $this->invoicingPartyReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InvoicingPartyReference
     */
    public function getInvoicingPartyReferenceWithCreate(): InvoicingPartyReference
    {
        $this->invoicingPartyReference = is_null($this->invoicingPartyReference) ? new InvoicingPartyReference() : $this->invoicingPartyReference;

        return $this->invoicingPartyReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\InvoicingPartyReference|null $invoicingPartyReference
     * @return self
     */
    public function setInvoicingPartyReference(?InvoicingPartyReference $invoicingPartyReference = null): self
    {
        $this->invoicingPartyReference = $invoicingPartyReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SettlementPeriod|null
     */
    public function getSettlementPeriod(): ?SettlementPeriod
    {
        return $this->settlementPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SettlementPeriod
     */
    public function getSettlementPeriodWithCreate(): SettlementPeriod
    {
        $this->settlementPeriod = is_null($this->settlementPeriod) ? new SettlementPeriod() : $this->settlementPeriod;

        return $this->settlementPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SettlementPeriod|null $settlementPeriod
     * @return self
     */
    public function setSettlementPeriod(?SettlementPeriod $settlementPeriod = null): self
    {
        $this->settlementPeriod = $settlementPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PenaltyPeriod|null
     */
    public function getPenaltyPeriod(): ?PenaltyPeriod
    {
        return $this->penaltyPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PenaltyPeriod
     */
    public function getPenaltyPeriodWithCreate(): PenaltyPeriod
    {
        $this->penaltyPeriod = is_null($this->penaltyPeriod) ? new PenaltyPeriod() : $this->penaltyPeriod;

        return $this->penaltyPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PenaltyPeriod|null $penaltyPeriod
     * @return self
     */
    public function setPenaltyPeriod(?PenaltyPeriod $penaltyPeriod = null): self
    {
        $this->penaltyPeriod = $penaltyPeriod;

        return $this;
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod|null
     */
    public function getValidityPeriod(): ?ValidityPeriod
    {
        return $this->validityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod
     */
    public function getValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->validityPeriod = is_null($this->validityPeriod) ? new ValidityPeriod() : $this->validityPeriod;

        return $this->validityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ValidityPeriod|null $validityPeriod
     * @return self
     */
    public function setValidityPeriod(?ValidityPeriod $validityPeriod = null): self
    {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }
}
