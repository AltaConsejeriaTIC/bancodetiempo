<?php

use App\Models\Roles;
use Faker\Generator;
use Styde\Seeder\Seeder;

class RoleTableSeeder extends Seeder
{
    protected $total = 1;

    public function getModel()
    {
        return new Roles();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            'role' => 'Admin',                                     
        ];        
    }

}