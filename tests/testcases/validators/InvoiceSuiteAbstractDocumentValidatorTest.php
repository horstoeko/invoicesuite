<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\validators;

use Closure;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;

final class InvoiceSuiteAbstractDocumentValidatorTest extends TestCase
{
    private static Closure $validatorFactory;

    private static string $validatorClassname;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $factory = Closure::bind(
            static fn (string $rawDocumentContent): InvoiceSuiteAbstractDocumentValidator => new class($rawDocumentContent) extends InvoiceSuiteAbstractDocumentValidator {
                public int $initializeCallCount = 0;

                public int $doValidateCallCount = 0;

                public function getRawDocumentContentForTest(): string
                {
                    return $this->getRawDocumentContent();
                }

                protected function intializeAfterConstruct(): static
                {
                    ++$this->initializeCallCount;

                    parent::intializeAfterConstruct();

                    return $this;
                }

                protected function doValidate(): static
                {
                    ++$this->doValidateCallCount;

                    $this->addInfoMessageToMessageBag('info 1');
                    $this->addWarningMessageToMessageBag('warning 1');
                    $this->addErrorMessageToMessageBag('error 1');
                    $this->addInternalErrorMessageToMessageBag('internal error 1');
                    $this->addMessageToMessageBag('info 2');

                    return $this;
                }
            },
            null,
            InvoiceSuiteAbstractDocumentValidator::class
        );

        $prototypeInstance = $factory('<prototype/>');

        self::$validatorFactory = $factory;
        self::$validatorClassname = $prototypeInstance::class;
    }

    public function testCreateFromContentCreatesInstanceAndRunsInitializeAfterConstruct(): void
    {
        $validatorClassname = self::$validatorClassname;
        $documentContent = (string) file_get_contents($this->getSampleXmlPath());

        $validatorInstance = $validatorClassname::createFromContent($documentContent);

        $this->assertInstanceOf($validatorClassname, $validatorInstance);
        $this->assertSame($documentContent, $validatorInstance->getRawDocumentContentForTest());
        $this->assertSame(1, $validatorInstance->initializeCallCount);
    }

    public function testCreateFromFileThrowsFileNotFoundException(): void
    {
        $validatorClassname = self::$validatorClassname;

        $nonExistingFilename = InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            bin2hex(random_bytes(16)) . '.xml'
        );

        $this->assertFileDoesNotExist($nonExistingFilename);

        $this->expectException(InvoiceSuiteFileNotFoundException::class);

        $validatorClassname::createFromFile($nonExistingFilename);
    }

    public function testCreateFromFileThrowsFileNotFoundExceptionForDirectory(): void
    {
        $validatorClassname = self::$validatorClassname;

        $temporaryDirectory = InvoiceSuitePathUtils::combineAllPaths(
            __DIR__,
            '..',
            '..',
            'assets',
            'invoicesuite_dir_' . bin2hex(random_bytes(16))
        );

        $this->assertDirectoryDoesNotExist($temporaryDirectory);
        $this->assertTrue(mkdir($temporaryDirectory));
        $this->assertDirectoryExists($temporaryDirectory);

        try {
            $this->expectException(InvoiceSuiteFileNotFoundException::class);

            $validatorClassname::createFromFile($temporaryDirectory);
        } finally {
            @rmdir($temporaryDirectory);
        }
    }

    public function testCreateFromFileCreatesInstanceFromFileContent(): void
    {
        $validatorClassname = self::$validatorClassname;
        $documentContent = (string) file_get_contents($this->getSampleXmlPath());

        $temporaryFilename = InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            bin2hex(random_bytes(16)) . '.xml'
        );

        $this->assertNotFalse(file_put_contents($temporaryFilename, $documentContent));
        $this->assertFileExists($temporaryFilename);

        try {
            $validatorInstance = $validatorClassname::createFromFile($temporaryFilename);

            $this->assertInstanceOf($validatorClassname, $validatorInstance);
            $this->assertSame($documentContent, $validatorInstance->getRawDocumentContentForTest());
            $this->assertSame(1, $validatorInstance->initializeCallCount);

            $returnedInstance = $validatorInstance->validate();

            $this->assertSame($validatorInstance, $returnedInstance);
            $this->assertSame(1, $validatorInstance->doValidateCallCount);
        } finally {
            @unlink($temporaryFilename);
        }
    }

    public function testCreateFromDocumentBuilderUsesBuilderContent(): void
    {
        $validatorClassname = self::$validatorClassname;
        $documentReader = InvoiceSuiteDocumentReader::createFromFile($this->getSampleXmlPath());

        $documentBuilderMock = $this->createMock(InvoiceSuiteDocumentBuilder::class);
        $documentBuilderMock->method('getCurrentDocumentFormatProvider')
            ->willReturn($documentReader->getCurrentDocumentFormatProvider());
        $documentBuilderMock->expects($this->once())
            ->method('getContent')
            ->willReturn('<builder/>');

        $validatorInstance = $validatorClassname::createFromDocumentBuilder($documentBuilderMock);

        $this->assertInstanceOf($validatorClassname, $validatorInstance);
        $this->assertSame('<builder/>', $validatorInstance->getRawDocumentContentForTest());

        $returnedInstance = $validatorInstance->validate();

        $this->assertSame($validatorInstance, $returnedInstance);
        $this->assertSame(1, $validatorInstance->doValidateCallCount);
    }

    public function testCreateFromDocumentReaderUsesReaderContent(): void
    {
        $validatorClassname = self::$validatorClassname;
        $documentReader = InvoiceSuiteDocumentReader::createFromFile($this->getSampleXmlPath());

        $validatorInstance = $validatorClassname::createFromDocumentReader($documentReader);

        $this->assertInstanceOf($validatorClassname, $validatorInstance);
        $this->assertSame($documentReader->getOriginalDocumentContent(), $validatorInstance->getRawDocumentContentForTest());
        $this->assertSame(1, $validatorInstance->initializeCallCount);
    }

    public function testValidateThrowsWhenNoContentIsPresent(): void
    {
        $factory = self::$validatorFactory;
        $validatorInstance = $factory('');

        $this->expectException(InvoiceSuiteInvalidArgumentException::class);

        $validatorInstance->validate();
    }

    public function testValidateCallsDoValidateAndReturnsSameInstance(): void
    {
        $validatorClassname = self::$validatorClassname;
        $documentContent = (string) file_get_contents($this->getSampleXmlPath());

        $validatorInstance = $validatorClassname::createFromContent($documentContent);

        $returnedInstance = $validatorInstance->validate();

        $this->assertSame($validatorInstance, $returnedInstance);
        $this->assertSame(1, $validatorInstance->doValidateCallCount);
    }

    public function testValidateAddsMessagesToMessageBagAndClearWorks(): void
    {
        $validatorClassname = self::$validatorClassname;
        $documentContent = (string) file_get_contents($this->getSampleXmlPath());

        $validatorInstance = $validatorClassname::createFromContent($documentContent);

        $this->assertFalse($validatorInstance->hasMessagesInMessageBag());

        $validatorInstance->validate();

        $this->assertTrue($validatorInstance->hasMessagesInMessageBag());
        $this->assertTrue($validatorInstance->hasInfoMessagesInMessageBag());
        $this->assertTrue($validatorInstance->hasWarningMessagesInMessageBag());
        $this->assertTrue($validatorInstance->hasErrorMessagesInMessageBag());
        $this->assertTrue($validatorInstance->hasInternalErrorMessagesInMessageBag());
        $this->assertTrue($validatorInstance->hasErrorOrInternalErrorMessagesInMessageBag());

        $this->assertSame(2, $validatorInstance->countInfoMessagesInMessageBag());
        $this->assertSame(1, $validatorInstance->countWarningMessagesInMessageBag());
        $this->assertSame(1, $validatorInstance->countErrorMessagesInMessageBag());
        $this->assertSame(1, $validatorInstance->countInternalErrorMessagesInMessageBag());
        $this->assertSame(2, $validatorInstance->countErrorOrInternalErrorMessagesInMessageBag());

        $this->assertCount(2, $validatorInstance->getInfoMessagesInMessageBag());
        $this->assertCount(1, $validatorInstance->getWarningMessagesInMessageBag());
        $this->assertCount(1, $validatorInstance->getErrorMessagesInMessageBag());
        $this->assertCount(1, $validatorInstance->getInternalErrorMessagesInMessageBag());
        $this->assertCount(2, $validatorInstance->getErrorOrInternalErrorMessagesInMessageBag());

        $validatorInstance->clearMessageBag();

        $this->assertFalse($validatorInstance->hasMessagesInMessageBag());
    }

    private function getSampleXmlPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '00_case_comfort_simple.xml'
        );
    }
}
