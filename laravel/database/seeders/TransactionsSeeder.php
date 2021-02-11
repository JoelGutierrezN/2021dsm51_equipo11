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
        for($i = 1; $i <= 50; $i++){
            DB::table('transactions')->insert([
                'card' => 0000-0000-0000-0000,
                'paypal_account' => Str::random(10).'@.correo.com',
                'date' => date('Y-M-D'),
                'invoice' => Str::random(20),
                'owner_name' => Str::random(8)
            ]);
        }
    }
}
