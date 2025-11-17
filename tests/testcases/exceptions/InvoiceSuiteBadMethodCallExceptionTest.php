<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\exceptions;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteBadMethodCallException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteBadMethodCallExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvoiceSuiteBadMethodCallException::class);
        $this->expectExceptionMessage('Call to undefined method '.InvoiceSuiteBadMethodCallException::class.'::myMethod()');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::BAD_METHOD_CALL);

        throw new InvoiceSuiteBadMethodCallException('myMethod');
    }
}
