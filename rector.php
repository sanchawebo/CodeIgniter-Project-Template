<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/GEFAKOLoser',
        __DIR__ . '/GEFAKOPlus',
        __DIR__ . '/GEFAKOVorplanung',
        __DIR__ . '/Shared',
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets(php83: true)
    ->withPreparedSets(
        deadCode: true,
        instanceOf: true,
        strictBooleans: true,
    )
    ->withParallel(120, 8, 10)
    ->withImportNames(removeUnusedImports: true)
    ->withCodeQualityLevel(0);
