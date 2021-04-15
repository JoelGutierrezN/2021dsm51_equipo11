<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class TransactionsSeeder extends Seeder
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
            DB::table('transactions')->insert([
                'card' => '0000-0000-0000-0000',
                'card_date' => '01/21',
                'cvv' => Str::random(3), 
                'paypal_account' => Str::random(10).'@.correo.com',
                'date' => $now,
                'invoice' => Str::random(20),
                'owner_name' => Str::random(8),
                'reservation_id' => rand(1,10),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
