<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            DB::table('images')->insert([
                'image_path' => 'img/images/image.png',
                'description' => Str::random(100),
                'user_id' => rand(1,50)
            ]);
        }
    }
}
