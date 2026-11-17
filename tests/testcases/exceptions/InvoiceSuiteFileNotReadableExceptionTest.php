<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\exceptions;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteFileNotReadableExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvoiceSuiteFileNotReadableException::class);
        $this->expectExceptionMessage('The file somefile.ext is not readable');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FILENOTREADABLE);

        throw new InvoiceSuiteFileNotReadableException('somefile.ext');
    }
}
