<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // CountrySeeder::class,
            // StateSeeder::class,
            CitySeeder::class,
        ]);
    }
}
