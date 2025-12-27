<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MandateTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumPaidAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumPaymentInstructionsNumeric;
use horstoeko\invoicesuite\documents\models\ubl\cbc\SignatureID;
use JMS\Serializer\Annotation as JMS;

class PaymentMandateType
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
     * @var null|MandateTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MandateTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("MandateTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMandateTypeCode", setter="setMandateTypeCode")
     */
    private $mandateTypeCode;

    /**
     * @var null|MaximumPaymentInstructionsNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumPaymentInstructionsNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumPaymentInstructionsNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumPaymentInstructionsNumeric", setter="setMaximumPaymentInstructionsNumeric")
     */
    private $maximumPaymentInstructionsNumeric;

    /**
     * @var null|MaximumPaidAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumPaidAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumPaidAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumPaidAmount", setter="setMaximumPaidAmount")
     */
    private $maximumPaidAmount;

    /**
     * @var null|SignatureID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\SignatureID")
     * @JMS\Expose
     * @JMS\SerializedName("SignatureID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSignatureID", setter="setSignatureID")
     */
    private $signatureID;

    /**
     * @var null|PayerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PayerParty")
     * @JMS\Expose
     * @JMS\SerializedName("PayerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayerParty", setter="setPayerParty")
     */
    private $payerParty;

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
     * @var null|ValidityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

    /**
     * @var null|PaymentReversalPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PaymentReversalPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentReversalPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentReversalPeriod", setter="setPaymentReversalPeriod")
     */
    private $paymentReversalPeriod;

    /**
     * @var null|array<Clause>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Clause>")
     * @JMS\Expose
     * @JMS\SerializedName("Clause")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Clause", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getClause", setter="setClause")
     */
    private $clause;

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
     * @return null|MandateTypeCode
     */
    public function getMandateTypeCode(): ?MandateTypeCode
    {
        return $this->mandateTypeCode;
    }

    /**
     * @return MandateTypeCode
     */
    public function getMandateTypeCodeWithCreate(): MandateTypeCode
    {
        $this->mandateTypeCode = is_null($this->mandateTypeCode) ? new MandateTypeCode() : $this->mandateTypeCode;

        return $this->mandateTypeCode;
    }

    /**
     * @param  null|MandateTypeCode $mandateTypeCode
     * @return static
     */
    public function setMandateTypeCode(?MandateTypeCode $mandateTypeCode = null): static
    {
        $this->mandateTypeCode = $mandateTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMandateTypeCode(): static
    {
        $this->mandateTypeCode = null;

        return $this;
    }

    /**
     * @return null|MaximumPaymentInstructionsNumeric
     */
    public function getMaximumPaymentInstructionsNumeric(): ?MaximumPaymentInstructionsNumeric
    {
        return $this->maximumPaymentInstructionsNumeric;
    }

    /**
     * @return MaximumPaymentInstructionsNumeric
     */
    public function getMaximumPaymentInstructionsNumericWithCreate(): MaximumPaymentInstructionsNumeric
    {
        $this->maximumPaymentInstructionsNumeric = is_null($this->maximumPaymentInstructionsNumeric) ? new MaximumPaymentInstructionsNumeric() : $this->maximumPaymentInstructionsNumeric;

        return $this->maximumPaymentInstructionsNumeric;
    }

    /**
     * @param  null|MaximumPaymentInstructionsNumeric $maximumPaymentInstructionsNumeric
     * @return static
     */
    public function setMaximumPaymentInstructionsNumeric(
        ?MaximumPaymentInstructionsNumeric $maximumPaymentInstructionsNumeric = null,
    ): static {
        $this->maximumPaymentInstructionsNumeric = $maximumPaymentInstructionsNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumPaymentInstructionsNumeric(): static
    {
        $this->maximumPaymentInstructionsNumeric = null;

        return $this;
    }

    /**
     * @return null|MaximumPaidAmount
     */
    public function getMaximumPaidAmount(): ?MaximumPaidAmount
    {
        return $this->maximumPaidAmount;
    }

    /**
     * @return MaximumPaidAmount
     */
    public function getMaximumPaidAmountWithCreate(): MaximumPaidAmount
    {
        $this->maximumPaidAmount = is_null($this->maximumPaidAmount) ? new MaximumPaidAmount() : $this->maximumPaidAmount;

        return $this->maximumPaidAmount;
    }

    /**
     * @param  null|MaximumPaidAmount $maximumPaidAmount
     * @return static
     */
    public function setMaximumPaidAmount(?MaximumPaidAmount $maximumPaidAmount = null): static
    {
        $this->maximumPaidAmount = $maximumPaidAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumPaidAmount(): static
    {
        $this->maximumPaidAmount = null;

        return $this;
    }

    /**
     * @return null|SignatureID
     */
    public function getSignatureID(): ?SignatureID
    {
        return $this->signatureID;
    }

    /**
     * @return SignatureID
     */
    public function getSignatureIDWithCreate(): SignatureID
    {
        $this->signatureID = is_null($this->signatureID) ? new SignatureID() : $this->signatureID;

        return $this->signatureID;
    }

    /**
     * @param  null|SignatureID $signatureID
     * @return static
     */
    public function setSignatureID(?SignatureID $signatureID = null): static
    {
        $this->signatureID = $signatureID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSignatureID(): static
    {
        $this->signatureID = null;

        return $this;
    }

    /**
     * @return null|PayerParty
     */
    public function getPayerParty(): ?PayerParty
    {
        return $this->payerParty;
    }

    /**
     * @return PayerParty
     */
    public function getPayerPartyWithCreate(): PayerParty
    {
        $this->payerParty = is_null($this->payerParty) ? new PayerParty() : $this->payerParty;

        return $this->payerParty;
    }

    /**
     * @param  null|PayerParty $payerParty
     * @return static
     */
    public function setPayerParty(?PayerParty $payerParty = null): static
    {
        $this->payerParty = $payerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPayerParty(): static
    {
        $this->payerParty = null;

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

    /**
     * @return null|PaymentReversalPeriod
     */
    public function getPaymentReversalPeriod(): ?PaymentReversalPeriod
    {
        return $this->paymentReversalPeriod;
    }

    /**
     * @return PaymentReversalPeriod
     */
    public function getPaymentReversalPeriodWithCreate(): PaymentReversalPeriod
    {
        $this->paymentReversalPeriod = is_null($this->paymentReversalPeriod) ? new PaymentReversalPeriod() : $this->paymentReversalPeriod;

        return $this->paymentReversalPeriod;
    }

    /**
     * @param  null|PaymentReversalPeriod $paymentReversalPeriod
     * @return static
     */
    public function setPaymentReversalPeriod(?PaymentReversalPeriod $paymentReversalPeriod = null): static
    {
        $this->paymentReversalPeriod = $paymentReversalPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentReversalPeriod(): static
    {
        $this->paymentReversalPeriod = null;

        return $this;
    }

    /**
     * @return null|array<Clause>
     */
    public function getClause(): ?array
    {
        return $this->clause;
    }

    /**
     * @param  null|array<Clause> $clause
     * @return static
     */
    public function setClause(?array $clause = null): static
    {
        $this->clause = $clause;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetClause(): static
    {
        $this->clause = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearClause(): static
    {
        $this->clause = [];

        return $this;
    }

    /**
     * @return null|Clause
     */
    public function firstClause(): ?Clause
    {
        $clause = $this->clause ?? [];
        $clause = reset($clause);

        if (false === $clause) {
            return null;
        }

        return $clause;
    }

    /**
     * @return null|Clause
     */
    public function lastClause(): ?Clause
    {
        $clause = $this->clause ?? [];
        $clause = end($clause);

        if (false === $clause) {
            return null;
        }

        return $clause;
    }

    /**
     * @param  Clause $clause
     * @return static
     */
    public function addToClause(Clause $clause): static
    {
        $this->clause[] = $clause;

        return $this;
    }

    /**
     * @return Clause
     */
    public function addToClauseWithCreate(): Clause
    {
        $this->addToclause($clause = new Clause());

        return $clause;
    }

    /**
     * @param  Clause $clause
     * @return static
     */
    public function addOnceToClause(Clause $clause): static
    {
        if (!is_array($this->clause)) {
            $this->clause = [];
        }

        $this->clause[0] = $clause;

        return $this;
    }

    /**
     * @return Clause
     */
    public function addOnceToClauseWithCreate(): Clause
    {
        if (!is_array($this->clause)) {
            $this->clause = [];
        }

        if ([] === $this->clause) {
            $this->addOnceToclause(new Clause());
        }

        return $this->clause[0];
    }
}
