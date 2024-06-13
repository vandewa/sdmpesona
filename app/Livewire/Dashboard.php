<?php

namespace App\Livewire;

use App\Models\Gaji;
use App\Models\User;
use Livewire\Component;
use App\Models\Kendaraan;
use App\Models\Pemeliharaan;

class Dashboard extends Component
{

    public $startDate;
    public $endDate;
    public $data;

    public $laki, $perempuan, $total, $total_gaji;

    public function mount()
    {
        if (auth()->user()->hasRole(['superadmin', 'direktur'])) {
            $this->laki = User::where('jk', 'l')->where('status', '1')->count();
            $this->perempuan = User::where('jk', 'p')->where('status', '1')->count();
            $this->total = User::whereHas('jabatan')->where('status', '1')->count();

            $jml_diterima_gapok = Gaji::whereYear('tanggal_penggajian', date('Y'))->sum('jml_diterima_gapok');
            $jml_diterima_tunjangan = Gaji::whereYear('tanggal_penggajian', date('Y'))->sum('jml_diterima_tunjangan');
            $this->total_gaji = $jml_diterima_gapok + $jml_diterima_tunjangan;

        } elseif (auth()->user()->hasRole(['ketua'])) {
            return redirect(route('kpi-penilaian-index'));
        } else {
            return redirect(route('profil'));
        }

    }

    public function updated($property)
    {
        // 
    }


    public function render()
    {
        return view('livewire.dashboard');
    }
}
