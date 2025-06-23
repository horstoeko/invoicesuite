<?php

namespace horstoeko\invoicesuite\tests\testcases;

use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;

class InvoiceSuiteArrayUtilsTest extends TestCase
{
    public function testIsEmpty(): void
    {
        $array = [];

        $this->assertTrue(InvoiceSuiteArrayUtils::isEmpty($array));

        $array = [0, 1, 2, 3, 4, 5];

        $this->assertFalse(InvoiceSuiteArrayUtils::isEmpty($array));
    }

    public function testHasFirst(): void
    {
        $array = [0, 1, 2, 3, 4, 5];

        $this->assertTrue(InvoiceSuiteArrayUtils::hasFirst($array));
        $this->assertSame(0, InvoiceSuiteArrayUtils::currentValue($array));
    }

    public function testHasNext(): void
    {
        $array = [0, 1, 2, 3, 4, 5];

        $this->assertTrue(InvoiceSuiteArrayUtils::hasNext($array));
        $this->assertSame(1, InvoiceSuiteArrayUtils::currentValue($array));
        $this->assertTrue(InvoiceSuiteArrayUtils::hasNext($array));
        $this->assertSame(2, InvoiceSuiteArrayUtils::currentValue($array));
        $this->assertTrue(InvoiceSuiteArrayUtils::hasNext($array));
        $this->assertSame(3, InvoiceSuiteArrayUtils::currentValue($array));
        $this->assertTrue(InvoiceSuiteArrayUtils::hasNext($array));
        $this->assertSame(4, InvoiceSuiteArrayUtils::currentValue($array));
        $this->assertTrue(InvoiceSuiteArrayUtils::hasNext($array));
        $this->assertSame(5, InvoiceSuiteArrayUtils::currentValue($array));
        $this->assertFalse(InvoiceSuiteArrayUtils::hasNext($array));
        $this->assertNull(InvoiceSuiteArrayUtils::currentValue($array));
    }

    public function testHasLast(): void
    {
        $array = [0, 1, 2, 3, 4, 5];

        $this->assertTrue(InvoiceSuiteArrayUtils::hasLast($array));
        $this->assertSame(5, InvoiceSuiteArrayUtils::currentValue($array));
        $this->assertFalse(InvoiceSuiteArrayUtils::hasNext($array));
    }

    public function testHasFirstEmptyArray(): void
    {
        $array = [];

        $this->assertFalse(InvoiceSuiteArrayUtils::hasFirst($array));
        $this->assertNull(InvoiceSuiteArrayUtils::currentValue($array));
    }

    public function testHasNextEmptyArray(): void
    {
        $array = [];

        $this->assertFalse(InvoiceSuiteArrayUtils::hasNext($array));
        $this->assertNull(InvoiceSuiteArrayUtils::currentValue($array));
    }

    public function testHasLastEmptyArray(): void
    {
        $array = [];

        $this->assertFalse(InvoiceSuiteArrayUtils::hasLast($array));
        $this->assertNull(InvoiceSuiteArrayUtils::currentValue($array));
    }
}
