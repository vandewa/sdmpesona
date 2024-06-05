<?php

namespace App\Livewire;

use App\Jobs\kirimPesan;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ComCode;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use App\Models\PersetujuanCuti;
use App\Models\CutiAlasanPenting;
use App\Models\Cuti as ModelsCuti;

class PengajuanCuti extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari, $listJenisCuti, $listStatus, $listCutiAlasanPenting, $jenisCutiAlasanPenting = false, $cekTL = false;

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
        $this->form['tgl_mulai'] = date('Y-m-d');
        $this->form['tgl_selesai'] = date('Y-m-d');
        $this->form['user_id'] = auth()->user()->id;
    }

    public function ambilJenisCuti()
    {
        return ComCode::where('code_group', 'CUTI_TP')->get()->toArray();
    }

    public function ambilStatus()
    {
        return ComCode::where('code_group', 'STATUS_ST')->get()->toArray();
    }

    public function ambilCutiAlasanPenting()
    {
        return CutiAlasanPenting::get()->toArray();
    }


    public function save()
    {
        $selesai = Carbon::parse($this->form['tgl_selesai']);
        $mulai = Carbon::parse($this->form['tgl_mulai']);

        $cekJmlHari = $mulai->diffInDays($selesai);

        if ($cekJmlHari) {
            $this->js(<<<'JS'
            Swal.fire({
                icon: "error",
                title: "Maaf",
                text: "Maksimal Pengajuan Cuti 4 Hari!",
                confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $wire.kembali()
                    }
                })
            JS);
        }


        $this->form['status_st'] = 'STATUS_ST_01';

        $this->validate([
            'form.cuti_tp' => 'required',
            'form.tgl_mulai' => 'required|date|after_or_equal:today',
            'form.tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'form.keterangan' => 'required',
        ]);

        if ($this->form['cuti_tp'] == 'CUTI_TP_04') {
            $this->validate([
                'form.cuti_alasan_penting_id' => 'required',
            ]);
        } else {
            $this->validate([
                'form.partner_delegasi' => 'required',
                'form.nomor_partner' => 'required',
                'form.alamat' => 'required',
            ]);
        }


        ModelsCuti::create($this->form);

        $direktur = User::where('tingkat_pekerjaan_sekarang_id', '2')->where('status', '1')->get();
        $pegawai = User::find($this->form['user_id']);
        $jenisCuti = ComCode::where('com_cd', $this->form['cuti_tp'])->first();

        if ($this->form['tgl_mulai'] == $this->form['tgl_selesai']) {
            $tanggal = Carbon::createFromFormat('Y-m-d', $this->form['tgl_mulai'])->isoFormat('D MMMM Y');
        } else {
            $tanggal = Carbon::createFromFormat('Y-m-d', $this->form['tgl_mulai'])->isoFormat('D MMMM ') . ' - ' . Carbon::createFromFormat('Y-m-d', $this->form['tgl_selesai'])->isoFormat('D MMMM Y');
        }

        $pesan = '*Notifikasi Pengajuan Cuti*' . urldecode('%0D%0A%0D%0A') .
            'Nama : ' . $pegawai->name ?? '' . urldecode('%0D%0A') .
            'Jenis Cuti : ' . $jenisCuti->code_nm . urldecode('%0D%0A') .
            'Tanggal : ' . $tanggal . urldecode('%0D%0A%0D%0A') .
            'Silahkan untuk menindaklajuti, klik pada halaman berikut' . urldecode('%0D%0A') .
            url('/cuti')
        ;

        //kirim WA ke direktur
        foreach ($direktur as $item) {
            kirimPesan::dispatch($item->telpon, $pesan);
        }

        $this->reset();

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Berhasil!',
            text: 'Pengajuan cuti telah dikirim!',
            icon: 'success',
          })
        JS);
    }

    public function kembali()
    {
        return redirect(route('pengajuan-cuti'));
    }


    public function updated($property)
    {
        //jika klik jenis cuti
        if ($property === 'form.cuti_tp') {

            // Hitung jumlah cuti yang telah diambil pada tahun dan bulan yang diberikan
            $cekCutiSatuHari = ModelsCuti::where('status_st', 'STATUS_ST_02')
                ->where('cuti_tp', 'CUTI_TP_01')
                ->whereYear('tgl_mulai', date('Y'))
                ->where('user_id', $this->form['user_id'])
                ->whereColumn('tgl_mulai', 'tgl_selesai')
                ->count();

            $cekCutiLebihDariSatuHari = ModelsCuti::where('status_st', 'STATUS_ST_02')
                ->where('cuti_tp', 'CUTI_TP_01')
                ->whereYear('tgl_mulai', date('Y'))
                ->where('user_id', $this->form['user_id'])
                ->whereColumn('tgl_mulai', '!=', 'tgl_selesai')
                ->get();

            //menghitung jumlah hari 
            $tampung = '';
            $a = '';
            foreach ($cekCutiLebihDariSatuHari as $item) {
                $tgl_mulai = Carbon::parse($item->tgl_mulai);
                $tgl_selesai = Carbon::parse($item->tgl_selesai);

                $a = $tgl_selesai->diffInDays($tgl_mulai);
                $a = $a + 1;
                $tampung = (int) $tampung + $a;
            }

            $jumlahCuti = (int) $tampung + (int) $cekCutiSatuHari;

            //jika pegawai tetap bukan partimer
            if (auth()->user()->status_pekerjaan_id != 2) {

                // //cek cuti tahunan
                if ($this->form['cuti_tp'] == 'CUTI_TP_01') {

                    if ($jumlahCuti >= 12) {
                        $this->js(<<<'JS'
                    Swal.fire({
                        icon: "error",
                        title: "Maaf",
                        text: "Kuota Cuti Tahunan Telah Habis!",
                        confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $wire.kembali()
                            }
                        })
                    JS);
                    }

                    //cek bulan ini sudah ada pengajuan cuti belum
                    $cekCutiBulanIni = ModelsCuti::whereMonth('tgl_mulai', date('m'))->where('status_st', 'STATUS_ST_02')->where('cuti_tp', 'CUTI_TP_01')->count();

                    //maksimal cuti 1 bulan sekali
                    if ($cekCutiBulanIni >= 1) {
                        $this->js(<<<'JS'
                        Swal.fire({
                            icon: "error",
                            title: "Maaf",
                            text: "Cuti Tahunan Hanya Bisa Dilakukan 1 Bulan Sekali!",
                            confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $wire.kembali()
                                }
                            })
                        JS);
                    }
                }

                // // Hitung jumlah cuti yang telah diambil pada tahun dan bulan yang diberikan
                // $terakhirCuti = ModelsCuti::where('status_st', 'STATUS_ST_02')
                //     ->where('cuti_tp', 'CUTI_TP_01')
                //     ->whereYear('tgl_mulai', date('Y'))
                //     ->orderBy('tgl_mulai', 'desc')
                //     ->first();

                // $terakhirCuti = Carbon::parse($terakhirCuti->tgl_mulai);
                // $diff = $terakhirCuti->diffInMonths(date('Y-m-d'));

            } else {
                //pegawai partimer
                if ($jumlahCuti >= 6) {
                    $this->js(<<<'JS'
                    Swal.fire({
                        icon: "error",
                        title: "Maaf",
                        text: "Kuota Cuti Tahunan Telah Habis!",
                        confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $wire.kembali()
                            }
                        })
                    JS);
                }
            }

            //cek cuti tanpa surat dokter
            if ($this->form['cuti_tp'] == 'CUTI_TP_03') {
                $cek = ModelsCuti::where('status_st', 'STATUS_ST_02')->where('cuti_tp', 'CUTI_TP_03')->count();

                if ($cek >= 3) {
                    $this->js(<<<'JS'
                    Swal.fire({
                        icon: "error",
                        title: "Maaf",
                        text: "Kuota Cuti Tanpa Surat Dokter Telah Habis!",
                        confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $wire.kembali()
                            }
                        })
                    JS);
                }
            }

            //cek cuti dengan alasan penting
            if ($this->form['cuti_tp'] == 'CUTI_TP_04') {
                $this->form['partner_delegasi'] = null;
                $this->form['nomor_partner'] = null;
                $this->form['alamat'] = null;

            } else {
                $this->form['cuti_alasan_penting_id'] = null;
            }

        }
    }


    public function render()
    {

        $data = ModelsCuti::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);


        // Hitung jumlah cuti tahunan
        $cekCutiSatuHari = ModelsCuti::where('status_st', 'STATUS_ST_02')
            ->where('cuti_tp', 'CUTI_TP_01')
            ->whereYear('tgl_mulai', date('Y'))
            ->where('user_id', $this->form['user_id'])
            ->whereColumn('tgl_mulai', 'tgl_selesai')
            ->count();

        $cekCutiLebihDariSatuHari = ModelsCuti::where('status_st', 'STATUS_ST_02')
            ->where('cuti_tp', 'CUTI_TP_01')
            ->whereYear('tgl_mulai', date('Y'))
            ->where('user_id', $this->form['user_id'])
            ->whereColumn('tgl_mulai', '!=', 'tgl_selesai')
            ->get();

        //menghitung jumlah hari 
        $tampung = '';
        $a = '';
        foreach ($cekCutiLebihDariSatuHari as $item) {
            $tgl_mulai = Carbon::parse($item->tgl_mulai);
            $tgl_selesai = Carbon::parse($item->tgl_selesai);

            $a = $tgl_selesai->diffInDays($tgl_mulai);
            $a = $a + 1;
            $tampung = (int) $tampung + $a;
        }

        $jml_cuti_tahunan = (int) $tampung + (int) $cekCutiSatuHari;

        $jml_cuti_tanpa_surat_dokter = ModelsCuti::where('user_id', auth()->user()->id)
            ->whereYear('tgl_mulai', date('Y'))
            ->where('cuti_tp', 'CUTI_TP_03')
            ->where('status_st', 'STATUS_ST_02')
            ->count();

        //jika partimer kuota 6
        if (auth()->user()->status_pekerjaan_id == 2) {
            $kuota_cuti_tahunan = 6 - $jml_cuti_tahunan;
        } else {
            $kuota_cuti_tahunan = 12 - $jml_cuti_tahunan;
        }

        $kuota_cuti_tanpa_surat_dokter = 3 - $jml_cuti_tanpa_surat_dokter;

        return view('livewire.pengajuan-cuti', [
            'post' => $data,
            'kuota_cuti_tahunan' => $kuota_cuti_tahunan,
            'kuota_cuti_tanpa_surat_dokter' => $kuota_cuti_tanpa_surat_dokter
        ]);
    }
}
