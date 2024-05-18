<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\His\TrxMedical;
use Illuminate\Support\Facades\Storage;

class HelperController extends Controller
{
    public function showPicture(Request $request)
    {
        if (Storage::exists($request->path)) {
            return Storage::response($request->path);
        }

        return "File tidak ditemukan";
    }

    public function bulanIndonesia($angkaBulan)
    {
        // Array dengan nama-nama bulan dalam bahasa Indonesia
        $bulan = [
            "01" => "Januari",
            "02" => "Februari",
            "03" => "Maret",
            "04" => "April",
            "05" => "Mei",
            "06" => "Juni",
            "07" => "Juli",
            "08" => "Agustus",
            "09" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember"
        ];

        // Mengembalikan nama bulan berdasarkan angka bulan
        return $bulan[$angkaBulan];
    }
}
