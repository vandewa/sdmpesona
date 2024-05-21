<?php

namespace App\Livewire\Component;

use App\Models\TunjanganKehadiran;
use App\Models\TunjanganKpiPartimer;
use App\Models\TunjanganKpiPelaksanaDivisi;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ModalTunjanganKpi extends Component
{
    use WithPagination;
    public $search;
    public $modal = false;
    public $asal;


    #[On('show-modal-tunjangan-kpi')]
    public function showModal($isian = "")
    {
        $this->asal = $isian;
        $this->modal = !$this->modal;
        $this->search = null;
        $this->dispatch('autofocus', id: 'search-diagnosa');
    }
    public function render()
    {
        $data = TunjanganKpiPelaksanaDivisi::get();
        $data2 = TunjanganKpiPartimer::get();

        return view('livewire.component.modal-tunjangan-kpi', [
            'posts' => $data,
            'posts2' => $data2,
        ]);
    }
}
