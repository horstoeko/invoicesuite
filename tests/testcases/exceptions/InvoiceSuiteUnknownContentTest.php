<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\exceptions;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteUnknownContentTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvoiceSuiteUnknownContentException::class);
        $this->expectExceptionMessage('Unknown content');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::UNKNOWN_CONTENT);

        throw new InvoiceSuiteUnknownContentException();
    }
}
