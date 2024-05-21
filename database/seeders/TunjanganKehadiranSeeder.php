<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TunjanganKehadiran;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TunjanganKehadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tunjangan_kehadirans')->truncate();
        $data = [
            [
                'id' => '1',
                'nama' => 'Hak Libur (cuti tahunan, libur mingguan, dan libur tanggal merah)',
                'nominal' => '100000',
            ],
            [
                'id' => '2',
                'nama' => 'Hak Libur dan Cuti Sakit tanpa Surat Dokter lebih dari (>) 3x dalam setahun',
                'nominal' => '50000',
            ],
        ];

        foreach ($data as $datum) {
            TunjanganKehadiran::create($datum);
        }
    }
}
