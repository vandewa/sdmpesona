<?php

namespace Database\Seeders;

use App\Models\Cuti;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('status_pekerjaans')->truncate();
        // $data = [
        //     [
        //         'id' => '1',
        //         'nama' => 'Cuti Dengan',
        //         'kuota' => '12'
        //     ],
        //     [
        //         'id' => '2',
        //         'nama' => 'Parttimer',
        //     ],
        //     [
        //         'id' => '3',
        //         'nama' => 'Direksi',
        //     ],
        //     [
        //         'id' => '4',
        //         'nama' => 'Dewas',
        //     ],
        // ];

        // foreach ($data as $datum) {
        //     Cuti::create($datum);
        // }
    }
}
