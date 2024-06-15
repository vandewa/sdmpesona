<?php

namespace App\Livewire\Master;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ComCode;
use Livewire\Component;
use App\Jobs\kirimPesan;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use App\Models\PersetujuanCuti;
use App\Models\KuotaCutiTahunan;
use App\Models\CutiAlasanPenting;
use App\Models\Cuti as ModelsCuti;

class Cuti extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari, $listJenisCuti, $listStatus, $listCutiAlasanPenting, $jenisCutiAlasanPenting = false, $cekTL = false, $persetujuanDirektur, $cekPertujuanDirektur, $keteranganDirektur, $tampilKeterangan = false, $kuotaPegawaiTetap, $kuotaPegawaiPartimer;

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
        'keterangan_direktur' => null,
    ];

    public function mount()
    {
        $this->listJenisCuti = $this->ambilJenisCuti();
        $this->listCutiAlasanPenting = $this->ambilCutiAlasanPenting();
        $this->listStatus = $this->ambilStatus();

        $this->kuotaPegawaiTetap = KuotaCutiTahunan::where('id', 1)->first()->jumlah;
        $this->kuotaPegawaiPartimer = KuotaCutiTahunan::where('id', 2)->first()->jumlah;
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
        return ComCode::where('code_group', 'STATUS_ST')->where('com_cd', '!=', 'STATUS_ST_01')->get()->toArray();
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

        //cek data pegawai / jenis cuti / tanggal
        $pegawai = User::find($this->form['user_id']);
        $jenisCuti = ComCode::where('com_cd', $this->form['cuti_tp'])->first();
        $direktur = User::where('tingkat_pekerjaan_sekarang_id', '2')->where('status', '1')->get();


        if ($this->form['tgl_mulai'] == $this->form['tgl_selesai']) {
            $tanggal = Carbon::createFromFormat('Y-m-d', $this->form['tgl_mulai'])->isoFormat('D MMMM Y');
        } else {
            $tanggal = Carbon::createFromFormat('Y-m-d', $this->form['tgl_mulai'])->isoFormat('D MMMM ') . ' - ' . Carbon::createFromFormat('Y-m-d', $this->form['tgl_selesai'])->isoFormat('D MMMM Y');
        }

        //jika salah satu direktur menolak
        if ($this->persetujuanDirektur == 'STATUS_ST_03') {
            ModelsCuti::find($this->idHapus)->update([
                'status_st' => $this->persetujuanDirektur,
                'keterangan_direktur' => $this->form['keterangan_direktur']
            ]);

            $pesan = '*Notifikasi Pengajuan Cuti*' . urldecode('%0D%0A%0D%0A') .
                'Nama : ' . $pegawai->name . urldecode('%0D%0A') .
                'Jenis Cuti : ' . $jenisCuti->code_nm . urldecode('%0D%0A') .
                'Tanggal : ' . $tanggal . urldecode('%0D%0A%0D%0A') .
                '*DITOLAK*' . urldecode('%0D%0A') .
                ($this->form['keterangan_direktur']);
            ;

            //kirim pesan ke pegawai
            kirimPesan::dispatch($pegawai->telpon, $pesan);

            //kirim WA ke direktur
            foreach ($direktur as $item) {
                kirimPesan::dispatch($item->telpon, $pesan);
            }

        }

        //jika minimal 2 direktur setuju maka pengajuan cuti disetujui
        $cek = $this->cekTL = PersetujuanCuti::where('cuti_id', $this->idHapus)->where('status_st', 'STATUS_ST_02')->count();
        if ($cek >= 2) {
            ModelsCuti::find($this->idHapus)->update([
                'status_st' => 'STATUS_ST_02'
            ]);


            $pesan = '*Notifikasi Pengajuan Cuti*' . urldecode('%0D%0A%0D%0A') .
                'Nama : ' . $pegawai->name . urldecode('%0D%0A') .
                'Jenis Cuti : ' . $jenisCuti->code_nm . urldecode('%0D%0A') .
                'Tanggal : ' . $tanggal . urldecode('%0D%0A%0D%0A') .
                '*DISETUJUI*';
            ;

            //kirim pesan ke pegawai
            kirimPesan::dispatch($pegawai->telpon, $pesan);

            //kirim WA ke direktur
            foreach ($direktur as $item) {
                kirimPesan::dispatch($item->telpon, $pesan);
            }
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

    public function updated($property)
    {
        if ($property === 'persetujuanDirektur') {
            if ($this->persetujuanDirektur == 'STATUS_ST_03') {
                $this->tampilKeterangan = true;
            } else {
                $this->form['keterangan_direktur'] == null;
                $this->tampilKeterangan = false;
            }
        }
    }

    public function delete($id)
    {
        $this->idHapus = $id;
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Apakah Anda yakin?',
                text: "Apakah kamu ingin menghapus data ini? proses ini tidak dapat dikembalikan.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
                $wire.hapus()
            }
          })
        JS);
    }

    public function hapus()
    {
        ModelsCuti::destroy($this->idHapus);
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);
    }


    public function render()
    {

        // $kuotaCutiTahunan = '';
        // $kuotaCutiTanpaSuratDokter = '';

        $kuota_cuti_tahunan = '';
        $kuota_cuti_tanpa_surat_dokter = '';

        //menghitung jumlah hari 
        $tampung = '';
        $a = '';

        $data = ModelsCuti::cari($this->cari);
        //filter berdasarkan jenis pengumpulan
        if ($this->idnya) {

            $data->where('user_id', $this->idnya);

            // Hitung jumlah cuti tahunan
            $cekCutiSatuHari = ModelsCuti::where('status_st', 'STATUS_ST_02')
                ->where('cuti_tp', 'CUTI_TP_01')
                ->whereYear('tgl_mulai', date('Y'))
                ->where('user_id', $this->idnya)
                ->whereColumn('tgl_mulai', 'tgl_selesai')
                ->count();

            $cekCutiLebihDariSatuHari = ModelsCuti::where('status_st', 'STATUS_ST_02')
                ->where('cuti_tp', 'CUTI_TP_01')
                ->whereYear('tgl_mulai', date('Y'))
                ->where('user_id', $this->idnya)
                ->whereColumn('tgl_mulai', '!=', 'tgl_selesai')
                ->get();

            foreach ($cekCutiLebihDariSatuHari as $item) {
                $tgl_mulai = Carbon::parse($item->tgl_mulai);
                $tgl_selesai = Carbon::parse($item->tgl_selesai);

                $a = $tgl_selesai->diffInDays($tgl_mulai);
                $a = $a + 1;
                $tampung = (int) $tampung + $a;
            }

            $jml_cuti_tahunan = (int) $tampung + (int) $cekCutiSatuHari;

            $jml_cuti_tanpa_surat_dokter = ModelsCuti::where('user_id', $this->idnya)
                ->whereYear('tgl_mulai', date('Y'))
                ->where('cuti_tp', 'CUTI_TP_03')
                ->where('status_st', 'STATUS_ST_02')
                ->count();

            $user = User::find($this->idnya);

            //jika partimer kuota 6
            if ($user->status_pekerjaan_id == 2) {
                $kuota_cuti_tahunan = $this->kuotaPegawaiPartimer - $jml_cuti_tahunan;
            } else {
                $kuota_cuti_tahunan = $this->kuotaPegawaiTetap - $jml_cuti_tahunan;
            }

            $kuota_cuti_tanpa_surat_dokter = 3 - $jml_cuti_tanpa_surat_dokter;

        }

        $data = $data->orderBy('created_at', 'desc')->paginate(10);


        return view('livewire.master.cuti', [
            'post' => $data,
            'pegawai' => $this->ambilPegawai(),
            'kuotaCutiTahunan' => $kuota_cuti_tahunan,
            'kuotaCutiTanpaSuratDokter' => $kuota_cuti_tanpa_surat_dokter,
        ]);
    }
}
