<?php

namespace Omakei\LaravelSelcom\Commands;

use Illuminate\Console\Command;

class LaravelSelcomCommand extends Command
{
    public $signature = 'laravel-selcom';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
