<?php

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePaymentMeanDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'typeCode'           => '58',
            'name'               => 'SEPA Credit Transfer',
            'financialCardId'    => '4111111111111111',
            'financialCardHolder'=> 'Jane Doe',
            'buyerIban'          => 'DE02120300000000202051',
            'payeeIban'          => 'DE89370400440532013000',
            'payeeAccountName'   => 'ACME GmbH',
            'payeeProprietaryId' => '1234567890',
            'payeeBic'           => 'COBADEFFXXX',
            'paymentReference'   => 'INV-2024-0001',
            'mandate'            => 'MDT-42',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setTypeCode',           'getTypeCode',           '30'],
            ['setName',               'getName',               'Direct Debit'],
            ['setFinancialCardId',    'getFinancialCardId',    '5555444433331111'],
            ['setFinancialCardHolder','getFinancialCardHolder','John Smith'],
            ['setBuyerIban',          'getBuyerIban',          'DE44500105175407324931'],
            ['setPayeeIban',          'getPayeeIban',          'DE21500500009876543210'],
            ['setPayeeAccountName',   'getPayeeAccountName',   'Widgets Ltd'],
            ['setPayeeProprietaryId', 'getPayeeProprietaryId', '987654321'],
            ['setPayeeBic',           'getPayeeBic',           'DEUTDEFF500'],
            ['setPaymentReference',   'getPaymentReference',   'REF-ABC-123'],
            ['setMandate',            'getMandate',            'MAND-0007'],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuitePaymentMeanDTO();

        $this->assertNull($dto->getTypeCode());
        $this->assertNull($dto->getName());
        $this->assertNull($dto->getFinancialCardId());
        $this->assertNull($dto->getFinancialCardHolder());
        $this->assertNull($dto->getBuyerIban());
        $this->assertNull($dto->getPayeeIban());
        $this->assertNull($dto->getPayeeAccountName());
        $this->assertNull($dto->getPayeeProprietaryId());
        $this->assertNull($dto->getPayeeBic());
        $this->assertNull($dto->getPaymentReference());
        $this->assertNull($dto->getMandate());
        $this->assertInstanceOf(InvoiceSuitePaymentMeanDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuitePaymentMeanDTO(
            $v['typeCode'],
            $v['name'],
            $v['financialCardId'],
            $v['financialCardHolder'],
            $v['buyerIban'],
            $v['payeeIban'],
            $v['payeeAccountName'],
            $v['payeeProprietaryId'],
            $v['payeeBic'],
            $v['paymentReference'],
            $v['mandate']
        );

        $this->assertSame($v['typeCode'], $dto->getTypeCode());
        $this->assertSame($v['name'], $dto->getName());
        $this->assertSame($v['financialCardId'], $dto->getFinancialCardId());
        $this->assertSame($v['financialCardHolder'], $dto->getFinancialCardHolder());
        $this->assertSame($v['buyerIban'], $dto->getBuyerIban());
        $this->assertSame($v['payeeIban'], $dto->getPayeeIban());
        $this->assertSame($v['payeeAccountName'], $dto->getPayeeAccountName());
        $this->assertSame($v['payeeProprietaryId'], $dto->getPayeeProprietaryId());
        $this->assertSame($v['payeeBic'], $dto->getPayeeBic());
        $this->assertSame($v['paymentReference'], $dto->getPaymentReference());
        $this->assertSame($v['mandate'], $dto->getMandate());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuitePaymentMeanDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testFactoryCreateAsCreditTransferSepa(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsCreditTransferSepa(
            'DE44500105175407324931',
            'Widgets Ltd',
            'ACC-001',
            'DEUTDEFF500',
            'INV-1'
        );

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value, $dto->getTypeCode());
        $this->assertSame('DE44500105175407324931', $dto->getPayeeIban());
        $this->assertSame('Widgets Ltd', $dto->getPayeeAccountName());
        $this->assertSame('ACC-001', $dto->getPayeeProprietaryId());
        $this->assertSame('DEUTDEFF500', $dto->getPayeeBic());
        $this->assertSame('INV-1', $dto->getPaymentReference());
        $this->assertNull($dto->getBuyerIban());
        $this->assertNull($dto->getMandate());
        $this->assertNull($dto->getFinancialCardId());
        $this->assertNull($dto->getFinancialCardHolder());
    }

    public function testFactoryCreateAsCreditTransferNoSepa(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsCreditTransferNoSepa(
            'GB33BUKB20201555555555',
            'ACME LTD',
            'UK-ACC-99',
            'BUKBGB22',
            'INV-2'
        );

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value, $dto->getTypeCode());
        $this->assertSame('GB33BUKB20201555555555', $dto->getPayeeIban());
        $this->assertSame('ACME LTD', $dto->getPayeeAccountName());
        $this->assertSame('UK-ACC-99', $dto->getPayeeProprietaryId());
        $this->assertSame('BUKBGB22', $dto->getPayeeBic());
        $this->assertSame('INV-2', $dto->getPaymentReference());
        $this->assertNull($dto->getBuyerIban());
        $this->assertNull($dto->getMandate());
        $this->assertNull($dto->getFinancialCardId());
        $this->assertNull($dto->getFinancialCardHolder());
    }

    public function testFactoryCreateAsDirectDebitSepa(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsDirectDebitSepa('DE02120300000000202051', 'MDT-42');

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value, $dto->getTypeCode());
        $this->assertSame('DE02120300000000202051', $dto->getBuyerIban());
        $this->assertSame('MDT-42', $dto->getMandate());
        $this->assertNull($dto->getPayeeIban());
        $this->assertNull($dto->getPayeeAccountName());
        $this->assertNull($dto->getPayeeProprietaryId());
        $this->assertNull($dto->getPayeeBic());
        $this->assertNull($dto->getPaymentReference());
        $this->assertNull($dto->getFinancialCardId());
        $this->assertNull($dto->getFinancialCardHolder());
    }

    public function testFactoryCreateAsDirectDebitNoSepa(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsDirectDebitNoSepa('FR1420041010050500013M02606', 'MDT-99');

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value, $dto->getTypeCode());
        $this->assertSame('FR1420041010050500013M02606', $dto->getBuyerIban());
        $this->assertSame('MDT-99', $dto->getMandate());
        $this->assertNull($dto->getPayeeIban());
        $this->assertNull($dto->getPayeeAccountName());
        $this->assertNull($dto->getPayeeProprietaryId());
        $this->assertNull($dto->getPayeeBic());
        $this->assertNull($dto->getPaymentReference());
        $this->assertNull($dto->getFinancialCardId());
        $this->assertNull($dto->getFinancialCardHolder());
    }

    public function testFactoryCreateAsPaymentCardPayment(): void
    {
        $dto = InvoiceSuitePaymentMeanDTO::createAsPaymentCardPayment('5555444433331111', 'John Smith');

        $this->assertSame(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value, $dto->getTypeCode());
        $this->assertSame('5555444433331111', $dto->getFinancialCardId());
        $this->assertSame('John Smith', $dto->getFinancialCardHolder());
        $this->assertNull($dto->getBuyerIban());
        $this->assertNull($dto->getMandate());
        $this->assertNull($dto->getPayeeIban());
        $this->assertNull($dto->getPayeeAccountName());
        $this->assertNull($dto->getPayeeProprietaryId());
        $this->assertNull($dto->getPayeeBic());
        $this->assertNull($dto->getPaymentReference());
    }

    #endregion
}
