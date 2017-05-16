<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class reportsAdmin extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSeeHomeReports()
    {
        $this->visit('/admin/reports');
    }

    public function testSendForm(){
         $this->visit('/reports')
            ->type('prueba', 'nameReport')
            ->press('send')
            ->seePageIs('/createReport');
    }

    public function testRegisterExist(){
        $this->seeInDatabase('reports_admin', ['name' => 'prueba']);
    }
}
