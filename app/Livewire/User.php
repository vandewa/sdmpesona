<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\ComCode;
use Livewire\Component;
use App\Models\NamaJabatan;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use App\Models\StatusPekerjaan;
use App\Models\TingkatPekerjaan;
use App\Models\TunjanganMasaKerja;
use App\Models\User as ModelsUser;
use App\Models\TunjanganPendidikan;

class User extends Component
{

    public $role, $listRole, $konfirmasi_password, $idHapus, $edit = false, $user, $listStatusPekerjaan, $listNamaJabatan, $listTingkatPekerjaanAwal, $listKawin, $listPendidikan, $listMasaKerja, $masaKerja, $check = false, $photo;

    use WithFileUploads;

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
        'tunjangan_pendidikan_id' => null,
        'tunjangan_masa_kerja_id' => null,
        'path_tanda_tangan' => null,
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
            if ($this->form['tgl_masuk']) {
                $this->masaKerja = Carbon::now()->diffInYears($this->form['tgl_masuk']);
            }

        }
        $this->listRole = $this->ambilRole();
        $this->listStatusPekerjaan = StatusPekerjaan::all();
        $this->listNamaJabatan = $this->ambilNamaJabatan();
        $this->listTingkatPekerjaanAwal = $this->ambilTingkatPekerjaanAwal();
        $this->listKawin = $this->ambilKawin();
        $this->listPendidikan = $this->ambilTunjanganPendidikan();
        $this->listMasaKerja = $this->ambilTunjanganMasaKerja();

    }

    public function ambilRole()
    {
        return Role::whereNotIn('id', ['1', '5'])->get()->toArray();
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

    public function ambilTunjanganPendidikan()
    {
        return TunjanganPendidikan::all()->toArray();
    }
    public function ambilTunjanganMasaKerja()
    {
        return TunjanganMasaKerja::all()->toArray();
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
            'form.tgl_penetapan_jabatan_awal' => 'required',
            'form.tgl_penetapan_gapok_awal' => 'required',
            'form.tunjangan_pendidikan_id' => 'required',
            'form.tgl_masuk' => 'required',
            'form.tunjangan_masa_kerja_id' => 'required',
        ]);

        $this->form['nama_jabatan_sekarang_id'] = $this->form['nama_jabatan_id'];
        $this->form['tingkat_pekerjaan_sekarang_id'] = $this->form['tingkat_pekerjaan_awal_id'];
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
            'form.tgl_penetapan_jabatan_awal' => 'required',
            'form.tgl_penetapan_gapok_awal' => 'required',
            'form.tunjangan_pendidikan_id' => 'required',
            'form.tgl_masuk' => 'required',
            'form.tunjangan_masa_kerja_id' => 'required',

        ]);

        if ($this->form['password'] ?? "") {
            $this->form['password'] = bcrypt($this->form['password']);
        }

        if ($this->photo) {
            $foto = $this->photo->store('public/foto', 'local');
            // $foto = $this->photo->store('sdmpesona/foto', 'gcs');

            $this->form['path_tanda_tangan'] = $foto;
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
        ]);
    }
}
