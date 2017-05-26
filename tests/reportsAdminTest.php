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

    public function testGetReport2OneParameterHasParameter(){
        $class = new ReportsController();

        $resp = $class->newGetReport([
            "User" => "first_name"
        ]);

        $this->assertArrayHasKey("first_name", $resp);
    }

    public function testGetReport2OneParameterHasValue(){
        $class = new ReportsController();

        $resp = $class->newGetReport([
            "User" => "first_name"
        ]);

        $this->assertEquals("first_name", $resp);
    }

}
