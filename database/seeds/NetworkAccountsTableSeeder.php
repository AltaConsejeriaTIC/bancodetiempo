<?php

use Styde\Seeder\Seeder;
use Faker\Generator;
use App\Models\NetworkAccounts;

class NetworkAccountsTableSeeder extends Seeder
{
    public function getModel()
    {
        return new NetworkAccounts();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [

        ];
    }

    public function run()
    {
    }


}
