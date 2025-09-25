<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MandateTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaidAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaymentInstructionsNumeric;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SignatureID;

class PaymentMandateType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MandateTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MandateTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("MandateTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMandateTypeCode", setter="setMandateTypeCode")
     */
    private $mandateTypeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaymentInstructionsNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaymentInstructionsNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumPaymentInstructionsNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumPaymentInstructionsNumeric", setter="setMaximumPaymentInstructionsNumeric")
     */
    private $maximumPaymentInstructionsNumeric;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaidAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaidAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumPaidAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumPaidAmount", setter="setMaximumPaidAmount")
     */
    private $maximumPaidAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\SignatureID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\SignatureID")
     * @JMS\Expose
     * @JMS\SerializedName("SignatureID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSignatureID", setter="setSignatureID")
     */
    private $signatureID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PayerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PayerParty")
     * @JMS\Expose
     * @JMS\SerializedName("PayerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayerParty", setter="setPayerParty")
     */
    private $payerParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PayerFinancialAccount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PayerFinancialAccount")
     * @JMS\Expose
     * @JMS\SerializedName("PayerFinancialAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayerFinancialAccount", setter="setPayerFinancialAccount")
     */
    private $payerFinancialAccount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentReversalPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentReversalPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentReversalPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentReversalPeriod", setter="setPaymentReversalPeriod")
     */
    private $paymentReversalPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Clause>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Clause>")
     * @JMS\Expose
     * @JMS\SerializedName("Clause")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Clause", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getClause", setter="setClause")
     */
    private $clause;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MandateTypeCode|null
     */
    public function getMandateTypeCode(): ?MandateTypeCode
    {
        return $this->mandateTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MandateTypeCode
     */
    public function getMandateTypeCodeWithCreate(): MandateTypeCode
    {
        $this->mandateTypeCode = is_null($this->mandateTypeCode) ? new MandateTypeCode() : $this->mandateTypeCode;

        return $this->mandateTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MandateTypeCode|null $mandateTypeCode
     * @return self
     */
    public function setMandateTypeCode(?MandateTypeCode $mandateTypeCode = null): self
    {
        $this->mandateTypeCode = $mandateTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMandateTypeCode(): self
    {
        $this->mandateTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaymentInstructionsNumeric|null
     */
    public function getMaximumPaymentInstructionsNumeric(): ?MaximumPaymentInstructionsNumeric
    {
        return $this->maximumPaymentInstructionsNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaymentInstructionsNumeric
     */
    public function getMaximumPaymentInstructionsNumericWithCreate(): MaximumPaymentInstructionsNumeric
    {
        $this->maximumPaymentInstructionsNumeric = is_null($this->maximumPaymentInstructionsNumeric) ? new MaximumPaymentInstructionsNumeric() : $this->maximumPaymentInstructionsNumeric;

        return $this->maximumPaymentInstructionsNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaymentInstructionsNumeric|null $maximumPaymentInstructionsNumeric
     * @return self
     */
    public function setMaximumPaymentInstructionsNumeric(
        ?MaximumPaymentInstructionsNumeric $maximumPaymentInstructionsNumeric = null,
    ): self {
        $this->maximumPaymentInstructionsNumeric = $maximumPaymentInstructionsNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumPaymentInstructionsNumeric(): self
    {
        $this->maximumPaymentInstructionsNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaidAmount|null
     */
    public function getMaximumPaidAmount(): ?MaximumPaidAmount
    {
        return $this->maximumPaidAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaidAmount
     */
    public function getMaximumPaidAmountWithCreate(): MaximumPaidAmount
    {
        $this->maximumPaidAmount = is_null($this->maximumPaidAmount) ? new MaximumPaidAmount() : $this->maximumPaidAmount;

        return $this->maximumPaidAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumPaidAmount|null $maximumPaidAmount
     * @return self
     */
    public function setMaximumPaidAmount(?MaximumPaidAmount $maximumPaidAmount = null): self
    {
        $this->maximumPaidAmount = $maximumPaidAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumPaidAmount(): self
    {
        $this->maximumPaidAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SignatureID|null
     */
    public function getSignatureID(): ?SignatureID
    {
        return $this->signatureID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SignatureID
     */
    public function getSignatureIDWithCreate(): SignatureID
    {
        $this->signatureID = is_null($this->signatureID) ? new SignatureID() : $this->signatureID;

        return $this->signatureID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SignatureID|null $signatureID
     * @return self
     */
    public function setSignatureID(?SignatureID $signatureID = null): self
    {
        $this->signatureID = $signatureID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSignatureID(): self
    {
        $this->signatureID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PayerParty|null
     */
    public function getPayerParty(): ?PayerParty
    {
        return $this->payerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PayerParty
     */
    public function getPayerPartyWithCreate(): PayerParty
    {
        $this->payerParty = is_null($this->payerParty) ? new PayerParty() : $this->payerParty;

        return $this->payerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PayerParty|null $payerParty
     * @return self
     */
    public function setPayerParty(?PayerParty $payerParty = null): self
    {
        $this->payerParty = $payerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayerParty(): self
    {
        $this->payerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PayerFinancialAccount|null
     */
    public function getPayerFinancialAccount(): ?PayerFinancialAccount
    {
        return $this->payerFinancialAccount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PayerFinancialAccount
     */
    public function getPayerFinancialAccountWithCreate(): PayerFinancialAccount
    {
        $this->payerFinancialAccount = is_null($this->payerFinancialAccount) ? new PayerFinancialAccount() : $this->payerFinancialAccount;

        return $this->payerFinancialAccount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PayerFinancialAccount|null $payerFinancialAccount
     * @return self
     */
    public function setPayerFinancialAccount(?PayerFinancialAccount $payerFinancialAccount = null): self
    {
        $this->payerFinancialAccount = $payerFinancialAccount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayerFinancialAccount(): self
    {
        $this->payerFinancialAccount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod|null
     */
    public function getValidityPeriod(): ?ValidityPeriod
    {
        return $this->validityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod
     */
    public function getValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->validityPeriod = is_null($this->validityPeriod) ? new ValidityPeriod() : $this->validityPeriod;

        return $this->validityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod|null $validityPeriod
     * @return self
     */
    public function setValidityPeriod(?ValidityPeriod $validityPeriod = null): self
    {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetValidityPeriod(): self
    {
        $this->validityPeriod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentReversalPeriod|null
     */
    public function getPaymentReversalPeriod(): ?PaymentReversalPeriod
    {
        return $this->paymentReversalPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentReversalPeriod
     */
    public function getPaymentReversalPeriodWithCreate(): PaymentReversalPeriod
    {
        $this->paymentReversalPeriod = is_null($this->paymentReversalPeriod) ? new PaymentReversalPeriod() : $this->paymentReversalPeriod;

        return $this->paymentReversalPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentReversalPeriod|null $paymentReversalPeriod
     * @return self
     */
    public function setPaymentReversalPeriod(?PaymentReversalPeriod $paymentReversalPeriod = null): self
    {
        $this->paymentReversalPeriod = $paymentReversalPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentReversalPeriod(): self
    {
        $this->paymentReversalPeriod = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Clause>|null
     */
    public function getClause(): ?array
    {
        return $this->clause;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Clause>|null $clause
     * @return self
     */
    public function setClause(?array $clause = null): self
    {
        $this->clause = $clause;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetClause(): self
    {
        $this->clause = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearClause(): self
    {
        $this->clause = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Clause|null
     */
    public function firstClause(): ?Clause
    {
        $clause = $this->clause ?? [];
        $clause = reset($clause);

        if ($clause === false) {
            return null;
        }

        return $clause;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Clause|null
     */
    public function lastClause(): ?Clause
    {
        $clause = $this->clause ?? [];
        $clause = end($clause);

        if ($clause === false) {
            return null;
        }

        return $clause;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Clause $clause
     * @return self
     */
    public function addToClause(Clause $clause): self
    {
        $this->clause[] = $clause;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Clause
     */
    public function addToClauseWithCreate(): Clause
    {
        $this->addToclause($clause = new Clause());

        return $clause;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Clause $clause
     * @return self
     */
    public function addOnceToClause(Clause $clause): self
    {
        if (!is_array($this->clause)) {
            $this->clause = [];
        }

        $this->clause[0] = $clause;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Clause
     */
    public function addOnceToClauseWithCreate(): Clause
    {
        if (!is_array($this->clause)) {
            $this->clause = [];
        }

        if ($this->clause === []) {
            $this->addOnceToclause(new Clause());
        }

        return $this->clause[0];
    }
}
