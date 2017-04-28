<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class welcomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSeeWelcome()
    {
        $this->visit('/')
            ->see('OFERTAS RECIENTES')
            ->see('¡ÚNETE!');
    }
}
