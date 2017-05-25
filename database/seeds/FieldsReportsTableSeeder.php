<?php

use App\Models\FieldsReportsAdmin;
use Faker\Generator;
use Styde\Seeder\Seeder;

class FieldsReportsTableSeeder extends Seeder
{

    public function getModel()
    {
        return new FieldsReportsAdmin();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [

        ];
    }

    public function run()
    {
        $this->create([
            'name' => 'usuario_nombre',
            'parameter' => 'first_name',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_apellido',
            'parameter' => 'last_name',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_email',
            'parameter' => 'email2',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_genero',
            'parameter' => 'gender',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'select',
            'options' => '{"male": "Male",   "female": "Female" }',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_apellido',
            'parameter' => 'last_name',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_fechaNacimiento',
            'parameter' => 'birthDate',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'date',
            'options' => '',
            'print' => 'date'
        ]);
        $this->create([
            'name' => 'usuario_dorados',
            'parameter' => 'credits',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'number',
            'options' => '',
            'print' => 'number'
        ]);
        $this->create([
            'name' => 'usuario_calificacion',
            'parameter' => 'ranking',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'number',
            'options' => '',
            'print' => 'number'
        ]);
        $this->create([
            'name' => 'usuario_estado',
            'parameter' => 'state',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'select',
            'options' => '{   "Activo": "Activo",   "Inactivo": "Inactivo",  "Bloqueado": "Bloqueado"}',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'interest_name',
            'parameter' => 'category',
            'model' => 'App\Models\ReportInterest',
            'relation' => '{"UserReports" : {"his" :"id", "my" : "user_id"}}',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_fechaRegistro',
            'parameter' => 'created_at',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'date',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'service_name',
            'parameter' => 'name',
            'model' => 'App\Models\ReportService',
            'relation' => '{"UserReports" : {"his" :"id", "my" : "user_id"}}',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'service_value',
            'parameter' => 'value',
            'model' => 'App\Models\ReportService',
            'relation' => '{"UserReports" : {"his" :"id", "my" : "user_id"}}',
            'type' => 'number',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'service_creacion',
            'parameter' => 'created_at',
            'model' => 'App\Models\ReportService',
            'relation' => '{"UserReports" : {"his" :"id", "my" : "user_id"}}',
            'type' => 'number',
            'options' => '',
            'print' => 'string'
        ]);
    }
}
