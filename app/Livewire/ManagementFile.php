<?php

namespace App\Livewire;

use App\Models\File;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ManagementFile extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $idHapus, $edit = false, $idnya, $cari, $files;

    public $form = [
        'nama' => null,
        'tahun' => null,
        'kategori_id' => null,
        'path' => null,
    ];

    public function mount()
    {
        //
    }

    public function ambilKategori()
    {
        return Kategori::all();
    }

    public function getEdit($a)
    {
        $this->form = File::find($a)->only(['nama', 'tahun', 'kategori_id', 'path']);
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

        $this->form = [
            'nama' => null,
            'tahun' => null,
            'kategori_id' => null,
            'path' => null,
        ];

        $this->files = null;

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
        if ($this->files) {
            $foto = $this->files->store('sdmpesona/file', 'gcs');
            $this->form['path'] = $foto;
        }
        File::create($this->form);
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
        File::destroy($this->idHapus);
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
        if ($this->files) {
            $foto = $this->files->store('sdmpesona/file', 'gcs');
            $this->form['path'] = $foto;
        }
        File::find($this->idHapus)->update($this->form);
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->reset();
    }

    public function render()
    {
        $data = File::cari($this->cari);

        //filter berdasarkan jenis pengumpulan
        if ($this->idnya) {
            $data->where('kategori_id', $this->idnya);
        }

        $data = $data->orderBy('created_at', 'desc')->paginate(20);

        return view('livewire.management-file', [
            'post' => $data,
            'kategori' => $this->ambilKategori()
        ]);
    }
}
