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
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(ComCodeSeeder::class);
        $this->call(StatusPekerjaanSeeder::class);
        $this->call(NamaJabatanSeeder::class);
        $this->call(TingkatPekerjaanSeeder::class);
        $this->call(TunjanganPendidikanSeeder::class);
    }
}
