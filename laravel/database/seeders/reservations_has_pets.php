<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class reservations_has_pets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 150; $i++){
            DB::table('reservations_has_pets')->insert([
                'reservation_id' => rand(1,50),
                'pet_id' => rand(1,50)
            ]);
        }
    }
}