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
            'model' => 'App\User',
            'relation' => '{"Service" : {"his" :"user_id", "my" : "id"}}',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_apellido',
            'parameter' => 'last_name',
            'model' => 'App\User',
            'relation' => '{"Service" : {"his" :"user_id", "my" : "id"}}',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_email',
            'parameter' => 'email2',
            'model' => 'App\User',
            'relation' => '',
            'type' => 'text',
            'options' => '{"Service" : {"his" :"user_id", "my" : "id"}}',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_genero',
            'parameter' => 'gender',
            'model' => 'App\User',
            'relation' => '{"Service" : {"his" :"user_id", "my" : "id"}}',
            'type' => 'select',
            'options' => '{"male": "Male",   "female": "Female", "indeterminate" : "indeterminate" }',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'usuario_fechaNacimiento',
            'parameter' => 'birthDate',
            'model' => 'App\User',
            'relation' => '',
            'type' => 'date',
            'options' => '{"Service" : {"his" :"user_id", "my" : "id"}}',
            'print' => 'date'
        ]);
        $this->create([
            'name' => 'usuario_dorados',
            'parameter' => 'credits',
            'model' => 'App\User',
            'relation' => '',
            'type' => 'number',
            'options' => '{"Service" : {"his" :"user_id", "my" : "id"}}',
            'print' => 'number'
        ]);
        $this->create([
            'name' => 'usuario_calificacion',
            'parameter' => 'ranking',
            'model' => 'App\User',
            'relation' => '',
            'type' => 'number',
            'options' => '{"Service" : {"his" :"user_id", "my" : "id"}}',
            'print' => 'number'
        ]);
        $this->create([
            'name' => 'usuario_estado',
            'parameter' => 'state',
            'model' => 'App\Models\State',
            'relation' => '{"User" : {"his" :"state_id", "my" : "id"}}',
            'type' => 'select',
            'options' => '{   1: "Activo",   2: "Inactivo",  3: "Bloqueado", 4: "pendiente"}',
            'print' => 'string'
        ]);

        $this->create([
            'name' => 'usuario_fechaRegistro',
            'parameter' => 'created_at',
            'model' => 'App\Models\UserReports',
            'relation' => '',
            'type' => 'date',
            'options' => '{"Service" : {"his" :"user_id", "my" : "id"}}',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'interest_name',
            'parameter' => 'category',
            'model' => 'App\Models\ReportInterest',
            'relation' => '{"User" : {"his" : "id", "my" : "user_id"}}',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);

        $this->create([
            'name' => 'service_name',
            'parameter' => 'name',
            'model' => 'App\Models\Service',
            'relation' => '{"User" : {"his" :"id", "my" : "user_id"}}',
            'type' => 'text',
            'options' => '',
            'print' => 'string'
        ]);

        $this->create([
            'name' => 'service_value',
            'parameter' => 'value',
            'model' => 'App\Models\Service',
            'relation' => '{"User" : {"his" :"id", "my" : "user_id"}}',
            'type' => 'number',
            'options' => '',
            'print' => 'string'
        ]);
        $this->create([
            'name' => 'service_creacion',
            'parameter' => 'created_at',
            'model' => 'App\Models\Service',
            'relation' => '{"User" : {"his" :"id", "my" : "user_id"}}',
            'type' => 'number',
            'options' => '',
            'print' => 'string'
        ]);
    }
}
