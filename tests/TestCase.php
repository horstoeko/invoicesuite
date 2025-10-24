<?php

namespace horstoeko\invoicesuite\tests;

use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;
use PHPUnit\Framework\TestCase as PhpUnitTestCase;

abstract class TestCase extends PhpUnitTestCase
{
    /**
     * Registered files that should be deleted in test case teardown
     *
     * @var array<string>
     */
    protected static $registeredTestCaseFiles = [];

    /**
     * Registered files that should be deleted in test teardown
     *
     * @var array<string>
     */
    protected $registeredTestFiles = [];

    /**
     * @inheritDoc
     */
    public static function setUpBeforeClass(): void
    {
        self::$registeredTestCaseFiles = [];
    }

    /**
     * @inheritDoc
     */
    public static function tearDownAfterClass(): void
    {
        foreach (self::$registeredTestCaseFiles as $registeredTestCaseFile) {
            if (file_exists($registeredTestCaseFile) && is_writeable($registeredTestCaseFile)) {
                @unlink($registeredTestCaseFile);
            }
        }

        self::$registeredTestCaseFiles = [];
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->registeredTestFiles = [];
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        foreach ($this->registeredTestFiles as $registeredTestFile) {
            if (file_exists($registeredTestFile) && is_writeable($registeredTestFile)) {
                @unlink($registeredTestFile);
            }
        }

        $this->registeredTestFiles = [];
    }

    /**
     * Register a file to delete in testcase teardown
     *
     * @param  string $filename
     * @return void
     */
    public function registerFileForTestCaseTeardown(string $filename): void
    {
        self::$registeredTestCaseFiles[] = $filename;
    }

    /**
     * Register a file to delete in testmethod teardown
     *
     * @param  string $filename
     * @return void
     */
    public function registerFileForTestMethodTeardown(string $filename): void
    {
        $this->registeredTestFiles[] = $filename;
    }

    /**
     * Expect notice on php version smaller than 8
     * Expect warning on php version greater or equal than 8
     *
     * @return void
     */
    public function expectNoticeOrWarning(): void
    {
        if (version_compare(phpversion(), '8', '>=')) {
            $this->expectWarning();
        } else {
            $this->expectNotice();
        }
    }

    /**
     * Access to private properties
     *
     * @param  string $className
     * @param  string $propertyName
     * @return ReflectionProperty
     */
    public function getPrivatePropertyFromClassname(string $className, string $propertyName): ReflectionProperty
    {
        $reflector = new ReflectionClass($className);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);
        return $property;
    }

    /**
     * Access to private properties
     *
     * @param  object $object
     * @param  string $propertyName
     * @return ReflectionProperty
     */
    public function getPrivatePropertyFromObject(object $object, string $propertyName): ReflectionProperty
    {
        $reflector = new ReflectionClass($object);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);
        return $property;
    }

    /**
     * Access to private method
     *
     * @param  string $className
     * @param  string $methodName
     * @return ReflectionMethod
     */
    public function getPrivateMethodFromClassname(string $className, string $methodName): ReflectionMethod
    {
        $reflector = new ReflectionClass($className);
        $method = $reflector->getMethod($methodName);
        $method->setAccessible(true);
        return $method;
    }

    /**
     * Access to private method
     *
     * @param  object $object
     * @param  string $methodName
     * @return ReflectionMethod
     */
    public function getPrivateMethodFromObject(object $object, string $methodName): ReflectionMethod
    {
        $reflector = new ReflectionClass($object);
        $method = $reflector->getMethod($methodName);
        $method->setAccessible(true);
        return $method;
    }

    /**
     * Test for Notices/Warnings
     *
     * @param \Closure $run
     * @param string $expectMessageRegEx
     * @return void
     */
    public function expectNoticeOrWarningExt(\Closure $run, string $expectMessageRegEx = ""): void
    {
        $mask = E_WARNING | E_NOTICE;
        $prevLevel = error_reporting();

        error_reporting($prevLevel | $mask);

        set_error_handler(
            static function (int $errno, string $errstr, ?string $file = null, ?int $line = null): bool {
                throw new \ErrorException($errstr, $errno, $errno, $file ?? '', $line ?? 0);
            },
            $mask
        );

        try {
            $this->expectException(\ErrorException::class);
            if ($expectMessageRegEx) {
                $this->expectExceptionMessageMatches($expectMessageRegEx);
            }
            $run();
        } finally {
            restore_error_handler();
            error_reporting($prevLevel);
        }
    }
}
