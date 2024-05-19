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
        $code = Code::create(["com_cd" => "CUTI_TP_01", "code_nm" => "Cuti Tahunan", "code_group" => "CUTI_TP"]);
        $code = Code::create(["com_cd" => "CUTI_TP_02", "code_nm" => "Cuti Sakit Dengan Surat Dokter", "code_group" => "CUTI_TP"]);
        $code = Code::create(["com_cd" => "CUTI_TP_03", "code_nm" => "Cuti Sakit Tanpa Surat Dokter", "code_group" => "CUTI_TP"]);
        $code = Code::create(["com_cd" => "CUTI_TP_04", "code_nm" => "Cuti Dengan Alasan Penting", "code_group" => "CUTI_TP"]);
        $code = Code::create(["com_cd" => "STATUS_ST_01", "code_nm" => "Menunggu Persetujuan", "code_group" => "STATUS_ST"]);
        $code = Code::create(["com_cd" => "STATUS_ST_02", "code_nm" => "Disetujui", "code_group" => "STATUS_ST"]);
        $code = Code::create(["com_cd" => "STATUS_ST_03", "code_nm" => "Ditolak", "code_group" => "STATUS_ST"]);
    }
}
