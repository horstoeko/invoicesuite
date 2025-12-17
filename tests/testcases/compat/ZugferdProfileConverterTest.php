<?php

namespace horstoeko\invoicesuite\tests\testcases\compat;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\zugferd\ZugferdDocumentProfileConverter;
use horstoeko\zugferd\ZugferdProfiles;

class ZugferdProfileConverterTest extends TestCase
{
    public function testComvertFromFileToFileXRechnung3(): void
    {
        $fromfile = __DIR__.'/../../assets/03_zugferddocumentreader_3.xml';
        $tofile = __DIR__.'/../../assets/converterresult.xml';

        ZugferdDocumentProfileConverter::convertFromFileToFile($fromfile, $tofile, ZugferdProfiles::PROFILE_XRECHNUNG_3);

        $this->registerFileForTestMethodTeardown($tofile);

        $this->assertFileExists($tofile);

        $tofileContent = file_get_contents($tofile);

        $this->assertIsString($tofileContent);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $tofileContent);
        $this->assertStringContainsString('<ram:GuidelineSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringContainsString('<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0</ram:ID>', $tofileContent);
        $this->assertStringContainsString('</ram:GuidelineSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringContainsString('<ram:BusinessProcessSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringContainsString('<ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>', $tofileContent);
        $this->assertStringContainsString('</ram:BusinessProcessSpecifiedDocumentContextParameter>', $tofileContent);
    }

    public function testConvertFromFileToStringXRechnung3(): void
    {
        $fromfile = __DIR__.'/../../assets/03_zugferddocumentreader_3.xml';
        $converterResult = ZugferdDocumentProfileConverter::convertFromFileToString($fromfile, ZugferdProfiles::PROFILE_XRECHNUNG_3);

        $this->assertIsString($converterResult);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $converterResult);
        $this->assertStringContainsString('<ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringContainsString('<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0</ram:ID>', $converterResult);
        $this->assertStringContainsString('</ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringContainsString('<ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringContainsString('<ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>', $converterResult);
        $this->assertStringContainsString('</ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);
    }

    public function testConvertFromContentToFileXRechnung3(): void
    {
        $fromfile = __DIR__.'/../../assets/03_zugferddocumentreader_3.xml';
        $tofile = __DIR__.'/../../assets/converterresult.xml';
        $fromfileContent = file_get_contents($fromfile);

        ZugferdDocumentProfileConverter::convertFromContentToFile($fromfileContent, $tofile, ZugferdProfiles::PROFILE_XRECHNUNG_3);

        $this->registerFileForTestMethodTeardown($tofile);

        $this->assertFileExists($tofile);

        $tofileContent = file_get_contents($tofile);

        $this->assertIsString($tofileContent);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $tofileContent);
        $this->assertStringContainsString('<ram:GuidelineSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringContainsString('<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0</ram:ID>', $tofileContent);
        $this->assertStringContainsString('</ram:GuidelineSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringContainsString('<ram:BusinessProcessSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringContainsString('<ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>', $tofileContent);
        $this->assertStringContainsString('</ram:BusinessProcessSpecifiedDocumentContextParameter>', $tofileContent);
    }

    public function testConvertFromContentToStringXRechnung3(): void
    {
        $fromfile = __DIR__.'/../../assets/03_zugferddocumentreader_3.xml';
        $fromfileContent = file_get_contents($fromfile);

        $converterResult = ZugferdDocumentProfileConverter::convertFromContentToString($fromfileContent, ZugferdProfiles::PROFILE_XRECHNUNG_3);

        $this->assertIsString($converterResult);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $converterResult);
        $this->assertStringContainsString('<ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringContainsString('<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0</ram:ID>', $converterResult);
        $this->assertStringContainsString('</ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringContainsString('<ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringContainsString('<ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>', $converterResult);
        $this->assertStringContainsString('</ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);
    }

    public function testComvertFromFileToFileEn16931(): void
    {
        $fromfile = __DIR__.'/../../assets/03_zugferddocumentreader_3.xml';
        $tofile = __DIR__.'/../../assets/converterresult.xml';

        ZugferdDocumentProfileConverter::convertFromFileToFile($fromfile, $tofile, ZugferdProfiles::PROFILE_EN16931);

        $this->registerFileForTestMethodTeardown($tofile);

        $this->assertFileExists($tofile);

        $tofileContent = file_get_contents($tofile);

        $this->assertIsString($tofileContent);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $tofileContent);
        $this->assertStringContainsString('<ram:GuidelineSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringContainsString('<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', $tofileContent);
        $this->assertStringContainsString('</ram:GuidelineSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringNotContainsString('<ram:BusinessProcessSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringNotContainsString('<ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>', $tofileContent);
        $this->assertStringNotContainsString('</ram:BusinessProcessSpecifiedDocumentContextParameter>', $tofileContent);
    }

    public function testConvertFromFileToStringEn16931(): void
    {
        $fromfile = __DIR__.'/../../assets/03_zugferddocumentreader_3.xml';
        $converterResult = ZugferdDocumentProfileConverter::convertFromFileToString($fromfile, ZugferdProfiles::PROFILE_EN16931);

        $this->assertIsString($converterResult);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $converterResult);
        $this->assertStringContainsString('<ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringContainsString('<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', $converterResult);
        $this->assertStringContainsString('</ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringNotContainsString('<ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringNotContainsString('<ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>', $converterResult);
        $this->assertStringNotContainsString('</ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);
    }

    public function testConvertFromContentToFileEn16931(): void
    {
        $fromfile = __DIR__.'/../../assets/03_zugferddocumentreader_3.xml';
        $tofile = __DIR__.'/../../assets/converterresult.xml';
        $fromfileContent = file_get_contents($fromfile);

        ZugferdDocumentProfileConverter::convertFromContentToFile($fromfileContent, $tofile, ZugferdProfiles::PROFILE_EN16931);

        $this->registerFileForTestMethodTeardown($tofile);

        $this->assertFileExists($tofile);

        $tofileContent = file_get_contents($tofile);

        $this->assertIsString($tofileContent);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $tofileContent);
        $this->assertStringContainsString('<ram:GuidelineSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringContainsString('<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', $tofileContent);
        $this->assertStringContainsString('</ram:GuidelineSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringNotContainsString('<ram:BusinessProcessSpecifiedDocumentContextParameter>', $tofileContent);
        $this->assertStringNotContainsString('<ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>', $tofileContent);
        $this->assertStringNotContainsString('</ram:BusinessProcessSpecifiedDocumentContextParameter>', $tofileContent);
    }

    public function testConvertFromContentToStringEn16931(): void
    {
        $fromfile = __DIR__.'/../../assets/03_zugferddocumentreader_3.xml';
        $fromfileContent = file_get_contents($fromfile);
        $converterResult = ZugferdDocumentProfileConverter::convertFromContentToString($fromfileContent, ZugferdProfiles::PROFILE_EN16931);

        $this->assertIsString($converterResult);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $converterResult);
        $this->assertStringContainsString('<ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringContainsString('<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', $converterResult);
        $this->assertStringContainsString('</ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringNotContainsString('<ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringNotContainsString('<ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>', $converterResult);
        $this->assertStringNotContainsString('</ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);
    }

    public function testComvertFromFileWhichNotExistsToFile(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);

        $fromfile = __DIR__.'/../../assets/not_existing_file.xml';
        $tofile = __DIR__.'/../../assets/converterresult.xml';

        ZugferdDocumentProfileConverter::convertFromFileToFile($fromfile, $tofile, ZugferdProfiles::PROFILE_XRECHNUNG_3);
    }

    public function testComvertFromFileToFileExtendedToEn16931(): void
    {
        $fromfile = __DIR__.'/../../assets/03_zugferddocumentreader.xml';
        $converterResult = ZugferdDocumentProfileConverter::convertFromFileToString($fromfile, ZugferdProfiles::PROFILE_EN16931);

        $this->assertIsString($converterResult);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $converterResult);
        $this->assertStringContainsString('<ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringContainsString('<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', $converterResult);
        $this->assertStringContainsString('</ram:GuidelineSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringNotContainsString('<ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);
        $this->assertStringNotContainsString('<ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>', $converterResult);
        $this->assertStringNotContainsString('</ram:BusinessProcessSpecifiedDocumentContextParameter>', $converterResult);

        $this->assertStringNotContainsString('<ram:TestIndicator>', $converterResult);
        $this->assertStringNotContainsString('<udt:Indicator>true</udt:Indicator>', $converterResult);
        $this->assertStringNotContainsString('</ram:TestIndicator>', $converterResult);

        $this->assertStringNotContainsString('<ram:Name>KOSTENRECHNUNG</ram:Name>', $converterResult);

        $this->assertStringNotContainsString('<ram:ContentCode>ST3</ram:ContentCode>', $converterResult);
        $this->assertStringNotContainsString('<ram:ContentCode>EEV</ram:ContentCode>', $converterResult);

        $this->assertStringNotContainsString('<ram:IndustryAssignedID>IndustryId</ram:IndustryAssignedID>', $converterResult);
        $this->assertStringNotContainsString('<ram:BatchID>BatchId</ram:BatchID>', $converterResult);
        $this->assertStringNotContainsString('<ram:BrandName>BrandeName</ram:BrandName>', $converterResult);
        $this->assertStringNotContainsString('<ram:ModelName>ModelName</ram:ModelName>', $converterResult);

        $this->assertStringNotContainsString('<ram:DeliveryNoteReferencedDocument>', $converterResult);
        $this->assertStringNotContainsString('<ram:IssuerAssignedID>L87654321012</ram:IssuerAssignedID>', $converterResult);
        $this->assertStringNotContainsString('</ram:DeliveryNoteReferencedDocument>', $converterResult);

        $this->assertStringNotContainsString('<ram:InvoiceeTradeParty>', $converterResult);
        $this->assertStringNotContainsString('</ram:InvoiceeTradeParty>', $converterResult);

        $this->assertStringNotContainsString('<ram:SpecifiedLogisticsServiceCharge>', $converterResult);
        $this->assertStringNotContainsString('</ram:SpecifiedLogisticsServiceCharge>', $converterResult);

        $this->assertStringNotContainsString('<ram:ApplicableTradePaymentDiscountTerms>', $converterResult);
        $this->assertStringNotContainsString('</ram:ApplicableTradePaymentDiscountTerms>', $converterResult);

        $this->assertStringNotContainsString('<ram:ApplicableTradePaymentPenaltyTerms>', $converterResult);
        $this->assertStringNotContainsString('</ram:ApplicableTradePaymentPenaltyTerms>', $converterResult);
    }
}
