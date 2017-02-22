<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Market extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('markets')->truncate();

        $faker = Faker::create("fa_IR");
        $city = ['بندر انزلی' => 'بندر انزلی', 'لاهیجان' => 'لاهیجان', 'رشت' => 'رشت'];

        foreach (range(1, 20) as $index){
            \App\Market::create([
                'user_id' => '1',
                'market_name' => $faker->company,
                'state' => 'گیلان',
                'city' => array_rand($city, 1),
                'address' => $faker->address,
                'market_tel' => $faker->phoneNumber,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
                'market_type' => '0',
            ]);
        }
    }
}
