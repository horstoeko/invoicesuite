<?php

declare(strict_types=1);

use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\CodeQuality\Rector\Class_\ConvertStaticToSelfRector;
use Rector\CodeQuality\Rector\New_\NewStaticToNewSelfRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\CodingStyle\Rector\String_\UseClassKeywordForClassNameResolutionRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\DeadCode\Rector\Property\RemoveUselessVarTagRector;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;
use Rector\ValueObject\PhpVersion;

require_once(__DIR__.'/phprectorrules.php');

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/../src',
        __DIR__ . '/../tests/testcases',
    ])
    ->withSkipPath(
        __DIR__ . '/../src/pdfs/zffx/InvoiceSuiteZffxPdfWriter.php',
    )
    ->withPhpVersion(PhpVersion::PHP_82)
    ->withPhpSets(php82: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        instanceOf: true,
        phpunitCodeQuality: true
    )
    ->withComposerBased(phpunit: true)
    ->withSkip([
        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class,
        RemoveUselessVarTagRector::class,
        ConvertStaticToSelfRector::class,
        NewStaticToNewSelfRector::class,
        UseClassKeywordForClassNameResolutionRector::class,
    ])
    ->withConfiguredRule(EncapsedStringsToSprintfRector::class, [
        'always' => true,
    ])
    ->withRules([
        DeclareStrictTypesRector::class,
        OneIsNullOrEmptyIfTraceToStringIsNullOrEmptyRector::class,
        AllIsNullOrEmptyIfTraceToStringIsNullOrEmptyRector::class,
    ])
    ->withImportNames(
        importShortClasses: true,
        removeUnusedImports: true
    )
    ->withCache(
        cacheClass: FileCacheStorage::class,
        cacheDirectory: __DIR__ . '/rector'
    )
    ->withoutParallel()
    ->withTypeCoverageLevel(0);
