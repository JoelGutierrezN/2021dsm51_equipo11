<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostsSeeder extends Seeder
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
            DB::table('posts')->insert([
                'user_id' => rand(1,51),
                'title' => "post".Str::random(100),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
