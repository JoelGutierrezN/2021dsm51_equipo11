<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        for($i = 1; $i <= 100; $i++){
            DB::table('comments')->insert([
                'content' => Str::random(20),
                'image_id' => rand(1,5),
                'user_id' => rand(1,50),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
