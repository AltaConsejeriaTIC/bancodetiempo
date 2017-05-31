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
            'name' => 'Usuario nombre',
            'parameter' => 'firstname',
            'type' => 'text',
            'options' => '',
        ]);
        $this->create([
            'name' => 'Usuario apellido',
            'parameter' => 'lastname',
            'type' => 'text',
            'options' => '',
        ]);
        $this->create([
            'name' => 'Usuario email',
            'parameter' => 'email',
            'type' => 'text',
            'options' => ''
        ]);
        $this->create([
            'name' => 'Usuario genero',
            'parameter' => 'gender',
            'type' => 'select',
            'options' => '{"male": "Male",  "female": "Female", "indeterminate" : "indeterminate" }',
        ]);
        $this->create([
            'name' => 'Usuario fecha nacimiento',
            'parameter' => 'birthdate',
            'type' => 'date',
            'options' => '',
        ]);
        $this->create([
            'name' => 'Usuario dorados',
            'parameter' => 'credits',
            'type' => 'number',
            'options' => '',
        ]);
        $this->create([
            'name' => 'Usuario calificacion',
            'parameter' => 'ranking',
            'type' => 'number',
            'options' => '',
        ]);
        $this->create([
            'name' => 'usuario estado',
            'parameter' => 'state',
            'type' => 'select',
            'options' => '{"1": "Activo", "2": "Inactivo", "3": "Bloqueado", "4": "pendiente"}'
        ]);

        $this->create([
            'name' => 'Intereses',
            'parameter' => 'interest_name',
            'type' => 'text',
            'options' => '',
        ]);

        $this->create([
            'name' => 'Servicio nombre',
            'parameter' => 'service_name',
            'type' => 'text',
            'options' => '',
        ]);

        $this->create([
            'name' => 'Servicio valor',
            'parameter' => 'service_value',
            'type' => 'number',
            'options' => ''
        ]);

        $this->create([
            'name' => 'Servicio tags',
            'parameter' => 'service_tag_name',
            'type' => 'text',
            'options' => ''
        ]);

        $this->create([
            'name' => 'Participante trato',
            'parameter' => 'service_deal_participantName',
            'type' => 'text',
            'options' => ''
        ]);

        $this->create([
            'name' => 'Fecha trato',
            'parameter' => 'service_deal_date',
            'type' => 'text',
            'options' => ''
        ]);

        $this->create([
            'name' => 'Hora trato',
            'parameter' => 'service_deal_time',
            'type' => '',
            'options' => ''
        ]);

        $this->create([
            'name' => 'Grupo nombre',
            'parameter' => 'group_name',
            'type' => 'text',
            'options' => ''
        ]);
    }
}
