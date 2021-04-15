<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        for($i = 1; $i <= 32; $i++){
            DB::table('states')->insert([
                'key' => Str::random(2),
                'name' => Str::random(10),
                'shortname' => Str::random(10),
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
