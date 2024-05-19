<?php

namespace Database\Seeders;

use App\Models\CutiAlasanPenting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CutiAlasanPentingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuti_alasan_pentings')->truncate();
        $data = [
            [
                'id' => '1',
                'nama' => 'Menikah',
            ],
            [
                'id' => '2',
                'nama' => 'Anak Sakit',
            ],
        ];

        foreach ($data as $datum) {
            CutiAlasanPenting::create($datum);
        }
    }
}
