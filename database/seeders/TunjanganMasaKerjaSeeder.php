<?php

namespace Database\Seeders;

use App\Models\TunjanganMasaKerja;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TunjanganMasaKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tunjangan_masa_kerjas')->truncate();
        $data = [
            [
                'id' => '1',
                'nama' => '0 - 2 tahun',
                'nominal' => '100000',
            ],
            [
                'id' => '2',
                'nama' => '2 - 5 tahun',
                'nominal' => '150000',
            ],
            [
                'id' => '3',
                'nama' => '>5 tahun',
                'nominal' => '200000',
            ],
        ];

        foreach ($data as $datum) {
            TunjanganMasaKerja::create($datum);
        }
    }
}
