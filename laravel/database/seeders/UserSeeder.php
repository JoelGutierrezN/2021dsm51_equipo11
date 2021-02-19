<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++){
            DB::table('users')->insert([
                'name' => Str::random(10),
                'first_name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'cellphone' => 0000000000,
                'phone' => 0000000000,
                'rank' => 'user'
            ]);
        }

        $now = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        User::insert([
                'name' => 'Usuario Inicial',
                'first_name' => 'Apellido',
                'email' => 'correo@correo.com',
                'password' => bcrypt('password'),
                'cellphone' => 0000000000,
                'phone' => 0000000000,
                'rank' => 'admin',
                'created_at' => $now,
                'updated_at' => $now
            ]);
    }
}
