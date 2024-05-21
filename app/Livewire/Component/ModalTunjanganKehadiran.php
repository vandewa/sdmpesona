<?php

namespace App\Livewire\Component;

use App\Models\TunjanganKehadiran;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ModalTunjanganKehadiran extends Component
{
    use WithPagination;
    public $search;
    public $modal = false;
    public $asal;


    #[On('show-modal-tunjangan-kehadiran')]
    public function showModal($isian = "")
    {
        $this->asal = $isian;
        $this->modal = !$this->modal;
        $this->search = null;
        $this->dispatch('autofocus', id: 'search-diagnosa');
    }
    public function render()
    {
        $data = TunjanganKehadiran::paginate(10);

        return view('livewire.component.modal-tunjangan-kehadiran', [
            'posts' => $data
        ]);
    }
}
