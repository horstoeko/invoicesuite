<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JsonSerializable;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePaymentMeanDTO implements JsonSerializable
{
    /**
     * The expected or used means of payment expressed as a code
     *
     * @var null|string
     */
    protected ?string $typeCode = null;

    /**
     * The expected or used means of payment expressed in text form
     *
     * @var null|string
     */
    protected ?string $name = null;

    /**
     * The primary account number (PAN) of the payment card
     *
     * @var null|string
     */
    protected ?string $financialCardId = null;

    /**
     * The name of the payment card holder
     *
     * @var null|string
     */
    protected ?string $financialCardHolder = null;

    /**
     * The identifier of the account to be debited
     *
     * @var null|string
     */
    protected ?string $buyerIban = null;

    /**
     * The name of the account to be debited
     *
     * @var null|string
     */
    protected ?string $buyerAccountName = null;

    /**
     * The payment account identifier
     *
     * @var null|string
     */
    protected ?string $payeeIban = null;

    /**
     * The name of the payment account
     *
     * @var null|string
     */
    protected ?string $payeeAccountName = null;

    /**
     * The national account number (not for SEPA)
     *
     * @var null|string
     */
    protected ?string $payeeProprietaryId = null;

    /**
     * The identifier of the payment service provider
     *
     * @var null|string
     */
    protected ?string $payeeBic = null;

    /**
     * The Text value used to link the payment to the invoice issued by the seller
     *
     * @var null|string
     */
    protected ?string $paymentReference = null;

    /**
     * The identification of the mandate reference
     *
     * @var null|string
     */
    protected ?string $mandate = null;

    /**
     * Constructor
     *
     * @param null|string $typeCode            The expected or used means of payment expressed as a code
     * @param null|string $name                The expected or used means of payment expressed in text form
     * @param null|string $financialCardId     The primary account number (PAN) of the payment card
     * @param null|string $financialCardHolder The name of the payment card holder
     * @param null|string $buyerIban           The identifier of the account to be debited
     * @param null|string $payeeIban           The payment account identifier
     * @param null|string $payeeAccountName    The name of the payment account
     * @param null|string $payeeProprietaryId  The national account number (not for SEPA)
     * @param null|string $payeeBic            The identifier of the payment service provider
     * @param null|string $paymentReference    The Text value used to link the payment to the invoice issued by the seller
     * @param null|string $mandate             The identification of the mandate reference
     * @param null|string $buyerAccountName    The name of the account to be debited
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
        ?string $buyerAccountName = null
    ) {
        $this->setTypeCode($typeCode);
        $this->setName($name);
        $this->setFinancialCardId($financialCardId);
        $this->setFinancialCardHolder($financialCardHolder);
        $this->setBuyerIban($buyerIban);
        $this->setBuyerAccountName($buyerAccountName);
        $this->setPayeeIban($payeeIban);
        $this->setPayeeAccountName($payeeAccountName);
        $this->setPayeeProprietaryId($payeeProprietaryId);
        $this->setPayeeBic($payeeBic);
        $this->setPaymentReference($paymentReference);
        $this->setMandate($mandate);
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * Returns the expected or used means of payment expressed as a code
     *
     * @return null|string
     */
    public function getTypeCode(): ?string
    {
        return $this->typeCode;
    }

    /**
     * Sets the expected or used means of payment expressed as a code
     *
     * @param  null|string $typeCode The expected or used means of payment expressed as a code
     * @return static
     */
    public function setTypeCode(
        ?string $typeCode
    ): static {
        $this->typeCode = InvoiceSuiteStringUtils::asNullWhenEmpty($typeCode);

        return $this;
    }

    /**
     * Returns the expected or used means of payment expressed in text form
     *
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets the expected or used means of payment expressed in text form
     *
     * @param  null|string $name The expected or used means of payment expressed in text form
     * @return static
     */
    public function setName(
        ?string $name
    ): static {
        $this->name = InvoiceSuiteStringUtils::asNullWhenEmpty($name);

        return $this;
    }

    /**
     * Returns the primary account number (PAN) of the payment card
     *
     * @return null|string
     */
    public function getFinancialCardId(): ?string
    {
        return $this->financialCardId;
    }

    /**
     * Sets the primary account number (PAN) of the payment card
     *
     * @param  null|string $financialCardId The primary account number (PAN) of the payment card
     * @return static
     */
    public function setFinancialCardId(
        ?string $financialCardId
    ): static {
        $this->financialCardId = InvoiceSuiteStringUtils::asNullWhenEmpty($financialCardId);

        return $this;
    }

    /**
     * Returns the name of the payment card holder
     *
     * @return null|string
     */
    public function getFinancialCardHolder(): ?string
    {
        return $this->financialCardHolder;
    }

    /**
     * Sets the name of the payment card holder
     *
     * @param  null|string $financialCardHolder The name of the payment card holder
     * @return static
     */
    public function setFinancialCardHolder(
        ?string $financialCardHolder
    ): static {
        $this->financialCardHolder = InvoiceSuiteStringUtils::asNullWhenEmpty($financialCardHolder);

        return $this;
    }

    /**
     * Returns the identifier of the account to be debited
     *
     * @return null|string
     */
    public function getBuyerIban(): ?string
    {
        return $this->buyerIban;
    }

    /**
     * Sets the identifier of the account to be debited
     *
     * @param  null|string $buyerIban The identifier of the account to be debited
     * @return static
     */
    public function setBuyerIban(
        ?string $buyerIban
    ): static {
        $this->buyerIban = InvoiceSuiteStringUtils::asNullWhenEmpty($buyerIban);

        return $this;
    }

    /**
     * Returns the name of the account to be debited
     *
     * @return null|string
     */
    public function getBuyerAccountName(): ?string
    {
        return $this->buyerAccountName;
    }

    /**
     * Sets the name of the account to be debited
     *
     * @param  null|string $buyerAccountName The name of the account to be debited
     * @return static
     */
    public function setBuyerAccountName(
        ?string $buyerAccountName
    ): static {
        $this->buyerAccountName = InvoiceSuiteStringUtils::asNullWhenEmpty($buyerAccountName);

        return $this;
    }

    /**
     * Returns the payment account identifier
     *
     * @return null|string
     */
    public function getPayeeIban(): ?string
    {
        return $this->payeeIban;
    }

    /**
     * Sets the payment account identifier
     *
     * @param  null|string $payeeIban The payment account identifier
     * @return static
     */
    public function setPayeeIban(
        ?string $payeeIban
    ): static {
        $this->payeeIban = InvoiceSuiteStringUtils::asNullWhenEmpty($payeeIban);

        return $this;
    }

    /**
     * Returns the name of the payment account
     *
     * @return null|string
     */
    public function getPayeeAccountName(): ?string
    {
        return $this->payeeAccountName;
    }

    /**
     * Sets the name of the payment account
     *
     * @param  null|string $payeeAccountName The name of the payment account
     * @return static
     */
    public function setPayeeAccountName(
        ?string $payeeAccountName
    ): static {
        $this->payeeAccountName = InvoiceSuiteStringUtils::asNullWhenEmpty($payeeAccountName);

        return $this;
    }

    /**
     * Returns the national account number (not for SEPA)
     *
     * @return null|string
     */
    public function getPayeeProprietaryId(): ?string
    {
        return $this->payeeProprietaryId;
    }

    /**
     * Sets the national account number (not for SEPA)
     *
     * @param  null|string $payeeProprietaryId The national account number (not for SEPA)
     * @return static
     */
    public function setPayeeProprietaryId(
        ?string $payeeProprietaryId
    ): static {
        $this->payeeProprietaryId = InvoiceSuiteStringUtils::asNullWhenEmpty($payeeProprietaryId);

        return $this;
    }

    /**
     * Returns the identifier of the payment service provider
     *
     * @return null|string
     */
    public function getPayeeBic(): ?string
    {
        return $this->payeeBic;
    }

    /**
     * Sets the identifier of the payment service provider
     *
     * @param  null|string $payeeBic The identifier of the payment service provider
     * @return static
     */
    public function setPayeeBic(
        ?string $payeeBic
    ): static {
        $this->payeeBic = InvoiceSuiteStringUtils::asNullWhenEmpty($payeeBic);

        return $this;
    }

    /**
     * Returns the Text value used to link the payment to the invoice issued by the seller
     *
     * @return null|string
     */
    public function getPaymentReference(): ?string
    {
        return $this->paymentReference;
    }

    /**
     * Sets the Text value used to link the payment to the invoice issued by the seller
     *
     * @param  null|string $paymentReference The Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setPaymentReference(
        ?string $paymentReference
    ): static {
        $this->paymentReference = InvoiceSuiteStringUtils::asNullWhenEmpty($paymentReference);

        return $this;
    }

    /**
     * Returns the identification of the mandate reference
     *
     * @return null|string
     */
    public function getMandate(): ?string
    {
        return $this->mandate;
    }

    /**
     * Sets the identification of the mandate reference
     *
     * @param  null|string $mandate The identification of the mandate reference
     * @return static
     */
    public function setMandate(
        ?string $mandate
    ): static {
        $this->mandate = InvoiceSuiteStringUtils::asNullWhenEmpty($mandate);

        return $this;
    }

    /**
     * Create a payment mean for SEPA credit transfer, German: Überweisung
     *
     * @param  null|string $payeeIban          Payment account identifier
     * @param  null|string $payeeAccountName   Name of the payment account
     * @param  null|string $payeeProprietaryId National account number (not for SEPA)
     * @param  null|string $payeeBic           Identifier of the payment service provider
     * @param  null|string $paymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public static function createAsCreditTransferSepa(
        ?string $payeeIban = null,
        ?string $payeeAccountName = null,
        ?string $payeeProprietaryId = null,
        ?string $payeeBic = null,
        ?string $paymentReference = null
    ): self {
        return new self(
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
     * @param  null|string $payeeIban          Payment account identifier
     * @param  null|string $payeeAccountName   Name of the payment account
     * @param  null|string $payeeProprietaryId National account number (not for SEPA)
     * @param  null|string $payeeBic           Identifier of the payment service provider
     * @param  null|string $paymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public static function createAsCreditTransferNoSepa(
        ?string $payeeIban = null,
        ?string $payeeAccountName = null,
        ?string $payeeProprietaryId = null,
        ?string $payeeBic = null,
        ?string $paymentReference = null
    ): self {
        return new self(
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
     * @param  null|string $buyerIban        Identifier of the account to be debited
     * @param  null|string $mandate          Identification of the mandate reference
     * @param  null|string $buyerAccountName Name of the account to be debited
     * @return self
     */
    public static function createAsDirectDebitSepa(
        ?string $buyerIban = null,
        ?string $mandate = null,
        ?string $buyerAccountName = null
    ): self {
        return new self(
            typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            buyerIban: $buyerIban,
            mandate: $mandate,
            buyerAccountName: $buyerAccountName,
        );
    }

    /**
     * Create a payment mean for SEPA direct debit, German: Lastschrift
     *
     * @param  null|string $buyerIban        Identifier of the account to be debited
     * @param  null|string $mandate          Identification of the mandate reference
     * @param  null|string $buyerAccountName Name of the account to be debited
     * @return self
     */
    public static function createAsDirectDebitNoSepa(
        ?string $buyerIban = null,
        ?string $mandate = null,
        ?string $buyerAccountName = null
    ): self {
        return new self(
            typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,
            buyerIban: $buyerIban,
            mandate: $mandate,
            buyerAccountName: $buyerAccountName,
        );
    }

    /**
     * Create a payment mean for payment-card payment
     *
     * @param  null|string $financialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $financialCardHolder Name of the payment card holder
     * @return self
     */
    public static function createAsPaymentCardPayment(
        ?string $financialCardId = null,
        ?string $financialCardHolder = null
    ): self {
        return new self(
            typeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            financialCardId: $financialCardId,
            financialCardHolder: $financialCardHolder,
        );
    }
}
