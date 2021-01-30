<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++){
            DB::table('address')->insert([
                'street' => Str::random(25),
                'number' => rand(1, 200),
                'number_int' => rand(1, 200),
                'suburb' => Str::random(20),
                'state_id' => rand(1, 32),
                'country_id' => rand(1, 2700),
                'user_id' => rand(1, 50),
            ]);
        }
    }
}
