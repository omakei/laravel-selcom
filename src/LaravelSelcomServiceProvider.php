<?php

namespace Omakei\LaravelSelcom;

use Omakei\LaravelSelcom\Commands\LaravelSelcomCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelSelcomServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-selcom')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-selcom_table')
            ->hasCommand(LaravelSelcomCommand::class);
    }
}
