<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\issues;

use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;

final class CiiDocumentPositionTaxWithoutRateTest extends TestCase
{
    use HandlesXmlTests;

    public function testXRechnungCiiPositionTaxWithoutRate(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungcii');

        static::$document->addDocumentPosition('1');
        static::$document->setDocumentPositionTax(
            newTaxCategory: 'O',
            newTaxType: 'VAT',
            newTaxPercent: null
        );

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 'VAT');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 'O');
        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent');
    }

    public function testZfFxComfortPositionTaxWithoutRate(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxcomfort');

        static::$document->addDocumentPosition('1');
        static::$document->setDocumentPositionTax(
            newTaxCategory: 'O',
            newTaxType: 'VAT',
            newTaxPercent: null
        );

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 'VAT');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 'O');
        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent');
    }

    public function testZfFxComfortPositionTaxWithZeroRate(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxcomfort');

        static::$document->addDocumentPosition('1');
        static::$document->setDocumentPositionTax(
            newTaxCategory: 'Z',
            newTaxType: 'VAT',
            newTaxPercent: 0.0
        );

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 'VAT');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 'Z');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', '0.00');
    }

    public function testZfFxExtendedPositionTaxWithoutRate(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxextended');

        static::$document->addDocumentPosition('1');
        static::$document->addDocumentPositionTax(
            newTaxCategory: 'O',
            newTaxType: 'VAT',
            newTaxPercent: null
        );

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 'VAT');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 'O');
        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent');
    }
}
