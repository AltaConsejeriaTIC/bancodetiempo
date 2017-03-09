<?php

use App\Models\BadObservation;
use Faker\Generator;
use Styde\Seeder\Seeder;

class BadObservationTableSeeder extends Seeder
{
    public function getModel()
    {
        return new BadObservation();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [

        ];
    }

    public function run()
    {
        $this->create([
            'observation' => '',
            'state_id' => 1
        ]);

        $this->create([
            'observation' => 'La persona con la que hice el acuerdo no asistió.',
            'state_id' => 1
        ]);

        $this->create([
            'observation' => 'No asistí.',
            'state_id' => 1
        ]);

        $this->create([
            'observation' => 'Asistimos pero no se pudo realizar el acuerdo por motivos ajenos a nosotros.',
            'state_id' => 1
        ]);
    }
}
