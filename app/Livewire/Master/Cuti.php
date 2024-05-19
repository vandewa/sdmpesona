<?php

namespace App\Livewire\Master;

use App\Models\User;
use App\Models\ComCode;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use App\Models\PersetujuanCuti;
use App\Models\CutiAlasanPenting;
use App\Models\Cuti as ModelsCuti;

class Cuti extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari, $listJenisCuti, $listStatus, $listCutiAlasanPenting, $jenisCutiAlasanPenting = false, $cekTL = false, $persetujuanDirektur, $cekPertujuanDirektur;

    public $form = [
        'user_id' => null,
        'cuti_tp' => null,
        'cuti_alasan_penting_id' => null,
        'tgl_mulai' => null,
        'tgl_selesai' => null,
        'tgl_selesai' => null,
        'keterangan' => null,
        'partner_delegasi' => null,
        'nomor_partner' => null,
        'alamat' => null,
        'status_st' => null,
    ];

    public function mount()
    {
        $this->listJenisCuti = $this->ambilJenisCuti();
        $this->listCutiAlasanPenting = $this->ambilCutiAlasanPenting();
        $this->listStatus = $this->ambilStatus();
    }

    public function ambilJenisCuti()
    {
        return ComCode::where('code_group', 'CUTI_TP')->get()->toArray();
    }

    public function ambilPegawai()
    {
        return User::whereHas('jabatan')->where('status', 1)->get();
    }

    public function ambilStatus()
    {
        return ComCode::where('code_group', 'STATUS_ST')->get()->toArray();
    }

    public function ambilCutiAlasanPenting()
    {
        return CutiAlasanPenting::get()->toArray();
    }

    public function getEdit($a)
    {
        $this->form = $data = ModelsCuti::with(['pegawai', 'pegawai.jabatan'])->find($a)->toArray();
        $data = Arr::except($data, ['created_at', 'updated_at']);
        $this->idHapus = $a;
        $this->edit = true;


        $this->cekPertujuanDirektur = ModelsCuti::where('id', $a)->whereHas('persetujuan', function ($a) {
            $a->where('user_id', auth()->user()->id);
        })->first();

        $persetujuan = PersetujuanCuti::where('user_id', auth()->user()->id)->where('cuti_id', $a)->first()->status_st ?? null;
        if ($persetujuan) {
            $this->persetujuanDirektur = $persetujuan;
        }

    }

    public function tutup()
    {
        $this->edit = false;
    }

    public function batal()
    {
        $this->edit = false;
        return redirect(route('cuti'));
    }


    public function save()
    {

        $this->validate([
            'form.status_st' => 'required',
        ]);

        PersetujuanCuti::create([
            'user_id' => auth()->user()->id,
            'cuti_id' => $this->idHapus,
            'status_st' => $this->persetujuanDirektur,
        ]);

        //jika salah satu direktur menolak
        if ($this->persetujuanDirektur == 'STATUS_ST_03') {
            ModelsCuti::find($this->idHapus)->update([
                'status_st' => $this->persetujuanDirektur
            ]);
        }

        //jika minimal 2 direktur setuju maka pengajuan cuti disetujui
        $cek = $this->cekTL = PersetujuanCuti::where('cuti_id', $this->idHapus)->where('status_st', 'STATUS_ST_02')->count();
        if ($cek >= 2) {
            ModelsCuti::find($this->idHapus)->update([
                'status_st' => 'STATUS_ST_02'
            ]);
        }

        $this->reset();

        $this->edit = false;

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data telah diperharui!',
            icon: 'success',
          })
        JS);

        return redirect(route('cuti'));
    }


    public function render()
    {
        $kuotaCutiTahunan = '';
        $kuotaCutiTanpaSuratDokter = '';

        $data = ModelsCuti::cari($this->cari);
        //filter berdasarkan jenis pengumpulan
        if ($this->idnya) {
            $data->where('user_id', $this->idnya);

            $user = User::find($this->idnya);
            //partimer jumlah cuti tahunan
            if ($user->status_pekerjaan_id == 2) {
                $cutiTahunan = 6;
            } else {
                $cutiTahunan = 12;
            }

            $jmlCutiTahunan = ModelsCuti::where('user_id', $this->idnya)->where('status_st', 'STATUS_ST_02')->where('cuti_tp', 'CUTI_TP_01')->count();
            $jmlCutiTanpaSuratDokter = ModelsCuti::where('user_id', $this->idnya)->where('status_st', 'STATUS_ST_02')->where('cuti_tp', 'CUTI_TP_03')->count();

            $kuotaCutiTahunan = $cutiTahunan - $jmlCutiTahunan;
            $kuotaCutiTanpaSuratDokter = 3 - $jmlCutiTanpaSuratDokter;
        }

        $data = $data->orderBy('created_at', 'desc')->paginate(10);


        return view('livewire.master.cuti', [
            'post' => $data,
            'pegawai' => $this->ambilPegawai(),
            'kuotaCutiTahunan' => $kuotaCutiTahunan,
            'kuotaCutiTanpaSuratDokter' => $kuotaCutiTanpaSuratDokter,
        ]);
    }
}
