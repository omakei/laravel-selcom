<?php

namespace Omakei\LaravelSelcom;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Omakei\LaravelSelcom\LaravelSelcom
 */
class LaravelSelcomFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-selcom';
    }
}
