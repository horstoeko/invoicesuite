<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\validators;

use Composer\Autoload\ClassLoader;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteValidationContentNotSpecifiedException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteClassFinder;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBagItem;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteCompositeDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteDocuflairDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteKositDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteXsdDocumentValidator;
use ReflectionClass;

final class InvoiceSuiteCompositeDocumentValidatorTest extends TestCase
{
    public function testCreateFromFile(): void
    {
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromFile($this->getSamplePath('00_case_comfort_simple.xml'));

        $this->assertValidWithXsd($validator);
    }

    public function testCreateFromFileThrowsForMissingFile(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FILENOTFOUND);

        InvoiceSuiteCompositeDocumentValidator::createFromFile($this->getSamplePath('missing-composite-invoice.xml'));
    }

    public function testCreateFromDocumentReader(): void
    {
        $documentReader = InvoiceSuiteDocumentReader::createFromFile($this->getSamplePath('00_case_comfort_simple.xml'));
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromDocumentReader($documentReader);

        $this->assertValidWithXsd($validator);
    }

    public function testCreateFromDocumentBuilder(): void
    {
        $documentReader = InvoiceSuiteDocumentReader::createFromFile($this->getSamplePath('00_case_comfort_simple.xml'));
        $documentBuilder = $documentReader->copyToBuilder();
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromDocumentBuilder($documentBuilder);

        $this->assertValidWithXsd($validator);
    }

    public function testCreateFromPdfDocumentReader(): void
    {
        $pdfDocumentReader = InvoiceSuitePdfDocumentReader::createFromFile($this->getSamplePath('pdf_with_multiple_attachments.pdf'));
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromPdfDocumentReader($pdfDocumentReader);

        $this->assertValidWithXsd($validator);
    }

    public function testCreateFromContent(): void
    {
        $documentContent = InvoiceSuiteFileUtils::getContentFromFile($this->getSamplePath('00_case_comfort_simple.xml'));
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromContent($documentContent);

        $this->assertValidWithXsd($validator);
    }

    public function testCreateFromVariableXmlContent(): void
    {
        $documentContent = InvoiceSuiteFileUtils::getContentFromFile($this->getSamplePath('00_case_comfort_simple.xml'));
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromVariableContent($documentContent);

        $this->assertValidWithXsd($validator);
    }

    public function testCreateFromVariablePdfContent(): void
    {
        $pdfContent = InvoiceSuiteFileUtils::getContentFromFile($this->getSamplePath('pdf_with_multiple_attachments.pdf'));
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromVariableContent($pdfContent);

        $this->assertValidWithXsd($validator);
    }

    public function testCreateFromVariableContentThrowsForJsonWithoutFormatProvider(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);

        InvoiceSuiteCompositeDocumentValidator::createFromVariableContent('{"invoice":123}');
    }

    public function testCreateFromVariableContentThrowsForUnknownContent(): void
    {
        $this->expectException(InvoiceSuiteUnknownContentException::class);
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::UNKNOWN_CONTENT);

        InvoiceSuiteCompositeDocumentValidator::createFromVariableContent('not an invoice');
    }

    public function testInitRegistersDuplicateValidatorOnce(): void
    {
        $validatorFilename = (new ReflectionClass(InvoiceSuiteXsdDocumentValidator::class))->getFileName();

        $this->assertIsString($validatorFilename);

        $lowercaseValidatorClass = InvoiceSuiteStringUtils::lower(InvoiceSuiteXsdDocumentValidator::class);

        $classLoader = new ClassLoader(__DIR__);
        $classLoader->addClassMap([
            InvoiceSuiteXsdDocumentValidator::class => $validatorFilename,
            $lowercaseValidatorClass => $validatorFilename,
        ]);
        $classLoader->register();

        $classFinder = InvoiceSuiteClassFinder::factory();

        try {
            $classFinder->init();
            $availableValidators = $classFinder->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractDocumentValidator::class, true);

            $this->assertContains(InvoiceSuiteXsdDocumentValidator::class, $availableValidators);
            $this->assertContains($lowercaseValidatorClass, $availableValidators);

            $validator = InvoiceSuiteCompositeDocumentValidator::createFromFile($this->getSamplePath('02_technical_xml_zffx_comfort.xml'));

            $this->disableExternalValidators($validator);

            $validator->init()->validate();

            $this->assertSame(4, $validator->countErrorMessagesInMessageBag());
            $this->assertFalse($validator->hasInternalErrorMessagesInMessageBag());
        } finally {
            $classLoader->unregister();
            $classFinder->init();
        }
    }

    public function testValidateReportsWhenAllValidatorsAreDisabled(): void
    {
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromFile($this->getSamplePath('00_case_comfort_simple.xml'));
        $disabledValidators = [
            InvoiceSuiteXsdDocumentValidator::class,
            InvoiceSuiteKositDocumentValidator::class,
            InvoiceSuiteDocuflairDocumentValidator::class,
        ];

        $this->assertSame([], $validator->getDisabledValidators());
        $this->assertSame($validator, $validator->setDisabledValidators($disabledValidators));
        $this->assertSame($disabledValidators, $validator->getDisabledValidators());

        $this->assertSame($validator, $validator->validate());
        $this->assertFalse($validator->hasErrorMessagesInMessageBag());
        $this->assertSame(1, $validator->countInternalErrorMessagesInMessageBag());
        $this->assertSame('No document validator is enabled', $validator->getInternalErrorMessagesInMessageBag()[0]->getMessageContent());
    }

    public function testSetValidatorOptionsReplacesOptionsForOneValidator(): void
    {
        $validator = InvoiceSuiteCompositeDocumentValidator::factory();
        $xsdOptions = ['setXsdFilename' => ['invoice.xsd']];
        $kositOptions = ['enableRemoteMode' => []];

        $this->assertSame([], $validator->getValidatorOptions(InvoiceSuiteXsdDocumentValidator::class));

        $this->assertSame($validator, $validator->setValidatorOptions(InvoiceSuiteXsdDocumentValidator::class, $xsdOptions));

        $validator->setValidatorOptions(InvoiceSuiteKositDocumentValidator::class, $kositOptions);

        $this->assertSame($xsdOptions, $validator->getValidatorOptions(InvoiceSuiteXsdDocumentValidator::class));
        $this->assertSame($kositOptions, $validator->getValidatorOptions(InvoiceSuiteKositDocumentValidator::class));

        $validator->setValidatorOptions(InvoiceSuiteXsdDocumentValidator::class, []);

        $this->assertSame([], $validator->getValidatorOptions(InvoiceSuiteXsdDocumentValidator::class));
        $this->assertSame($kositOptions, $validator->getValidatorOptions(InvoiceSuiteKositDocumentValidator::class));
    }

    public function testValidateThrowsWhenContentIsMissing(): void
    {
        $validator = InvoiceSuiteCompositeDocumentValidator::factory();

        $this->expectException(InvoiceSuiteValidationContentNotSpecifiedException::class);
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::VALIDATION_CONTENT_NOT_SPECIFIED);

        $validator->validate();
    }

    public function testValidateAppliesXsdOptionsAndClearsPreviousFindings(): void
    {
        $ublReader = InvoiceSuiteDocumentReader::createFromFile($this->getSamplePath('00_case_xrechnung_ublinvoice_simple_dto.xml'));
        $ublSchemaFilename = $ublReader->getCurrentDocumentFormatProvider()->getValidationXsdFilename();
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromFile($this->getSamplePath('00_case_comfort_simple.xml'));

        $this->disableExternalValidators($validator);

        $validator->setValidatorOptions(InvoiceSuiteXsdDocumentValidator::class, ['setXsdFilename' => [$ublSchemaFilename]]);
        $validator->validate();

        $this->assertTrue($validator->hasErrorMessagesInMessageBag());
        $this->assertFalse($validator->hasInternalErrorMessagesInMessageBag());
        $this->assertSame('xsd', $validator->getErrorMessagesInMessageBag()[0]->getMessageAdditionalData()['source']);

        $validator->setValidatorOptions(InvoiceSuiteXsdDocumentValidator::class, [])->validate();

        $this->assertFalse($validator->hasMessagesInMessageBag());
    }

    public function testValidateRejectsUnknownOption(): void
    {
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromFile($this->getSamplePath('00_case_comfort_simple.xml'));

        $this->disableExternalValidators($validator);

        $validator->setValidatorOptions(InvoiceSuiteXsdDocumentValidator::class, ['setUnknownOption' => []]);

        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessageIsOrContains('Invalid validator option method ' . InvoiceSuiteXsdDocumentValidator::class . '::setUnknownOption');

        $validator->validate();
    }

    public function testValidateReportsMissingFormatProviders(): void
    {
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromContent('<unknown-invoice/>');
        $missingFormatProvider = new InvoiceSuiteFormatProviderNotFoundException('unknown');

        $this->assertSame($validator, $validator->validate());
        $this->assertFalse($validator->hasErrorMessagesInMessageBag());
        $this->assertEqualsCanonicalizing(
            [
                InvoiceSuiteXsdDocumentValidator::class . ': ' . $missingFormatProvider->getMessage(),
                InvoiceSuiteKositDocumentValidator::class . ': ' . $missingFormatProvider->getMessage(),
                InvoiceSuiteDocuflairDocumentValidator::class . ': ' . $missingFormatProvider->getMessage(),
            ],
            InvoiceSuiteArrayUtils::map(
                static fn (InvoiceSuiteMessageBagItem $message): string => $message->getMessageContent(),
                $validator->getInternalErrorMessagesInMessageBag()
            )
        );
    }

    public function testValidateCombinesFindingsWithoutExternalServices(): void
    {
        $validator = InvoiceSuiteCompositeDocumentValidator::createFromFile($this->getSamplePath('02_technical_xml_zffx_comfort.xml'));

        // KoSIT stops at its remote prerequisites. DocuFlair stops at the missing API key.
        $validator->setValidatorOptions(InvoiceSuiteKositDocumentValidator::class, ['enableRemoteMode' => []]);

        $kositMessage = extension_loaded('curl')
            ? "You must specify the hostname or it's IP where the Validator is running in daemon mode"
            : 'PHP-Curl not installed or activated';

        $validator->validate();

        $this->assertSame(4, $validator->countErrorMessagesInMessageBag());
        $this->assertEqualsCanonicalizing(
            [$kositMessage, 'API key must be given'],
            InvoiceSuiteArrayUtils::map(
                static fn (InvoiceSuiteMessageBagItem $message): string => $message->getMessageContent(),
                $validator->getInternalErrorMessagesInMessageBag()
            )
        );
    }

    /**
     * Validate the invoice using its XSD schema and verify an empty message bag.
     *
     * @param  InvoiceSuiteCompositeDocumentValidator $validator
     * @return void
     */
    private function assertValidWithXsd(
        InvoiceSuiteCompositeDocumentValidator $validator
    ): void {
        $this->disableExternalValidators($validator);

        $this->assertSame($validator, $validator->validate());
        $this->assertFalse($validator->hasMessagesInMessageBag());
    }

    /**
     * Select XSD validation for a test using an invoice fixture.
     *
     * @param  InvoiceSuiteCompositeDocumentValidator $validator
     * @return void
     */
    private function disableExternalValidators(
        InvoiceSuiteCompositeDocumentValidator $validator
    ): void {
        $validator->setDisabledValidators([
            InvoiceSuiteKositDocumentValidator::class,
            InvoiceSuiteDocuflairDocumentValidator::class,
        ]);
    }

    /**
     * Return the path to an existing test asset or a deliberately missing fixture.
     *
     * @param  string $filename
     * @return string
     */
    private function getSamplePath(
        string $filename
    ): string {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            $filename
        );
    }
}
