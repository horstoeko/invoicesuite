<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuitePartyDTOTest extends TestCase
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

    public function testCollectionNameIteratorsWithCallbacks(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $invoiceSuitePartyDTO->addName('Name 1');
        $invoiceSuitePartyDTO->addName('Name 2');

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstName($cb, $cbElse);
        $invoiceSuitePartyDTO->nextName($cb, $cbElse);
        $invoiceSuitePartyDTO->nextName($cb, $cbElse);

        $invoiceSuitePartyDTO->firstName($cb, $cbElse);
        $invoiceSuitePartyDTO->nextName($cb, $cbElse);
        $invoiceSuitePartyDTO->previousName($cb, $cbElse);
        $invoiceSuitePartyDTO->previousName($cb, $cbElse);

        $invoiceSuitePartyDTO->lastName($cb, $cbElse);

        $invoiceSuitePartyDTO->forEachName($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachName($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstName($cb, $cbElse);
        $invoiceSuitePartyDTO->nextName($cb, $cbElse);
        $invoiceSuitePartyDTO->nextName($cb, $cbElse);
        $invoiceSuitePartyDTO->previousName($cb, $cbElse);
        $invoiceSuitePartyDTO->previousName($cb, $cbElse);
        $invoiceSuitePartyDTO->lastName($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachName($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionIdIteratorsWithCallbacks(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $invoiceSuitePartyDTO->addId(new InvoiceSuiteIdDTO('ID1'));
        $invoiceSuitePartyDTO->addId(new InvoiceSuiteIdDTO('ID2'));

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextId($cb, $cbElse);

        $invoiceSuitePartyDTO->firstId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextId($cb, $cbElse);
        $invoiceSuitePartyDTO->previousId($cb, $cbElse);
        $invoiceSuitePartyDTO->previousId($cb, $cbElse);

        $invoiceSuitePartyDTO->lastId($cb, $cbElse);

        $invoiceSuitePartyDTO->forEachId($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachId($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextId($cb, $cbElse);
        $invoiceSuitePartyDTO->previousId($cb, $cbElse);
        $invoiceSuitePartyDTO->previousId($cb, $cbElse);
        $invoiceSuitePartyDTO->lastId($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachId($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionGlobalIdIteratorsWithCallbacks(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $invoiceSuitePartyDTO->addGlobalId(new InvoiceSuiteIdDTO('ID1'));
        $invoiceSuitePartyDTO->addGlobalId(new InvoiceSuiteIdDTO('ID2'));

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextGlobalId($cb, $cbElse);

        $invoiceSuitePartyDTO->firstGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->previousGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->previousGlobalId($cb, $cbElse);

        $invoiceSuitePartyDTO->lastGlobalId($cb, $cbElse);

        $invoiceSuitePartyDTO->forEachGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachGlobalId($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->nextGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->previousGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->previousGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->lastGlobalId($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachGlobalId($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionTaxRegistrationIteratorsWithCallbacks(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $invoiceSuitePartyDTO->addTaxRegistration(new InvoiceSuiteIdDTO('ID1', 'VA'));
        $invoiceSuitePartyDTO->addTaxRegistration(new InvoiceSuiteIdDTO('ID2', 'FC'));

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->nextTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->nextTaxRegistration($cb, $cbElse);

        $invoiceSuitePartyDTO->firstTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->nextTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->previousTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->previousTaxRegistration($cb, $cbElse);

        $invoiceSuitePartyDTO->lastTaxRegistration($cb, $cbElse);

        $invoiceSuitePartyDTO->forEachTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachTaxRegistration($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->nextTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->nextTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->previousTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->previousTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->lastTaxRegistration($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachTaxRegistration($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionAddressIteratorsWithCallbacks(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $invoiceSuitePartyDTO->addAddress(new InvoiceSuiteAddressDTO());
        $invoiceSuitePartyDTO->addAddress(new InvoiceSuiteAddressDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->nextAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->nextAddress($cb, $cbElse);

        $invoiceSuitePartyDTO->firstAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->nextAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->previousAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->previousAddress($cb, $cbElse);

        $invoiceSuitePartyDTO->lastAddress($cb, $cbElse);

        $invoiceSuitePartyDTO->forEachAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachAddress($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->nextAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->nextAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->previousAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->previousAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->lastAddress($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachAddress($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionLegalOrganisationIteratorsWithCallbacks(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $invoiceSuitePartyDTO->addLegalOrganisation(new InvoiceSuiteOrganisationDTO('ID1', null, 'Name 1'));
        $invoiceSuitePartyDTO->addLegalOrganisation(new InvoiceSuiteOrganisationDTO('ID2', null, 'Name 1'));

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->nextLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->nextLegalOrganisation($cb, $cbElse);

        $invoiceSuitePartyDTO->firstLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->nextLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->previousLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->previousLegalOrganisation($cb, $cbElse);

        $invoiceSuitePartyDTO->lastLegalOrganisation($cb, $cbElse);

        $invoiceSuitePartyDTO->forEachLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachLegalOrganisation($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->nextLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->nextLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->previousLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->previousLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->lastLegalOrganisation($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachLegalOrganisation($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionContactIteratorsWithCallbacks(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $invoiceSuitePartyDTO->addContact(new InvoiceSuiteContactDTO());
        $invoiceSuitePartyDTO->addContact(new InvoiceSuiteContactDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstContact($cb, $cbElse);
        $invoiceSuitePartyDTO->nextContact($cb, $cbElse);
        $invoiceSuitePartyDTO->nextContact($cb, $cbElse);

        $invoiceSuitePartyDTO->firstContact($cb, $cbElse);
        $invoiceSuitePartyDTO->nextContact($cb, $cbElse);
        $invoiceSuitePartyDTO->previousContact($cb, $cbElse);
        $invoiceSuitePartyDTO->previousContact($cb, $cbElse);

        $invoiceSuitePartyDTO->lastContact($cb, $cbElse);

        $invoiceSuitePartyDTO->forEachContact($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachContact($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstContact($cb, $cbElse);
        $invoiceSuitePartyDTO->nextContact($cb, $cbElse);
        $invoiceSuitePartyDTO->nextContact($cb, $cbElse);
        $invoiceSuitePartyDTO->previousContact($cb, $cbElse);
        $invoiceSuitePartyDTO->previousContact($cb, $cbElse);
        $invoiceSuitePartyDTO->lastContact($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachContact($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionCommunicationIteratorsWithCallbacks(): void
    {
        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();
        $invoiceSuitePartyDTO->addCommunication(new InvoiceSuiteCommunicationDTO());
        $invoiceSuitePartyDTO->addCommunication(new InvoiceSuiteCommunicationDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->nextCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->nextCommunication($cb, $cbElse);

        $invoiceSuitePartyDTO->firstCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->nextCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->previousCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->previousCommunication($cb, $cbElse);

        $invoiceSuitePartyDTO->lastCommunication($cb, $cbElse);

        $invoiceSuitePartyDTO->forEachCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachCommunication($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePartyDTO = new InvoiceSuitePartyDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePartyDTO->firstCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->nextCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->nextCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->previousCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->previousCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->lastCommunication($cb, $cbElse);
        $invoiceSuitePartyDTO->forEachCommunication($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }
}
