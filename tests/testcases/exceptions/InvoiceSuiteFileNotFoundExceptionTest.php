<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\exceptions;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteFileNotFoundExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionMessage('The file somefile.ext was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FILENOTFOUND);

        throw new InvoiceSuiteFileNotFoundException('somefile.ext');
    }
}
