<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\pdf;

use Closure;
use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentBuilder;
use horstoeko\invoicesuite\pdfs\abstracts\InvoiceSuiteAbstractPdfConstructor;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfConstructor;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfWriter;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use Iterator;
use PrinsFrank\PdfParser\PdfParser;

final class InvoiceSuitePdfDocumentBuilderTest extends TestCase
{
    /**
     * @dataProvider zffxProfileProvider
     *
     * @param bool|string $expectedUseOfXmlFile
     */
    public function testZfFxPdfBuilder(string $expectedProfile, string $expectedXmlContains, $expectedUseOfXmlFile, bool $expectusePdfContent, string $expectXmpName, string $expectXmpVersion, int $expectOutputType): void
    {
        if (!$expectusePdfContent) {
            if (false !== $expectedUseOfXmlFile) {
                $xmlFilename = InvoiceSuitePathUtils::combinePathWithFile($this->getAssetPath(), $expectedUseOfXmlFile);
                $xmlContent = file_get_contents($xmlFilename);
                $pdfDOcumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfFile(
                    $xmlContent,
                    $this->getSamplePlainPdfFile()
                );
            } else {
                $documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($expectedProfile);
                $documentBuilder->setDocumentNo('2025-04-000001');
                $documentBuilder->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);
                $documentBuilder->setDocumentSellerId('0815');
                $documentBuilder->setDocumentSellerName('Lieferant GmbH');
                $documentBuilder->setDocumentDate(DateTime::createFromFormat('Ymd', '19700101'));
                $pdfDOcumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentBuilderAndPdfFile(
                    $documentBuilder,
                    $this->getSamplePlainPdfFile()
                );
            }
        } else {
            $pdfContent = file_get_contents($this->getSamplePlainPdfFile());

            if (false !== $expectedUseOfXmlFile) {
                $xmlFilename = InvoiceSuitePathUtils::combinePathWithFile($this->getAssetPath(), $expectedUseOfXmlFile);
                $xmlContent = file_get_contents($xmlFilename);
                $pdfDOcumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfContent(
                    $xmlContent,
                    $pdfContent
                );
            } else {
                $documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($expectedProfile);
                $documentBuilder->setDocumentNo('2025-04-000001');
                $documentBuilder->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);
                $documentBuilder->setDocumentSellerId('0815');
                $documentBuilder->setDocumentSellerName('Lieferant GmbH');
                $documentBuilder->setDocumentDate(DateTime::createFromFormat('Ymd', '19700101'));
                $pdfDOcumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentBuilderAndPdfContent(
                    $documentBuilder,
                    $pdfContent
                );
            }
        }

        // Provider

        $this->assertSame($expectedProfile, $pdfDOcumentBuilder->getCurrentDocumentFormatProvider()->getUniqueId());

        // PdfConstructor properties

        $prop = $this->getPrivatePropertyFromObject($pdfDOcumentBuilder, 'currentPdfConstructor');
        $propValue = $prop->getValue($pdfDOcumentBuilder);

        $this->assertInstanceOf(InvoiceSuiteAbstractPdfConstructor::class, $propValue);
        $this->assertInstanceOf(InvoiceSuiteZffxPdfConstructor::class, $propValue);

        // PdfConstructor methods

        $method = $this->getPrivateMethodFromObject($pdfDOcumentBuilder, 'getCurrentPdfConstructor');
        $methodValue = $method->invoke($pdfDOcumentBuilder);

        $this->assertInstanceOf(InvoiceSuiteAbstractPdfConstructor::class, $methodValue);
        $this->assertInstanceOf(InvoiceSuiteZffxPdfConstructor::class, $methodValue);

        // PdfWriter

        $propPdfWriter = $this->getPrivatePropertyFromObject($propValue, 'pdfWriter');
        $propPdfWriterValue = $propPdfWriter->getValue($propValue);

        $this->assertInstanceOf(InvoiceSuiteZffxPdfWriter::class, $propPdfWriterValue);

        // Initial values

        $this->assertSame('', $pdfDOcumentBuilder->getAdditionalCreatorTool());
        $this->assertSame('Data', $pdfDOcumentBuilder->getDocumentRelationshipType());
        $this->assertEmpty($pdfDOcumentBuilder->getaddAdditionalDocument());
        $this->assertFalse($pdfDOcumentBuilder->getDeterministicMode());
        $this->assertSame('', $pdfDOcumentBuilder->getMetaInformationAuthorTemplate());
        $this->assertSame('', $pdfDOcumentBuilder->getMetaInformationKeywordTemplate());
        $this->assertSame('', $pdfDOcumentBuilder->getMetaInformationTitleTemplate());
        $this->assertSame('', $pdfDOcumentBuilder->getMetaInformationSubjectTemplate());
        $this->assertNull($pdfDOcumentBuilder->getMetaInformationCallback());
        $this->assertTrue($pdfDOcumentBuilder->getAttachmentPaneVisibility());

        // Raw Content properties

        $prop = $this->getPrivatePropertyFromObject($pdfDOcumentBuilder, 'rawDocumentContent');
        $propValue = $prop->getValue($pdfDOcumentBuilder);

        $this->assertStringContainsString($expectedXmlContains, (string) $propValue);

        $prop = $this->getPrivatePropertyFromObject($pdfDOcumentBuilder, 'rawPdfContent');
        $propValue = $prop->getValue($pdfDOcumentBuilder);

        $this->assertStringContainsString('%PDF-1.5', (string) $propValue);

        // Raw content getter-methods

        $method = $this->getPrivateMethodFromObject($pdfDOcumentBuilder, 'getRawDocumentContent');
        $methodValue = $method->invoke($pdfDOcumentBuilder);

        $this->assertStringContainsString($expectedXmlContains, (string) $methodValue);

        $method = $this->getPrivateMethodFromObject($pdfDOcumentBuilder, 'getRawPdfContent');
        $methodValue = $method->invoke($pdfDOcumentBuilder);

        $this->assertStringContainsString('%PDF-1.5', (string) $methodValue);

        // Setters

        $pdfDOcumentBuilder->setAdditionalCreatorTool('Some Creator Tool');
        $this->assertSame('Some Creator Tool', $pdfDOcumentBuilder->getAdditionalCreatorTool());

        $pdfDOcumentBuilder->setDocumentRelationshipType('Alternative');
        $this->assertSame('Alternative', $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipType('Data');
        $this->assertSame('Data', $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipType('Source');
        $this->assertSame('Source', $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipType('unknown');
        $this->assertSame('Data', $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipTypeToSource();
        $this->assertSame('Source', $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipTypeToAlternative();
        $this->assertSame('Alternative', $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipTypeToData();
        $this->assertSame('Data', $pdfDOcumentBuilder->getDocumentRelationshipType());

        $pdfDOcumentBuilder->setDeterministicMode(true);
        $this->assertTrue($pdfDOcumentBuilder->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicMode(false);
        $this->assertFalse($pdfDOcumentBuilder->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicModeToEnabled();
        $this->assertTrue($pdfDOcumentBuilder->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicModeToDisabled();
        $this->assertFalse($pdfDOcumentBuilder->getDeterministicMode());

        $pdfDOcumentBuilder->setMetaInformationAuthorTemplate('Some author template');
        $this->assertSame('Some author template', $pdfDOcumentBuilder->getMetaInformationAuthorTemplate());
        $pdfDOcumentBuilder->setMetaInformationKeywordTemplate('Some keyword template');
        $this->assertSame('Some keyword template', $pdfDOcumentBuilder->getMetaInformationKeywordTemplate());
        $pdfDOcumentBuilder->setMetaInformationTitleTemplate('Some title template');
        $this->assertSame('Some title template', $pdfDOcumentBuilder->getMetaInformationTitleTemplate());
        $pdfDOcumentBuilder->setMetaInformationSubjectTemplate('Some subject template');
        $this->assertSame('Some subject template', $pdfDOcumentBuilder->getMetaInformationSubjectTemplate());
        $pdfDOcumentBuilder->setMetaInformationCallback(static fn () => 'Some Result');
        $this->assertInstanceOf(Closure::class, $pdfDOcumentBuilder->getMetaInformationCallback());

        $pdfDOcumentBuilder->setAttachmentPaneVisibility(false);
        $this->assertFalse($pdfDOcumentBuilder->getAttachmentPaneVisibility());
        $pdfDOcumentBuilder->setAttachmentPaneVisibility(true);
        $this->assertTrue($pdfDOcumentBuilder->getAttachmentPaneVisibility());

        $pdfDOcumentBuilder->addAdditionalDocumentByRealFile(InvoiceSuitePathUtils::combinePathWithFile($this->getAssetPath(), '02_picture.jpg'));
        $additionalContent = file_get_contents(InvoiceSuitePathUtils::combinePathWithFile($this->getAssetPath(), '02_picture.jpg'));
        $pdfDOcumentBuilder->addAdditionalDocumentByContent($additionalContent, 'pdf.pdf', 'Attached PDF');

        $this->assertCount(2, $pdfDOcumentBuilder->getaddAdditionalDocument());
        $this->assertArrayHasKey(0, $pdfDOcumentBuilder->getaddAdditionalDocument());
        $this->assertArrayHasKey(1, $pdfDOcumentBuilder->getaddAdditionalDocument());
        // @phpstan-ignore offsetAccess.notFound
        $this->assertIsArray($pdfDOcumentBuilder->getaddAdditionalDocument()[0]);
        $this->assertIsArray($pdfDOcumentBuilder->getaddAdditionalDocument()[1]);
        $this->assertArrayHasKey('content', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]);
        $this->assertArrayHasKey('filename', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]);
        $this->assertArrayHasKey('displayname', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]);
        $this->assertArrayHasKey('relationship', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]);
        $this->assertArrayHasKey('mimetype', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]);
        $this->assertNotEquals('', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]['content']);
        $this->assertSame('02_picture.jpg', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]['filename']);
        $this->assertSame('02_picture.jpg', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]['displayname']);
        $this->assertSame('Supplement', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]['relationship']);
        $this->assertSame('image/jpeg', $pdfDOcumentBuilder->getaddAdditionalDocument()[0]['mimetype']);
        $this->assertArrayHasKey('content', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]);
        $this->assertArrayHasKey('filename', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]);
        $this->assertArrayHasKey('displayname', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]);
        $this->assertArrayHasKey('relationship', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]);
        $this->assertArrayHasKey('mimetype', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]);
        $this->assertNotEquals('', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]['content']);
        $this->assertSame('pdf.pdf', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]['filename']);
        $this->assertSame('Attached PDF', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]['displayname']);
        $this->assertSame('Supplement', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]['relationship']);
        $this->assertSame('application/pdf', $pdfDOcumentBuilder->getaddAdditionalDocument()[1]['mimetype']);

        // PdfConstrucor Getter/Setter

        $propPdfConstructor = $this->getPrivatePropertyFromObject($pdfDOcumentBuilder, 'currentPdfConstructor');
        $propPdfConstructorValue = $propPdfConstructor->getValue($pdfDOcumentBuilder);

        $this->assertInstanceOf(InvoiceSuiteAbstractPdfConstructor::class, $propPdfConstructorValue);
        $this->assertInstanceOf(InvoiceSuiteZffxPdfConstructor::class, $propPdfConstructorValue);

        $this->assertSame('Some Creator Tool', $propPdfConstructorValue->getAdditionalCreatorTool());
        $pdfDOcumentBuilder->setAdditionalCreatorTool('My Creator Tool');
        $this->assertSame('My Creator Tool', $propPdfConstructorValue->getAdditionalCreatorTool());

        $this->assertSame('Data', $propPdfConstructorValue->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipType('Source');
        $this->assertSame('Source', $propPdfConstructorValue->getDocumentRelationshipType());

        $this->assertFalse($propPdfConstructorValue->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicMode(true);
        $this->assertTrue($propPdfConstructorValue->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicMode(false);
        $this->assertFalse($propPdfConstructorValue->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicModeToEnabled();
        $this->assertTrue($propPdfConstructorValue->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicModeToDisabled();
        $this->assertFalse($propPdfConstructorValue->getDeterministicMode());

        $this->assertSame('Some author template', $propPdfConstructorValue->getMetaInformationAuthorTemplate());
        $pdfDOcumentBuilder->setMetaInformationAuthorTemplate('My author template');
        $this->assertSame('My author template', $propPdfConstructorValue->getMetaInformationAuthorTemplate());

        $this->assertSame('Some keyword template', $propPdfConstructorValue->getMetaInformationKeywordTemplate());
        $pdfDOcumentBuilder->setMetaInformationKeywordTemplate('My keyword template');
        $this->assertSame('My keyword template', $propPdfConstructorValue->getMetaInformationKeywordTemplate());

        $this->assertSame('Some title template', $propPdfConstructorValue->getMetaInformationTitleTemplate());
        $pdfDOcumentBuilder->setMetaInformationTitleTemplate('My title template');
        $this->assertSame('My title template', $propPdfConstructorValue->getMetaInformationTitleTemplate());

        $this->assertSame('Some subject template', $propPdfConstructorValue->getMetaInformationSubjectTemplate());
        $pdfDOcumentBuilder->setMetaInformationSubjectTemplate('My subject template');
        $this->assertSame('My subject template', $propPdfConstructorValue->getMetaInformationSubjectTemplate());

        $this->assertInstanceOf(Closure::class, $propPdfConstructorValue->getMetaInformationCallback());
        $pdfDOcumentBuilder->setMetaInformationCallback(null);
        $this->assertNull($propPdfConstructorValue->getMetaInformationCallback());

        $this->assertTrue($propPdfConstructorValue->getAttachmentPaneVisibility());
        $pdfDOcumentBuilder->setAttachmentPaneVisibility(false);
        $this->assertFalse($propPdfConstructorValue->getAttachmentPaneVisibility());
        $pdfDOcumentBuilder->setAttachmentPaneVisibility(true);
        $this->assertTrue($propPdfConstructorValue->getAttachmentPaneVisibility());

        $this->assertCount(2, $propPdfConstructorValue->getaddAdditionalDocuments());
        $this->assertArrayHasKey(0, $propPdfConstructorValue->getaddAdditionalDocuments());
        $this->assertArrayHasKey(1, $propPdfConstructorValue->getaddAdditionalDocuments());
        $this->assertIsArray($propPdfConstructorValue->getaddAdditionalDocuments()[0]);
        $this->assertIsArray($propPdfConstructorValue->getaddAdditionalDocuments()[1]);
        $this->assertArrayHasKey('content', $propPdfConstructorValue->getaddAdditionalDocuments()[0]);
        $this->assertArrayHasKey('filename', $propPdfConstructorValue->getaddAdditionalDocuments()[0]);
        $this->assertArrayHasKey('displayname', $propPdfConstructorValue->getaddAdditionalDocuments()[0]);
        $this->assertArrayHasKey('relationship', $propPdfConstructorValue->getaddAdditionalDocuments()[0]);
        $this->assertArrayHasKey('mimetype', $propPdfConstructorValue->getaddAdditionalDocuments()[0]);
        $this->assertNotEquals('', $propPdfConstructorValue->getaddAdditionalDocuments()[0]['content']);
        $this->assertSame('02_picture.jpg', $propPdfConstructorValue->getaddAdditionalDocuments()[0]['filename']);
        $this->assertSame('02_picture.jpg', $propPdfConstructorValue->getaddAdditionalDocuments()[0]['displayname']);
        $this->assertSame('Supplement', $propPdfConstructorValue->getaddAdditionalDocuments()[0]['relationship']);
        $this->assertSame('image/jpeg', $propPdfConstructorValue->getaddAdditionalDocuments()[0]['mimetype']);
        $this->assertArrayHasKey('content', $propPdfConstructorValue->getaddAdditionalDocuments()[1]);
        $this->assertArrayHasKey('filename', $propPdfConstructorValue->getaddAdditionalDocuments()[1]);
        $this->assertArrayHasKey('displayname', $propPdfConstructorValue->getaddAdditionalDocuments()[1]);
        $this->assertArrayHasKey('relationship', $propPdfConstructorValue->getaddAdditionalDocuments()[1]);
        $this->assertArrayHasKey('mimetype', $propPdfConstructorValue->getaddAdditionalDocuments()[1]);
        $this->assertNotEquals('', $propPdfConstructorValue->getaddAdditionalDocuments()[1]['content']);
        $this->assertSame('pdf.pdf', $propPdfConstructorValue->getaddAdditionalDocuments()[1]['filename']);
        $this->assertSame('Attached PDF', $propPdfConstructorValue->getaddAdditionalDocuments()[1]['displayname']);
        $this->assertSame('Supplement', $propPdfConstructorValue->getaddAdditionalDocuments()[1]['relationship']);
        $this->assertSame('application/pdf', $propPdfConstructorValue->getaddAdditionalDocuments()[1]['mimetype']);

        $pdfDOcumentBuilder->setMetaInformationAuthorTemplate('%3$s');
        $pdfDOcumentBuilder->setMetaInformationKeywordTemplate('%2$s %1$s, %4$s');
        $pdfDOcumentBuilder->setMetaInformationTitleTemplate('%2$s %1$s issued by %3$s');
        $pdfDOcumentBuilder->setMetaInformationSubjectTemplate('%2$s %1$s');

        $method = $this->getPrivateMethodFromObject($propPdfConstructorValue, 'preparePdfMetadata');
        $methodValue = $method->invoke($propPdfConstructorValue);

        $this->assertIsArray($methodValue);
        $this->assertArrayHasKey('author', $methodValue);
        $this->assertArrayHasKey('keywords', $methodValue);
        $this->assertArrayHasKey('title', $methodValue);
        $this->assertArrayHasKey('subject', $methodValue);
        $this->assertArrayHasKey('createdDate', $methodValue);
        $this->assertArrayHasKey('modifiedDate', $methodValue);
        $this->assertSame('Lieferant GmbH', $methodValue['author']);
        $this->assertSame('Invoice 2025-04-000001, 1970-01-01T00:00:00+00:00', $methodValue['keywords']);
        $this->assertSame('Invoice 2025-04-000001 issued by Lieferant GmbH', $methodValue['title']);
        $this->assertSame('Invoice 2025-04-000001', $methodValue['subject']);

        $pdfDOcumentBuilder->setMetaInformationCallback(static function ($whichTemplate, $xmlContent, $invoiceInformation, $defaultValue) {
            if ('author' == $whichTemplate) {
                return $invoiceInformation['seller'];
            }

            if ('keyword' == $whichTemplate) {
                return sprintf('%s %s, %s', $invoiceInformation['docTypeName'], $invoiceInformation['invoiceId'], $invoiceInformation['date']);
            }

            if ('title' == $whichTemplate) {
                return sprintf('%s %s issued by %s', $invoiceInformation['docTypeName'], $invoiceInformation['invoiceId'], $invoiceInformation['seller']);
            }

            if ('subject' == $whichTemplate) {
                return sprintf('%s %s', $invoiceInformation['docTypeName'], $invoiceInformation['invoiceId']);
            }
        });

        $method = $this->getPrivateMethodFromObject($propPdfConstructorValue, 'preparePdfMetadata');
        $methodValue = $method->invoke($propPdfConstructorValue);

        $this->assertIsArray($methodValue);
        $this->assertArrayHasKey('author', $methodValue);
        $this->assertArrayHasKey('keywords', $methodValue);
        $this->assertArrayHasKey('title', $methodValue);
        $this->assertArrayHasKey('subject', $methodValue);
        $this->assertArrayHasKey('createdDate', $methodValue);
        $this->assertArrayHasKey('modifiedDate', $methodValue);
        $this->assertSame('Lieferant GmbH', $methodValue['author']);
        $this->assertSame('Invoice 2025-04-000001, 1970-01-01T00:00:00+00:00', $methodValue['keywords']);
        $this->assertSame('Invoice 2025-04-000001 issued by Lieferant GmbH', $methodValue['title']);
        $this->assertSame('Invoice 2025-04-000001', $methodValue['subject']);

        $method = $this->getPrivateMethodFromObject($propPdfConstructorValue, 'getXmlAttachmentXmpName');
        $methodValue = $method->invoke($propPdfConstructorValue);

        $this->assertSame($expectXmpName, $methodValue);

        $method = $this->getPrivateMethodFromObject($propPdfConstructorValue, 'getXmlAttachmentXmpVersion');
        $method->invoke($propPdfConstructorValue);

        $this->assertSame('1.0', $expectXmpVersion);

        $method = $this->getPrivateMethodFromObject($propPdfConstructorValue, 'updatePdfMetadata');
        $method->invoke($propPdfConstructorValue);

        $propPdfWriter = $this->getPrivatePropertyFromObject($propPdfConstructorValue, 'pdfWriter');
        $propPdfWriterValue = $propPdfWriter->getValue($propPdfConstructorValue);

        $propPdfWriterMetaData = $this->getPrivatePropertyFromObject($propPdfWriterValue, 'metadata');
        $propPdfWriterMetaDataValue = $propPdfWriterMetaData->getValue($propPdfWriterValue);

        $this->assertIsArray($propPdfWriterMetaDataValue);
        $this->assertArrayHasKey('Title', $propPdfWriterMetaDataValue);
        $this->assertArrayHasKey('Author', $propPdfWriterMetaDataValue);
        $this->assertArrayHasKey('Subject', $propPdfWriterMetaDataValue);
        $this->assertArrayHasKey('Keywords', $propPdfWriterMetaDataValue);
        $this->assertArrayHasKey('Creator', $propPdfWriterMetaDataValue);
        $this->assertSame('Lieferant GmbH', $propPdfWriterMetaDataValue['Author']);
        $this->assertSame('Invoice 2025-04-000001, 1970-01-01T00:00:00+00:00', $propPdfWriterMetaDataValue['Keywords']);
        $this->assertSame('Invoice 2025-04-000001 issued by Lieferant GmbH', $propPdfWriterMetaDataValue['Title']);
        $this->assertSame('Invoice 2025-04-000001', $propPdfWriterMetaDataValue['Subject']);
        $this->assertSame('My Creator Tool / InvoiceSuite PHP library vdev-master by HorstOeko', $propPdfWriterMetaDataValue['Creator']);

        $propPdfWriterMetaData = $this->getPrivatePropertyFromObject($propPdfWriterValue, 'metaDataDescriptions');
        $propPdfWriterMetaDataValue = $propPdfWriterMetaData->getValue($propPdfWriterValue);

        $this->assertIsArray($propPdfWriterMetaDataValue);
        $this->assertArrayHasKey(0, $propPdfWriterMetaDataValue);
        $this->assertArrayHasKey(1, $propPdfWriterMetaDataValue);
        $this->assertArrayHasKey(2, $propPdfWriterMetaDataValue);
        $this->assertArrayHasKey(3, $propPdfWriterMetaDataValue);
        $this->assertArrayHasKey(4, $propPdfWriterMetaDataValue);
        $this->assertArrayHasKey(5, $propPdfWriterMetaDataValue);
        $this->assertStringContainsString('<rdf:Description xmlns:fx="urn:factur-x:pdfa:CrossIndustryDocument:invoice:1p0#', (string) $propPdfWriterMetaDataValue[0]);
        $this->assertStringContainsString('<fx:DocumentType>INVOICE</fx:DocumentType>', (string) $propPdfWriterMetaDataValue[0]);
        $this->assertStringContainsString('<fx:DocumentFileName>factur-x.xml</fx:DocumentFileName>', (string) $propPdfWriterMetaDataValue[0]);
        $this->assertStringContainsString(sprintf('<fx:Version>%s</fx:Version>', $expectXmpVersion), (string) $propPdfWriterMetaDataValue[0]);
        $this->assertStringContainsString(sprintf('<fx:ConformanceLevel>%s</fx:ConformanceLevel>', $expectXmpName), (string) $propPdfWriterMetaDataValue[0]);

        $pdfDOcumentBuilder->setDeterministicModeToEnabled();

        $pdfContent = '';

        if (1 === $expectOutputType) {
            $pdfContent = $pdfDOcumentBuilder->generatePdfDocumentAndGetContent();
        }

        if (2 === $expectOutputType) {
            $saveToFilename = InvoiceSuitePathUtils::combinePathWithFile(sys_get_temp_dir(), 'output.pdf');
            $pdfDOcumentBuilder->generatePdfDocumentAndSaveToFile($saveToFilename);
            $this->assertFileExists($saveToFilename);
            $this->registerFileForTestMethodTeardown($saveToFilename);
            $pdfContent = file_get_contents($saveToFilename);
        }

        $pdfParser = new PdfParser();
        $pdfParsed = $pdfParser->parseString($pdfContent);
        $fileSpecs = $pdfParsed->getCatalog()->getFileSpecifications();

        $fileSpecs = array_filter(
            $fileSpecs,
            static fn ($fileSpec) => !is_null($fileSpec->getEmbeddedFile())
        );

        $this->assertStringContainsString('PDF-1.7', (string) $pdfContent);
        $this->assertCount(3, $fileSpecs);
        $this->assertArrayHasKey(0, $fileSpecs);
        $this->assertArrayHasKey(1, $fileSpecs);
        $this->assertArrayHasKey(2, $fileSpecs);
        $this->assertSame('factur-x.xml', $fileSpecs[0]->getFileSpecificationString());
        $this->assertSame('text/xml', ltrim($fileSpecs[0]->getEmbeddedFile()->getSubType() ?? '', '/'));
        $this->assertSame('02_picture.jpg', $fileSpecs[1]->getFileSpecificationString());
        $this->assertSame('image/jpeg', ltrim($fileSpecs[1]->getEmbeddedFile()->getSubType() ?? '', '/'));
        $this->assertSame('pdf.pdf', $fileSpecs[2]->getFileSpecificationString());
        $this->assertSame('application/pdf', ltrim($fileSpecs[2]->getEmbeddedFile()->getSubType() ?? '', '/'));
        $this->assertSame('Invoice 2025-04-000001 issued by Lieferant GmbH', $pdfParsed->getInformationDictionary()?->getTitle());
        $this->assertSame('Lieferant GmbH', $pdfParsed->getInformationDictionary()->getAuthor());
        $this->assertSame('My Creator Tool / InvoiceSuite PHP library vdev-master by HorstOeko', $pdfParsed->getInformationDictionary()->getCreator());
        $this->assertStringContainsString('FPDF', (string) $pdfParsed->getInformationDictionary()->getProducer());
        $this->assertInstanceOf(DateTimeInterface::class, $pdfParsed->getInformationDictionary()->getCreationDate());
        $this->assertSame('2000-01-01', $pdfParsed->getInformationDictionary()->getCreationDate()->format('Y-m-d'));

        unset($pdfDOcumentBuilder);
    }

    public static function zffxProfileProvider(): Iterator
    {
        // 1.
        yield 'zffxminimum' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', false, false, 'MINIMUM', '1.0', 1];
        yield 'zffxbasicwl' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', false, false, 'BASIC WL', '1.0', 1];
        yield 'zffxbasic' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', false, false, 'BASIC', '1.0', 1];
        yield 'zffxcomfort' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', false, false, 'EN 16931', '1.0', 1];
        yield 'zffxextended' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', false, false, 'EXTENDED', '1.0', 1];
        // 2.
        yield 'zffxminimum2' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', '02_technical_xml_zffx_minimum.xml', false, 'MINIMUM', '1.0', 1];
        yield 'zffxbasicwl2' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', '02_technical_xml_zffx_basicwl.xml', false, 'BASIC WL', '1.0', 1];
        yield 'zffxbasic2' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', '02_technical_xml_zffx_basic.xml', false, 'BASIC', '1.0', 1];
        yield 'zffxcomfort2' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', '02_technical_xml_zffx_comfort.xml', false, 'EN 16931', '1.0', 1];
        yield 'zffxextended2' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', '02_technical_xml_zffx_extended.xml', false, 'EXTENDED', '1.0', 1];
        // 3.
        yield 'zffxminimum3' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', false, true, 'MINIMUM', '1.0', 1];
        yield 'zffxbasicwl3' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', false, true, 'BASIC WL', '1.0', 1];
        yield 'zffxbasic3' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', false, true, 'BASIC', '1.0', 1];
        yield 'zffxcomfort3' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', false, true, 'EN 16931', '1.0', 1];
        yield 'zffxextended3' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', false, true, 'EXTENDED', '1.0', 1];
        // 4.
        yield 'zffxminimum4' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', '02_technical_xml_zffx_minimum.xml', true, 'MINIMUM', '1.0', 1];
        yield 'zffxbasicwl4' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', '02_technical_xml_zffx_basicwl.xml', true, 'BASIC WL', '1.0', 1];
        yield 'zffxbasic4' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', '02_technical_xml_zffx_basic.xml', true, 'BASIC', '1.0', 1];
        yield 'zffxcomfort4' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', '02_technical_xml_zffx_comfort.xml', true, 'EN 16931', '1.0', 1];
        yield 'zffxextended4' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', '02_technical_xml_zffx_extended.xml', true, 'EXTENDED', '1.0', 1];
        // 5.
        yield 'zffxminimum5' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', false, false, 'MINIMUM', '1.0', 2];
        yield 'zffxbasicwl5' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', false, false, 'BASIC WL', '1.0', 2];
        yield 'zffxbasic5' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', false, false, 'BASIC', '1.0', 2];
        yield 'zffxcomfort5' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', false, false, 'EN 16931', '1.0', 2];
        yield 'zffxextended5' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', false, false, 'EXTENDED', '1.0', 2];
        // 6.
        yield 'zffxminimum6' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', '02_technical_xml_zffx_minimum.xml', false, 'MINIMUM', '1.0', 2];
        yield 'zffxbasicwl6' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', '02_technical_xml_zffx_basicwl.xml', false, 'BASIC WL', '1.0', 2];
        yield 'zffxbasic6' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', '02_technical_xml_zffx_basic.xml', false, 'BASIC', '1.0', 2];
        yield 'zffxcomfort6' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', '02_technical_xml_zffx_comfort.xml', false, 'EN 16931', '1.0', 2];
        yield 'zffxextended6' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', '02_technical_xml_zffx_extended.xml', false, 'EXTENDED', '1.0', 2];
        // 7.
        yield 'zffxminimum7' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', false, true, 'MINIMUM', '1.0', 2];
        yield 'zffxbasicwl7' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', false, true, 'BASIC WL', '1.0', 2];
        yield 'zffxbasic7' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', false, true, 'BASIC', '1.0', 2];
        yield 'zffxcomfort7' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', false, true, 'EN 16931', '1.0', 2];
        yield 'zffxextended7' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', false, true, 'EXTENDED', '1.0', 2];
        // 8.
        yield 'zffxminimum8' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', '02_technical_xml_zffx_minimum.xml', true, 'MINIMUM', '1.0', 2];
        yield 'zffxbasicwl8' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', '02_technical_xml_zffx_basicwl.xml', true, 'BASIC WL', '1.0', 2];
        yield 'zffxbasic8' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', '02_technical_xml_zffx_basic.xml', true, 'BASIC', '1.0', 2];
        yield 'zffxcomfort8' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', '02_technical_xml_zffx_comfort.xml', true, 'EN 16931', '1.0', 2];
        yield 'zffxextended8' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', '02_technical_xml_zffx_extended.xml', true, 'EXTENDED', '1.0', 2];
    }

    public function testProviderThatDoesNotSupportPdf(): void
    {
        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('Provider xrechnungublinvoice does not support PDF embedding');
        $this->expectExceptionCode(-1005);

        $documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublinvoice');
        $documentBuilder->setDocumentNo('2025-04-000001');
        $documentBuilder->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);
        $documentBuilder->setDocumentSellerId('0815');
        $documentBuilder->setDocumentSellerName('Lieferant GmbH');
        $documentBuilder->setDocumentDate(DateTime::createFromFormat('Ymd', '19700101'));

        InvoiceSuitePdfDocumentBuilder::createFromDocumentBuilderAndPdfFile(
            $documentBuilder,
            $this->getSamplePlainPdfFile()
        );
    }

    private function getAssetPath(): string
    {
        return InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets');
    }

    private function getSamplePlainPdfFile(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile($this->getAssetPath(), 'pdf_plain.pdf');
    }
}
