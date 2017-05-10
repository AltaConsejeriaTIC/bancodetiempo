<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class filterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     public function testSeeFilter(){
        $this->visit('/home')
            ->see('Todos');
    }
}
