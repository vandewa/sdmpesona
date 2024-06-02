<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class KpiPenilaianDireksiIndex extends Component
{

    use WithPagination;
    public $cari, $idHapus;

    public function render()
    {

        $data = DB::table('penilaian_silang_direksis')
            ->select(DB::raw('MIN(tgl) as tgl'))
            ->groupBy(DB::raw('YEAR(tgl), MONTH(tgl)'))
            ->orderBy('tgl', 'desc')
            ->paginate(20);

        return view('livewire.kpi-penilaian-direksi-index', [
            'posts' => $data
        ]);
    }
}
