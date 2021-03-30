<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        //Inicio de creacion 10 habitaciones Sencillas
        for($i = 1; $i <= 10; $i++){ //mover el "10" si es necesario
            DB::table('rooms')->insert([ //'rooms' es tabla donde se insertarán los registros
                'rank' => 1, // 1 a 5 dependiendo el rango
                'cost' => 150, //costo de la habitacion, solo numero
                'resume' => 'Habitacion Sencilla con lo Esencial para el Descanso de tu Mascota', //resumen de la habitacion
                'large_description' => null, //null por ahora
                'img' => 'img/rooms/room.png', //la misma para todas
                'name' => 'Habitacion Sencilla #'.$i, // $i variable i asigna un numero del 1 al 10 de habitacion resultado final "Habitacion Sencilla #1"
                'active' => 1, //activa o inactiva, siempre 1
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
        //Fin de creacion 10 habitaciones Sencillas

        for($i = 1; $i <= 10; $i++){ //mover el "10" si es necesario
            DB::table('rooms')->insert([ //'rooms' es tabla donde se insertarán los registros
                'rank' => 2, // 1 a 5 dependiendo el rango
                'cost' => 250, //costo de la habitacion, solo numero
                'resume' => 'Habitacion Basica con lo Basico para el Descanso y Distraccion de tu Mascota', //resumen de la habitacion
                'large_description' => null, //null por ahora
                'img' => 'img/rooms/room.png', //la misma para todas
                'name' => 'Habitacion Basica #'.$i, // $i variable i asigna un numero del 1 al 10 de habitacion resultado final "Habitacion Sencilla #1"
                'active' => 0, //activa o inactiva, siempre 1
                'created_at' => $now,
                'updated_at' => $now //activa o inactiva, siempre 1
            ]);
        }

        for($i = 1; $i <= 10; $i++){ //mover el "10" si es necesario
            DB::table('rooms')->insert([ //'rooms' es tabla donde se insertarán los registros
                'rank' => 3, // 1 a 5 dependiendo el rango
                'cost' => 250, //costo de la habitacion, solo numero
                'resume' => ' Habitacion Grande Esencial para Razas Grandes o Inquietas',//resumen de la habitacion
                'large_description' => null, //null por ahora
                'img' => 'img/rooms/room.png', //la misma para todas
                'name' => 'Habitacion Grande #'.$i, // $i variable i asigna un numero del 1 al 10 de habitacion resultado final "Habitacion Sencilla #1"
                'active' => 1, //activa o inactiva, siempre 1
                'created_at' => $now,
                'updated_at' => $now //activa o inactiva, siempre 1
            ]);
        }

        for($i = 1; $i <= 9; $i++){ //mover el "10" si es necesario
            DB::table('rooms')->insert([ //'rooms' es tabla donde se insertarán los registros
                'rank' => 4, // 1 a 5 dependiendo el rango
                'cost' => 450, //costo de la habitacion, solo numero
                'resume' => 'Habitacion Doble, Apta para cualquier Raza, Disponible para 2 a 4 Mascotas ',//resumen de la habitacion
                'large_description' => null, //null por ahora
                'img' => 'img/rooms/room.png', //la misma para todas
                'name' => 'Habitacion Doble #'.$i, // $i variable i asigna un numero del 1 al 10 de habitacion resultado final "Habitacion Sencilla #1"
                'active' => 1, //activa o inactiva, siempre 1
                'created_at' => $now,
                'updated_at' => $now //activa o inactiva, siempre 1
            ]);
        }

        for($i = 1; $i <= 10; $i++){ //mover el "10" si es necesario
            DB::table('rooms')->insert([ //'rooms' es tabla donde se insertarán los registros
                'rank' => 5, // 1 a 5 dependiendo el rango
                'cost' => 600, //costo de la habitacion, solo numero
                'resume' => 'Habitacion lujosa, con todas las necesidades, ademas de que puede alojar a un maximo de 10 mascotas',//resumen de la habitacion
                'large_description' => null, //null por ahora
                'img' => 'img/rooms/room.png', //la misma para todas
                'name' => 'Suite de SafetyDogs #'.$i, // $i variable i asigna un numero del 1 al 10 de habitacion resultado final "Habitacion Sencilla #1"
                'active' => 1, //activa o inactiva, siempre 1
                'created_at' => $now,
                'updated_at' => $now //activa o inactiva, siempre 1
            ]);
        }
    }
}
