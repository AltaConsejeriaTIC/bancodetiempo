<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use App\Models\TypeReport;

class TypeReportTableSeeder extends Seeder
{
    public function getModel()
    {
        return new TypeReport();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {        
        return [
                                              
        ];        
    }

    public function run()
    {
        $this->create([
            "type" => "Contenido sexual"
        ]);
        $this->create([
            "type" => "Contenido violento"
        ]);
        $this->create([
            "type" => "Contenido abusivo / Incita al odio"
        ]);
        $this->create([
            "type" => "Es Spam"
        ]);
        $this->create([
            "type" => "Otro"
        ]);
    }
}
