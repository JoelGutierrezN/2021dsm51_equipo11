<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            DB::table('services')->insert([
                'name' => Str::random(10),
                'cost' => rand(250, 600),
                'premium' => rand(0,1),
                'resume' => Str::random(255),
                'large_description' => Str::random(600),
                'img' => '/img/services/service.png'
            ]);
        }
    }
}
