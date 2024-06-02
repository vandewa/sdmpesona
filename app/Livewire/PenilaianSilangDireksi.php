<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Jobs\kirimPesan;
use Livewire\WithPagination;
use App\Models\PenilaianSilangDireksi as ModelsPenilaianSilangDireksi;

class PenilaianSilangDireksi extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari, $listSubjectPenilai;

    public $form = [
        'user_id' => null,
        'penilai' => null,
        'tgl' => null,
        'penilaian_kualitatif' => null,
        'jobdesk' => null,
        'inovasi' => null,
        'kedisiplinan' => null,
    ];

    public function mount()
    {
        $this->form['penilai'] = auth()->user()->id;
        $this->form['tgl'] = date('Y-m-d');
        $this->listSubjectPenilai = $this->ambilSubjectPenilai();
    }

    public function ambilSubjectPenilai()
    {
        return User::where('tingkat_pekerjaan_sekarang_id', 2)->where('status', 1)->where('id', '!=', auth()->user()->id)->get()->toArray();
    }

    public function getEdit($a)
    {
        $this->form = ModelsPenilaianSilangDireksi::find($a)->toArray();
        $this->idHapus = $a;
        $this->edit = true;
    }

    public function save()
    {
        if ($this->edit) {
            $this->storeUpdate();
        } else {
            $this->store();
        }

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
            confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.kembali()
                }
            })
        JS);
    }

    public function store()
    {
        $this->validate([
            'form.user_id' => 'required',
            'form.tgl' => 'required',
            'form.penilaian_kualitatif' => 'required',
            'form.jobdesk' => 'required',
            'form.inovasi' => 'required',
            'form.kedisiplinan' => 'required',
        ]);

        ModelsPenilaianSilangDireksi::create($this->form);

        $carbonDate = Carbon::parse($this->form['tgl']);
        $bulan = $carbonDate->format('m');
        $tahun = $carbonDate->format('Y');

        $cek = ModelsPenilaianSilangDireksi::whereMonth('tgl', $bulan)->whereYear('tgl', $tahun)->count();

        //jika sudah lengkap direksi saling menilai
        if ($cek == 6) {
            $ketua_dewas = User::where('status', 1)->whereHasRole(['ketua'])->first();
            $dewas = User::where('nama_jabatan_sekarang_id', 11)->where('status', 1)->get();

            $pesan = '*Notifikasi KPI Penilaian Direksi*' . urldecode('%0D%0A%0D%0A') .
                'Yth. Dewan Pengawas,' . urldecode('%0D%0A%0D%0A') .
                'Kami telah menyelesaikan laporan KPI bulan ini dan memohon kesediaan Dewan untuk memvalidasi hasilnya pada link dibawah ini:' . urldecode('%0D%0A') . url('kpi-penilaian-index') . urldecode('%0D%0A%0D%0A') .
                'Terima Kasih';

            foreach ($dewas as $item) {
                // //kirim pesan ke anggota dewas
                kirimPesan::dispatch($item->telpon, $pesan);
            }

            // //kirim pesan ke ketua dewas
            kirimPesan::dispatch($ketua_dewas->telpon, $pesan);
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
        ModelsPenilaianSilangDireksi::destroy($this->idHapus);
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);
    }

    public function storeUpdate()
    {
        ModelsPenilaianSilangDireksi::find($this->idHapus)->update($this->form);
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->reset();
    }

    public function kembali()
    {
        return redirect(route('penilaian-silang'));
    }

    public function updated($property)
    {
        if ($property === 'form.user_id') {
            $cek = ModelsPenilaianSilangDireksi::where('user_id', $this->form['user_id'])->where('penilai', $this->form['penilai'])->whereMonth('tgl', date('m'))->whereYear('tgl', date('Y'))->first();
            if ($cek) {
                $this->js(<<<'JS'
                Swal.fire({
                    icon: "error",
                    title: "Maaf",
                    text: "Anda telah menilai direksi tersebut di bulan ini!",
                    confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $wire.kembali()
                        }
                    })
                JS);
            }

        }
    }

    public function render()
    {
        $data = ModelsPenilaianSilangDireksi::where('penilai', auth()->user()->id)->paginate(20);

        return view('livewire.penilaian-silang-direksi', [
            'post' => $data,
            'listSubjectPenilai' => $this->ambilSubjectPenilai(),
        ]);
    }
}
