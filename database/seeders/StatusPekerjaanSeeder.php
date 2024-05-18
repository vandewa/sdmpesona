<?php

namespace Database\Seeders;

use App\Models\StatusPekerjaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_pekerjaans')->truncate();
        $data = [
            [
                'id' => '1',
                'nama' => 'Pelaksana Divisi',
            ],
            [
                'id' => '2',
                'nama' => 'Parttimer',
            ],
            [
                'id' => '3',
                'nama' => 'Direksi',
            ],
            [
                'id' => '4',
                'nama' => 'Dewas',
            ],
        ];

        foreach ($data as $datum) {
            StatusPekerjaan::create($datum);
        }
    }
}
