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
                'rank' => 'Usuario'
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
                'rank' => 'Miembro',
                'created_at' => $now,
                'updated_at' => $now
            ]);
        User::insert([
            'name' => 'Premium Inicial',
            'first_name' => 'Apellido',
            'email' => 'premium@correo.com',
            'password' => bcrypt('password'),
            'cellphone' => 0000000000,
            'phone' => 0000000000,
            'rank' => 'Premium',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        User::insert([
            'name' => 'Empleado Inicial',
            'first_name' => 'Apellido',
            'email' => 'empleado@correo.com',
            'password' => bcrypt('password'),
            'cellphone' => 0000000000,
            'phone' => 0000000000,
            'rank' => 'Empleado',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        User::insert([
            'name' => 'Admin Inicial',
            'first_name' => 'Apellido',
            'email' => 'admin@correo.com',
            'password' => bcrypt('password'),
            'cellphone' => 0000000000,
            'phone' => 0000000000,
            'rank' => 'Admin',
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
