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
        $this->create([
            'user_id' => '17',
            'provider_id' => '10209912283758203',
            'provider'=>'facebook',
        ]);
        $this->create([
            'user_id' => '18',
            'provider_id' => '1922079684681419',
            'provider'=>'facebook',
        ]);
        $this->create([
            'user_id' => '19',
            'provider_id' => '10207859332388759',
            'provider'=>'facebook',
        ]);
        $this->create([
            'user_id' => '20',
            'provider_id' => '1374168195947226',
            'provider'=>'facebook',
        ]);
        $this->create([
            'user_id' => '21',
            'provider_id' => '661440967350649',
            'provider'=>'facebook',
        ]);
    }


}
