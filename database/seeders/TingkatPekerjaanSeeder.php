<?php

namespace Database\Seeders;

use App\Models\TingkatPekerjaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TingkatPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tingkat_pekerjaans')->truncate();
        $data = [
            [
                'id' => '1',
                'nama' => 'Dewas',
            ],
            [
                'id' => '2',
                'nama' => 'Direksi',
            ],
            [
                'id' => '3',
                'nama' => 'Pelaksana Divisi',
            ],
            [
                'id' => '4',
                'nama' => 'Parttimer',
            ],
        ];

        foreach ($data as $datum) {
            TingkatPekerjaan::create($datum);
        }
    }
}
