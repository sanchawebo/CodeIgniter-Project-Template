<?php

namespace Mpr\Logs\Class;

class LogData
{
    private const LOG_TYPE_MISSING_PARENT = 'MISSING PARENT';

    public array $lines = [];

    public function __construct(public readonly string $type, public readonly ?string $dateTime = null)
    {
    }

    public static function createMissingParentHolder(): self
    {
        return new self(self::LOG_TYPE_MISSING_PARENT);
    }
}
