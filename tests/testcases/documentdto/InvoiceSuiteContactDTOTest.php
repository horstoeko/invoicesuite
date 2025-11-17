<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteContactDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();

        $this->assertNull($invoiceSuiteContactDTO->getPersonName());
        $this->assertNull($invoiceSuiteContactDTO->getDepartmentName());
        $this->assertNull($invoiceSuiteContactDTO->getPhoneNumber());
        $this->assertNull($invoiceSuiteContactDTO->getFaxNumber());
        $this->assertNull($invoiceSuiteContactDTO->getEmailAddress());

        $this->assertFalse($invoiceSuiteContactDTO->hasPersonName());
        $this->assertFalse($invoiceSuiteContactDTO->hasDepartmentName());
        $this->assertFalse($invoiceSuiteContactDTO->hasPhoneNumber());
        $this->assertFalse($invoiceSuiteContactDTO->hasFaxNumber());
        $this->assertFalse($invoiceSuiteContactDTO->hasEmailAddress());
    }

    public function testPersonNameGetterAndSetter(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $personNameValue = 'Example Value';
        $invoiceSuiteContactDTO->setPersonName($personNameValue);

        $this->assertSame($personNameValue, $invoiceSuiteContactDTO->getPersonName());
    }

    public function testHasPersonName(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $this->assertFalse($invoiceSuiteContactDTO->hasPersonName());

        $invoiceSuiteContactDTO->setPersonName('');
        $this->assertFalse($invoiceSuiteContactDTO->hasPersonName());

        $invoiceSuiteContactDTO->setPersonName('Non-empty');
        $this->assertTrue($invoiceSuiteContactDTO->hasPersonName());
    }

    public function testDepartmentNameGetterAndSetter(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $departmentNameValue = 'Example Value';
        $invoiceSuiteContactDTO->setDepartmentName($departmentNameValue);

        $this->assertSame($departmentNameValue, $invoiceSuiteContactDTO->getDepartmentName());
    }

    public function testHasDepartmentName(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $this->assertFalse($invoiceSuiteContactDTO->hasDepartmentName());

        $invoiceSuiteContactDTO->setDepartmentName('');
        $this->assertFalse($invoiceSuiteContactDTO->hasDepartmentName());

        $invoiceSuiteContactDTO->setDepartmentName('Non-empty');
        $this->assertTrue($invoiceSuiteContactDTO->hasDepartmentName());
    }

    public function testPhoneNumberGetterAndSetter(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $phoneNumberValue = 'Example Value';
        $invoiceSuiteContactDTO->setPhoneNumber($phoneNumberValue);

        $this->assertSame($phoneNumberValue, $invoiceSuiteContactDTO->getPhoneNumber());
    }

    public function testHasPhoneNumber(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $this->assertFalse($invoiceSuiteContactDTO->hasPhoneNumber());

        $invoiceSuiteContactDTO->setPhoneNumber('');
        $this->assertFalse($invoiceSuiteContactDTO->hasPhoneNumber());

        $invoiceSuiteContactDTO->setPhoneNumber('Non-empty');
        $this->assertTrue($invoiceSuiteContactDTO->hasPhoneNumber());
    }

    public function testFaxNumberGetterAndSetter(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $faxNumberValue = 'Example Value';
        $invoiceSuiteContactDTO->setFaxNumber($faxNumberValue);

        $this->assertSame($faxNumberValue, $invoiceSuiteContactDTO->getFaxNumber());
    }

    public function testHasFaxNumber(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $this->assertFalse($invoiceSuiteContactDTO->hasFaxNumber());

        $invoiceSuiteContactDTO->setFaxNumber('');
        $this->assertFalse($invoiceSuiteContactDTO->hasFaxNumber());

        $invoiceSuiteContactDTO->setFaxNumber('Non-empty');
        $this->assertTrue($invoiceSuiteContactDTO->hasFaxNumber());
    }

    public function testEmailAddressGetterAndSetter(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $emailAddressValue = 'Example Value';
        $invoiceSuiteContactDTO->setEmailAddress($emailAddressValue);

        $this->assertSame($emailAddressValue, $invoiceSuiteContactDTO->getEmailAddress());
    }

    public function testHasEmailAddress(): void
    {
        $invoiceSuiteContactDTO = new InvoiceSuiteContactDTO();
        $this->assertFalse($invoiceSuiteContactDTO->hasEmailAddress());

        $invoiceSuiteContactDTO->setEmailAddress('');
        $this->assertFalse($invoiceSuiteContactDTO->hasEmailAddress());

        $invoiceSuiteContactDTO->setEmailAddress('Non-empty');
        $this->assertTrue($invoiceSuiteContactDTO->hasEmailAddress());
    }
}
