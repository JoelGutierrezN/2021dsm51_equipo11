<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++){
            DB::table('pets')->insert([
                'name' => Str::random(10),
                'race' => Str::random(15),
                'observations' => Str::random(255),
                'user_id' => rand(1,50)
            ]);
        }
    }
}
