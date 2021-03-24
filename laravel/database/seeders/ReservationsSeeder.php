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
                'date' => '00/00/0000',
                'date_start' => '00/00/0000',
                'date_left' => '00/00/0000',
                'subtotal' => rand(250,500),
                'total' => rand(250,500),
                'homeservice' => rand(0,1),
                'active' => rand(0,1),
                'address_id' => rand(1,50),
                'user_id' => rand(1, 50),
            ]);
        }
    }
}
