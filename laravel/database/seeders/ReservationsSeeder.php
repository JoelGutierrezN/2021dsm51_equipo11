<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        for($i = 1; $i <= 10; $i++){
            DB::table('reservations')->insert([
                'date' => $now,
                'date_start' => $now,
                'date_left' => $now,
                'subtotal' => rand(250,500),
                'total' => rand(250,500),
                'homeservice' => rand(0,1),
                'active' => 1,
                'address_id' => rand(1,50),
                'room_id' => rand(1,49),
                'user_id' => rand(1, 50),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
