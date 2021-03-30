<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        //inicio servicio
        service::insert([
            'name' => 'Paseo por el parque', //titulo
            'cost' => 287.00, //costo en float, se puede insertar sin los .00
            'premium' => 0, //1 = premium, 0 = no premium 
            'resume' => 'Vista con seguridad, cuenta con los servicios de veterianria por si se requiere', //texto corto para tarjeta pequeña
            'large_description' => 'texto largo', //descripcion larga para popup(aun no hecho)
            'img' => 'service.png', //no cambiar imagen
            'created_at' => $now,
            'updated_at' => $now
        ]);
        //fin servicio
        service::insert([
            'name' => 'Routina Fit', //titulo
            'cost' => 389.00, //costo en float, se puede insertar sin los .00
            'premium' => 1, //1 = premium, 0 = no premium 
            'resume' => 'Consiste en un mejor cuidado en alimentacion y estimulacion por medio de aparatos especializados', //texto corto para tarjeta pequeña
            'large_description' => 'texto largo', //descripcion larga para popup(aun no hecho)
            'img' => 'service.png', //no cambiar imagen
            'created_at' => $now,
            'updated_at' => $now //no cambiar imagen
        ]);
        service::insert([
            'name' => 'SPA', //titulo
            'cost' => 460.00, //costo en float, se puede insertar sin los .00
            'premium' => 1, //1 = premium, 0 = no premium 
            'resume' => 'Enfocado a  tratamientos, terapias o sistemas de relajación, utilizando como base principal el agua', //texto corto para tarjeta pequeña
            'large_description' => 'texto largo', //descripcion larga para popup(aun no hecho)
            'img' => 'service.png', //no cambiar imagen
            'created_at' => $now,
            'updated_at' => $now //no cambiar imagen
        ]);
        service::insert([
            'name' => 'Area de Juegos', //titulo
            'cost' => 5000.00, //costo en float, se puede insertar sin los .00
            'premium' => 1, //1 = premium, 0 = no premium 
            'resume' => 'Seis juegos para estimular su buena conducta en casa
            El escondite y buscar comida debajo de objetos son juegos que desarrollan las habilidades olfativas del perro y su concentración', //texto corto para tarjeta pequeña
            'large_description' => 'texto largo', //descripcion larga para popup(aun no hecho)
            'img' => 'service.png', //no cambiar imagen
            'created_at' => $now,
            'updated_at' => $now //no cambiar imagen
        ]);
    }
}
