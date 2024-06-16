<?php

namespace AHOI\SqliteOptimize;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AHOI\SqliteOptimize\Commands\SqliteOptimizeCommand;

class SqliteOptimizeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-sqlite-optimize')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-sqlite-optimize_table')
            ->hasCommand(SqliteOptimizeCommand::class);
    }
}
