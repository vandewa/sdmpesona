<?php

namespace Database\Seeders;

use App\Models\ComCode as Code;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('com_codes')->truncate();
        $code = Code::create(["com_cd" => "KAWIN_TP_01", "code_nm" => "Sudah Menikah", "code_group" => "KAWIN_TP"]);
        $code = Code::create(["com_cd" => "KAWIN_TP_02", "code_nm" => "Belum Menikah", "code_group" => "KAWIN_TP"]);
        $code = Code::create(["com_cd" => "KAWIN_TP_03", "code_nm" => "Pernah Menikah", "code_group" => "KAWIN_TP"]);
    }
}
