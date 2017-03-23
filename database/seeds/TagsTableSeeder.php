<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    public function getModel()
    {
        return new Tag();
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
