<?php

namespace Omakei\LaravelSelcom;

use Omakei\LaravelSelcom\Commands\LaravelSelcomCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelSelcomServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-selcom')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_selcom_table')
            ->hasCommand(LaravelSelcomCommand::class);
    }
}
