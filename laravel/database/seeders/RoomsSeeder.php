<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            DB::table('rooms')->insert([
                'rank' => Str::random(10),
                'cost' => rand(250, 600),
                'resume' => Str::random(255),
                'large_description' => Str::random(600),
                'img' => null,
                'name' => Str::random(10),
                'active' => 1
            ]);
        }
    }
}
