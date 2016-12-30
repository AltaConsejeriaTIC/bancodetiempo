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
		$faker = Faker\Factory::create('es_ES');
	
		$fotos = array(
				'http://static.vix.com/es/sites/default/files/styles/full/public/btg/curiosidades.batanga.com/files/10-supuestos-mitos-sobre-la-comida-chatarra-8.jpg',
				'http://www.just-eat.es/blog/wp-content/uploads/2010/12/comer.g.jpg',
				'http://static.vix.com/es/sites/default/files/styles/full/public/btg/curiosidades.batanga.com/files/Dime-que-comida-te-obsesiona-y-te-dire-cual-puede-ser-tu-problema-emocional-1.jpg?itok=2tzU0iis',
				'http://comeconsalud.com/alimentacion-nutricion/wp-content/uploads/2013/03/adictos-a-la-comida2.jpg'
		);
		
		for ($i=0; $i < 15; $i++)
		{
			$this->create([
					'name' => $faker->word,
					'description' => $faker->text,
					'value' => $faker->numberBetween(1,8),
					'virtually'  => $faker->numberBetween(1,8),
					'presently' => 1,
					'image' => $faker->randomElement($fotos),
					'category_id' => $faker->numberBetween(1,5),
					'user_id' => $faker->numberBetween(2,15),
					'state_id' => $faker->numberBetween(1,2),
			]);
		}
		 
	}
}
