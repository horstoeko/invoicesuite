<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\validators;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteXsdDocumentValidator;

final class InvoiceSuiteXsdDocumentValidatorTest extends TestCase
{
    public function testCreateFromContent(): void
    {
        $documentContent = (string) file_get_contents($this->getSampleXmlPath());

        $validator = InvoiceSuiteXsdDocumentValidator::createFromContent($documentContent);

        $this->assertSame($documentContent, $validator->getOriginalDocumentContent());
        $this->assertSame('zffxcomfort', $validator->getCurrentDocumentFormatProvider()->getUniqueId());
        $this->assertSame('', $validator->getXsdFilename());
    }

    public function testCreateFromDocumentReader(): void
    {
        $documentReader = InvoiceSuiteDocumentReader::createFromFile($this->getSampleXmlPath());

        $validator = InvoiceSuiteXsdDocumentValidator::createFromDocumentReader($documentReader);

        $this->assertSame($documentReader->getOriginalDocumentContent(), $validator->getOriginalDocumentContent());
        $this->assertSame($documentReader->getCurrentDocumentFormatProvider(), $validator->getCurrentDocumentFormatProvider());
        $this->assertSame(
            $documentReader->getCurrentDocumentFormatProvider()->getValidationXsdFilename(),
            $validator->getXsdFilename()
        );
    }

    public function testCreateFromDocumentBuilder(): void
    {
        $documentReader = InvoiceSuiteDocumentReader::createFromFile($this->getSampleXmlPath());
        $documentBuilder = $this->createMock(InvoiceSuiteDocumentBuilder::class);
        $documentBuilder->method('getCurrentDocumentFormatProvider')
            ->willReturn($documentReader->getCurrentDocumentFormatProvider());
        $documentBuilder->expects($this->once())
            ->method('getContent')
            ->willReturn($documentReader->getOriginalDocumentContent());

        $validator = InvoiceSuiteXsdDocumentValidator::createFromDocumentBuilder($documentBuilder);

        $this->assertSame($documentReader->getOriginalDocumentContent(), $validator->getOriginalDocumentContent());
        $this->assertSame(
            $documentReader->getCurrentDocumentFormatProvider()->getValidationXsdFilename(),
            $validator->getXsdFilename()
        );
    }

    public function testSetXsdFilename(): void
    {
        $documentReader = InvoiceSuiteDocumentReader::createFromFile($this->getSampleXmlPath());
        $xsdFilename = $documentReader->getCurrentDocumentFormatProvider()->getValidationXsdFilename();
        $validator = InvoiceSuiteXsdDocumentValidator::createFromContent($documentReader->getOriginalDocumentContent());

        $this->assertSame($validator, $validator->setXsdFilename($xsdFilename));
        $this->assertSame($xsdFilename, $validator->getXsdFilename());
        $this->assertSame($validator, $validator->setXsdFilename(''));
        $this->assertSame($xsdFilename, $validator->getXsdFilename());
    }

    public function testSetXsdFilenameThrowsFileNotFoundException(): void
    {
        $xsdFilename = InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            'notexisting.xsd'
        );
        $validator = InvoiceSuiteXsdDocumentValidator::createFromFile($this->getSampleXmlPath());

        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FILENOTFOUND);
        $this->expectExceptionMessage('notexisting.xsd was not found');

        $validator->setXsdFilename($xsdFilename);
    }

    public function testValidateValidDocument(): void
    {
        $validator = InvoiceSuiteXsdDocumentValidator::createFromFile($this->getSampleXmlPath());

        $this->assertSame($validator, $validator->validate());
        $this->assertFileIsReadable($validator->getXsdFilename());
        $this->assertFalse($validator->hasMessagesInMessageBag());
        $this->assertSame(0, $validator->countErrorMessagesInMessageBag());
    }

    public function testValidateInvalidDocument(): void
    {
        $validator = InvoiceSuiteXsdDocumentValidator::createFromFile($this->getInvalidSampleXmlPath());

        $this->assertSame($validator, $validator->validate());
        $this->assertTrue($validator->hasErrorMessagesInMessageBag());
        $this->assertSame(4, $validator->countErrorMessagesInMessageBag());
        $this->assertStringContainsString(
            "Element '{urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100}TypeCode'",
            $validator->getErrorMessagesInMessageBag()[0]->getMessageContent()
        );
    }

    public function testValidateClearsMessageBag(): void
    {
        $validator = InvoiceSuiteXsdDocumentValidator::createFromFile($this->getSampleXmlPath());
        $validator->addErrorMessageToMessageBag('old error');

        $this->assertTrue($validator->hasErrorMessagesInMessageBag());

        $validator->validate();

        $this->assertFalse($validator->hasMessagesInMessageBag());
    }

    private function getSampleXmlPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '00_case_comfort_simple.xml'
        );
    }

    private function getInvalidSampleXmlPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '02_technical_xml_zffx_comfort.xml'
        );
    }
}
