<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function getModel()
	{
		return new Service();
	}
	
	public function getDummyData(Generator $faker, array $custom = [])
	{
		return [
	
		];
	}
	
	public function run()
	{
		
	}
}
