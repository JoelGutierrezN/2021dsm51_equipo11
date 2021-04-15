<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class reservations_has_services extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        for($i = 1; $i <= 150; $i++){
            DB::table('reservations_has_services')->insert([
                'reservation_id' => rand(1,10),
                'service_id' => rand(1,4),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
