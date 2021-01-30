<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++){
            DB::table('reservations')->insert([
                'user_id' => rand(1, 50),
                'room_id' => rand(1, 50),
                'pet_id' => rand(1, 50),
            ]);
        }
    }
}
