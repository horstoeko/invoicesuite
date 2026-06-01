<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MandateTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumPaidAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumPaymentInstructionsNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SignatureID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class PaymentMandateType
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
     * @var null|MandateTypeCode
     */
    #[JMS\Accessor(getter: 'getMandateTypeCode', setter: 'setMandateTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MandateTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MandateTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $mandateTypeCode;

    /**
     * @var null|MaximumPaymentInstructionsNumeric
     */
    #[JMS\Accessor(getter: 'getMaximumPaymentInstructionsNumeric', setter: 'setMaximumPaymentInstructionsNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumPaymentInstructionsNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumPaymentInstructionsNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumPaymentInstructionsNumeric;

    /**
     * @var null|MaximumPaidAmount
     */
    #[JMS\Accessor(getter: 'getMaximumPaidAmount', setter: 'setMaximumPaidAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumPaidAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumPaidAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumPaidAmount;

    /**
     * @var null|SignatureID
     */
    #[JMS\Accessor(getter: 'getSignatureID', setter: 'setSignatureID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SignatureID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SignatureID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $signatureID;

    /**
     * @var null|PayerParty
     */
    #[JMS\Accessor(getter: 'getPayerParty', setter: 'setPayerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PayerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PayerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $payerParty;

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
     * @var null|PaymentReversalPeriod
     */
    #[JMS\Accessor(getter: 'getPaymentReversalPeriod', setter: 'setPaymentReversalPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentReversalPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PaymentReversalPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $paymentReversalPeriod;

    /**
     * @var null|array<Clause>
     */
    #[JMS\Accessor(getter: 'getClause', setter: 'setClause')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Clause')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Clause>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Clause', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->mandateTypeCode ??= new MandateTypeCode();

        return $this->mandateTypeCode;
    }

    /**
     * @param  null|MandateTypeCode $mandateTypeCode
     * @return static
     */
    public function setMandateTypeCode(
        ?MandateTypeCode $mandateTypeCode = null
    ): static {
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
        $this->maximumPaymentInstructionsNumeric ??= new MaximumPaymentInstructionsNumeric();

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
        $this->maximumPaidAmount ??= new MaximumPaidAmount();

        return $this->maximumPaidAmount;
    }

    /**
     * @param  null|MaximumPaidAmount $maximumPaidAmount
     * @return static
     */
    public function setMaximumPaidAmount(
        ?MaximumPaidAmount $maximumPaidAmount = null
    ): static {
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
        $this->signatureID ??= new SignatureID();

        return $this->signatureID;
    }

    /**
     * @param  null|SignatureID $signatureID
     * @return static
     */
    public function setSignatureID(
        ?SignatureID $signatureID = null
    ): static {
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
        $this->payerParty ??= new PayerParty();

        return $this->payerParty;
    }

    /**
     * @param  null|PayerParty $payerParty
     * @return static
     */
    public function setPayerParty(
        ?PayerParty $payerParty = null
    ): static {
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
        $this->paymentReversalPeriod ??= new PaymentReversalPeriod();

        return $this->paymentReversalPeriod;
    }

    /**
     * @param  null|PaymentReversalPeriod $paymentReversalPeriod
     * @return static
     */
    public function setPaymentReversalPeriod(
        ?PaymentReversalPeriod $paymentReversalPeriod = null
    ): static {
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
    public function setClause(
        ?array $clause = null
    ): static {
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
    public function addToClause(
        Clause $clause
    ): static {
        $this->clause[] = $clause;

        return $this;
    }

    /**
     * @return Clause
     */
    public function addToClauseWithCreate(): Clause
    {
        $this->addToClause($clause = new Clause());

        return $clause;
    }

    /**
     * @param  Clause $clause
     * @return static
     */
    public function addOnceToClause(
        Clause $clause
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->clause)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->clause)) {
            $this->clause = [];
        }

        if ([] === $this->clause) {
            $this->addOnceToClause(new Clause());
        }

        return $this->clause[0];
    }
}
