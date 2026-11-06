<?php

declare(strict_types=1);

use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentBaseBuilder;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentBaseReader;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use Rector\CodeQuality\Rector\Class_\ConvertStaticToSelfRector;
use Rector\CodeQuality\Rector\New_\NewStaticToNewSelfRector;
use Rector\CodingStyle\Rector\FuncCall\CallUserFuncArrayToVariadicRector;
use Rector\CodingStyle\Rector\FuncCall\FunctionFirstClassCallableRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveMixedDocblockOverruledByNativeTypeRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessUnionReturnDocblockRector;
use Rector\DeadCode\Rector\Property\RemoveUselessVarTagRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\SetList;
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
        FunctionFirstClassCallableRector::class => [
            __DIR__ . '/../src/visualizers/renderers/InvoiceSuiteVisualizerLaravelRenderer.php',
        ],
        RemoveUselessUnionReturnDocblockRector::class,
        RemoveMixedDocblockOverruledByNativeTypeRector::class,
    ])
    ->withPhpVersion(PhpVersion::PHP_82)
    ->withPhpSets(php82: true)
    ->withSets([
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
    ])
    ->withComposerBased(
        phpunit: true,
        symfony: true,
    )
    ->withImportNames()
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
