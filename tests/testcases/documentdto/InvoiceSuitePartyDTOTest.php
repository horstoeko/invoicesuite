<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePartyDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[]];
    }

    public static function dpCollections(): array
    {
        return [
            ['setName',              'addName',              'getName',              'newName'],
            ['setId',                'addId',                'getId',                'newId'],
            ['setGlobalId',          'addGlobalId',          'getGlobalId',          'newId'],
            ['setTaxRegistration',   'addTaxRegistration',   'getTaxRegistration',   'newId'],
            ['setAddress',           'addAddress',           'getAddress',           'newAddress'],
            ['setLegalOrganisation', 'addLegalOrganisation', 'getLegalOrganisation', 'newOrganisation'],
            ['setContact',           'addContact',           'getContact',           'newContact'],
            ['setCommunication',     'addCommunication',     'getCommunication',     'newCommunication'],
        ];
    }

    public static function dpCollectionIterators(): array
    {
        return [
            ['Name',              'Name',              ['ACME GmbH', 'Werk 1']],
            ['Id',                'Id',                [new InvoiceSuiteIdDTO(), new InvoiceSuiteIdDTO()]],
            ['GlobalId',          'GlobalId',          [new InvoiceSuiteIdDTO(), new InvoiceSuiteIdDTO()]],
            ['TaxRegistration',   'TaxRegistration',   [new InvoiceSuiteIdDTO(), new InvoiceSuiteIdDTO()]],
            ['Address',           'Address',           [new InvoiceSuiteAddressDTO(), new InvoiceSuiteAddressDTO()]],
            ['LegalOrganisation', 'LegalOrganisation', [new InvoiceSuiteOrganisationDTO(), new InvoiceSuiteOrganisationDTO()]],
            ['Contact',           'Contact',           [new InvoiceSuiteContactDTO(), new InvoiceSuiteContactDTO()]],
            ['Communication',     'Communication',     [new InvoiceSuiteCommunicationDTO(), new InvoiceSuiteCommunicationDTO()]],
        ];
    }

    #endregion

    #region Helpers

    private function newName(): string
    {
        return 'ACME';
    }

    private function newId(): InvoiceSuiteIdDTO
    {
        return new InvoiceSuiteIdDTO();
    }

    private function newAddress(): InvoiceSuiteAddressDTO
    {
        return new InvoiceSuiteAddressDTO();
    }

    private function newOrganisation(): InvoiceSuiteOrganisationDTO
    {
        return new InvoiceSuiteOrganisationDTO();
    }

    private function newContact(): InvoiceSuiteContactDTO
    {
        return new InvoiceSuiteContactDTO();
    }

    private function newCommunication(): InvoiceSuiteCommunicationDTO
    {
        return new InvoiceSuiteCommunicationDTO();
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuitePartyDTO();

        $this->assertSame([], $dto->getName());
        $this->assertSame([], $dto->getId());
        $this->assertSame([], $dto->getGlobalId());
        $this->assertSame([], $dto->getTaxRegistration());
        $this->assertSame([], $dto->getAddress());
        $this->assertSame([], $dto->getLegalOrganisation());
        $this->assertSame([], $dto->getContact());
        $this->assertSame([], $dto->getCommunication());
        $this->assertInstanceOf(InvoiceSuitePartyDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $unused = []): void
    {
        $n1 = 'ACME GmbH';
        $n2 = 'Werk 1';
        $id1 = $this->newId();
        $id2 = $this->newId();
        $gid1 = $this->newId();
        $gid2 = $this->newId();
        $tax1 = $this->newId();
        $tax2 = $this->newId();
        $addr1 = $this->newAddress();
        $addr2 = $this->newAddress();
        $org1 = $this->newOrganisation();
        $org2 = $this->newOrganisation();
        $con1 = $this->newContact();
        $con2 = $this->newContact();
        $com1 = $this->newCommunication();
        $com2 = $this->newCommunication();

        $dto = new InvoiceSuitePartyDTO(
            [$n1, $n2],
            [$id1, $id2],
            [$gid1, $gid2],
            [$tax1, $tax2],
            [$addr1, $addr2],
            [$org1, $org2],
            [$con1, $con2],
            [$com1, $com2]
        );

        $this->assertSame([$n1, $n2], $dto->getName());
        $this->assertSame([$id1, $id2], $dto->getId());
        $this->assertSame([$gid1, $gid2], $dto->getGlobalId());
        $this->assertSame([$tax1, $tax2], $dto->getTaxRegistration());
        $this->assertSame([$addr1, $addr2], $dto->getAddress());
        $this->assertSame([$org1, $org2], $dto->getLegalOrganisation());
        $this->assertSame([$con1, $con2], $dto->getContact());
        $this->assertSame([$com1, $com2], $dto->getCommunication());
    }

    /**
     * @dataProvider dpCollections
     */
    public function testCollectionSettersAndAdders(
        string $arraySetter,
        string $adder,
        string $arrayGetter,
        string $factoryName
    ): void {
        $dto = new InvoiceSuitePartyDTO();
        $a = $this->{$factoryName}();
        $b = $this->{$factoryName}();

        $dto->{$arraySetter}([$a]);
        $this->assertSame([$a], $dto->{$arrayGetter}());

        $dto->{$adder}($b);
        $this->assertSame([$a, $b], $dto->{$arrayGetter}());
    }

    /**
     * @dataProvider dpCollectionIterators
     */
    public function testCollectionIterators(string $base, string $singular, array $items): void
    {
        $dto = new InvoiceSuitePartyDTO();
        $set = 'set' . $base;
        $first = 'first' . $singular;
        $next = 'next' . $singular;
        $prev = 'previous' . $singular;
        $last = 'last' . $singular;
        $each = 'forEach' . $singular;

        $dto->$set($items);

        $seen = [];

        $dto->$first(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$next(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$prev(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$last(function ($v) use (&$seen) {
            $seen[] = $v;
        });

        $count = 0;

        $dto->$each(function ($v) use (&$count) {
            $count++;
        }, null, null);

        $this->assertSame($items[0], $seen[0]);
        $this->assertSame($items[1], $seen[1]);
        $this->assertSame($items[0], $seen[2]);
        $this->assertSame($items[1], $seen[3]);
        $this->assertSame(2, $count);
    }

    #endregion
}
