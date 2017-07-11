<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use App\Models\Attainment;

class AttainmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function getModel()
    {
        return new Attainment();
    }


    public function getDummyData(Generator $faker, array $custom = [])
    {        
        return [];
    }   

    public function run()
    {
        $this->create([
            'attainments' => 'Register Step 1',
            'value' => '1',
            'text' => '<b>¡Bienvenido a Cambalachea!</b><br>Has ganado tu primer dorado.<br>Completa tu <a href="/profile" class="link2">perfil</a> y gana un <br>dorado más.'
        ]);
        $this->create([
            'attainments' => 'Register Step 2',
            'value' => '1',
            'text' => '<b>¡Tienes dos dorados!</b><br>Publica tu primera oferta y gana dos dorados más.'
        ]);
        $this->create([
            'attainments' => 'Register Step 3',
            'value' => '2',
            'text' => '<b>¡Acabas de ganar 2 dorados!</b><br>A partir de este momento puedes tomar una oferta.'
        ]);        
    }
}
