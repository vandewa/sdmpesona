<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\ComCode;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\TunjanganPendidikan;
use Illuminate\Support\Facades\Hash;
use App\Models\Kategori as ModelsKategori;

class Profil extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $idHapus, $edit = false, $idnya, $cari, $listKawin, $listPendidikan, $password, $password_confirmation;
    public $photo;

    public $jabatan, $idKaryawan, $status, $nama, $check = false;

    public $form = [
        'name' => null,
        'ktp' => null,
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
        'path_foto' => null,
    ];

    public function mount()
    {
        $data = User::with(['jabatan', 'statusnya', 'tingkat'])->find(auth()->user()->id)->only('id', 'name', 'ktp', 'npwp', 'jk', 'tgl_lahir', 'email', 'alamat', 'telpon', 'kawin_tp', 'anak', 'tunjangan_pendidikan_id', 'bank', 'rekening', 'path_foto');

        $user = User::with(['jabatan', 'statusnya', 'tingkat'])->find(auth()->user()->id);

        $this->idnya = $user->id;
        $this->idKaryawan = $user->id_karyawan ?? "";
        $this->jabatan = $user->jabatan->nama ?? '';
        $this->status = $user->tingkat->nama ?? "";
        $this->form = $data;
        $this->listKawin = ComCode::where('code_group', 'KAWIN_TP')->get()->toArray();
        $this->listPendidikan = TunjanganPendidikan::get()->toArray();
    }


    public function save()
    {
        $this->validate([
            'form.name' => 'required',
            'form.ktp' => 'required',
            'form.jk' => 'required',
            'form.tgl_lahir' => 'required',
            'form.email' => 'required|email|unique:users,email,' . $this->idnya,
            'form.alamat' => 'required',
            'form.telpon' => 'required',
            'form.kawin_tp' => 'required',
            'form.anak' => 'required',
            'form.tunjangan_pendidikan_id' => 'required',
        ]);


        if ($this->photo) {
            $foto = $this->photo->store('sdmpesona/foto', 'gcs');
            $this->form['path_foto'] = $foto;
        }

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
          }).then((result) => {
            if (result.isConfirmed) {
                $wire.kembali()
            }
          })
        JS);
    }

    public function kembali()
    {
        return redirect(route('profil'));
    }

    public function render()
    {
        $data = User::cari($this->cari)->paginate(20);

        return view('livewire.profil', [
            'post' => $data,
        ]);
    }
}
