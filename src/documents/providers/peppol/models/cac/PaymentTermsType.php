<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InvoicingPartyReference;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentMeansID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentPercent;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentTermsDetailsURI;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PenaltyAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PenaltySurchargePercent;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PrepaidPaymentReferenceID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReferenceEventCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SettlementDiscountAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SettlementDiscountPercent;
use JMS\Serializer\Annotation as JMS;

class PaymentTermsType
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
     * @var null|array<PaymentMeansID>
     */
    #[JMS\Accessor(getter: 'getPaymentMeansID', setter: 'setPaymentMeansID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentMeansID')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentMeansID>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PaymentMeansID', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $paymentMeansID;

    /**
     * @var null|PrepaidPaymentReferenceID
     */
    #[JMS\Accessor(getter: 'getPrepaidPaymentReferenceID', setter: 'setPrepaidPaymentReferenceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PrepaidPaymentReferenceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PrepaidPaymentReferenceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $prepaidPaymentReferenceID;

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
     * @var null|ReferenceEventCode
     */
    #[JMS\Accessor(getter: 'getReferenceEventCode', setter: 'setReferenceEventCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReferenceEventCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReferenceEventCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $referenceEventCode;

    /**
     * @var null|SettlementDiscountPercent
     */
    #[JMS\Accessor(getter: 'getSettlementDiscountPercent', setter: 'setSettlementDiscountPercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SettlementDiscountPercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SettlementDiscountPercent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $settlementDiscountPercent;

    /**
     * @var null|PenaltySurchargePercent
     */
    #[JMS\Accessor(getter: 'getPenaltySurchargePercent', setter: 'setPenaltySurchargePercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PenaltySurchargePercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PenaltySurchargePercent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $penaltySurchargePercent;

    /**
     * @var null|PaymentPercent
     */
    #[JMS\Accessor(getter: 'getPaymentPercent', setter: 'setPaymentPercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentPercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentPercent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $paymentPercent;

    /**
     * @var null|Amount
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Amount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $amount;

    /**
     * @var null|SettlementDiscountAmount
     */
    #[JMS\Accessor(getter: 'getSettlementDiscountAmount', setter: 'setSettlementDiscountAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SettlementDiscountAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SettlementDiscountAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $settlementDiscountAmount;

    /**
     * @var null|PenaltyAmount
     */
    #[JMS\Accessor(getter: 'getPenaltyAmount', setter: 'setPenaltyAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PenaltyAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PenaltyAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $penaltyAmount;

    /**
     * @var null|PaymentTermsDetailsURI
     */
    #[JMS\Accessor(getter: 'getPaymentTermsDetailsURI', setter: 'setPaymentTermsDetailsURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentTermsDetailsURI')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentTermsDetailsURI')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $paymentTermsDetailsURI;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getPaymentDueDate', setter: 'setPaymentDueDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentDueDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $paymentDueDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getInstallmentDueDate', setter: 'setInstallmentDueDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InstallmentDueDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $installmentDueDate;

    /**
     * @var null|InvoicingPartyReference
     */
    #[JMS\Accessor(getter: 'getInvoicingPartyReference', setter: 'setInvoicingPartyReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InvoicingPartyReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InvoicingPartyReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $invoicingPartyReference;

    /**
     * @var null|SettlementPeriod
     */
    #[JMS\Accessor(getter: 'getSettlementPeriod', setter: 'setSettlementPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SettlementPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SettlementPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $settlementPeriod;

    /**
     * @var null|PenaltyPeriod
     */
    #[JMS\Accessor(getter: 'getPenaltyPeriod', setter: 'setPenaltyPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PenaltyPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PenaltyPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $penaltyPeriod;

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
     * @var null|ValidityPeriod
     */
    #[JMS\Accessor(getter: 'getValidityPeriod', setter: 'setValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValidityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ValidityPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
    public function setPaymentMeansID(
        ?array $paymentMeansID = null
    ): static {
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
    public function addToPaymentMeansID(
        PaymentMeansID $paymentMeansID
    ): static {
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
    public function addOnceToPaymentMeansID(
        PaymentMeansID $paymentMeansID
    ): static {
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
        $this->prepaidPaymentReferenceID ??= new PrepaidPaymentReferenceID();

        return $this->prepaidPaymentReferenceID;
    }

    /**
     * @param  null|PrepaidPaymentReferenceID $prepaidPaymentReferenceID
     * @return static
     */
    public function setPrepaidPaymentReferenceID(
        ?PrepaidPaymentReferenceID $prepaidPaymentReferenceID = null
    ): static {
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
        $this->addTonote($note = new Note());

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
        $this->referenceEventCode ??= new ReferenceEventCode();

        return $this->referenceEventCode;
    }

    /**
     * @param  null|ReferenceEventCode $referenceEventCode
     * @return static
     */
    public function setReferenceEventCode(
        ?ReferenceEventCode $referenceEventCode = null
    ): static {
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
        $this->settlementDiscountPercent ??= new SettlementDiscountPercent();

        return $this->settlementDiscountPercent;
    }

    /**
     * @param  null|SettlementDiscountPercent $settlementDiscountPercent
     * @return static
     */
    public function setSettlementDiscountPercent(
        ?SettlementDiscountPercent $settlementDiscountPercent = null
    ): static {
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
        $this->paymentPercent ??= new PaymentPercent();

        return $this->paymentPercent;
    }

    /**
     * @param  null|PaymentPercent $paymentPercent
     * @return static
     */
    public function setPaymentPercent(
        ?PaymentPercent $paymentPercent = null
    ): static {
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
        $this->settlementDiscountAmount ??= new SettlementDiscountAmount();

        return $this->settlementDiscountAmount;
    }

    /**
     * @param  null|SettlementDiscountAmount $settlementDiscountAmount
     * @return static
     */
    public function setSettlementDiscountAmount(
        ?SettlementDiscountAmount $settlementDiscountAmount = null
    ): static {
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
        $this->penaltyAmount ??= new PenaltyAmount();

        return $this->penaltyAmount;
    }

    /**
     * @param  null|PenaltyAmount $penaltyAmount
     * @return static
     */
    public function setPenaltyAmount(
        ?PenaltyAmount $penaltyAmount = null
    ): static {
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
        $this->paymentTermsDetailsURI ??= new PaymentTermsDetailsURI();

        return $this->paymentTermsDetailsURI;
    }

    /**
     * @param  null|PaymentTermsDetailsURI $paymentTermsDetailsURI
     * @return static
     */
    public function setPaymentTermsDetailsURI(
        ?PaymentTermsDetailsURI $paymentTermsDetailsURI = null
    ): static {
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
    public function setPaymentDueDate(
        ?DateTimeInterface $paymentDueDate = null
    ): static {
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
    public function setInstallmentDueDate(
        ?DateTimeInterface $installmentDueDate = null
    ): static {
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
        $this->invoicingPartyReference ??= new InvoicingPartyReference();

        return $this->invoicingPartyReference;
    }

    /**
     * @param  null|InvoicingPartyReference $invoicingPartyReference
     * @return static
     */
    public function setInvoicingPartyReference(
        ?InvoicingPartyReference $invoicingPartyReference = null
    ): static {
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
        $this->settlementPeriod ??= new SettlementPeriod();

        return $this->settlementPeriod;
    }

    /**
     * @param  null|SettlementPeriod $settlementPeriod
     * @return static
     */
    public function setSettlementPeriod(
        ?SettlementPeriod $settlementPeriod = null
    ): static {
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
        $this->penaltyPeriod ??= new PenaltyPeriod();

        return $this->penaltyPeriod;
    }

    /**
     * @param  null|PenaltyPeriod $penaltyPeriod
     * @return static
     */
    public function setPenaltyPeriod(
        ?PenaltyPeriod $penaltyPeriod = null
    ): static {
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
        $this->validityPeriod ??= new ValidityPeriod();

        return $this->validityPeriod;
    }

    /**
     * @param  null|ValidityPeriod $validityPeriod
     * @return static
     */
    public function setValidityPeriod(
        ?ValidityPeriod $validityPeriod = null
    ): static {
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
