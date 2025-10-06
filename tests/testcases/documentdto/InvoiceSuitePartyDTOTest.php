<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePartyDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $this->assertSame([], $invoiceSuitePartyDTO->getNames());
        $this->assertSame([], $invoiceSuitePartyDTO->getIds());
        $this->assertSame([], $invoiceSuitePartyDTO->getGlobalIds());
        $this->assertSame([], $invoiceSuitePartyDTO->getTaxRegistrations());
        $this->assertSame([], $invoiceSuitePartyDTO->getAddresses());
        $this->assertSame([], $invoiceSuitePartyDTO->getLegalOrganisations());
        $this->assertSame([], $invoiceSuitePartyDTO->getContacts());
        $this->assertSame([], $invoiceSuitePartyDTO->getCommunications());
    }

    public function testNameGetterAndSetter(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $nameValue = [];
        $invoiceSuitePartyDTO->setNames($nameValue);
        $this->assertSame($nameValue, $invoiceSuitePartyDTO->getNames());
    }

    public function testIdGetterAndSetter(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $idValue = [];
        $invoiceSuitePartyDTO->setIds($idValue);
        $this->assertSame($idValue, $invoiceSuitePartyDTO->getIds());
    }

    public function testGlobalIdGetterAndSetter(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $globalIdValue = [];
        $invoiceSuitePartyDTO->setGlobalIds($globalIdValue);
        $this->assertSame($globalIdValue, $invoiceSuitePartyDTO->getGlobalIds());
    }

    public function testTaxRegistrationGetterAndSetter(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $taxRegistrationValue = [];
        $invoiceSuitePartyDTO->setTaxRegistrations($taxRegistrationValue);
        $this->assertSame($taxRegistrationValue, $invoiceSuitePartyDTO->getTaxRegistrations());
    }

    public function testAddressGetterAndSetter(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $addressValue = [];
        $invoiceSuitePartyDTO->setAddresses($addressValue);
        $this->assertSame($addressValue, $invoiceSuitePartyDTO->getAddresses());
    }

    public function testLegalOrganisationGetterAndSetter(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $legalOrganisationValue = [];
        $invoiceSuitePartyDTO->setLegalOrganisations($legalOrganisationValue);
        $this->assertSame($legalOrganisationValue, $invoiceSuitePartyDTO->getLegalOrganisations());
    }

    public function testContactGetterAndSetter(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $contactValue = [];
        $invoiceSuitePartyDTO->setContacts($contactValue);
        $this->assertSame($contactValue, $invoiceSuitePartyDTO->getContacts());
    }

    public function testCommunicationGetterAndSetter(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $communicationValue = [];
        $invoiceSuitePartyDTO->setCommunications($communicationValue);
        $this->assertSame($communicationValue, $invoiceSuitePartyDTO->getCommunications());
    }
}
