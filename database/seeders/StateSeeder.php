<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'id' => 1,
            'state_name' => 'Banjul',
            'country_id' => 1,
        ]);

        State::create([
            'id' => 2,
            'state_name' => 'Dakar',
            'country_id' => 2,
        ]);

        State::create([
            'id' => 3,
            'state_name' => 'Monrovia',
            'country_id' => 3,
        ]);
    }
}
