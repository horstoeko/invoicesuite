<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\validators;

use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteKositDocumentValidator;

final class InvoiceSuiteKositDocumentValidatorTest extends TestCase
{
    public function testValidateTreatsTechnicalRequirementFailureAsInternalError(): void
    {
        $validator = InvoiceSuiteKositDocumentValidator::createFromFile(
            InvoiceSuitePathUtils::combinePathWithFile(
                InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
                '00_case_comfort_simple.xml'
            )
        );

        $validator->enableRemoteMode();

        $validationResult = $validator->validate();

        $this->assertSame($validator, $validationResult);
        $this->assertFalse($validator->hasErrorMessagesInMessageBag());
        $this->assertSame(1, $validator->countInternalErrorMessagesInMessageBag());
    }
}
