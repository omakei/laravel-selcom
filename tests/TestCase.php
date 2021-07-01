<?php

namespace Omakei\LaravelSelcom\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Omakei\LaravelSelcom\LaravelSelcomServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Omakei\\LaravelSelcom\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelSelcomServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        include_once __DIR__.'/../database/migrations/create_laravel-selcom_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
