<?php

namespace App\Livewire;

use App\Models\NamaJabatan;
use App\Models\PerubahanJabatan as ModelsPerubahanJabatan;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TingkatPekerjaan;

class PerubahanJabatan extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari, $display = false, $namaJabatan, $tingkatPekerjaan, $tanggalUpdate;

    public $form = [
        'user_id' => null,
        'nama_jabatan_lama' => null,
        'tingkat_pekerjaan_lama' => null,
        'tgl_update_jabatan_lama' => null,
        'tgl_update_jabatan_baru' => null,
        'nama_jabatan_id' => null,
        'tingkat_pekerjaan_id' => null,
    ];

    public function mount()
    {
        $this->ambilPegawai();
        $this->form['tgl_update_jabatan_baru'] = date('Y-m-d');
    }

    public function ambilPegawai()
    {
        return User::where('status', 1)->whereHas('jabatan')->get();
    }

    public function ambilNamaJabatan()
    {
        return NamaJabatan::all();
    }
    public function ambilTingkatPekerjaan()
    {
        return TingkatPekerjaan::all();
    }

    public function getEdit($a)
    {
        $this->form = ModelsPerubahanJabatan::find($a)->only(['user_id', 'nama_jabatan_lama', 'tingkat_pekerjaan_lama', 'tgl_update_jabatan_lama', 'tgl_update_jabatan_baru', 'nama_jabatan_id', 'tingkat_pekerjaan_id']);

        $cek = ModelsPerubahanJabatan::where('id', $a)->first();
        $this->namaJabatan = $cek->jabatan->nama;
        $this->tingkatPekerjaan = $cek->tingkat->nama;

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
          })
        JS);

        $this->reset();

    }

    public function store()
    {
        ModelsPerubahanJabatan::create($this->form);
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
        ModelsPerubahanJabatan::destroy($this->idHapus);
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
        ModelsPerubahanJabatan::find($this->idHapus)->update($this->form);
        $this->reset();
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->reset();
    }

    public function updated($property)
    {
        if ($property === 'form.user_id') {
            if ($this->form['user_id'] != '') {
                $this->display = true;
                $cek = ModelsPerubahanJabatan::where('user_id', $this->form['user_id'])->orderBy('created_at', 'desc')->first();
                if ($cek) {
                    $this->form['nama_jabatan_lama'] = $cek->nama_jabatan_id;
                    $this->form['tingkat_pekerjaan_lama'] = $cek->tingkat_pekerjaan_id;
                    $this->form['tgl_update_jabatan_lama'] = $cek->tgl_update_jabatan_baru;
                } else {
                    $a = User::find($this->form['user_id']);
                    $this->form['nama_jabatan_lama'] = $a->nama_jabatan_id;
                    $this->namaJabatan = $a->jabatan->nama;
                    $this->form['tingkat_pekerjaan_lama'] = $a->tingkat_pekerjaan_awal_id;
                    $this->tingkatPekerjaan = $a->tingkat->nama;
                    $this->tanggalUpdate = $a->tgl_penetapan_jabatan_awal;
                }

            } else {
                $this->display = false;
            }
        }
    }

    public function render()
    {
        $data = ModelsPerubahanJabatan::cari($this->cari)->orderBy('tgl_update_jabatan_baru', 'desc')->paginate(20);

        return view('livewire.perubahan-jabatan', [
            'post' => $data,
            'listPegawai' => $this->ambilPegawai(),
            'listNamaJabatan' => $this->ambilNamaJabatan(),
            'listTingkatPekerjaan' => $this->ambilTingkatPekerjaan(),
        ]);
    }
}
