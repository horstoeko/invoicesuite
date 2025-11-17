<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteProductClassificationDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteProductClassificationDTO = new InvoiceSuiteProductClassificationDTO();

        $this->assertNull($invoiceSuiteProductClassificationDTO->getCode());
        $this->assertNull($invoiceSuiteProductClassificationDTO->getName());
        $this->assertNull($invoiceSuiteProductClassificationDTO->getListId());
        $this->assertNull($invoiceSuiteProductClassificationDTO->getListVersionId());
    }

    public function testCodeGetterAndSetter(): void
    {
        $invoiceSuiteProductClassificationDTO = new InvoiceSuiteProductClassificationDTO();
        $codeValue = 'Example Value';
        $invoiceSuiteProductClassificationDTO->setCode($codeValue);

        $this->assertSame($codeValue, $invoiceSuiteProductClassificationDTO->getCode());
    }

    public function testNameGetterAndSetter(): void
    {
        $invoiceSuiteProductClassificationDTO = new InvoiceSuiteProductClassificationDTO();
        $nameValue = 'Example Value';
        $invoiceSuiteProductClassificationDTO->setName($nameValue);

        $this->assertSame($nameValue, $invoiceSuiteProductClassificationDTO->getName());
    }

    public function testListIdGetterAndSetter(): void
    {
        $invoiceSuiteProductClassificationDTO = new InvoiceSuiteProductClassificationDTO();
        $listIdValue = 'Example Value';
        $invoiceSuiteProductClassificationDTO->setListId($listIdValue);

        $this->assertSame($listIdValue, $invoiceSuiteProductClassificationDTO->getListId());
    }

    public function testListVersionIdGetterAndSetter(): void
    {
        $invoiceSuiteProductClassificationDTO = new InvoiceSuiteProductClassificationDTO();
        $listVersionIdValue = 'Example Value';
        $invoiceSuiteProductClassificationDTO->setListVersionId($listVersionIdValue);

        $this->assertSame($listVersionIdValue, $invoiceSuiteProductClassificationDTO->getListVersionId());
    }
}
