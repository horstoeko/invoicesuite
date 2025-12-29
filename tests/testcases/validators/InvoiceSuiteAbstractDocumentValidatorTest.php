<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\validators;

use Closure;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;

final class InvoiceSuiteAbstractDocumentValidatorTest extends TestCase
{
    private static string $validatorClassname;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $factory = Closure::bind(
            static function (string $rawDocumentContent): InvoiceSuiteAbstractDocumentValidator {
                return new class($rawDocumentContent) extends InvoiceSuiteAbstractDocumentValidator {
                    public int $initializeCallCount = 0;
                    public int $doValidateCallCount = 0;

                    public function getRawDocumentContentForTest(): string
                    {
                        return $this->getRawDocumentContent();
                    }

                    protected function intializeAfterConstruct(): static
                    {
                        ++$this->initializeCallCount;

                        return $this;
                    }

                    protected function doValidate(): static
                    {
                        ++$this->doValidateCallCount;

                        return $this;
                    }
                };
            },
            null,
            InvoiceSuiteAbstractDocumentValidator::class
        );

        $prototypeInstance = $factory('<prototype/>');

        self::$validatorClassname = $prototypeInstance::class;
    }

    public function testCreateFromContentCreatesInstanceAndRunsInitializeAfterConstruct(): void
    {
        $validatorClassname = self::$validatorClassname;

        $validatorInstance = $validatorClassname::createFromContent('<xml/>');

        self::assertInstanceOf($validatorClassname, $validatorInstance);
        self::assertSame('<xml/>', $validatorInstance->getRawDocumentContentForTest());
        self::assertSame(1, $validatorInstance->initializeCallCount);
    }

    public function testCreateFromFileThrowsFileNotFoundException(): void
    {
        $validatorClassname = self::$validatorClassname;

        $nonExistingFilename = InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            bin2hex(random_bytes(16)).'.xml'
        );

        self::assertFileDoesNotExist($nonExistingFilename);

        $this->expectException(InvoiceSuiteFileNotFoundException::class);

        $validatorClassname::createFromFile($nonExistingFilename);
    }

    public function testCreateFromFileThrowsFileNotReadableException(): void
    {
        $validatorClassname = self::$validatorClassname;

        $temporaryDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets', 'invoicesuite_dir_'.bin2hex(random_bytes(16)));

        self::assertFalse(is_dir($temporaryDirectory));
        self::assertTrue(mkdir($temporaryDirectory));
        self::assertTrue(is_dir($temporaryDirectory));

        set_error_handler(static fn (): bool => true);

        try {
            $this->expectException(InvoiceSuiteFileNotReadableException::class);

            $validatorClassname::createFromFile($temporaryDirectory);
        } finally {
            restore_error_handler();
            @rmdir($temporaryDirectory);
        }
    }

    public function testCreateFromFileCreatesInstanceFromFileContent(): void
    {
        $validatorClassname = self::$validatorClassname;

        $temporaryFilename = InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            bin2hex(random_bytes(16)).'.xml'
        );

        self::assertNotFalse(file_put_contents($temporaryFilename, '<file/>'));
        self::assertFileExists($temporaryFilename);

        try {
            $validatorInstance = $validatorClassname::createFromFile($temporaryFilename);

            self::assertInstanceOf($validatorClassname, $validatorInstance);
            self::assertSame('<file/>', $validatorInstance->getRawDocumentContentForTest());
            self::assertSame(1, $validatorInstance->initializeCallCount);

            $returnedInstance = $validatorInstance->validate();

            self::assertSame($validatorInstance, $returnedInstance);
            self::assertSame(1, $validatorInstance->doValidateCallCount);
        } finally {
            @unlink($temporaryFilename);
        }
    }

    public function testCreateFromDocumentBuilderUsesBuilderContent(): void
    {
        $validatorClassname = self::$validatorClassname;

        $documentBuilderMock = $this->createMock(InvoiceSuiteDocumentBuilder::class);
        $documentBuilderMock->expects($this->once())
            ->method('getContent')
            ->willReturn('<builder/>');

        $validatorInstance = $validatorClassname::createFromDocumentBuilder($documentBuilderMock);

        self::assertInstanceOf($validatorClassname, $validatorInstance);
        self::assertSame('<builder/>', $validatorInstance->getRawDocumentContentForTest());

        $returnedInstance = $validatorInstance->validate();

        self::assertSame($validatorInstance, $returnedInstance);
        self::assertSame(1, $validatorInstance->doValidateCallCount);
    }

    public function testValidateThrowsWhenNoContentIsPresent(): void
    {
        $validatorClassname = self::$validatorClassname;

        $validatorInstance = $validatorClassname::createFromContent('');

        $this->expectException(InvoiceSuiteInvalidArgumentException::class);

        $validatorInstance->validate();
    }

    public function testValidateCallsDoValidateAndReturnsSameInstance(): void
    {
        $validatorClassname = self::$validatorClassname;

        $validatorInstance = $validatorClassname::createFromContent('<x/>');

        $returnedInstance = $validatorInstance->validate();

        self::assertSame($validatorInstance, $returnedInstance);
        self::assertSame(1, $validatorInstance->doValidateCallCount);
    }
}
