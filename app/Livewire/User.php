<?php

namespace App\Livewire;

use App\Models\ComCode;
use App\Models\NamaJabatan;
use Livewire\Component;
use App\Models\Role;
use App\Models\StatusPekerjaan;
use App\Models\TingkatPekerjaan;
use App\Models\User as ModelsUser;
use Illuminate\Support\Arr;

class User extends Component
{

    public $role, $listRole, $konfirmasi_password, $idHapus, $edit = false, $user, $listStatusPekerjaan, $listNamaJabatan, $listTingkatPekerjaanAwal, $listKawin;

    public $form = [
        'name' => null,
        'npwp' => null,
        'ktp' => null,
        'id_karyawan' => null,
        'jk' => null,
        'status' => null,
        'status_pekerjaan_id' => null,
        'nama_jabatan_id' => null,
        'tingkat_pekerjaan_awal_id' => null,
        'nama_jabatan_sekarang_id' => null,
        'tingkat_pekerjaan_sekarang_id' => null,
        'tgl_lahir' => null,
        'tgl_masuk' => null,
        'tgl_keluar' => null,
        'tgl_penetapan_gapok_awal' => null,
        'tgl_penetapan_jabatan_awal' => null,
        'gapok_awal' => null,
        'gapok_sekarang' => null,
        'telpon' => null,
        'alamat' => null,
        'kawin_tp' => null,
        'anak' => null,
        'bank' => null,
        'rekening' => null,
        'email' => null,
        'password' => null,
    ];


    public function mount($id = '')
    {
        if ($id) {
            $user = ModelsUser::find($id)->toArray();
            $user = Arr::except($user, ['created_at', 'updated_at']);
            $data = ModelsUser::find($id);

            $this->form = $user;
            $this->role = $data->roles()->first()->id ?? null;
            $this->edit = true;
            $this->user = $id;
            $this->listRole = $this->ambilRole();
            $this->listStatusPekerjaan = StatusPekerjaan::all();
            $this->listNamaJabatan = $this->ambilNamaJabatan();
            $this->listTingkatPekerjaanAwal = $this->ambilTingkatPekerjaanAwal();
            $this->listKawin = $this->ambilKawin();
        }



    }

    public function ambilRole()
    {
        return Role::all()->toArray();
    }

    public function ambilKawin()
    {
        return ComCode::where('code_group', 'KAWIN_TP')->get()->toArray();
    }

    public function ambilStatusPekerjaan()
    {
        return StatusPekerjaan::all()->toArray();
    }

    public function ambilNamaJabatan()
    {
        return NamaJabatan::all()->toArray();
    }

    public function ambilTingkatPekerjaanAwal()
    {
        return TingkatPekerjaan::all()->toArray();
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

        return redirect(route('master.user-index'));
    }

    public function store()
    {
        $this->validate([
            'konfirmasi_password' => 'required|same:form.password',
            'form.password' => 'required',
            'form.name' => 'required',
            'form.email' => 'required|unique:users,email',
            'role' => 'required',
        ]);

        $this->form['password'] = bcrypt($this->form['password']);
        $a = ModelsUser::create($this->form);
        $a->addrole($this->role);
    }

    public function storeUpdate()
    {
        $this->validate([
            'konfirmasi_password' => 'same:form.password',
            'form.name' => 'required',
            'form.email' => 'required|email|unique:users,email,' . $this->user,
            'role' => 'required',
            'tgl_penetapan_jabatan_awal' => 'required',
            'tgl_penetapan_gapok_awal' => 'required',
        ]);

        if ($this->form['password'] ?? "") {
            $this->form['password'] = bcrypt($this->form['password']);
        }

        ModelsUser::find($this->user)->update($this->form);
        $a = ModelsUser::find($this->user);
        $a->syncRoles([$this->role]);
        $this->reset();
        $this->edit = false;

    }


    public function render()
    {
        return view('livewire.user', [
            'listRole' => $this->ambilRole(),
            // 'listStatusPekerjaan' => $this->ambilStatusPekerjaan(),
            // 'listNamaJabatan' => $this->ambilNamaJabatan(),
            // 'listTingkatPekerjaanAwal' => $this->ambilTingkatPekerjaanAwal(),
            // 'listKawin' => $this->ambilKawin(),
        ]);
    }
}
