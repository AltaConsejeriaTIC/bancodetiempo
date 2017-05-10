<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class homeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     public function testSeeHome(){
        $this->visit('/home')
            ->see('Todos');
    }
}
