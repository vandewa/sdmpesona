<?php

namespace App\Http\Controllers;

use App\Http\Requests\GantiPasswordValidation;
use Carbon\Carbon;
use App\Models\Gaji;
use App\Models\User;
use App\Models\Saldo;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpWord\TemplateProcessor;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole(['superadmin', 'direktur'])) {
            $laki = User::where('jk', 'l')->where('status', '1')->count();
            $perempuan = User::where('jk', 'p')->where('status', '1')->count();
            $total = User::whereHas('jabatan')->where('status', '1')->count();

            $jml_diterima_gapok = Gaji::whereYear('tanggal_penggajian', date('Y'))->sum('jml_diterima_gapok');
            $jml_diterima_tunjangan = Gaji::whereYear('tanggal_penggajian', date('Y'))->sum('jml_diterima_tunjangan');
            $total_gaji = $jml_diterima_gapok + $jml_diterima_tunjangan;

            return view('dashboard.index', compact('laki', 'perempuan', 'total', 'total_gaji'));
        } elseif (auth()->user()->hasRole(['ketua'])) {
            return redirect(route('kpi-penilaian-index'));
        } else {
            return redirect(route('profil'));
        }

    }

    public function cetak(Request $request)
    {
        $data = Pemeliharaan::whereYear('tgl', $request->tahun)
            ->withSum('transaksi', 'jumlah')
            ->get();

        $saldo = Saldo::whereYear('tahun', $request->tahun)->first();

        $path = public_path('/template/laporan_keuangan.docx');
        $pathSave = storage_path('app/public/' . 'Laporan Keuangan ' . $request->tahun . '.docx');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'nomor' => 1,
            'ket' => 'Tahun Anggaran ' . $request->tahun,
            'masuk' => \Laraindo\RupiahFormat::currency($saldo ?? 0),
            'keluar' => '-',
            'sisa' => \Laraindo\RupiahFormat::currency($saldo ?? 0),
        ]);

        $kampret = [];

        foreach ($data as $index => $a1) {
            $saldo = $saldo - $a1->transaksi_sum_jumlah;
            array_push($kampret, [
                'no' => $index + 2,
                'keterangan' => $a1->nota,
                'pemasukan' => '-',
                'pengeluaran' => \Laraindo\RupiahFormat::currency($a1->transaksi_sum_jumlah ?? 0),
                'saldo' => \Laraindo\RupiahFormat::currency($saldo ?? 0),
            ]);

        }
        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
        $templateProcessor->cloneRowAndSetValues('no', $kampret);
        $templateProcessor->saveAs($pathSave);

        return response()->download($pathSave)->deleteFileAfterSend(true);

    }

    public function password()
    {
        return view('ganti-password');
    }

    public function gantiPassword(GantiPasswordValidation $request)
    {
        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('edit', 'oke');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}