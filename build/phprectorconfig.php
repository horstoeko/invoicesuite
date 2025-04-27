<?php

declare(strict_types=1);

use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\Naming\Rector\Class_\RenamePropertyToMatchTypeRector;
use Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector;
use Rector\Naming\Rector\ClassMethod\RenameVariableToMatchNewTypeRector;
use Rector\Set\ValueObject\SetList;

return RectorConfig::configure()
    ->withPaths([
        //__DIR__ . '/../src',
        __DIR__ . '/../src/models/zffx',
    ])
    ->withSkip([
    ])
    ->withSkip([
        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class,
    ])
    ->withPhp73Sets()
    ->withSets([
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
    ])
    ->withConfiguredRule(EncapsedStringsToSprintfRector::class, [
        'always' => true,
    ])
    ->withRules([
        RenamePropertyToMatchTypeRector::class,
        RenameParamToMatchTypeRector::class,
        RenameVariableToMatchNewTypeRector::class,
    ])
    ->withTypeCoverageLevel(0);
