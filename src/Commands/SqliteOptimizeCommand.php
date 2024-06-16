<?php

namespace AHOI\SqliteOptimize\Commands;

use Illuminate\Console\Command;

class SqliteOptimizeCommand extends Command
{
    public $signature = 'laravel-sqlite-optimize';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
