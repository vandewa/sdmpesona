<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\ComCode;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TunjanganPendidikan;
use Illuminate\Support\Facades\Hash;
use App\Models\Kategori as ModelsKategori;

class Profil extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari, $listKawin, $listPendidikan, $password, $password_confirmation;

    public $form = [
        'name' => null,
        'nik' => null,
        'npwp' => null,
        'jk' => null,
        'tgl_lahir' => null,
        'email' => null,
        'alamat' => null,
        'telpon' => null,
        'kawin_tp' => null,
        'anak' => null,
        'tunjangan_pendidikan_id' => null,
        'bank' => null,
        'rekening' => null,
    ];

    public function mount()
    {
        $data = User::with(['jabatan', 'statusnya'])->find(auth()->user()->id)->toArray();
        $this->idnya = $data['id'];
        $this->form = $data;
        $this->listKawin = ComCode::where('code_group', 'KAWIN_TP')->get()->toArray();
        $this->listPendidikan = TunjanganPendidikan::get()->toArray();
    }


    public function save()
    {
        $this->validate([
            'form.name' => 'required',
            'form.nik' => 'required',
            'form.jk' => 'required',
            'form.tgl_lahir' => 'required',
            'form.email' => 'required|unique:users,email',
            'form.alamat' => 'required',
            'form.telpon' => 'required',
            'form.kawin_tp' => 'required',
            'form.anak' => 'required',
            'form.tunjangan_pendidikan_id' => 'required',
        ]);

        User::find($this->idnya)->update($this->form);

        if ($this->password) {
            $this->validate([
                'password' => 'confirmed',
            ]);

            User::find($this->idnya)->update([
                'password' => Hash::make($this->password)
            ]);

        }

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
        $data = User::cari($this->cari)->paginate(20);

        return view('livewire.profil', [
            'post' => $data,
        ]);
    }
}
