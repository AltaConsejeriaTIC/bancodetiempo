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
            $this->create([
                "name" => "Terminos y Condiciones",
                "url" => "terms",
                "description" => ""
            ]);
            $this->create([
                "name" => "Políticas de Privacidad",
                "url" => "privacity",
                "description" => ""
            ]);
            $this->create([
                "name" => "Preguntas Frecuentes",
                "url" => "questions",
                "description" => ""
            ]);

        }

}
