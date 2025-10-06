<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteDocumentPositionDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'lineId'           => '10',
            'parentLineId'     => '1',
            'lineStatus'       => 'BILLED',
            'lineStatusReason' => 'PARTIAL',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setLineId',           'getLineId',           '42'],
            ['setParentLineId',     'getParentLineId',     '5'],
            ['setLineStatus',       'getLineStatus',       'INFORMATION'],
            ['setLineStatusReason', 'getLineStatusReason', 'FREE_TEXT'],
        ];
    }

    public static function dpCollections(): array
    {
        return [
            ['setNote',                           'addNote',                           'getNote',                           'newNote'],
            ['setSellerOrderReferences',          'addSellerOrderReference',           'getSellerOrderReferences',          'newRefLine'],
            ['setBuyerOrderReferences',           'addBuyerOrderReference',            'getBuyerOrderReferences',           'newRefLine'],
            ['setQuotationReferences',            'addQuotationReference',             'getQuotationReferences',            'newRefLine'],
            ['setContractReferences',             'addContractReference',              'getContractReferences',             'newRefLine'],
            ['setAdditionalReferences',           'addAdditionalReference',            'getAdditionalReferences',           'newRefLineExt'],
            ['setUltimateCustomerOrderReferences', 'addUltimateCustomerOrderReference', 'getUltimateCustomerOrderReferences', 'newRefLine'],
            ['setDespatchAdviceReferences',       'addDespatchAdviceReference',        'getDespatchAdviceReferences',       'newRefLine'],
            ['setReceivingAdviceReferences',      'addReceivingAdviceReference',       'getReceivingAdviceReferences',      'newRefLine'],
            ['setDeliveryNoteReferences',         'addDeliveryNoteReference',          'getDeliveryNoteReferences',         'newRefLine'],
            ['setInvoiceReferences',              'addInvoiceReference',               'getInvoiceReferences',              'newRefLineExt'],
            ['setBillingPeriods',                  'addBillingPeriod',                  'getBillingPeriods',                  'newDateRange'],
            ['setPostingReferences',               'addPostingReference',               'getPostingReferences',               'newId'],
            ['setTaxes',                           'addTax',                            'getTaxes',                           'newTax'],
            ['setAllowanceCharges',                'addAllowanceCharge',                'getAllowanceCharges',                'newAllowanceCharge'],
        ];
    }

    public static function dpCollectionIterators(): array
    {
        return [
            ['Note',                           'Note',                           [new InvoiceSuiteNoteDTO(), new InvoiceSuiteNoteDTO()]],
            ['SellerOrderReferences',          'SellerOrderReference',           [new InvoiceSuiteReferenceDocumentLineDTO(), new InvoiceSuiteReferenceDocumentLineDTO()]],
            ['BuyerOrderReferences',           'BuyerOrderReference',            [new InvoiceSuiteReferenceDocumentLineDTO(), new InvoiceSuiteReferenceDocumentLineDTO()]],
            ['QuotationReferences',            'QuotationReference',             [new InvoiceSuiteReferenceDocumentLineDTO(), new InvoiceSuiteReferenceDocumentLineDTO()]],
            ['ContractReferences',             'ContractReference',              [new InvoiceSuiteReferenceDocumentLineDTO(), new InvoiceSuiteReferenceDocumentLineDTO()]],
            ['AdditionalReferences',           'AdditionalReference',            [new InvoiceSuiteReferenceDocumentLineExtDTO(), new InvoiceSuiteReferenceDocumentLineExtDTO()]],
            ['UltimateCustomerOrderReferences', 'UltimateCustomerOrderReference', [new InvoiceSuiteReferenceDocumentLineDTO(), new InvoiceSuiteReferenceDocumentLineDTO()]],
            ['DespatchAdviceReferences',       'DespatchAdviceReference',        [new InvoiceSuiteReferenceDocumentLineDTO(), new InvoiceSuiteReferenceDocumentLineDTO()]],
            ['ReceivingAdviceReferences',      'ReceivingAdviceReference',       [new InvoiceSuiteReferenceDocumentLineDTO(), new InvoiceSuiteReferenceDocumentLineDTO()]],
            ['DeliveryNoteReferences',         'DeliveryNoteReference',          [new InvoiceSuiteReferenceDocumentLineDTO(), new InvoiceSuiteReferenceDocumentLineDTO()]],
            ['InvoiceReferences',              'InvoiceReference',               [new InvoiceSuiteReferenceDocumentLineExtDTO(), new InvoiceSuiteReferenceDocumentLineExtDTO()]],
            ['SupplyChainEvents',              'SupplyChainEvent',               [new DateTimeImmutable('2024-01-01 10:00:00'), new DateTimeImmutable('2024-02-02 12:00:00')]],
            ['BillingPeriods',                  'BillingPeriod',                  [new InvoiceSuiteDateRangeDTO(), new InvoiceSuiteDateRangeDTO()]],
            ['PostingReferences',               'PostingReference',               [new InvoiceSuiteIdDTO(), new InvoiceSuiteIdDTO()]],
            ['Taxes',                           'Tax',                            [new InvoiceSuiteTaxDTO(), new InvoiceSuiteTaxDTO()]],
            ['AllowanceCharges',                'AllowanceCharge',                [new InvoiceSuiteAllowanceChargeDTO(), new InvoiceSuiteAllowanceChargeDTO()]],
        ];
    }

    #endregion

    #region Helpers

    private function newNote(): InvoiceSuiteNoteDTO
    {
        return new InvoiceSuiteNoteDTO();
    }
    private function newRefLine(): InvoiceSuiteReferenceDocumentLineDTO
    {
        return new InvoiceSuiteReferenceDocumentLineDTO();
    }
    private function newRefLineExt(): InvoiceSuiteReferenceDocumentLineExtDTO
    {
        return new InvoiceSuiteReferenceDocumentLineExtDTO();
    }
    private function newProduct(): InvoiceSuiteProductDTO
    {
        return new InvoiceSuiteProductDTO();
    }
    private function newGross(): InvoiceSuitePriceGrossDTO
    {
        return new InvoiceSuitePriceGrossDTO();
    }
    private function newNet(): InvoiceSuitePriceNetDTO
    {
        return new InvoiceSuitePriceNetDTO();
    }
    private function newQty(): InvoiceSuiteQuantityDTO
    {
        return new InvoiceSuiteQuantityDTO();
    }
    private function newParty(): InvoiceSuitePartyDTO
    {
        return new InvoiceSuitePartyDTO();
    }
    private function newDateRange(): InvoiceSuiteDateRangeDTO
    {
        return new InvoiceSuiteDateRangeDTO();
    }
    private function newId(): InvoiceSuiteIdDTO
    {
        return new InvoiceSuiteIdDTO();
    }
    private function newTax(): InvoiceSuiteTaxDTO
    {
        return new InvoiceSuiteTaxDTO();
    }
    private function newAllowanceCharge(): InvoiceSuiteAllowanceChargeDTO
    {
        return new InvoiceSuiteAllowanceChargeDTO();
    }
    private function newSummation(): InvoiceSuitesummationLineDTO
    {
        return new InvoiceSuitesummationLineDTO();
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteDocumentPositionDTO();

        $this->assertNull($dto->getLineId());
        $this->assertNull($dto->getParentLineId());
        $this->assertNull($dto->getLineStatus());
        $this->assertNull($dto->getLineStatusReason());
        $this->assertSame([], $dto->getNote());
        $this->assertNull($dto->getProduct());
        $this->assertSame([], $dto->getSellerOrderReferences());
        $this->assertSame([], $dto->getBuyerOrderReferences());
        $this->assertSame([], $dto->getQuotationReferences());
        $this->assertSame([], $dto->getContractReferences());
        $this->assertSame([], $dto->getAdditionalReferences());
        $this->assertSame([], $dto->getUltimateCustomerOrderReferences());
        $this->assertSame([], $dto->getDespatchAdviceReferences());
        $this->assertSame([], $dto->getReceivingAdviceReferences());
        $this->assertSame([], $dto->getDeliveryNoteReferences());
        $this->assertSame([], $dto->getInvoiceReferences());
        $this->assertNull($dto->getGrossPrice());
        $this->assertNull($dto->getNetPrice());
        $this->assertNull($dto->getQuantityBilled());
        $this->assertNull($dto->getQuantityChargeFree());
        $this->assertNull($dto->getQuantityPackage());
        $this->assertNull($dto->getShipToParty());
        $this->assertNull($dto->getUltimateShipToParty());
        $this->assertSame([], $dto->getSupplyChainEvents());
        $this->assertSame([], $dto->getBillingPeriods());
        $this->assertSame([], $dto->getPostingReferences());
        $this->assertSame([], $dto->getTaxes());
        $this->assertSame([], $dto->getAllowanceCharges());
        $this->assertNull($dto->getSummation());
        $this->assertInstanceOf(InvoiceSuiteDocumentPositionDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $n1 = $this->newNote();
        $n2 = $this->newNote();
        $seller1 = $this->newRefLine();
        $seller2 = $this->newRefLine();
        $buyer1 = $this->newRefLine();
        $buyer2 = $this->newRefLine();
        $quot1 = $this->newRefLine();
        $quot2 = $this->newRefLine();
        $cont1 = $this->newRefLine();
        $cont2 = $this->newRefLine();
        $add1 = $this->newRefLineExt();
        $add2 = $this->newRefLineExt();
        $uco1 = $this->newRefLine();
        $uco2 = $this->newRefLine();
        $des1 = $this->newRefLine();
        $des2 = $this->newRefLine();
        $rec1 = $this->newRefLine();
        $rec2 = $this->newRefLine();
        $del1 = $this->newRefLine();
        $del2 = $this->newRefLine();
        $inv1 = $this->newRefLineExt();
        $inv2 = $this->newRefLineExt();
        $gross = $this->newGross();
        $net = $this->newNet();
        $qtyB = $this->newQty();
        $qtyCF = $this->newQty();
        $qtyP = $this->newQty();
        $ship = $this->newParty();
        $uship = $this->newParty();
        $sc1 = new DateTimeImmutable('2024-01-02 10:00:00');
        $sc2 = new DateTimeImmutable('2024-02-03 11:00:00');
        $bp1 = $this->newDateRange();
        $bp2 = $this->newDateRange();
        $post1 = $this->newId();
        $post2 = $this->newId();
        $tax1 = $this->newTax();
        $tax2 = $this->newTax();
        $alc1 = $this->newAllowanceCharge();
        $alc2 = $this->newAllowanceCharge();
        $sum = $this->newSummation();
        $product = $this->newProduct();

        $dto = new InvoiceSuiteDocumentPositionDTO(
            $v['lineId'],
            $v['parentLineId'],
            $v['lineStatus'],
            $v['lineStatusReason'],
            [$n1, $n2],
            $product,
            [$seller1, $seller2],
            [$buyer1, $buyer2],
            [$quot1, $quot2],
            [$cont1, $cont2],
            [$add1, $add2],
            [$uco1, $uco2],
            [$des1, $des2],
            [$rec1, $rec2],
            [$del1, $del2],
            [$inv1, $inv2],
            $gross,
            $net,
            $qtyB,
            $qtyCF,
            $qtyP,
            $ship,
            $uship,
            [$sc1, $sc2],
            [$bp1, $bp2],
            [$post1, $post2],
            [$tax1, $tax2],
            [$alc1, $alc2],
            $sum
        );

        $this->assertSame($v['lineId'], $dto->getLineId());
        $this->assertSame($v['parentLineId'], $dto->getParentLineId());
        $this->assertSame($v['lineStatus'], $dto->getLineStatus());
        $this->assertSame($v['lineStatusReason'], $dto->getLineStatusReason());
        $this->assertSame([$n1, $n2], $dto->getNote());
        $this->assertSame($product, $dto->getProduct());
        $this->assertSame([$seller1, $seller2], $dto->getSellerOrderReferences());
        $this->assertSame([$buyer1, $buyer2], $dto->getBuyerOrderReferences());
        $this->assertSame([$quot1, $quot2], $dto->getQuotationReferences());
        $this->assertSame([$cont1, $cont2], $dto->getContractReferences());
        $this->assertSame([$add1, $add2], $dto->getAdditionalReferences());
        $this->assertSame([$uco1, $uco2], $dto->getUltimateCustomerOrderReferences());
        $this->assertSame([$des1, $des2], $dto->getDespatchAdviceReferences());
        $this->assertSame([$rec1, $rec2], $dto->getReceivingAdviceReferences());
        $this->assertSame([$del1, $del2], $dto->getDeliveryNoteReferences());
        $this->assertSame([$inv1, $inv2], $dto->getInvoiceReferences());
        $this->assertSame($gross, $dto->getGrossPrice());
        $this->assertSame($net, $dto->getNetPrice());
        $this->assertSame($qtyB, $dto->getQuantityBilled());
        $this->assertSame($qtyCF, $dto->getQuantityChargeFree());
        $this->assertSame($qtyP, $dto->getQuantityPackage());
        $this->assertSame($ship, $dto->getShipToParty());
        $this->assertSame($uship, $dto->getUltimateShipToParty());
        $this->assertSame([$sc1, $sc2], $dto->getSupplyChainEvents());
        $this->assertSame([$bp1, $bp2], $dto->getBillingPeriods());
        $this->assertSame([$post1, $post2], $dto->getPostingReferences());
        $this->assertSame([$tax1, $tax2], $dto->getTaxes());
        $this->assertSame([$alc1, $alc2], $dto->getAllowanceCharges());
        $this->assertSame($sum, $dto->getSummation());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteDocumentPositionDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    /**
     * @dataProvider dpCollections
     */
    public function testCollectionSettersAndAdders(
        string $arraySetter,
        string $adder,
        string $arrayGetter,
        string $factoryName
    ): void {
        $dto = new InvoiceSuiteDocumentPositionDTO();
        $a = $this->{$factoryName}();
        $b = $this->{$factoryName}();

        $dto->{$arraySetter}([$a]);
        $this->assertSame([$a], $dto->{$arrayGetter}());

        $dto->{$adder}($b);
        $this->assertSame([$a, $b], $dto->{$arrayGetter}());
    }

    /**
     * @dataProvider dpCollectionIterators
     */
    public function testCollectionIterators(string $base, string $singular, array $items): void
    {
        $dto = new InvoiceSuiteDocumentPositionDTO();
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

    public function testSupplyChainEventsSettersAddersAndIterators(): void
    {
        $dto = new InvoiceSuiteDocumentPositionDTO();
        $d1 = new DateTimeImmutable('2024-03-04 12:00:00');
        $d2 = new DateTimeImmutable('2024-05-06 14:30:00');

        $dto->setSupplyChainEvents([$d1]);
        $seen = [];
        $iter = [];

        $dto->addSupplyChainEvent(null);
        $dto->addSupplyChainEvent($d2);

        $dto->firstSupplyChainEvent(function (DateTimeInterface $it) use (&$seen) {
            $seen[] = $it;
        });
        $dto->nextSupplyChainEvent(function (DateTimeInterface $it) use (&$seen) {
            $seen[] = $it;
        });
        $dto->previousSupplyChainEvent(function (DateTimeInterface $it) use (&$seen) {
            $seen[] = $it;
        });
        $dto->lastSupplyChainEvent(function (DateTimeInterface $it) use (&$seen) {
            $seen[] = $it;
        });

        $dto->forEachSupplyChainEvent(function (DateTimeInterface $it) use (&$iter) {
            $iter[] = $it;
        }, null, null);

        $this->assertSame([$d1, $d2], $dto->getSupplyChainEvents());
        $this->assertNotEmpty($seen);
        $this->assertSame($dto->getSupplyChainEvents(), $iter);
    }

    #endregion
}
