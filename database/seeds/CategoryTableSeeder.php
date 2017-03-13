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
          "category" => "Cocina",
          "image" => "services/cocina01.jpg"
        ]);        
        $this->create([
          "category" => "Idiomas",
          "image" => "services/idiomas01.jpg"
        ]);        
        $this->create([
          "category" => "Música",
          "image" => "services/musica01.jpg"
        ]);
        $this->create([
          "category" => "Diseño",
          "image" => "services/diseño01.jpg"
        ]);
        $this->create([
          "category" => "Arte",
          "image" => "services/arte01.jpg"
        ]);
        $this->create([
          "category" => "Entretenimiento",
          "image" => "services/entretenimiento01.jpg"
        ]);
        $this->create([
          "category" => "Moda",
          "image" => "services/moda01.jpg"
        ]);
        $this->create([
          "category" => "Multimedia",
          "image" => "services/multimedia01.jpg"
        ]);
        $this->create([
          "category" => "Literatura",
          "image" => "services/literatura01.jpg"
        ]);
        $this->create([
          "category" => "Ciencia",
          "image" => "services/ciencia01.jpg"
        ]);
        $this->create([
          "category" => "Tecnología",
          "image" => "services/tecnologia01.jpg"
        ]);
        $this->create([
          "category" => "Actividad Física y deportes",
          "image" => "services/actividadfisica01.jpg"
        ]);
        $this->create([
          "category" => "Administración y negocios",
          "image" => "services/administracionynegocios01.jpg"
        ]);
        $this->create([
          "category" => "Otros",
          "image" => "services/otros01.jpg"
        ]);


    }
}
