<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteDocumentHeaderDTOTest extends TestCase
{
    #region DataProvider

    public static function scalarSetterProvider(): array
    {
        $d1 = new DateTimeImmutable('2024-01-01');
        $d2 = new DateTimeImmutable('2024-02-02');

        return [
            ['Number', 'INV-1'],
            ['Type', '380'],
            ['Description', 'Invoice text'],
            ['Language', 'de'],
            ['Date', $d1],
            ['CompleteDate', $d2],
            ['Currency', 'EUR'],
            ['TaxCurrency', 'USD'],
            ['IsCopy', true],
            ['IsTest', false],
        ];
    }

    public static function partySetterProvider(): array
    {
        $p = new InvoiceSuitePartyDTO();

        return [
            ['SellerParty', $p],
            ['BuyerParty', $p],
            ['TaxRepresentativeParty', $p],
            ['ProductEndUserParty', $p],
            ['ShipToParty', $p],
            ['UltimateShipToParty', $p],
            ['ShipFromParty', $p],
            ['InvoicerParty', $p],
            ['InvoiceeParty', $p],
            ['PayeeParty', $p],
        ];
    }

    public static function collectionProvider(): array
    {
        $dtA = new DateTimeImmutable('2024-03-03');
        $dtB = new DateTimeImmutable('2024-04-04');

        $noteA = new InvoiceSuiteNoteDTO('A', 'C1', 'S1');
        $noteB = new InvoiceSuiteNoteDTO('B', 'C2', 'S2');

        $rangeA = new InvoiceSuiteDateRangeDTO($dtA, $dtB, 'R1');
        $rangeB = new InvoiceSuiteDateRangeDTO($dtB, $dtA, 'R2');

        $idA = new InvoiceSuiteIdDTO('ID1', 'T1');
        $idB = new InvoiceSuiteIdDTO('ID2', 'T2');

        $refA = new InvoiceSuiteReferenceDocumentDTO('RD1', $dtA, 'RT1');
        $refB = new InvoiceSuiteReferenceDocumentDTO('RD2', $dtB, 'RT2');

        $refExA = new InvoiceSuiteReferenceDocumentExtDTO('RDE1', $dtA, 'RTE1', 'ADD1');
        $refExB = new InvoiceSuiteReferenceDocumentExtDTO('RDE2', $dtB, 'RTE2', 'ADD2');

        $projA = new InvoiceSuiteProjectDTO('P1', 'PN1');
        $projB = new InvoiceSuiteProjectDTO('P2', 'PN2');

        $meanA = new InvoiceSuitePaymentMeanDTO('58', 'SEPA', null, null, null, 'DE89....', 'ACCT', null, 'BIC1', 'REF1', null);
        $meanB = new InvoiceSuitePaymentMeanDTO('30', 'WIRE', null, null, null, 'DE98....', 'ACCT2', null, 'BIC2', 'REF2', null);

        $termA = new InvoiceSuitePaymentTermDTO('T1', $dtA);
        $termB = new InvoiceSuitePaymentTermDTO('T2', $dtB);

        $taxA = new InvoiceSuiteTaxDTO('S', 'VAT', 19.0);
        $taxB = new InvoiceSuiteTaxDTO('AA', 'VAT', 7.0);

        $acA = new InvoiceSuiteAllowanceChargeDTO(true, 10.0, 100.0, 10.0, 'S', 'VAT', 19.0, 'Reason', 'R1');
        $acB = new InvoiceSuiteAllowanceChargeDTO(false, 5.0, 100.0, 5.0, 'S', 'VAT', 7.0, 'Reason2', 'R2');

        $scA = new InvoiceSuiteServiceChargeDTO(2.5, 'SERVICE1');
        $scB = new InvoiceSuiteServiceChargeDTO(3.5, 'SERVICE2');

        $sumA = new InvoiceSuiteSummationDTO(100.0, 119.0);
        $sumB = new InvoiceSuiteSummationDTO(200.0, 238.0);

        $posA = new InvoiceSuiteDocumentPositionDTO("1");
        $posB = new InvoiceSuiteDocumentPositionDTO("2");

        return [
            ['SupplyChainEvents', 'SupplyChainEvent', [$dtA, $dtB]],
            ['Notes', 'Note', [$noteA, $noteB]],
            ['BillingPeriods', 'BillingPeriod', [$rangeA, $rangeB]],
            ['PostingReferences', 'PostingReference', [$idA, $idB]],
            ['SellerOrderReferences', 'SellerOrderReference', [$refA, $refB]],
            ['BuyerOrderReferences', 'BuyerOrderReference', [$refA, $refB]],
            ['QuotationReferences', 'QuotationReference', [$refA, $refB]],
            ['ContractReferences', 'ContractReference', [$refA, $refB]],
            ['AdditionalReferences', 'AdditionalReference', [$refExA, $refExB]],
            ['InvoiceReferences', 'InvoiceReference', [$refExA, $refExB]],
            ['ProjectReferences', 'ProjectReference', [$projA, $projB]],
            ['UltimateCustomerOrderReferences', 'UltimateCustomerOrderReference', [$refA, $refB]],
            ['DespatchAdviceReferences', 'DespatchAdviceReference', [$refA, $refB]],
            ['ReceivingAdviceReferences', 'ReceivingAdviceReference', [$refA, $refB]],
            ['DeliveryNoteReferences', 'DeliveryNoteReference', [$refA, $refB]],
            ['PaymentMeans', 'PaymentMean', [$meanA, $meanB]],
            ['PaymentTerms', 'PaymentTerm', [$termA, $termB]],
            ['CreditorReferences', 'CreditorReference', [$idA, $idB]],
            ['BuyerReferences', 'BuyerReference', [$idA, $idB]],
            ['Taxes', 'Tax', [$taxA, $taxB]],
            ['AllowanceCharges', 'AllowanceCharge', [$acA, $acB]],
            ['ServiceCharges', 'ServiceCharge', [$scA, $scB]],
            ['Summations', 'Summation', [$sumA, $sumB]],
            ['Positions', 'Position', [$posA, $posB]],
        ];
    }

    #endregion

    #region Tests

    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteDocumentHeaderDTO();

        $this->assertNull($dto->getNumber());
        $this->assertNull($dto->getType());
        $this->assertNull($dto->getDescription());
        $this->assertNull($dto->getLanguage());
        $this->assertNull($dto->getDate());
        $this->assertNull($dto->getCompleteDate());
        $this->assertSame([], $dto->getSupplyChainEvents());
        $this->assertNull($dto->getCurrency());
        $this->assertNull($dto->getTaxCurrency());
        $this->assertNull($dto->getIsCopy());
        $this->assertNull($dto->getIsTest());
        $this->assertSame([], $dto->getNotes());
        $this->assertSame([], $dto->getBillingPeriods());
        $this->assertSame([], $dto->getPostingReferences());
        $this->assertSame([], $dto->getSellerOrderReferences());
        $this->assertSame([], $dto->getBuyerOrderReferences());
        $this->assertSame([], $dto->getQuotationReferences());
        $this->assertSame([], $dto->getContractReferences());
        $this->assertSame([], $dto->getAdditionalReferences());
        $this->assertSame([], $dto->getInvoiceReferences());
        $this->assertSame([], $dto->getProjectReferences());
        $this->assertSame([], $dto->getUltimateCustomerOrderReferences());
        $this->assertSame([], $dto->getDespatchAdviceReferences());
        $this->assertSame([], $dto->getReceivingAdviceReferences());
        $this->assertSame([], $dto->getDeliveryNoteReferences());
        $this->assertNull($dto->getSellerParty());
        $this->assertNull($dto->getBuyerParty());
        $this->assertNull($dto->getTaxRepresentativeParty());
        $this->assertNull($dto->getProductEndUserParty());
        $this->assertNull($dto->getShipToParty());
        $this->assertNull($dto->getUltimateShipToParty());
        $this->assertNull($dto->getShipFromParty());
        $this->assertNull($dto->getInvoicerParty());
        $this->assertNull($dto->getInvoiceeParty());
        $this->assertNull($dto->getPayeeParty());
        $this->assertSame([], $dto->getPaymentMeans());
        $this->assertSame([], $dto->getPaymentTerms());
        $this->assertSame([], $dto->getCreditorReferences());
        $this->assertSame([], $dto->getBuyerReferences());
        $this->assertSame([], $dto->getTaxes());
        $this->assertSame([], $dto->getAllowanceCharges());
        $this->assertSame([], $dto->getServiceCharges());
        $this->assertSame([], $dto->getSummations());
        $this->assertSame([], $dto->getPositions());

        $this->assertInstanceOf(InvoiceSuiteDocumentHeaderDTO::class, $dto);
    }

    /**
     * @dataProvider scalarSetterProvider
     */
    public function testScalarSetters(string $suffix, $value): void
    {
        $dto = new InvoiceSuiteDocumentHeaderDTO();
        $setter = 'set' . $suffix;
        $getter = 'get' . $suffix;

        $dto->$setter($value);
        $this->assertSame($value, $dto->$getter());
    }

    /**
     * @dataProvider partySetterProvider
     */
    public function testPartySetters(string $suffix, InvoiceSuitePartyDTO $party): void
    {
        $dto = new InvoiceSuiteDocumentHeaderDTO();
        $setter = 'set' . $suffix;
        $getter = 'get' . $suffix;

        $dto->$setter($party);
        $this->assertSame($party, $dto->$getter());
    }

    /**
     * @dataProvider collectionProvider
     */
    public function testCollectionSettersAndAdders(string $base, string $singular, array $items): void
    {
        $dto = new InvoiceSuiteDocumentHeaderDTO();
        $set = 'set' . $base;
        $get = 'get' . $base;
        $add = 'add' . $singular;

        $dto->$set($items);
        $this->assertSame($items, $dto->$get());

        $dto->$set([]);

        foreach ($items as $item) {
            $dto->$add($item);
        }

        $this->assertSame($items, $dto->$get());
    }

    /**
     * @dataProvider collectionProvider
     */
    public function testCollectionIterators(string $base, string $singular, array $items): void
    {
        $dto = new InvoiceSuiteDocumentHeaderDTO();
        $set = 'set' . $base;
        $first = 'first' . $singular;
        $next = 'next' . $singular;
        $prev = 'previous' . $singular;
        $last = 'last' . $singular;
        $each = 'forEach' . $singular;

        $dto->$set($items);

        $seen = [];

        $dto->$first(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$next(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$prev(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$last(function ($v) use (&$seen) {
            $seen[] = $v;
        });

        $count = 0;

        $dto->$each(function ($v) use (&$count) {
            $count++;
        }, null, null);

        $this->assertSame($items[0], $seen[0]);
        $this->assertSame($items[1], $seen[1]);
        $this->assertSame($items[0], $seen[2]);
        $this->assertSame($items[1], $seen[3]);
        $this->assertSame(2, $count);
    }

    #endregion
}
