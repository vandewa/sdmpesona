<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kendaraan;
use Livewire\WithPagination;
use App\Models\Kegiatan as ModelsKegiatan;

class Kegiatan extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari;

    public $form = [
        'tgl' => null,
        'nama' => null,
        'lokasi' => null,
        'kendaraan_id' => null,
        'anggaran' => null,
        'keterangan' => null,
    ];

    public function mount()
    {
        $this->ambilKendaraan();
    }

    public function ambilKendaraan()
    {
        return Kendaraan::all()->toArray();
    }

    public function getEdit($a)
    {
        $this->form = ModelsKegiatan::find($a)->toArray();
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
    }

    public function store()
    {
        ModelsKegiatan::create($this->form);
        $this->reset();
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
        ModelsKegiatan::destroy($this->idHapus);
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
        ModelsKegiatan::find($this->idHapus)->update($this->form);
        $this->reset();
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->reset();
    }

    public function render()
    {
        $data = ModelsKegiatan::with(['kendaraan'])->cari($this->cari)->paginate(10);

        return view('livewire.kegiatan', [
            'post' => $data,
            'listKendaraan' => $this->ambilKendaraan()
        ]);
    }
}
