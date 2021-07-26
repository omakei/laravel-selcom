<?php

namespace Omakei\LaravelSelcom\Tests;

use Omakei\LaravelSelcom\LaravelSelcom;

class LaravelSelcomTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_can_cancel_an_order()
    {
        $this->withoutExceptionHandling();

        $response = LaravelSelcom::checkout()->cancelOrder('2');

        $this->assertEquals(true, $response->clientError());
    }
}
