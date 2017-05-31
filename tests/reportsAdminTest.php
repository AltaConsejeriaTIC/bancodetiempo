<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Http\Controllers\Admin\ReportsController;

class reportsAdmin extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */



    public function testGetReport2OneParameter(){
        $class = new ReportsController();
        $this->assertInternalType("array", $class->newGetReport([
            "User" => "first_name"
        ]));
    }


}
