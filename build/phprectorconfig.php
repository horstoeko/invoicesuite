<?php

declare(strict_types=1);

use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\CodeQuality\Rector\Class_\ConvertStaticToSelfRector;
use Rector\CodeQuality\Rector\If_\SimplifyIfReturnBoolRector;
use Rector\CodeQuality\Rector\New_\NewStaticToNewSelfRector;
use Rector\CodingStyle\Rector\FuncCall\CallUserFuncArrayToVariadicRector;
use Rector\CodingStyle\Rector\FuncCall\FunctionFirstClassCallableRector;
use Rector\CodingStyle\Rector\String_\UseClassKeywordForClassNameResolutionRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveDuplicatedReturnSelfDocblockRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveMixedDocblockOverruledByNativeTypeRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessUnionReturnDocblockRector;
use Rector\DeadCode\Rector\Property\RemoveUselessVarTagRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/../src',
        __DIR__ . '/../bin',
        __DIR__ . '/../examples',
        __DIR__ . '/../make',
        __DIR__ . '/../tests',
    ])
    ->withSkip([
        __DIR__ . '/../build',
        __DIR__ . '/../vendor',
        __DIR__ . '/../.git',
        __DIR__ . '/rector',
        __DIR__ . '/../src/pdfs/zffx/InvoiceSuiteZffxPdfWriter.php',
        __DIR__ . '/../src/cache',

        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class,
        RemoveUselessVarTagRector::class,
        ConvertStaticToSelfRector::class,
        NewStaticToNewSelfRector::class,
        ClassPropertyAssignToConstructorPromotionRector::class,
        SimplifyIfReturnBoolRector::class,
        UseClassKeywordForClassNameResolutionRector::class,
        FunctionFirstClassCallableRector::class,
        CallUserFuncArrayToVariadicRector::class,
        RemoveDuplicatedReturnSelfDocblockRector::class,
        RemoveUselessUnionReturnDocblockRector::class,
        RemoveMixedDocblockOverruledByNativeTypeRector::class
    ])
    ->withPhpVersion(PhpVersion::PHP_82)
    ->withPhpSets(php82: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        instanceOf: true,
        phpunitCodeQuality: true,
    )
    ->withComposerBased(phpunit: true)
    ->withRules([
        DeclareStrictTypesRector::class,
    ])
    ->withImportNames(
        importShortClasses: true,
        removeUnusedImports: true,
    )
    ->withCache(
        cacheClass: FileCacheStorage::class,
        cacheDirectory: __DIR__ . '/rector',
    )
    ->withParallel(
        timeoutSeconds: 60000,
        maxNumberOfProcess: 2,
        jobSize: 10,
    )
    ->withTypeCoverageLevel(0)
    ->withTypeCoverageDocblockLevel(0);
