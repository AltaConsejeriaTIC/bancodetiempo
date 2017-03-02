<?php

use App\Models\State;
use Faker\Generator;
use Styde\Seeder\Seeder;

class StateTableSeeder extends Seeder
{
    protected $total = 2;

    public function getModel()
    {
        return new State();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {        
        return [
                                              
        ];        
    }   

    public function run()
    {
        $this->create([
            'state' => 'Activo',
        ]);
        $this->create([
            'state' => 'Inactivo',
        ]);
        $this->create([
            'state' => 'Bloqueado',
        ]);
        $this->create([
            'state' => 'Pendiente',
        ]);
        $this->create([
            'state' => 'Leido',
        ]);
        $this->create([
            'state' => 'No leido',
        ]);
        $this->create([
            'state' => 'Aceptado',
        ]);
        $this->create([
            'state' => 'Cancelado',
        ]);
        $this->create([
            'state' => 'Reportado',
        ]);
        $this->create([
            'state' => 'Finalizado',
        ]);
        $this->create([
            'state' => 'Finalizado por tiempo',
        ]);
        $this->create([
            'state' => 'Por Calificar',
        ]);
    }
}