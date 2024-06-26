<?php

namespace Database\Seeders;

use App\Models\TunjanganPendidikan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TunjanganPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tunjangan_pendidikans')->truncate();
        $data = [
            [
                'id' => '1',
                'nama' => 'SMA',
                'nominal' => '50000',
            ],
            [
                'id' => '2',
                'nama' => 'Sarjana (S1)',
                'nominal' => '100000',
            ],
            [
                'id' => '3',
                'nama' => 'Pascasarjana (S2)',
                'nominal' => '150000',
            ],
        ];

        foreach ($data as $datum) {
            TunjanganPendidikan::create($datum);
        }
    }
}
