<?php


use App\Models\AdminContent;
use Faker\Generator;
use Styde\Seeder\Seeder;
class AdminContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function getModel()
        {
            return new AdminContent();
        }
    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [

        ];
        }


        public function run()
        {
        	if(AdminContent::where('name', "Terminos y Condiciones")->get()->count() == 0){
        		$this->create([
        				"name" => "Terminos y Condiciones",
        				"url" => "terms",
        				"description" => ""
        		]);
        	}
        	if(AdminContent::where('name', "Políticas de Privacidad")->get()->count() == 0){
	            $this->create([
	                "name" => "Políticas de Privacidad",
	                "url" => "privacity",
	                "description" => ""
	            ]);
        	}
        	if(AdminContent::where('name', "Preguntas Frecuentes")->get()->count() == 0){
	            $this->create([
	                "name" => "Preguntas Frecuentes",
	                "url" => "questions",
	                "description" => ""
	            ]);
        	}

        }

}
