<?php

namespace horstoeko\invoicesuite\dto;

use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePaymentMeanDTO
{
    /**
     * The expected or used means of payment expressed as a code
     *
     * @var string|null
     */
    protected ?string $typeCode = null;

    /**
     * The expected or used means of payment expressed in text form
     *
     * @var string|null
     */
    protected ?string $name = null;

    /**
     * The primary account number (PAN) of the payment card
     *
     * @var string|null
     */
    protected ?string $financialCardId = null;

    /**
     * The name of the payment card holder
     *
     * @var string|null
     */
    protected ?string $financialCardHolder = null;

    /**
     * The identifier of the account to be debited
     *
     * @var string|null
     */
    protected ?string $buyerIban = null;

    /**
     * The payment account identifier
     *
     * @var string|null
     */
    protected ?string $payeeIban = null;

    /**
     * The name of the payment account
     *
     * @var string|null
     */
    protected ?string $payeeAccountName = null;

    /**
     * The national account number (not for SEPA)
     *
     * @var string|null
     */
    protected ?string $payeeProprietaryId = null;

    /**
     * The identifier of the payment service provider
     *
     * @var string|null
     */
    protected ?string $payeeBic = null;

    /**
     * The Text value used to link the payment to the invoice issued by the seller
     *
     * @var string|null
     */
    protected ?string $paymentReference = null;

    /**
     * The identification of the mandate reference
     *
     * @var string|null
     */
    protected ?string $mandate = null;

    /**
     * Constructor
     *
     * @param string|null $typeCode The expected or used means of payment expressed as a code
     * @param string|null $name The expected or used means of payment expressed in text form
     * @param string|null $financialCardId The primary account number (PAN) of the payment card
     * @param string|null $financialCardHolder The name of the payment card holder
     * @param string|null $buyerIban The identifier of the account to be debited
     * @param string|null $payeeIban The payment account identifier
     * @param string|null $payeeAccountName The name of the payment account
     * @param string|null $payeeProprietaryId The national account number (not for SEPA)
     * @param string|null $payeeBic The identifier of the payment service provider
     * @param string|null $paymentReference The Text value used to link the payment to the invoice issued by the seller
     * @param string|null $mandate The identification of the mandate reference
     */
    public function __construct(
        ?string $typeCode = null,
        ?string $name = null,
        ?string $financialCardId = null,
        ?string $financialCardHolder = null,
        ?string $buyerIban = null,
        ?string $payeeIban = null,
        ?string $payeeAccountName = null,
        ?string $payeeProprietaryId = null,
        ?string $payeeBic = null,
        ?string $paymentReference = null,
        ?string $mandate = null,
    ) {
        $this->setTypeCode($typeCode);
        $this->setName($name);
        $this->setFinancialCardId($financialCardId);
        $this->setFinancialCardHolder($financialCardHolder);
        $this->setBuyerIban($buyerIban);
        $this->setPayeeIban($payeeIban);
        $this->setPayeeAccountName($payeeAccountName);
        $this->setPayeeProprietaryId($payeeProprietaryId);
        $this->setPayeeBic($payeeBic);
        $this->setPaymentReference($paymentReference);
        $this->setMandate($mandate);
    }

    /**
     * Returns the expected or used means of payment expressed as a code
     *
     * @return string|null
     */
    public function getTypeCode(): ?string
    {
        return $this->typeCode;
    }

    /**
     * Sets the expected or used means of payment expressed as a code
     *
     * @param string|null $typeCode The expected or used means of payment expressed as a code
     * @return self
     */
    public function setTypeCode(?string $typeCode): self
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * Returns the expected or used means of payment expressed in text form
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets the expected or used means of payment expressed in text form
     *
     * @param string|null $name The expected or used means of payment expressed in text form
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Returns the primary account number (PAN) of the payment card
     *
     * @return string|null
     */
    public function getFinancialCardId(): ?string
    {
        return $this->financialCardId;
    }

    /**
     * Sets the primary account number (PAN) of the payment card
     *
     * @param string|null $financialCardId The primary account number (PAN) of the payment card
     * @return self
     */
    public function setFinancialCardId(?string $financialCardId): self
    {
        $this->financialCardId = $financialCardId;

        return $this;
    }

    /**
     * Returns the name of the payment card holder
     *
     * @return string|null
     */
    public function getFinancialCardHolder(): ?string
    {
        return $this->financialCardHolder;
    }

    /**
     * Sets the name of the payment card holder
     *
     * @param string|null $financialCardHolder The name of the payment card holder
     * @return self
     */
    public function setFinancialCardHolder(?string $financialCardHolder): self
    {
        $this->financialCardHolder = $financialCardHolder;

        return $this;
    }

    /**
     * Returns the identifier of the account to be debited
     *
     * @return string|null
     */
    public function getBuyerIban(): ?string
    {
        return $this->buyerIban;
    }

    /**
     * Sets the identifier of the account to be debited
     *
     * @param string|null $buyerIban The identifier of the account to be debited
     * @return self
     */
    public function setBuyerIban(?string $buyerIban): self
    {
        $this->buyerIban = $buyerIban;

        return $this;
    }

    /**
     * Returns the payment account identifier
     *
     * @return string|null
     */
    public function getPayeeIban(): ?string
    {
        return $this->payeeIban;
    }

    /**
     * Sets the payment account identifier
     *
     * @param string|null $payeeIban The payment account identifier
     * @return self
     */
    public function setPayeeIban(?string $payeeIban): self
    {
        $this->payeeIban = $payeeIban;

        return $this;
    }

    /**
     * Returns the name of the payment account
     *
     * @return string|null
     */
    public function getPayeeAccountName(): ?string
    {
        return $this->payeeAccountName;
    }

    /**
     * Sets the name of the payment account
     *
     * @param string|null $payeeAccountName The name of the payment account
     * @return self
     */
    public function setPayeeAccountName(?string $payeeAccountName): self
    {
        $this->payeeAccountName = $payeeAccountName;

        return $this;
    }

    /**
     * Returns the national account number (not for SEPA)
     *
     * @return string|null
     */
    public function getPayeeProprietaryId(): ?string
    {
        return $this->payeeProprietaryId;
    }

    /**
     * Sets the national account number (not for SEPA)
     *
     * @param string|null $payeeProprietaryId The national account number (not for SEPA)
     * @return self
     */
    public function setPayeeProprietaryId(?string $payeeProprietaryId): self
    {
        $this->payeeProprietaryId = $payeeProprietaryId;

        return $this;
    }

    /**
     * Returns the identifier of the payment service provider
     *
     * @return string|null
     */
    public function getPayeeBic(): ?string
    {
        return $this->payeeBic;
    }

    /**
     * Sets the identifier of the payment service provider
     *
     * @param string|null $payeeBic The identifier of the payment service provider
     * @return self
     */
    public function setPayeeBic(?string $payeeBic): self
    {
        $this->payeeBic = $payeeBic;

        return $this;
    }

    /**
     * Returns the Text value used to link the payment to the invoice issued by the seller
     *
     * @return string|null
     */
    public function getPaymentReference(): ?string
    {
        return $this->paymentReference;
    }

    /**
     * Sets the Text value used to link the payment to the invoice issued by the seller
     *
     * @param string|null $paymentReference The Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setPaymentReference(?string $paymentReference): self
    {
        $this->paymentReference = $paymentReference;

        return $this;
    }

    /**
     * Returns the identification of the mandate reference
     *
     * @return string|null
     */
    public function getMandate(): ?string
    {
        return $this->mandate;
    }

    /**
     * Sets the identification of the mandate reference
     *
     * @param string|null $mandate The identification of the mandate reference
     * @return self
     */
    public function setMandate(?string $mandate): self
    {
        $this->mandate = $mandate;

        return $this;
    }

    /**
     * Create a payment mean for SEPA credit transfer, German: Überweisung
     *
     * @param string|null $payeeIban Payment account identifier
     * @param string|null $payeeAccountName Name of the payment account
     * @param string|null $payeeProprietaryId National account number (not for SEPA)
     * @param string|null $payeeBic Identifier of the payment service provider
     * @param string|null $paymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public static function createAsCreditTransferSepa(
        ?string $payeeIban = null,
        ?string $payeeAccountName = null,
        ?string $payeeProprietaryId = null,
        ?string $payeeBic = null,
        ?string $paymentReference = null,
    ): self {
        return new static(
            typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            payeeIban: $payeeIban,
            payeeAccountName: $payeeAccountName,
            payeeProprietaryId: $payeeProprietaryId,
            payeeBic: $payeeBic,
            paymentReference: $paymentReference
        );
    }

    /**
     * Create a payment mean for non-SEPA credit transfer, German: Überweisung
     *
     * @param string|null $payeeIban Payment account identifier
     * @param string|null $payeeAccountName Name of the payment account
     * @param string|null $payeeProprietaryId National account number (not for SEPA)
     * @param string|null $payeeBic Identifier of the payment service provider
     * @param string|null $paymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public static function createAsCreditTransferNoSepa(
        ?string $payeeIban = null,
        ?string $payeeAccountName = null,
        ?string $payeeProprietaryId = null,
        ?string $payeeBic = null,
        ?string $paymentReference = null,
    ): self {
        return new static(
            typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value,
            payeeIban: $payeeIban,
            payeeAccountName: $payeeAccountName,
            payeeProprietaryId: $payeeProprietaryId,
            payeeBic: $payeeBic,
            paymentReference: $paymentReference
        );
    }

    /**
     * Create a payment mean for SEPA direct debit, German: Lastschrift
     *
     * @param string|null $buyerIban Identifier of the account to be debited
     * @param string|null $mandate Identification of the mandate reference
     * @return self
     */
    public static function createAsDirectDebitSepa(?string $buyerIban = null, ?string $mandate = null): self
    {
        return new static(
            typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            buyerIban: $buyerIban,
            mandate: $mandate,
        );
    }

    /**
     * Create a payment mean for SEPA direct debit, German: Lastschrift
     *
     * @param string|null $buyerIban Identifier of the account to be debited
     * @param string|null $mandate Identification of the mandate reference
     * @return self
     */
    public static function createAsDirectDebitNoSepa(?string $buyerIban = null, ?string $mandate = null): self
    {
        return new static(
            typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,
            buyerIban: $buyerIban,
            mandate: $mandate,
        );
    }

    /**
     * Create a payment mean for payment-card payment
     *
     * @param string|null $financialCardId Primary account number (PAN) of the payment card
     * @param string|null $financialCardHolder Name of the payment card holder
     * @return self
     */
    public static function createAsPaymentCardPayment(
        ?string $financialCardId = null,
        ?string $financialCardHolder = null,
    ): self {
        return new static(
            typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            financialCardId: $financialCardId,
            financialCardHolder: $financialCardHolder,
        );
    }
}
