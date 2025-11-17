<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\exceptions;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteInvalidArgumentExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('The argument is invalid');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::INVALID_ARGUMENT);

        throw new InvoiceSuiteInvalidArgumentException('The argument is invalid');
    }
}
