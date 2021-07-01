<?php

namespace Omakei\LaravelSelcom;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Omakei\LaravelSelcom\Commands\LaravelSelcomCommand;

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
