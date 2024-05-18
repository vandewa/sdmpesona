<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PerubahanGaji as ModelsPerubahanGaji;

class PerubahanGaji extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari, $display = false;

    public $form = [
        'user_id' => null,
        'gapok_sebelum' => null,
        'gapok_baru' => null,
        'tgl_gaji_baru' => null,
        'tgl_gaji_lama' => null,
    ];

    public function mount()
    {
        $this->ambilPegawai();
        $this->form['tgl_gaji_baru'] = date('Y-m-d');
    }

    public function ambilPegawai()
    {
        return User::where('status', 1)->whereHas('jabatan')->get();
    }

    public function getEdit($a)
    {
        $this->form = ModelsPerubahanGaji::find($a)->only(['user_id', 'gapok_sebelum', 'gapok_baru', 'tgl_gaji_baru', 'tgl_gaji_lama']);
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
        $this->idnya = $this->form['user_id'];

        ModelsPerubahanGaji::create($this->form);
        User::find($this->idnya)->update([
            'gapok_sekarang' => $this->form['gapok_baru']
        ]);
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
        ModelsPerubahanGaji::destroy($this->idHapus);
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
        ModelsPerubahanGaji::find($this->idHapus)->update($this->form);

        $cek = User::where('gapok_sekarang', '!=', $this->form['gapok_baru'])->first();

        if ($cek) {
            $cek->update([
                'gapok_sekarang' => $this->form['gapok_baru']
            ]);
        }

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
                $cek = ModelsPerubahanGaji::where('user_id', $this->form['user_id'])->orderBy('created_at', 'desc')->first();
                if ($cek) {
                    $this->form['gapok_sebelum'] = $cek->gapok_baru;
                    $this->form['tgl_gaji_lama'] = $cek->tgl_gaji_baru;
                } else {
                    $a = User::find($this->form['user_id']);
                    $this->form['gapok_sebelum'] = $a->gapok_awal;
                    $this->form['tgl_gaji_lama'] = $a->tgl_penetapan_gapok_awal;
                }

            } else {
                $this->display = false;
            }
        }
    }

    public function render()
    {
        $data = ModelsPerubahanGaji::cari($this->cari)->orderBy('tgl_gaji_baru', 'desc')->paginate(20);

        return view('livewire.perubahan-gaji', [
            'post' => $data,
            'listPegawai' => $this->ambilPegawai()
        ]);
    }
}
