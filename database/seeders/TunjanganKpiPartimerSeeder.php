<?php

namespace Database\Seeders;

use App\Models\TunjanganKpiPartimer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TunjanganKpiPartimerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tunjangan_kpi_partimers')->truncate();
        $data = [
            [
                'id' => '1',
                'nama' => '100% penilaian',
                'nominal' => '100000',
            ],
            [
                'id' => '2',
                'nama' => '75% penilaian',
                'nominal' => '75000',
            ],
            [
                'id' => '3',
                'nama' => '50% penilaian',
                'nominal' => '50000',
            ],
            [
                'id' => '4',
                'nama' => '25% penilaian',
                'nominal' => '25000',
            ],
        ];

        foreach ($data as $datum) {
            TunjanganKpiPartimer::create($datum);
        }
    }
}
