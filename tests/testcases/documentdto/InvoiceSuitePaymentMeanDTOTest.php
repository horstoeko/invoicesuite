<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;

class InvoiceSuitePaymentMeanDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();

        $this->assertNull($invoiceSuitePaymentMeanDTO->getTypeCode());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getName());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getFinancialCardId());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getFinancialCardHolder());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getBuyerIban());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getPayeeIban());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getPayeeAccountName());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getPayeeProprietaryId());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getPayeeBic());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getPaymentReference());
        $this->assertNull($invoiceSuitePaymentMeanDTO->getMandate());
    }

    public function testTypeCodeGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $typeCodeValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setTypeCode($typeCodeValue);

        $this->assertSame($typeCodeValue, $invoiceSuitePaymentMeanDTO->getTypeCode());
    }

    public function testNameGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $nameValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setName($nameValue);

        $this->assertSame($nameValue, $invoiceSuitePaymentMeanDTO->getName());
    }

    public function testFinancialCardIdGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $financialCardIdValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setFinancialCardId($financialCardIdValue);

        $this->assertSame($financialCardIdValue, $invoiceSuitePaymentMeanDTO->getFinancialCardId());
    }

    public function testFinancialCardHolderGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $financialCardHolderValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setFinancialCardHolder($financialCardHolderValue);

        $this->assertSame($financialCardHolderValue, $invoiceSuitePaymentMeanDTO->getFinancialCardHolder());
    }

    public function testBuyerIbanGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $buyerIbanValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setBuyerIban($buyerIbanValue);

        $this->assertSame($buyerIbanValue, $invoiceSuitePaymentMeanDTO->getBuyerIban());
    }

    public function testPayeeIbanGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $payeeIbanValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setPayeeIban($payeeIbanValue);

        $this->assertSame($payeeIbanValue, $invoiceSuitePaymentMeanDTO->getPayeeIban());
    }

    public function testPayeeAccountNameGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $payeeAccountNameValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setPayeeAccountName($payeeAccountNameValue);

        $this->assertSame($payeeAccountNameValue, $invoiceSuitePaymentMeanDTO->getPayeeAccountName());
    }

    public function testPayeeProprietaryIdGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $payeeProprietaryIdValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setPayeeProprietaryId($payeeProprietaryIdValue);

        $this->assertSame($payeeProprietaryIdValue, $invoiceSuitePaymentMeanDTO->getPayeeProprietaryId());
    }

    public function testPayeeBicGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $payeeBicValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setPayeeBic($payeeBicValue);

        $this->assertSame($payeeBicValue, $invoiceSuitePaymentMeanDTO->getPayeeBic());
    }

    public function testPaymentReferenceGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $paymentReferenceValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setPaymentReference($paymentReferenceValue);

        $this->assertSame($paymentReferenceValue, $invoiceSuitePaymentMeanDTO->getPaymentReference());
    }

    public function testMandateGetterAndSetter(): void
    {
        $invoiceSuitePaymentMeanDTO = new InvoiceSuitePaymentMeanDTO();
        $mandateValue = "Example Value";
        $invoiceSuitePaymentMeanDTO->setMandate($mandateValue);

        $this->assertSame($mandateValue, $invoiceSuitePaymentMeanDTO->getMandate());
    }

    public function testCreateAsCreditTransferSepaWithValues(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsCreditTransferSepa(
            'DE12500105170648489890',
            'ACME GmbH',
            'ACME-4711',
            'BELADEBEXXX',
            'Invoice 123'
        );

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value, $dto->getTypeCode());
        $this->assertSame('DE12500105170648489890', $dto->getPayeeIban());
        $this->assertSame('ACME GmbH', $dto->getPayeeAccountName());
        $this->assertSame('ACME-4711', $dto->getPayeeProprietaryId());
        $this->assertSame('BELADEBEXXX', $dto->getPayeeBic());
        $this->assertSame('Invoice 123', $dto->getPaymentReference());
    }

    public function testCreateAsCreditTransferSepaDefaults(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsCreditTransferSepa();

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value, $dto->getTypeCode());
        $this->assertNull($dto->getPayeeIban());
        $this->assertNull($dto->getPayeeAccountName());
        $this->assertNull($dto->getPayeeProprietaryId());
        $this->assertNull($dto->getPayeeBic());
        $this->assertNull($dto->getPaymentReference());
    }

    public function testCreateAsCreditTransferNoSepaWithValues(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsCreditTransferNoSepa(
            'US001234567890',
            'ACME Inc.',
            'ACME-US-99',
            'BOFAUS3N',
            'INV-2025-0001'
        );

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value, $dto->getTypeCode());
        $this->assertSame('US001234567890', $dto->getPayeeIban());
        $this->assertSame('ACME Inc.', $dto->getPayeeAccountName());
        $this->assertSame('ACME-US-99', $dto->getPayeeProprietaryId());
        $this->assertSame('BOFAUS3N', $dto->getPayeeBic());
        $this->assertSame('INV-2025-0001', $dto->getPaymentReference());
    }

    public function testCreateAsCreditTransferNoSepaDefaults(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsCreditTransferNoSepa();

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value, $dto->getTypeCode());
        $this->assertNull($dto->getPayeeIban());
        $this->assertNull($dto->getPayeeAccountName());
        $this->assertNull($dto->getPayeeProprietaryId());
        $this->assertNull($dto->getPayeeBic());
        $this->assertNull($dto->getPaymentReference());
    }

    public function testCreateAsDirectDebitSepaWithValues(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsDirectDebitSepa(
            'DE44500105175407324931',
            'MANDATE-2025-ABC'
        );

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value, $dto->getTypeCode());
        $this->assertSame('DE44500105175407324931', $dto->getBuyerIban());
        $this->assertSame('MANDATE-2025-ABC', $dto->getMandate());
    }

    public function testCreateAsDirectDebitSepaDefaults(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsDirectDebitSepa();

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value, $dto->getTypeCode());
        $this->assertNull($dto->getBuyerIban());
        $this->assertNull($dto->getMandate());
    }

    public function testCreateAsDirectDebitNoSepaWithValues(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsDirectDebitNoSepa(
            'GB29NWBK60161331926819',
            'MANDATE-EN-007'
        );

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value, $dto->getTypeCode());
        $this->assertSame('GB29NWBK60161331926819', $dto->getBuyerIban());
        $this->assertSame('MANDATE-EN-007', $dto->getMandate());
    }

    public function testCreateAsDirectDebitNoSepaDefaults(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsDirectDebitNoSepa();

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value, $dto->getTypeCode());
        $this->assertNull($dto->getBuyerIban());
        $this->assertNull($dto->getMandate());
    }

    public function testCreateAsPaymentCardPaymentWithValues(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsPaymentCardPayment(
            '**** **** **** 4242',
            'Max Mustermann'
        );

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value, $dto->getTypeCode());
        $this->assertSame('**** **** **** 4242', $dto->getFinancialCardId());
        $this->assertSame('Max Mustermann', $dto->getFinancialCardHolder());
    }

    public function testCreateAsPaymentCardPaymentDefaults(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsPaymentCardPayment();

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value, $dto->getTypeCode());
        $this->assertNull($dto->getFinancialCardId());
        $this->assertNull($dto->getFinancialCardHolder());
    }
}
