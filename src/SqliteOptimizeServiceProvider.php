<?php

namespace AHOI\SqliteOptimize;

use AHOI\SqliteOptimize\Commands\SqliteOptimizeCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasCommand(SqliteOptimizeCommand::class);
    }
}
