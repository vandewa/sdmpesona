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
            $laki = User::where('jk', 'l')->count();
            $perempuan = User::where('jk', 'p')->count();
            $total = User::whereHas('jabatan')->where('status', '1')->count();

            $jml_diterima_gapok = Gaji::sum('jml_diterima_gapok');
            $jml_diterima_tunjangan = Gaji::sum('jml_diterima_tunjangan');
            $total_gaji = $jml_diterima_gapok + $jml_diterima_tunjangan;

            return view('dashboard.index', compact('laki', 'perempuan', 'total', 'total_gaji'));
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
