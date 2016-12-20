<?php

use App\Models\Category;
use Faker\Generator;
use Styde\Seeder\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function getModel()
    {
        return new Category();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {        
        return [
                                              
        ];        
    }   

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create([
          "category" => "Arte y Diseño",
          "image" => "category-profile.png"
        ]);        
        $this->create([
          "category" => "Negocios",
          "image" => "category-profile.png"
        ]);        
        $this->create([
          "category" => "Educación",
          "image" => "category-profile.png"
        ]);
        $this->create([
          "category" => "Fitness",
          "image" => "category-profile.png"
        ]);
        $this->create([
          "category" => "Hogar",
          "image" => "category-profile.png"
        ]);
        $this->create([
          "category" => "Tecnología",
          "image" => "category-profile.png"
        ]);
    }
}
