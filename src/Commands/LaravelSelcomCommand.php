<?php

namespace Omakei\LaravelSelcom\Commands;

use Illuminate\Console\Command;
use Omakei\LaravelSelcom\LaravelSelcom;

class LaravelSelcomCommand extends Command
{
    public $signature = 'laravel-selcom:test';

    public $description = 'My command';

    public function handle()
    {
        $response = LaravelSelcom::checkout()->cancelOrder(2);

        dd($response);

        $this->comment('All done');
    }
}
