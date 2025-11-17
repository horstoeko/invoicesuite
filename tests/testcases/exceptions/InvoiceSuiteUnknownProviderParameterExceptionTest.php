<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\exceptions;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownProviderParameterException;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteUnknownProviderParameterExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvoiceSuiteUnknownProviderParameterException::class);
        $this->expectExceptionMessage('Unknown provider parameter someparameter');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::UNKNOWN_PROVIDER_PARAMETER);

        throw new InvoiceSuiteUnknownProviderParameterException('someparameter');
    }
}
