<?php

use App\Models\Roles;
use Faker\Generator;
use Styde\Seeder\Seeder;

class RoleTableSeeder extends Seeder
{
    protected $total = 2;

    public function getModel()
    {
        return new Roles();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {        
        return [
                                              
        ];        
    }   

    public function run()
    {
        $this->create([
            'role' => 'Admin',
        ]);
        $this->create([
            'role' => 'User',
        ]);
    }
}