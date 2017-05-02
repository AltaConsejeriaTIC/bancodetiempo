<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class firstServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   public function testSeeService(){
        $this->visit('service')
            ->see('ofrecer');
    }
}
