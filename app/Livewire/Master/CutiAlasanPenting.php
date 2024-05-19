<?php

namespace App\Livewire\Master;

use App\Models\CutiAlasanPenting as ModelsCutiAlasanPenting;
use Livewire\Component;
use Livewire\WithPagination;

class CutiAlasanPenting extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari;

    public $form = [
        'nama' => null,
    ];

    public function mount()
    {
        //
    }

    public function getEdit($a)
    {
        $this->form = ModelsCutiAlasanPenting::find($a)->only(['nama']);
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

        $this->reset();

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
        ModelsCutiAlasanPenting::create($this->form);
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
        ModelsCutiAlasanPenting::destroy($this->idHapus);
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
        ModelsCutiAlasanPenting::find($this->idHapus)->update($this->form);
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->reset();
    }

    public function render()
    {
        $data = ModelsCutiAlasanPenting::cari($this->cari)->paginate(20);

        return view('livewire.master.cuti-alasan-penting', [
            'post' => $data,
        ]);
    }
}
