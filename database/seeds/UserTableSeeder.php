<?php

use App\User;
use Faker\Generator;
use Styde\Seeder\Seeder;

class UserTableSeeder extends Seeder
{
    protected $total = 50;

    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            
        ];
    }    

    public function run()
    { 
      $this->create([
          'first_name' => 'Admin',
          'last_name' => 'Admin',
          'email' => 'admin@admin.com',
          'password'  => bcrypt('admin123'),
          'gender' => '',
          'birthDate' => null,
          'aboutMe' => null,
          'state_id' => 1,
          'role_id' => 1,
          'privacy_policy' => 1,
      ]);      
    }
}