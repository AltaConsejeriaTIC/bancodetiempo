<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use App\Models\TagsService;
use App\Models\Service;

class TagsServiceTableSeeder extends Seeder
{
     public function getModel()
    {
        return new TagsService();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {        
        return [
                                              
        ];        
    }   

    public function run()
    {
    	
    	$faker = Faker\Factory::create('es_ES');
    	
    	$services = Service::all();
    	$old = '';
    	foreach ($services as $service){
    		for ($i=0; $i < 3; $i++)
    		{
    			$new = $faker->numberBetween(1,15);
    			
    			while($new == $old){
    				$new = $faker->numberBetween(1,15);
    			}
    			
    			$this->create([
    					'tag_id' => $faker->numberBetween(1,15),
    					'service_id' => $service->id
    			]);
    			
    			$old = $new;
    		}
    		
    	}
    }

}
