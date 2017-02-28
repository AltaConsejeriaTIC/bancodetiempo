<?php

use Illuminate\Database\Seeder;

use App\Models\AdminContent;
use Faker\Generator;
use Styde\Seeder\Seeder;
class AdminContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        public function getModel()
        {
            return new AdminContent();
        }



        public function run()
    {
        $this->create([
            "name" => "Terminos y Condiciones",
            "url" => "/terms"
        ]);
        $this->create([
            "category" => "Políticas de Privacidad",
            "url" => "/"
        ]);
        $this->create([
            "name" => "Preguntas Frecuentes",
            "url" => "/s"
        ]);


    }

}
