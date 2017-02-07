<?php

use App\User;
use Faker\Generator;
use Styde\Seeder\Seeder;

class UserTableSeeder extends Seeder
{
    protected $total = 50;

    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            
        ];
    }    

    public function run()
    {
      
      $faker = Faker\Factory::create('es_ES');

      $avatar = array(
      		'https://upload.wikimedia.org/wikipedia/commons/6/65/Kruse_CNDLS_Profile.png',
      		'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Sherman_Profile.png/602px-Sherman_Profile.png',
      		'http://media.istockphoto.com/photos/profile-portrait-of-young-blond-woman-picture-id521816664?k=6&m=521816664&s=170667a&w=0&h=h246AFq6IUUdlcyNcIUv1FPM0Q1jH6EGO8O7TfLjb6o=',
      		'http://www.binarytradingforum.com/core/image.php?userid=27&dateline=1355305878'
      );
      
      $this->create([
          'first_name' => 'Admin',
          'last_name' => 'Admin',
          'email' => 'admin@admin.com',
          'password'  => bcrypt('admin123'),
          'gender' => '',
          'birthDate' => null,
          'aboutMe' => null,
          'state_id' => 1,
          'role_id' => 1,
          'privacy_policy' => 1,
      ]);

        for ($i=0; $i < 15; $i++)
      {
          $this->create([
              'first_name' => $faker->firstName,
              'last_name' => $faker->lastName,            
              'email' => $faker->email,                
              'password'  => null,
              'state_id' => 1,
          	  'avatar' => $faker->randomElement($avatar),
              'gender' => $faker->randomElement(['Masculino','Femenino']),
              'birthDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
          	  'ranking' => $faker->numberBetween(1, 5),
              'aboutMe' => null,              
              'role_id' => 2,
          ]);
      }
        $this->create([
            'first_name' => 'Anderson',
            'last_name' => 'Osorio',
            'email' => 'akod55@hotmail.es',
            'email2' => 'akod55@hotmail.es',
            'avatar'=>'https://graph.facebook.com/v2.8/10209912283758203/picture?width=1920',
            'password'  => null,
            'gender' => 'male',
            'birthDate' => null,
            'aboutMe' => 'Viajo en el tiempo si quieres un paseo victoriano llama no lo dudes y disfruta una aventura',
            'state_id' => 1,
            'role_id' => 2,
            'privacy_policy' => 1,
        ]);
        $this->create([
            'first_name' => 'Joe',
            'last_name' => 'Rojas',
            'email' => 'joerojasgomez@hotmail.com',
            'email2' => 'joerojasgomez@hotmail.com',
            'avatar' => 'https://graph.facebook.com/v2.8/1922079684681419/picture?width=1920',
            'password' => null,
            'gender' => 'male',
            'birthDate' => null,
            'aboutMe' => 'Diseñador Grafico apasionado por la Fotografia el Diseño UI UX la animacion y la actuacion Me encanta el cine el teatro la musica y montar bici',
            'state_id' => 1,
            'role_id' => 2,
            'privacy_policy' => 1,
        ]);
        $this->create([
        'first_name' => 'Alejandro',
        'last_name' => 'Salas',
        'email' => 'alejandro.salas.prada@gmail.com',
        'email2' => 'alejandro.salas.prada@gmail.com',
        'avatar' => 'https://graph.facebook.com/v2.8/10207859332388759/picture?width=1920',
        'password'  => null,
        'gender' => 'male',
        'birthDate' => null,
        'aboutMe' => 'Soy estudiante de diseno gráfico de la Universidad Nacional de Colombia Me gusta la fotografía',
        'state_id' => 1,
        'role_id' => 2,
        'privacy_policy' => 1,
    ]);       
    }
}