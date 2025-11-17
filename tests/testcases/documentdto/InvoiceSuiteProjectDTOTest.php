<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteProjectDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteProjectDTO = new InvoiceSuiteProjectDTO();

        $this->assertNull($invoiceSuiteProjectDTO->getProjectNumber());
        $this->assertNull($invoiceSuiteProjectDTO->getProjectName());
    }

    public function testProjectNumberGetterAndSetter(): void
    {
        $invoiceSuiteProjectDTO = new InvoiceSuiteProjectDTO();
        $projectNumberValue = 'Example Value';
        $invoiceSuiteProjectDTO->setProjectNumber($projectNumberValue);

        $this->assertSame($projectNumberValue, $invoiceSuiteProjectDTO->getProjectNumber());
    }

    public function testProjectNameGetterAndSetter(): void
    {
        $invoiceSuiteProjectDTO = new InvoiceSuiteProjectDTO();
        $projectNameValue = 'Example Value';
        $invoiceSuiteProjectDTO->setProjectName($projectNameValue);

        $this->assertSame($projectNameValue, $invoiceSuiteProjectDTO->getProjectName());
    }
}
