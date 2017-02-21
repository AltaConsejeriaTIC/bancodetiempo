<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use App\Models\Attainment;

class AttainmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function getModel()
    {
        return new Attainment();
    }


    public function getDummyData(Generator $faker, array $custom = [])
    {        
        return [
                                              
        ];        
    }   

    public function run()
    {
        $this->create([
            'attainments' => 'Register Step 1',
            'value' => '1',
        ]);
        $this->create([
            'attainments' => 'Register Step 2',
            'value' => '1',
        ]);
        $this->create([
            'attainments' => 'Register Step 3',
            'value' => '2',
        ]);        
    }
}
