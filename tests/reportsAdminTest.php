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

    public function testGetReportWithZeroParameter(){
        $class = new ReportsController();
        $this->assertFalse($class->makeReport([], [], []));
    }

    public function testGetReportWithOneParameterOneTable(){
        $class = new ReportsController();
        $this->assertInternalType("array", $class->makeReport(['usuario_nombre'], [], ['orderBy' => 'usuario_nombre', 'order' => 'asc']));
    }

    public function testGetReportWithTwoParameterOneTable(){
        $class = new ReportsController();
        $this->assertInternalType("array", $class->makeReport(['usuario_nombre', 'usuario_apellido'], [], ['orderBy' => 'usuario_nombre', 'order' => 'asc']));
    }

    public function testGetReportWithTwoParameterTwoTable(){
        $class = new ReportsController();

        $resp =  $class->makeReport(['usuario_nombre', 'usuario_apellido', 'service_name'], [], ['orderBy' => 'usuario_nombre', 'order' => 'asc']);

        $this->assertArrayHasKey("service_name", head($resp));

        $this->assertInternalType("array", head($resp)['service_name']);
    }

    public function testGetReportWithTwoParameterTwoTablePrincipalServices(){
        $class = new ReportsController();
        $resp = $class->makeReport(['service_name', 'service_value', 'usuario_nombre'], [], ['orderBy' => 'service_name', 'order' => 'asc']);

        $this->assertArrayHasKey("usuario_nombre", head($resp));

        $this->assertInternalType("array", head($resp)['usuario_nombre']);
    }

}
