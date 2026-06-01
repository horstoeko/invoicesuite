<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InstructionID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InstructionNote;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentChannelCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentMeansCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class PaymentMeansType
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
     * @var null|PaymentMeansCode
     */
    #[JMS\Accessor(getter: 'getPaymentMeansCode', setter: 'setPaymentMeansCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentMeansCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentMeansCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $paymentMeansCode;

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
     * @var null|PaymentChannelCode
     */
    #[JMS\Accessor(getter: 'getPaymentChannelCode', setter: 'setPaymentChannelCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentChannelCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentChannelCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $paymentChannelCode;

    /**
     * @var null|InstructionID
     */
    #[JMS\Accessor(getter: 'getInstructionID', setter: 'setInstructionID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InstructionID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InstructionID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $instructionID;

    /**
     * @var null|array<InstructionNote>
     */
    #[JMS\Accessor(getter: 'getInstructionNote', setter: 'setInstructionNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InstructionNote')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InstructionNote>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'InstructionNote', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $instructionNote;

    /**
     * @var null|array<PaymentID>
     */
    #[JMS\Accessor(getter: 'getPaymentID', setter: 'setPaymentID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentID')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentID>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PaymentID', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $paymentID;

    /**
     * @var null|CardAccount
     */
    #[JMS\Accessor(getter: 'getCardAccount', setter: 'setCardAccount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CardAccount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\CardAccount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $cardAccount;

    /**
     * @var null|PayerFinancialAccount
     */
    #[JMS\Accessor(getter: 'getPayerFinancialAccount', setter: 'setPayerFinancialAccount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PayerFinancialAccount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PayerFinancialAccount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $payerFinancialAccount;

    /**
     * @var null|PayeeFinancialAccount
     */
    #[JMS\Accessor(getter: 'getPayeeFinancialAccount', setter: 'setPayeeFinancialAccount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PayeeFinancialAccount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PayeeFinancialAccount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $payeeFinancialAccount;

    /**
     * @var null|CreditAccount
     */
    #[JMS\Accessor(getter: 'getCreditAccount', setter: 'setCreditAccount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CreditAccount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\CreditAccount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $creditAccount;

    /**
     * @var null|PaymentMandate
     */
    #[JMS\Accessor(getter: 'getPaymentMandate', setter: 'setPaymentMandate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentMandate')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PaymentMandate')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $paymentMandate;

    /**
     * @var null|TradeFinancing
     */
    #[JMS\Accessor(getter: 'getTradeFinancing', setter: 'setTradeFinancing')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TradeFinancing')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TradeFinancing')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $tradeFinancing;

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
     * @return null|PaymentMeansCode
     */
    public function getPaymentMeansCode(): ?PaymentMeansCode
    {
        return $this->paymentMeansCode;
    }

    /**
     * @return PaymentMeansCode
     */
    public function getPaymentMeansCodeWithCreate(): PaymentMeansCode
    {
        $this->paymentMeansCode ??= new PaymentMeansCode();

        return $this->paymentMeansCode;
    }

    /**
     * @param  null|PaymentMeansCode $paymentMeansCode
     * @return static
     */
    public function setPaymentMeansCode(
        ?PaymentMeansCode $paymentMeansCode = null
    ): static {
        $this->paymentMeansCode = $paymentMeansCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentMeansCode(): static
    {
        $this->paymentMeansCode = null;

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
     * @return null|PaymentChannelCode
     */
    public function getPaymentChannelCode(): ?PaymentChannelCode
    {
        return $this->paymentChannelCode;
    }

    /**
     * @return PaymentChannelCode
     */
    public function getPaymentChannelCodeWithCreate(): PaymentChannelCode
    {
        $this->paymentChannelCode ??= new PaymentChannelCode();

        return $this->paymentChannelCode;
    }

    /**
     * @param  null|PaymentChannelCode $paymentChannelCode
     * @return static
     */
    public function setPaymentChannelCode(
        ?PaymentChannelCode $paymentChannelCode = null
    ): static {
        $this->paymentChannelCode = $paymentChannelCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentChannelCode(): static
    {
        $this->paymentChannelCode = null;

        return $this;
    }

    /**
     * @return null|InstructionID
     */
    public function getInstructionID(): ?InstructionID
    {
        return $this->instructionID;
    }

    /**
     * @return InstructionID
     */
    public function getInstructionIDWithCreate(): InstructionID
    {
        $this->instructionID ??= new InstructionID();

        return $this->instructionID;
    }

    /**
     * @param  null|InstructionID $instructionID
     * @return static
     */
    public function setInstructionID(
        ?InstructionID $instructionID = null
    ): static {
        $this->instructionID = $instructionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInstructionID(): static
    {
        $this->instructionID = null;

        return $this;
    }

    /**
     * @return null|array<InstructionNote>
     */
    public function getInstructionNote(): ?array
    {
        return $this->instructionNote;
    }

    /**
     * @param  null|array<InstructionNote> $instructionNote
     * @return static
     */
    public function setInstructionNote(
        ?array $instructionNote = null
    ): static {
        $this->instructionNote = $instructionNote;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInstructionNote(): static
    {
        $this->instructionNote = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInstructionNote(): static
    {
        $this->instructionNote = [];

        return $this;
    }

    /**
     * @return null|InstructionNote
     */
    public function firstInstructionNote(): ?InstructionNote
    {
        $instructionNote = $this->instructionNote ?? [];
        $instructionNote = reset($instructionNote);

        if (false === $instructionNote) {
            return null;
        }

        return $instructionNote;
    }

    /**
     * @return null|InstructionNote
     */
    public function lastInstructionNote(): ?InstructionNote
    {
        $instructionNote = $this->instructionNote ?? [];
        $instructionNote = end($instructionNote);

        if (false === $instructionNote) {
            return null;
        }

        return $instructionNote;
    }

    /**
     * @param  InstructionNote $instructionNote
     * @return static
     */
    public function addToInstructionNote(
        InstructionNote $instructionNote
    ): static {
        $this->instructionNote[] = $instructionNote;

        return $this;
    }

    /**
     * @return InstructionNote
     */
    public function addToInstructionNoteWithCreate(): InstructionNote
    {
        $this->addToInstructionNote($instructionNote = new InstructionNote());

        return $instructionNote;
    }

    /**
     * @param  InstructionNote $instructionNote
     * @return static
     */
    public function addOnceToInstructionNote(
        InstructionNote $instructionNote
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->instructionNote)) {
            $this->instructionNote = [];
        }

        $this->instructionNote[0] = $instructionNote;

        return $this;
    }

    /**
     * @return InstructionNote
     */
    public function addOnceToInstructionNoteWithCreate(): InstructionNote
    {
        if (!InvoiceSuiteArrayUtils::is($this->instructionNote)) {
            $this->instructionNote = [];
        }

        if ([] === $this->instructionNote) {
            $this->addOnceToInstructionNote(new InstructionNote());
        }

        return $this->instructionNote[0];
    }

    /**
     * @return null|array<PaymentID>
     */
    public function getPaymentID(): ?array
    {
        return $this->paymentID;
    }

    /**
     * @param  null|array<PaymentID> $paymentID
     * @return static
     */
    public function setPaymentID(
        ?array $paymentID = null
    ): static {
        $this->paymentID = $paymentID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentID(): static
    {
        $this->paymentID = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPaymentID(): static
    {
        $this->paymentID = [];

        return $this;
    }

    /**
     * @return null|PaymentID
     */
    public function firstPaymentID(): ?PaymentID
    {
        $paymentID = $this->paymentID ?? [];
        $paymentID = reset($paymentID);

        if (false === $paymentID) {
            return null;
        }

        return $paymentID;
    }

    /**
     * @return null|PaymentID
     */
    public function lastPaymentID(): ?PaymentID
    {
        $paymentID = $this->paymentID ?? [];
        $paymentID = end($paymentID);

        if (false === $paymentID) {
            return null;
        }

        return $paymentID;
    }

    /**
     * @param  PaymentID $paymentID
     * @return static
     */
    public function addToPaymentID(
        PaymentID $paymentID
    ): static {
        $this->paymentID[] = $paymentID;

        return $this;
    }

    /**
     * @return PaymentID
     */
    public function addToPaymentIDWithCreate(): PaymentID
    {
        $this->addToPaymentID($paymentID = new PaymentID());

        return $paymentID;
    }

    /**
     * @param  PaymentID $paymentID
     * @return static
     */
    public function addOnceToPaymentID(
        PaymentID $paymentID
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->paymentID)) {
            $this->paymentID = [];
        }

        $this->paymentID[0] = $paymentID;

        return $this;
    }

    /**
     * @return PaymentID
     */
    public function addOnceToPaymentIDWithCreate(): PaymentID
    {
        if (!InvoiceSuiteArrayUtils::is($this->paymentID)) {
            $this->paymentID = [];
        }

        if ([] === $this->paymentID) {
            $this->addOnceToPaymentID(new PaymentID());
        }

        return $this->paymentID[0];
    }

    /**
     * @return null|CardAccount
     */
    public function getCardAccount(): ?CardAccount
    {
        return $this->cardAccount;
    }

    /**
     * @return CardAccount
     */
    public function getCardAccountWithCreate(): CardAccount
    {
        $this->cardAccount ??= new CardAccount();

        return $this->cardAccount;
    }

    /**
     * @param  null|CardAccount $cardAccount
     * @return static
     */
    public function setCardAccount(
        ?CardAccount $cardAccount = null
    ): static {
        $this->cardAccount = $cardAccount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCardAccount(): static
    {
        $this->cardAccount = null;

        return $this;
    }

    /**
     * @return null|PayerFinancialAccount
     */
    public function getPayerFinancialAccount(): ?PayerFinancialAccount
    {
        return $this->payerFinancialAccount;
    }

    /**
     * @return PayerFinancialAccount
     */
    public function getPayerFinancialAccountWithCreate(): PayerFinancialAccount
    {
        $this->payerFinancialAccount ??= new PayerFinancialAccount();

        return $this->payerFinancialAccount;
    }

    /**
     * @param  null|PayerFinancialAccount $payerFinancialAccount
     * @return static
     */
    public function setPayerFinancialAccount(
        ?PayerFinancialAccount $payerFinancialAccount = null
    ): static {
        $this->payerFinancialAccount = $payerFinancialAccount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPayerFinancialAccount(): static
    {
        $this->payerFinancialAccount = null;

        return $this;
    }

    /**
     * @return null|PayeeFinancialAccount
     */
    public function getPayeeFinancialAccount(): ?PayeeFinancialAccount
    {
        return $this->payeeFinancialAccount;
    }

    /**
     * @return PayeeFinancialAccount
     */
    public function getPayeeFinancialAccountWithCreate(): PayeeFinancialAccount
    {
        $this->payeeFinancialAccount ??= new PayeeFinancialAccount();

        return $this->payeeFinancialAccount;
    }

    /**
     * @param  null|PayeeFinancialAccount $payeeFinancialAccount
     * @return static
     */
    public function setPayeeFinancialAccount(
        ?PayeeFinancialAccount $payeeFinancialAccount = null
    ): static {
        $this->payeeFinancialAccount = $payeeFinancialAccount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPayeeFinancialAccount(): static
    {
        $this->payeeFinancialAccount = null;

        return $this;
    }

    /**
     * @return null|CreditAccount
     */
    public function getCreditAccount(): ?CreditAccount
    {
        return $this->creditAccount;
    }

    /**
     * @return CreditAccount
     */
    public function getCreditAccountWithCreate(): CreditAccount
    {
        $this->creditAccount ??= new CreditAccount();

        return $this->creditAccount;
    }

    /**
     * @param  null|CreditAccount $creditAccount
     * @return static
     */
    public function setCreditAccount(
        ?CreditAccount $creditAccount = null
    ): static {
        $this->creditAccount = $creditAccount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCreditAccount(): static
    {
        $this->creditAccount = null;

        return $this;
    }

    /**
     * @return null|PaymentMandate
     */
    public function getPaymentMandate(): ?PaymentMandate
    {
        return $this->paymentMandate;
    }

    /**
     * @return PaymentMandate
     */
    public function getPaymentMandateWithCreate(): PaymentMandate
    {
        $this->paymentMandate ??= new PaymentMandate();

        return $this->paymentMandate;
    }

    /**
     * @param  null|PaymentMandate $paymentMandate
     * @return static
     */
    public function setPaymentMandate(
        ?PaymentMandate $paymentMandate = null
    ): static {
        $this->paymentMandate = $paymentMandate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentMandate(): static
    {
        $this->paymentMandate = null;

        return $this;
    }

    /**
     * @return null|TradeFinancing
     */
    public function getTradeFinancing(): ?TradeFinancing
    {
        return $this->tradeFinancing;
    }

    /**
     * @return TradeFinancing
     */
    public function getTradeFinancingWithCreate(): TradeFinancing
    {
        $this->tradeFinancing ??= new TradeFinancing();

        return $this->tradeFinancing;
    }

    /**
     * @param  null|TradeFinancing $tradeFinancing
     * @return static
     */
    public function setTradeFinancing(
        ?TradeFinancing $tradeFinancing = null
    ): static {
        $this->tradeFinancing = $tradeFinancing;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTradeFinancing(): static
    {
        $this->tradeFinancing = null;

        return $this;
    }
}
