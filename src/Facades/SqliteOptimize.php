<?php

namespace AHOI\SqliteOptimize\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AHOI\SqliteOptimize\SqliteOptimize
 */
class SqliteOptimize extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AHOI\SqliteOptimize\SqliteOptimize::class;
    }
}
