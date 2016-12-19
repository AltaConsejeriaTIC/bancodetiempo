<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(["category" => "Ocio"]);
        
        Category::create(["category" => "Tecnologia"]);
        
        Category::create(["category" => "Administracion"]);
    }
}
