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
      
      $faker = Faker\Factory::create('es_ES');

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
      ]); 

      for ($i=0; $i < 15; $i++) 
      {
          $this->create([
              'first_name' => $faker->firstName,
              'last_name' => $faker->lastName,            
              'email' => $faker->email,            
              'password'  => bcrypt('secret'),
              'state_id' => 1,
              'gender' => $faker->randomElement(['Masculino','Femenino']),
              'birthDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
              'aboutMe' => null,              
              'role_id' => 2,
          ]);
      }        
    }
}