<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        for($i = 1; $i <= 50; $i++){
            DB::table('pets')->insert([
                'name' => Str::random(10),
                'race' => Str::random(15),
                'observations' => Str::random(255),
                'img' => 'pet.png',
                'active' => rand(0,1),
                'user_id' => rand(1,50),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
