<?php

use App\Models\Role;
use Faker\Generator;
use Styde\Seeder\Seeder;

class RoleTableSeeder extends Seeder
{
    protected $total = 2;

    public function getModel()
    {
        return new Role();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {        
        return [

        ];        
    }   

    public function run()
    {
        $this->create([
            'role' => 'Administrador',
        ]);
        $this->create([
            'role' => 'Usuario',
        ]);
    }
}