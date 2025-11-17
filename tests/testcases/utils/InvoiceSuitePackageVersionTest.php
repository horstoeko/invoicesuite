<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\utils;

use horstoeko\invoicesuite\InvoiceSuitePackageVersion;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuitePackageVersionTest extends TestCase
{
    public function testGetInstalledInvoiceSuiteVersion(): void
    {
        $this->assertSame('dev-master', InvoiceSuitePackageVersion::getInstalledVersion());
    }

    public function testGetInstalledVersionOfUnknownPackage(): void
    {
        $this->assertSame('1.0.x', InvoiceSuitePackageVersion::getInstalledVersionByName('unknown/package'));
    }
}
