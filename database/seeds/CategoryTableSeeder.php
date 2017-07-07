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
        if(Category::where('name', 'Cocina')->get()->count() == 0){
            $this->create([
              "category" => "Cocina",
              "image" => "services/cocina01.jpg"
            ]);
        }
        if(Category::where('name', 'Idiomas')->get()->count() == 0){
            $this->create([
              "category" => "Idiomas",
              "image" => "services/idiomas01.jpg"
            ]);
        }
        if(Category::where('name', 'Música')->get()->count() == 0){
            $this->create([
              "category" => "Música",
              "image" => "services/musica01.jpg"
            ]);
        }
        if(Category::where('name', 'Diseño')->get()->count() == 0){
            $this->create([
              "category" => "Diseño",
              "image" => "services/diseño01.jpg"
            ]);
        }
        if(Category::where('name', 'Arte')->get()->count() == 0){
            $this->create([
              "category" => "Arte",
              "image" => "services/arte01.jpg"
            ]);
        }
        if(Category::where('name', 'Entretenimiento')->get()->count() == 0){
            $this->create([
              "category" => "Entretenimiento",
              "image" => "services/entretenimiento01.jpg"
            ]);
        }
        if(Category::where('name', 'Moda')->get()->count() == 0){
            $this->create([
              "category" => "Moda",
              "image" => "services/moda01.jpg"
            ]);
        }
        if(Category::where('name', 'Multimedia')->get()->count() == 0){
            $this->create([
              "category" => "Multimedia",
              "image" => "services/multimedia01.jpg"
            ]);
        }
        if(Category::where('name', 'Literatura')->get()->count() == 0){
            $this->create([
              "category" => "Literatura",
              "image" => "services/literatura01.jpg"
            ]);
        }
        if(Category::where('name', 'Ciencia')->get()->count() == 0){
            $this->create([
              "category" => "Ciencia",
              "image" => "services/ciencia01.jpg"
            ]);
        }
        if(Category::where('name', 'Tecnología')->get()->count() == 0){
            $this->create([
              "category" => "Tecnología",
              "image" => "services/tecnologia01.jpg"
            ]);
        }
        if(Category::where('name', 'Actividad Física y deportes')->get()->count() == 0){
            $this->create([
              "category" => "Actividad Física y deportes",
              "image" => "services/actividadfisica01.jpg"
            ]);
        }
        if(Category::where('name', 'Administración y negocios')->get()->count() == 0){
            $this->create([
              "category" => "Administración y negocios",
              "image" => "services/administracionynegocios01.jpg"
            ]);
        }
        if(Category::where('name', 'Otros')->get()->count() == 0){
            $this->create([
              "category" => "Otros",
              "image" => "services/otros01.jpg"
            ]);
        }
    }
}
