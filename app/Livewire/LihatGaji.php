<?php

namespace App\Livewire;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gaji as ModelsGaji;
use PhpOffice\PhpWord\TemplateProcessor;


class LihatGaji extends Component
{

    use WithPagination;
    public $cari, $idHapus, $edit = false, $idnya;

    public function cetak($id)
    {
        $data = ModelsGaji::with(['pegawai', 'tunjanganPendidikan'])->find($id);
        $bendahara = User::where('nama_jabatan_id', '7')->where('status', '1')->first();

        $path = public_path('template/gaji.docx');
        $pathSave = storage_path('app/public/' . 'Gaji-' . $data->pegawai->name . ' -' . $data->bulan . ' ' . $data->tahun . '.docx');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'nama' => strtoupper($data->pegawai->name ?? ''),
            'jabatan' => strtoupper($data->pegawai->jabatan->nama ?? ''),
            'bulan' => bulanIndonesia($data->bulan) . ' ' . $data->tahun,
            'gapok' => \Laraindo\RupiahFormat::currency($data->gapok),
            'honor' => \Laraindo\RupiahFormat::currency($data->honor) ?? '-',
            'jumlah_gapok' => \Laraindo\RupiahFormat::currency($data->jml_diterima_gapok),
            'tgl' => Carbon::createFromFormat('Y-m-d', $data->tanggal_penggajian)->isoFormat('D MMMM Y'),
            'bendahara' => $bendahara->name,
            'jabatan_bendahara' => $bendahara->jabatan->nama,

            'tunjangan_pendidikan' => \Laraindo\RupiahFormat::currency($data->tunjangan_pendidikan) ?? '-',
            'tunjangan_masa_kerja' => \Laraindo\RupiahFormat::currency($data->tunjangan_masa_kerja) ?? '-',
            'kpi' => \Laraindo\RupiahFormat::currency($data->kpi) ?? '-',
            'kehadiran' => \Laraindo\RupiahFormat::currency($data->kehadiran) ?? '-',
            'lembur' => \Laraindo\RupiahFormat::currency($data->lembur) ?? '-',
            'uang_makan_parttimer' => \Laraindo\RupiahFormat::currency($data->uang_makan_parttimer) ?? '-',
            'lain_lain' => \Laraindo\RupiahFormat::currency($data->lain_lain) ?? '-',
            'fee' => \Laraindo\RupiahFormat::currency($data->fee) ?? '-',
            'jumlah_tunjangan' => \Laraindo\RupiahFormat::currency($data->jml_diterima_tunjangan) ?? '-',
        ]);

        if ($bendahara->path_tanda_tangan) {
            $templateProcessor->setImageValue('ttd_bendahara', [
                'path' => storage_path('app/' . $bendahara->path_tanda_tangan) ?? "noimage.png",
                'height' => 50,
                'ratio' => false
            ]);
        }

        if ($data->pegawai->path_tanda_tangan) {
            $templateProcessor->setImageValue('ttd_penerima', [
                'path' => storage_path('app/' . $data->pegawai->path_tanda_tangan) ?? "noimage.png",
                'height' => 50,
                'ratio' => false
            ]);
        }

        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
        $templateProcessor->saveAs($pathSave);

        return response()->download($pathSave)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $data = ModelsGaji::where('user_id', auth()->user()->id)->orderBy('tanggal_penggajian', 'desc')->paginate(20);

        return view('livewire.lihat-gaji', [
            'post' => $data
        ]);
    }
}
