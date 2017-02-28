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
					'virtually'  => $faker->numberBetween(0,1),
					'presently' => 1,
					'image' => $faker->randomElement($fotos),
					'category_id' => $faker->numberBetween(1,5),
					'user_id' => $faker->numberBetween(2,15),
					'state_id' => $faker->numberBetween(1,2),
			]);
		}
        $this->create([
            'name' => 'Prácticas de Ingles',
            'description' => 'Ofrezco una hora de práctica de Inglés para aquellas personas que quieran mejorar su nivel de Inglés mediante la práctica. La sesión puede realizarse de forma virtual o presencial.',
            'value' => 1,
            'virtually'  => 1,
            'presently' => 1,
            'image' => $faker->randomElement($fotos),
            'category_id' => 1,
            'user_id' => 15,
            'state_id' => 1,
        ]);
        $this->create([
            'name' => 'Tipografía para no gráficos',
            'description' => 'Taller para todos aquellos profesionales relacionados con la imagen, el diseño, la arquitectura, las artes, interesados y curiosos. Algunos conceptos básicos de tipografía #SirveParaLaVidaCotidiana',
            'value' => 2,
            'virtually'  => 0,
            'presently' => 1,
            'image' => $faker->randomElement($fotos),
            'category_id' => 1,
            'user_id' => 12,
            'state_id' => 1,
        ]);        
        $this->create([
            'name' => 'Tipografía para no gráficos',
            'description' => 'Taller para todos aquellos profesionales relacionados con la imagen, el diseño, la arquitectura, las artes, interesados y curiosos. Algunos conceptos básicos de tipografía #SirveParaLaVidaCotidiana',
            'value' => 3,
            'virtually'  => 1,
            'presently' => 1,
            'image' => $faker->randomElement($fotos),
            'category_id' => 1,
            'user_id' => 7,
            'state_id' => 1,
        ]);
        $this->create([
            'name' => 'visita guiada a la costa colombiana',
            'description' => 'Ofrezco una visita guiada a la costa colombiana, el interesado debe cubrir los costos de ida y regreso, estadía y hospedaje.',
            'value' => 4,
            'virtually'  => 1,
            'presently' => 1,
            'image' => $faker->randomElement($fotos),
            'category_id' => 1,
            'user_id' => 1,
            'state_id' => 1,
        ]);
	}
}
