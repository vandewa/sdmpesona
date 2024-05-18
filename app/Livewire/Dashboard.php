<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Models\Pemeliharaan;
use Livewire\Component;

class Dashboard extends Component
{

    public $startDate;
    public $endDate;
    public $data;

    public function mount()
    {
        // 
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
