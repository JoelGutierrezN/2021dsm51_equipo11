<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 100; $i++){
            DB::table('countries')->insert([
                'key' => Str::random(3),
                'name' => Str::random(100),
                'status' => 1,
                'state_id' => rand(1,32)
            ]);
        }
    }
}
