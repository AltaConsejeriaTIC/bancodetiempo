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
    }
}