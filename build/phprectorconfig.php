<?php

declare(strict_types=1);

use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentBaseBuilder;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentBaseReader;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use Rector\CodeQuality\Rector\Class_\ConvertStaticToSelfRector;
use Rector\CodeQuality\Rector\New_\NewStaticToNewSelfRector;
use Rector\CodingStyle\Rector\FuncCall\CallUserFuncArrayToVariadicRector;
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
        __DIR__ . '/../src/pdfs/zffx/InvoiceSuiteZffxPdfWriter.php',
        __DIR__ . '/../src/cache',

        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class,
        RemoveUselessVarTagRector::class,
        ConvertStaticToSelfRector::class,
        NewStaticToNewSelfRector::class,
        ClassPropertyAssignToConstructorPromotionRector::class,
        CallUserFuncArrayToVariadicRector::class => [
            __DIR__ . '/../src/visualizers/renderers/InvoiceSuiteVisualizerLaravelRenderer.php',
        ],
        RemoveDuplicatedReturnSelfDocblockRector::class,
        RemoveUselessUnionReturnDocblockRector::class,
        RemoveMixedDocblockOverruledByNativeTypeRector::class,
    ])
    ->withPhpVersion(PhpVersion::PHP_82)
    ->withPhpSets(php82: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        phpunitCodeQuality: true,
    )
    ->withComposerBased(
        phpunit: true,
        symfony: true,
    )
    ->withRules([
        DeclareStrictTypesRector::class,
    ])
    ->withImportNames(
        importShortClasses: true,
        removeUnusedImports: true,
    )
    ->withTypeGuardedClasses([
        InvoiceSuiteAbstractDocumentBaseBuilder::class,
        InvoiceSuiteAbstractDocumentBaseReader::class,
        InvoiceSuiteAbstractDocumentFormatProvider::class,
    ])
    ->withCache(
        cacheDirectory: __DIR__ . '/rector-cache',
    )
    ->withParallel(
        timeoutSeconds: 60000,
        maxNumberOfProcess: 2,
        jobSize: 10,
    )
    ->withTypeCoverageLevel(24)
    ->withTypeCoverageDocblockLevel(14)
    ->reportUnusedSkips();
