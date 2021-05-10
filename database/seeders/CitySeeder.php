<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'id' => 1,
            'city_name' => 'Banjul',
            'country_id' => 1,
        ]);

        City::create([
            'id' => 2,
            'city_name' => 'Dakar',
            'country_id' => 2,
        ]);

        City::create([
            'id' => 3,
            'city_name' => 'Monrovia',
            'country_id' => 3,
        ]);
    }
}
