<?php

namespace Database\Seeders;

use App\Models\NamaJabatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NamaJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nama_jabatans')->truncate();
        $data = [
            [
                'id' => '1',
                'nama' => 'Direktur Utama',
            ],
            [
                'id' => '2',
                'nama' => 'Direktur Umum',
            ],
            [
                'id' => '3',
                'nama' => 'Direktur Program dan Produksi',
            ],
            [
                'id' => '4',
                'nama' => 'Pelaksana Divisi Program',
            ],
            [
                'id' => '5',
                'nama' => 'Pelaksana Divisi Produksi',
            ],
            [
                'id' => '6',
                'nama' => 'Pelaksana Divisi Teknis',
            ],
            [
                'id' => '7',
                'nama' => 'Pelaksana Divisi Administrasi dan Keuangan',
            ],
            [
                'id' => '8',
                'nama' => 'Pelaksana Divisi Marketing',
            ],
            [
                'id' => '9',
                'nama' => 'Parttimer Marketing',
            ],
            [
                'id' => '10',
                'nama' => 'Parttimer Siaran',
            ],
            [
                'id' => '11',
                'nama' => 'Dewan Pengawas',
            ],
        ];

        foreach ($data as $datum) {
            NamaJabatan::create($datum);
        }
    }
}
