<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PetsSeeder::class);
        $this->call(RoomsSeeder::class);
        $this->call(TransactionsSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(ReservationsSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(LikesSeeder::class);
    }
}
