<?php

namespace Database\Seeders;

use App\Models\TunjanganKpiPelaksanaDivisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TunjanganKpiPelaksanaDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tunjangan_kpi_pelaksana_divisis')->truncate();
        $data = [
            [
                'id' => '1',
                'nama' => '100% penilaian',
                'nominal' => '200000',
            ],
            [
                'id' => '2',
                'nama' => '75% penilaian',
                'nominal' => '150000',
            ],
            [
                'id' => '3',
                'nama' => '50% penilaian',
                'nominal' => '100000',
            ],
            [
                'id' => '4',
                'nama' => '25% penilaian',
                'nominal' => '50000',
            ],
        ];

        foreach ($data as $datum) {
            TunjanganKpiPelaksanaDivisi::create($datum);
        }
    }
}
