<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\exceptions;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteFormatProviderNotFoundExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id someprovider was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);

        throw new InvoiceSuiteFormatProviderNotFoundException('someprovider');
    }
}
