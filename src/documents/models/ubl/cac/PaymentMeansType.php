<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\InstructionID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\InstructionNote;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentChannelCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentMeansCode;
use JMS\Serializer\Annotation as JMS;

class PaymentMeansType
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
     * @var null|PaymentMeansCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentMeansCode")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentMeansCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentMeansCode", setter="setPaymentMeansCode")
     */
    private $paymentMeansCode;

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
     * @var null|PaymentChannelCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentChannelCode")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentChannelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentChannelCode", setter="setPaymentChannelCode")
     */
    private $paymentChannelCode;

    /**
     * @var null|InstructionID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\InstructionID")
     * @JMS\Expose
     * @JMS\SerializedName("InstructionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInstructionID", setter="setInstructionID")
     */
    private $instructionID;

    /**
     * @var null|array<InstructionNote>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\InstructionNote>")
     * @JMS\Expose
     * @JMS\SerializedName("InstructionNote")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InstructionNote", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInstructionNote", setter="setInstructionNote")
     */
    private $instructionNote;

    /**
     * @var null|array<PaymentID>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentID>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPaymentID", setter="setPaymentID")
     */
    private $paymentID;

    /**
     * @var null|CardAccount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\CardAccount")
     * @JMS\Expose
     * @JMS\SerializedName("CardAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCardAccount", setter="setCardAccount")
     */
    private $cardAccount;

    /**
     * @var null|PayerFinancialAccount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PayerFinancialAccount")
     * @JMS\Expose
     * @JMS\SerializedName("PayerFinancialAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayerFinancialAccount", setter="setPayerFinancialAccount")
     */
    private $payerFinancialAccount;

    /**
     * @var null|PayeeFinancialAccount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PayeeFinancialAccount")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeFinancialAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayeeFinancialAccount", setter="setPayeeFinancialAccount")
     */
    private $payeeFinancialAccount;

    /**
     * @var null|CreditAccount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\CreditAccount")
     * @JMS\Expose
     * @JMS\SerializedName("CreditAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCreditAccount", setter="setCreditAccount")
     */
    private $creditAccount;

    /**
     * @var null|PaymentMandate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PaymentMandate")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentMandate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentMandate", setter="setPaymentMandate")
     */
    private $paymentMandate;

    /**
     * @var null|TradeFinancing
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\TradeFinancing")
     * @JMS\Expose
     * @JMS\SerializedName("TradeFinancing")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTradeFinancing", setter="setTradeFinancing")
     */
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
        $this->paymentMeansCode = is_null($this->paymentMeansCode) ? new PaymentMeansCode() : $this->paymentMeansCode;

        return $this->paymentMeansCode;
    }

    /**
     * @param  null|PaymentMeansCode $paymentMeansCode
     * @return static
     */
    public function setPaymentMeansCode(?PaymentMeansCode $paymentMeansCode = null): static
    {
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
        $this->paymentChannelCode = is_null($this->paymentChannelCode) ? new PaymentChannelCode() : $this->paymentChannelCode;

        return $this->paymentChannelCode;
    }

    /**
     * @param  null|PaymentChannelCode $paymentChannelCode
     * @return static
     */
    public function setPaymentChannelCode(?PaymentChannelCode $paymentChannelCode = null): static
    {
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
        $this->instructionID = is_null($this->instructionID) ? new InstructionID() : $this->instructionID;

        return $this->instructionID;
    }

    /**
     * @param  null|InstructionID $instructionID
     * @return static
     */
    public function setInstructionID(?InstructionID $instructionID = null): static
    {
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
    public function setInstructionNote(?array $instructionNote = null): static
    {
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
    public function addToInstructionNote(InstructionNote $instructionNote): static
    {
        $this->instructionNote[] = $instructionNote;

        return $this;
    }

    /**
     * @return InstructionNote
     */
    public function addToInstructionNoteWithCreate(): InstructionNote
    {
        $this->addToinstructionNote($instructionNote = new InstructionNote());

        return $instructionNote;
    }

    /**
     * @param  InstructionNote $instructionNote
     * @return static
     */
    public function addOnceToInstructionNote(InstructionNote $instructionNote): static
    {
        if (!is_array($this->instructionNote)) {
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
        if (!is_array($this->instructionNote)) {
            $this->instructionNote = [];
        }

        if ([] === $this->instructionNote) {
            $this->addOnceToinstructionNote(new InstructionNote());
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
    public function setPaymentID(?array $paymentID = null): static
    {
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
    public function addToPaymentID(PaymentID $paymentID): static
    {
        $this->paymentID[] = $paymentID;

        return $this;
    }

    /**
     * @return PaymentID
     */
    public function addToPaymentIDWithCreate(): PaymentID
    {
        $this->addTopaymentID($paymentID = new PaymentID());

        return $paymentID;
    }

    /**
     * @param  PaymentID $paymentID
     * @return static
     */
    public function addOnceToPaymentID(PaymentID $paymentID): static
    {
        if (!is_array($this->paymentID)) {
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
        if (!is_array($this->paymentID)) {
            $this->paymentID = [];
        }

        if ([] === $this->paymentID) {
            $this->addOnceTopaymentID(new PaymentID());
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
        $this->cardAccount = is_null($this->cardAccount) ? new CardAccount() : $this->cardAccount;

        return $this->cardAccount;
    }

    /**
     * @param  null|CardAccount $cardAccount
     * @return static
     */
    public function setCardAccount(?CardAccount $cardAccount = null): static
    {
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
        $this->payerFinancialAccount = is_null($this->payerFinancialAccount) ? new PayerFinancialAccount() : $this->payerFinancialAccount;

        return $this->payerFinancialAccount;
    }

    /**
     * @param  null|PayerFinancialAccount $payerFinancialAccount
     * @return static
     */
    public function setPayerFinancialAccount(?PayerFinancialAccount $payerFinancialAccount = null): static
    {
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
        $this->payeeFinancialAccount = is_null($this->payeeFinancialAccount) ? new PayeeFinancialAccount() : $this->payeeFinancialAccount;

        return $this->payeeFinancialAccount;
    }

    /**
     * @param  null|PayeeFinancialAccount $payeeFinancialAccount
     * @return static
     */
    public function setPayeeFinancialAccount(?PayeeFinancialAccount $payeeFinancialAccount = null): static
    {
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
        $this->creditAccount = is_null($this->creditAccount) ? new CreditAccount() : $this->creditAccount;

        return $this->creditAccount;
    }

    /**
     * @param  null|CreditAccount $creditAccount
     * @return static
     */
    public function setCreditAccount(?CreditAccount $creditAccount = null): static
    {
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
        $this->paymentMandate = is_null($this->paymentMandate) ? new PaymentMandate() : $this->paymentMandate;

        return $this->paymentMandate;
    }

    /**
     * @param  null|PaymentMandate $paymentMandate
     * @return static
     */
    public function setPaymentMandate(?PaymentMandate $paymentMandate = null): static
    {
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
        $this->tradeFinancing = is_null($this->tradeFinancing) ? new TradeFinancing() : $this->tradeFinancing;

        return $this->tradeFinancing;
    }

    /**
     * @param  null|TradeFinancing $tradeFinancing
     * @return static
     */
    public function setTradeFinancing(?TradeFinancing $tradeFinancing = null): static
    {
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
