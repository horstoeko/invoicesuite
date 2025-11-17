<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteAddressDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();

        $this->assertNull($invoiceSuiteAddressDTO->getAddressLine1());
        $this->assertNull($invoiceSuiteAddressDTO->getAddressLine2());
        $this->assertNull($invoiceSuiteAddressDTO->getAddressLine3());
        $this->assertNull($invoiceSuiteAddressDTO->getPostcode());
        $this->assertNull($invoiceSuiteAddressDTO->getCity());
        $this->assertNull($invoiceSuiteAddressDTO->getCountry());
        $this->assertNull($invoiceSuiteAddressDTO->getSubDivision());

        $this->assertFalse($invoiceSuiteAddressDTO->hasAddressLine1());
        $this->assertFalse($invoiceSuiteAddressDTO->hasAddressLine2());
        $this->assertFalse($invoiceSuiteAddressDTO->hasAddressLine3());
        $this->assertFalse($invoiceSuiteAddressDTO->hasPostcode());
        $this->assertFalse($invoiceSuiteAddressDTO->hasCity());
        $this->assertFalse($invoiceSuiteAddressDTO->hasCountry());
        $this->assertFalse($invoiceSuiteAddressDTO->hasSubDivision());
    }

    public function testAddressLine1GetterAndSetter(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $addressLine1Value = 'Example Value';
        $invoiceSuiteAddressDTO->setAddressLine1($addressLine1Value);

        $this->assertSame($addressLine1Value, $invoiceSuiteAddressDTO->getAddressLine1());
    }

    public function testHasAddressLine1(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $this->assertFalse($invoiceSuiteAddressDTO->hasAddressLine1());

        $invoiceSuiteAddressDTO->setAddressLine1('');
        $this->assertFalse($invoiceSuiteAddressDTO->hasAddressLine1());

        $invoiceSuiteAddressDTO->setAddressLine1('Non-empty');
        $this->assertTrue($invoiceSuiteAddressDTO->hasAddressLine1());
    }

    public function testAddressLine2GetterAndSetter(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $addressLine2Value = 'Example Value';
        $invoiceSuiteAddressDTO->setAddressLine2($addressLine2Value);

        $this->assertSame($addressLine2Value, $invoiceSuiteAddressDTO->getAddressLine2());
    }

    public function testHasAddressLine2(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $this->assertFalse($invoiceSuiteAddressDTO->hasAddressLine2());

        $invoiceSuiteAddressDTO->setAddressLine2('');
        $this->assertFalse($invoiceSuiteAddressDTO->hasAddressLine2());

        $invoiceSuiteAddressDTO->setAddressLine2('Non-empty');
        $this->assertTrue($invoiceSuiteAddressDTO->hasAddressLine2());
    }

    public function testAddressLine3GetterAndSetter(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $addressLine3Value = 'Example Value';
        $invoiceSuiteAddressDTO->setAddressLine3($addressLine3Value);

        $this->assertSame($addressLine3Value, $invoiceSuiteAddressDTO->getAddressLine3());
    }

    public function testHasAddressLine3(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $this->assertFalse($invoiceSuiteAddressDTO->hasAddressLine3());

        $invoiceSuiteAddressDTO->setAddressLine3('');
        $this->assertFalse($invoiceSuiteAddressDTO->hasAddressLine3());

        $invoiceSuiteAddressDTO->setAddressLine3('Non-empty');
        $this->assertTrue($invoiceSuiteAddressDTO->hasAddressLine3());
    }

    public function testPostcodeGetterAndSetter(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $postcodeValue = 'Example Value';
        $invoiceSuiteAddressDTO->setPostcode($postcodeValue);

        $this->assertSame($postcodeValue, $invoiceSuiteAddressDTO->getPostcode());
    }

    public function testHasPostcode(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $this->assertFalse($invoiceSuiteAddressDTO->hasPostcode());

        $invoiceSuiteAddressDTO->setPostcode('');
        $this->assertFalse($invoiceSuiteAddressDTO->hasPostcode());

        $invoiceSuiteAddressDTO->setPostcode('Non-empty');
        $this->assertTrue($invoiceSuiteAddressDTO->hasPostcode());
    }

    public function testCityGetterAndSetter(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $cityValue = 'Example Value';
        $invoiceSuiteAddressDTO->setCity($cityValue);

        $this->assertSame($cityValue, $invoiceSuiteAddressDTO->getCity());
    }

    public function testHasCity(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $this->assertFalse($invoiceSuiteAddressDTO->hasCity());

        $invoiceSuiteAddressDTO->setCity('');
        $this->assertFalse($invoiceSuiteAddressDTO->hasCity());

        $invoiceSuiteAddressDTO->setCity('Non-empty');
        $this->assertTrue($invoiceSuiteAddressDTO->hasCity());
    }

    public function testCountryGetterAndSetter(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $countryValue = 'Example Value';
        $invoiceSuiteAddressDTO->setCountry($countryValue);

        $this->assertSame($countryValue, $invoiceSuiteAddressDTO->getCountry());
    }

    public function testHasCountry(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $this->assertFalse($invoiceSuiteAddressDTO->hasCountry());

        $invoiceSuiteAddressDTO->setCountry('');
        $this->assertFalse($invoiceSuiteAddressDTO->hasCountry());

        $invoiceSuiteAddressDTO->setCountry('Non-empty');
        $this->assertTrue($invoiceSuiteAddressDTO->hasCountry());
    }

    public function testSubDivisionGetterAndSetter(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $subDivisionValue = 'Example Value';
        $invoiceSuiteAddressDTO->setSubDivision($subDivisionValue);

        $this->assertSame($subDivisionValue, $invoiceSuiteAddressDTO->getSubDivision());
    }

    public function testHasSubDivision(): void
    {
        $invoiceSuiteAddressDTO = new InvoiceSuiteAddressDTO();
        $this->assertFalse($invoiceSuiteAddressDTO->hasSubDivision());

        $invoiceSuiteAddressDTO->setSubDivision('');
        $this->assertFalse($invoiceSuiteAddressDTO->hasSubDivision());

        $invoiceSuiteAddressDTO->setSubDivision('Non-empty');
        $this->assertTrue($invoiceSuiteAddressDTO->hasSubDivision());
    }
}
