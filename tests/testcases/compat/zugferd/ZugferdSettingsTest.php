<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\compat\zugferd;

use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\zugferd\ZugferdSettings;
use Smalot\PdfParser\Config as SmalotPdfParserConfig;

final class ZugferdSettingsTest extends TestCase
{
    /**
     * {@inheritDoc}
     */
    public static function tearDownAfterClass(): void
    {
        ZugferdSettings::setAmountDecimals(2);
        ZugferdSettings::setQuantityDecimals(2);
        ZugferdSettings::setPercentDecimals(2);
        ZugferdSettings::setMeasureDecimals(2);
        ZugferdSettings::setDecimalSeparator('.');
        ZugferdSettings::setThousandsSeparator('');
        ZugferdSettings::setIccProfileFilename('sRGB2014.icc');
        ZugferdSettings::setXmpMetaDataFilename('facturx_extension_schema.xmp');
        ZugferdSettings::setSpecialDecimalPlacesMaps(
            [
                '/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount' => 2,
                '/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount' => 2,
            ]
        );
    }

    public function testAmountDecimals(): void
    {
        $this->assertSame(2, ZugferdSettings::getAmountDecimals());

        ZugferdSettings::setAmountDecimals(3);

        $this->assertSame(3, ZugferdSettings::getAmountDecimals());
    }

    public function testQuantityDecimals(): void
    {
        $this->assertSame(2, ZugferdSettings::getQuantityDecimals());

        ZugferdSettings::setQuantityDecimals(3);

        $this->assertSame(3, ZugferdSettings::getQuantityDecimals());
    }

    public function testPercentDecimals(): void
    {
        $this->assertSame(2, ZugferdSettings::getPercentDecimals());

        ZugferdSettings::setPercentDecimals(3);

        $this->assertSame(3, ZugferdSettings::getPercentDecimals());
    }

    public function testMeasureDecimals(): void
    {
        $this->assertSame(2, ZugferdSettings::getMeasureDecimals());

        ZugferdSettings::setMeasureDecimals(3);

        $this->assertSame(3, ZugferdSettings::getMeasureDecimals());
    }

    public function testDecimalSeparator(): void
    {
        $this->assertSame('.', ZugferdSettings::getDecimalSeparator());

        ZugferdSettings::setDecimalSeparator(',');

        $this->assertSame(',', ZugferdSettings::getDecimalSeparator());
    }

    public function testThousandsSeparator(): void
    {
        $this->assertSame('', ZugferdSettings::getThousandsSeparator());

        ZugferdSettings::setThousandsSeparator(',');

        $this->assertSame(',', ZugferdSettings::getThousandsSeparator());
    }

    public function testGetRootDirectory(): void
    {
        $expected = realpath(__DIR__ . '/../../../../');
        $actual = realpath(ZugferdSettings::getRootDirectory());

        $this->assertNotFalse($expected);
        $this->assertNotFalse($actual);
        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testGetSourceDirectory(): void
    {
        $expected = realpath(__DIR__ . '/../../../../src/compat/zugferd');
        $actual = realpath(ZugferdSettings::getSourceDirectory());

        $this->assertNotFalse($expected);
        $this->assertNotFalse($actual);
        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testGetAssetDirectory(): void
    {
        $expected = realpath(__DIR__ . '/../../../../src/compat/zugferd/assets/');
        $actual = realpath(ZugferdSettings::getAssetDirectory());

        $this->assertNotFalse($expected);
        $this->assertNotFalse($actual);
        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testGetYamlDirectory(): void
    {
        $expected = realpath(__DIR__ . '/../../../../src/compat/zugferd/yaml/');
        $actual = realpath(ZugferdSettings::getYamlDirectory());

        $this->assertNotFalse($expected);
        $this->assertNotFalse($actual);
        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testGetValidationDirectory(): void
    {
        $expected = realpath(__DIR__ . '/../../../../src/compat/zugferd/validation/');
        $actual = realpath(ZugferdSettings::getValidationDirectory());

        $this->assertNotFalse($expected);
        $this->assertNotFalse($actual);
        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testIccProfileFilename(): void
    {
        $this->assertSame('sRGB2014.icc', ZugferdSettings::getIccProfileFilename());

        ZugferdSettings::setIccProfileFilename('sRGB_v5_ICC.icc');

        $this->assertSame('sRGB_v5_ICC.icc', ZugferdSettings::getIccProfileFilename());
    }

    public function testGetFullIccProfileFilename(): void
    {
        $expected = InvoiceSuitePathUtils::combinePathWithFile(
            realpath(__DIR__ . '/../../../../src/compat/zugferd/assets/'),
            'sRGB_v5_ICC.icc'
        );
        $actual = InvoiceSuitePathUtils::combinePathWithFile(
            realpath(ZugferdSettings::getAssetDirectory()),
            ZugferdSettings::getIccProfileFilename()
        );

        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testSpecialDecimalPlacesMaps(): void
    {
        $this->assertCount(4, ZugferdSettings::getSpecialDecimalPlacesMaps());

        $this->assertSame(2, ZugferdSettings::getSpecialDecimalPlacesMap('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 2));
        $this->assertSame(2, ZugferdSettings::getSpecialDecimalPlacesMap('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 2));

        ZugferdSettings::addSpecialDecimalPlacesMap('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 5);

        $this->assertSame(5, ZugferdSettings::getSpecialDecimalPlacesMap('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 2));
        $this->assertSame(2, ZugferdSettings::getSpecialDecimalPlacesMap('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 2));

        ZugferdSettings::setSpecialDecimalPlacesMaps(
            [
                '/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount' => 6,
                '/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount' => 6,
            ]
        );

        $this->assertSame(6, ZugferdSettings::getSpecialDecimalPlacesMap('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 2));
        $this->assertSame(6, ZugferdSettings::getSpecialDecimalPlacesMap('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 2));

        $this->assertCount(2, ZugferdSettings::getSpecialDecimalPlacesMaps());
    }

    public function testSerializerCacheDirectory(): void
    {
        $this->assertSame('', ZugferdSettings::getSerializerCacheDirectory());
        $this->assertFalse(ZugferdSettings::hasSerializerCacheDirectory());

        ZugferdSettings::setSerializerCacheDirectory(sys_get_temp_dir());

        $this->assertSame(sys_get_temp_dir(), ZugferdSettings::getSerializerCacheDirectory());
        $this->assertTrue(ZugferdSettings::hasSerializerCacheDirectory());

        ZugferdSettings::setSerializerCacheDirectory('');

        $this->assertSame('', ZugferdSettings::getSerializerCacheDirectory());
        $this->assertFalse(ZugferdSettings::hasSerializerCacheDirectory());
    }

    public function testXmpMetaDataFilename(): void
    {
        $this->assertSame('facturx_extension_schema.xmp', ZugferdSettings::getXmpMetaDataFilename());

        ZugferdSettings::setXmpMetaDataFilename('facturx_extension_schema_2.xmp');

        $this->assertSame('facturx_extension_schema_2.xmp', ZugferdSettings::getXmpMetaDataFilename());
    }

    public function testGetFullXmpMetaDataFilename(): void
    {
        $expected = InvoiceSuitePathUtils::combinePathWithFile(
            realpath(__DIR__ . '/../../../../src/compat/zugferd/assets/'),
            'facturx_extension_schema_2.xmp'
        );
        $actual = InvoiceSuitePathUtils::combinePathWithFile(
            realpath(ZugferdSettings::getAssetDirectory()),
            ZugferdSettings::getXmpMetaDataFilename()
        );

        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testGetSchemaDirectory(): void
    {
        $expected = realpath(__DIR__ . '/../../../../src/compat/zugferd/schema');
        $actual = realpath(ZugferdSettings::getSchemaDirectory());

        $this->assertNotFalse($expected);
        $this->assertNotFalse($actual);
        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testGetSchematronDirectory(): void
    {
        $expected = realpath(__DIR__ . '/../../../../src/compat/zugferd/schema/schematron');
        $actual = realpath(ZugferdSettings::getSchematronDirectory());

        $this->assertNotFalse($expected);
        $this->assertNotFalse($actual);
        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testGetXsltDirectory(): void
    {
        $expected = realpath(__DIR__ . '/../../../../src/compat/zugferd/schema/xslt');
        $actual = realpath(ZugferdSettings::getXsltDirectory());

        $this->assertNotFalse($expected);
        $this->assertNotFalse($actual);
        $this->assertSame(
            $expected,
            $actual
        );
    }

    public function testPdfParserConfig(): void
    {
        $this->assertNull(ZugferdSettings::getPdfParserConfig());

        $config = new SmalotPdfParserConfig();
        $config->setDecodeMemoryLimit(32 * 1024 * 1204);
        ZugferdSettings::setPdfParserConfig($config);

        $this->assertSame($config, ZugferdSettings::getPdfParserConfig());
    }
}
