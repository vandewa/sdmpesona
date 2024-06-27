<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\KpiPenilaian;
use Livewire\WithPagination;
use App\Models\PenilaianSilangDireksi;
use PhpOffice\PhpWord\TemplateProcessor;

class KpiPenilaianDireksi extends Component
{

    use WithPagination;

    public $idnya, $bulan, $tahun, $bulannya, $cekValidasi, $cekBulan;


    public function mount($id = '')
    {
        $this->idnya = $id;
        $carbonDate = Carbon::parse($this->idnya);

        $this->bulan = $carbonDate->format('m');
        $this->tahun = $carbonDate->format('Y');

        $this->bulannya = $carbonDate->isoFormat('MMMM Y');

        $this->cekBulan = KpiPenilaian::whereMonth('bulan', $this->bulan)->whereYear('bulan', $this->tahun)->first();
        if ($this->cekBulan) {
            dd('a');
            $this->cekValidasi = true;
        } else {
            dd('b');
            $this->cekValidasi = false;
        }

    }

    public function simpan()
    {
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Apakah Anda yakin?',
                text: "Apakah Anda ingin memvalidasi data ini ? proses ini tidak dapat dikembalikan.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oke!',
                cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
                $wire.save()
            }
          })
        JS);
    }

    public function save()
    {
        KpiPenilaian::create([
            'bulan' => $this->idnya,
            'created_by' => auth()->user()->id,
        ]);

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data berhasil divalidasi!',
            icon: 'success',
            confirmButtonText: "OK"
            })
        JS);
    }

    public function cetak()
    {
        $data = PenilaianSilangDireksi::with(['pegawai', 'user'])->whereMonth('tgl', $this->bulan)->whereYear('tgl', $this->tahun)->orderBy('penilai', 'asc')->get();

        $ketua = User::where('status', 1)->whereHasRole(['ketua'])->first();
        $anggota1 = User::where('nama_jabatan_sekarang_id', 11)->where('status', 1)->orderBy('id', 'asc')->first();
        $anggota2 = User::where('nama_jabatan_sekarang_id', 11)->where('status', 1)->orderBy('id', 'desc')->first();

        $path = public_path('template/penilaian.docx');
        $pathSave = storage_path('app/public/' . 'KPI Penilaian Direksi ' . $this->bulannya . '.docx');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'bulannya' => strtoupper($this->bulannya),
            'ketua' => $ketua->name,
            'anggota_1' => $anggota1->name,
            'anggota_2' => $anggota2->name,
            'ketua' => $ketua->name,
        ]);

        if ($ketua->path_tanda_tangan) {
            $templateProcessor->setImageValue('ttd_ketua', [
                'path' => storage_path('app/' . $ketua->path_tanda_tangan) ?? "noimage.png",
                'height' => 100,
                'ratio' => false
            ]);
        }
        if ($anggota1->path_tanda_tangan) {
            $templateProcessor->setImageValue('ttd_anggota_1', [
                'path' => storage_path('app/' . $anggota1->path_tanda_tangan) ?? "noimage.png",
                'height' => 100,
                'ratio' => false
            ]);
        }

        if ($anggota2->path_tanda_tangan) {
            $templateProcessor->setImageValue('ttd_anggota_2', [
                'path' => storage_path('app/' . $anggota2->path_tanda_tangan) ?? "noimage.png",
                'height' => 100,
                'ratio' => false
            ]);
        }


        $kampret = [];
        foreach ($data as $index => $item) {
            array_push($kampret, [
                'no' => $index + 1,
                'bulan' => Carbon::createFromFormat('Y-m-d', $item->tgl)->isoFormat('MMMM Y'),
                'penilai' => $item->user->name,
                'subject' => $item->pegawai->name,
                'kualitatif' => $item->penilaian_kualitatif,
                'jobdesk' => $item->jobdesk,
                'inovasi' => $item->inovasi,
                'kedisiplinan' => $item->kedisiplinan,
            ]);

        }
        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
        $templateProcessor->cloneRowAndSetValues('no', $kampret);
        $templateProcessor->saveAs($pathSave);

        return response()->download($pathSave)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $data = PenilaianSilangDireksi::whereMonth('tgl', $this->bulan)->whereYear('tgl', $this->tahun)->orderBy('penilai', 'asc')->get();

        return view('livewire.kpi-penilaian-direksi', [
            'post' => $data,
            'bulannya' => $this->bulannya
        ]);
    }
}
