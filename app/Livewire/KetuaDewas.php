<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class KetuaDewas extends Component
{
    use WithFileUploads;

    public $photo, $edit = false, $idHapus;

    public $form = [
        'name' => null,
        'email' => null,
        'status' => null,
        'path_tanda_tangan' => null,
        'password' => null,
        'telpon' => null,
    ];

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

    public function getEdit($a)
    {
        $this->form = User::find($a)->only(['name', 'email', 'status', 'path_tanda_tangan', 'telpon']);
        $this->idHapus = $a;
        $this->edit = true;
    }

    public function store()
    {
        $this->validate([
            'form.name' => 'required',
            'form.email' => 'required|unique:users,email',
            'form.status' => 'required',
            'form.telpon' => 'required',
            'photo' => 'required',
        ]);

        $this->form['password'] = bcrypt('password');
        if ($this->photo) {
            $foto = $this->photo->store('public/foto', 'local');
            $this->form['path_tanda_tangan'] = $foto;
        }

        $a = User::create($this->form);
        $a->addrole(5);
    }

    public function storeUpdate()
    {
        if ($this->photo) {
            $foto = $this->photo->store('public/foto', 'local');

            User::find($this->idHapus)->update([
                'path_tanda_tangan' => $foto,
            ]);
        }

        User::find($this->idHapus)->update([
            'name' => $this->form['name'],
            'email' => $this->form['email'],
            'status' => $this->form['status'],
            'telpon' => $this->form['telpon'],
        ]);

        $this->edit = false;
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
        User::destroy($this->idHapus);
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
        $data = User::where('status', 1)->whereHasRole(['ketua'])->paginate(100);

        return view('livewire.ketua-dewas', [
            'posts' => $data
        ]);
    }
}
