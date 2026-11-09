<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\validators;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
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

    /**
     * Verify that XML and PDF content use the reader's format provider and schema.
     *
     * @return void
     */
    public function testCreateFromVariableContent(): void
    {
        $pdfContent = InvoiceSuiteFileUtils::getContentFromFile($this->getSamplePdfPath());
        $pdfDocumentReader = InvoiceSuitePdfDocumentReader::createFromContent($pdfContent);
        $xmlContent = $pdfDocumentReader->getDocumentReader()->getOriginalDocumentContent();
        $formatProvider = $pdfDocumentReader->getCurrentDocumentFormatProvider();

        foreach (['XML' => $xmlContent, 'PDF' => $pdfContent] as $contentType => $documentContent) {
            $validator = InvoiceSuiteXsdDocumentValidator::createFromVariableContent($documentContent);

            $this->assertSame($xmlContent, $validator->getOriginalDocumentContent(), $contentType);
            $this->assertSame($formatProvider->getUniqueId(), $validator->getCurrentDocumentFormatProvider()->getUniqueId(), $contentType);
            $this->assertSame($formatProvider->getValidationXsdFilename(), $validator->getXsdFilename(), $contentType);
        }
    }

    /**
     * Verify that recognized JSON reaches format provider resolution.
     *
     * @return void
     */
    public function testCreateFromVariableContentThrowsForJsonWithoutFormatProvider(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);

        InvoiceSuiteXsdDocumentValidator::createFromVariableContent('{"invoice":123}');
    }

    /**
     * Verify that unrecognized content is rejected before a reader is created.
     *
     * @return void
     */
    public function testCreateFromVariableContentThrowsForUnknownContent(): void
    {
        $this->expectException(InvoiceSuiteUnknownContentException::class);
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::UNKNOWN_CONTENT);

        InvoiceSuiteXsdDocumentValidator::createFromVariableContent('not an invoice');
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

    public function testCreateFromPdfDocumentReader(): void
    {
        $pdfDocumentReader = InvoiceSuitePdfDocumentReader::createFromFile($this->getSamplePdfPath());

        $validator = InvoiceSuiteXsdDocumentValidator::createFromPdfDocumentReader($pdfDocumentReader);

        $this->assertSame(
            $pdfDocumentReader->getInvoiceDocumentAttachment()?->getAttachmentContent(),
            $validator->getOriginalDocumentContent()
        );
        $this->assertSame($pdfDocumentReader->getCurrentDocumentFormatProvider(), $validator->getCurrentDocumentFormatProvider());
        $this->assertSame(
            $pdfDocumentReader->getCurrentDocumentFormatProvider()->getValidationXsdFilename(),
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
        $this->assertFalse($validator->hasInternalErrorMessagesInMessageBag());
        $this->assertStringContainsString(
            "Element '{urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100}TypeCode'",
            $validator->getErrorMessagesInMessageBag()[0]->getMessageContent()
        );
    }

    public function testValidateTreatsInvalidXsdAsInternalError(): void
    {
        $validator = InvoiceSuiteXsdDocumentValidator::createFromFile($this->getSampleXmlPath());
        $validator->setXsdFilename($this->getSampleXmlPath());

        // libxml also emits a PHP warning for the deliberately invalid schema.
        $this->assertSame($validator, @$validator->validate());
        $this->assertFalse($validator->hasErrorMessagesInMessageBag());
        $this->assertTrue($validator->hasInternalErrorMessagesInMessageBag());
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

    private function getSamplePdfPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            'pdf_with_multiple_attachments.pdf'
        );
    }
}
