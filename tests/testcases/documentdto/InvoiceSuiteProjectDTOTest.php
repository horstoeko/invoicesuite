<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteProjectDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'projectNumber' => 'PRJ-2024-001',
            'projectName'   => 'Bridge Build',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setProjectNumber', 'getProjectNumber', 'PRJ-0001'],
            ['setProjectName',   'getProjectName',   'New Stadium'],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteProjectDTO();

        $this->assertNull($dto->getProjectNumber());
        $this->assertNull($dto->getProjectName());
        $this->assertInstanceOf(InvoiceSuiteProjectDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuiteProjectDTO(
            $v['projectNumber'],
            $v['projectName'],
        );

        $this->assertSame($v['projectNumber'], $dto->getProjectNumber());
        $this->assertSame($v['projectName'], $dto->getProjectName());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteProjectDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    #endregion
}
