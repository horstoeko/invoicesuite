<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteNoteDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteNoteDTO = new InvoiceSuiteNoteDTO();

        $this->assertNull($invoiceSuiteNoteDTO->getContent());
        $this->assertNull($invoiceSuiteNoteDTO->getContentCode());
        $this->assertNull($invoiceSuiteNoteDTO->getSubjectCode());
    }

    public function testContentGetterAndSetter(): void
    {
        $invoiceSuiteNoteDTO = new InvoiceSuiteNoteDTO();
        $contentValue = 'Example Value';
        $invoiceSuiteNoteDTO->setContent($contentValue);

        $this->assertSame($contentValue, $invoiceSuiteNoteDTO->getContent());
    }

    public function testContentCodeGetterAndSetter(): void
    {
        $invoiceSuiteNoteDTO = new InvoiceSuiteNoteDTO();
        $contentCodeValue = 'Example Value';
        $invoiceSuiteNoteDTO->setContentCode($contentCodeValue);

        $this->assertSame($contentCodeValue, $invoiceSuiteNoteDTO->getContentCode());
    }

    public function testSubjectCodeGetterAndSetter(): void
    {
        $invoiceSuiteNoteDTO = new InvoiceSuiteNoteDTO();
        $subjectCodeValue = 'Example Value';
        $invoiceSuiteNoteDTO->setSubjectCode($subjectCodeValue);

        $this->assertSame($subjectCodeValue, $invoiceSuiteNoteDTO->getSubjectCode());
    }
}
