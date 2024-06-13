<?php

namespace Database\Seeders;

use App\Models\KuotaCutiTahunan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KuotaCutiTahunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kuota_cuti_tahunans')->truncate();
        $data = [
            [
                'id' => '1',
                'jumlah' => 1,
            ],
            [
                'id' => '2',
                'jumlah' => 1,
            ],
        ];

        foreach ($data as $datum) {
            KuotaCutiTahunan::create($datum);
        }
    }
}
