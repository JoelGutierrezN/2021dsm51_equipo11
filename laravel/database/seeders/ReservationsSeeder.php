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
                'user_id' => rand(1, 50),
                'room_id' => rand(1, 5),
                'service_id' => rand(1, 9),
                'pet_id' => rand(1, 50),
                'address_id' => rand(1,50),
                'transaction_id' => rand(1,50)
            ]);
        }
    }
}
