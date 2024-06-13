<?php

namespace App\Livewire;

use App\Models\KuotaCutiTahunan as ModelsKuotaCutiTahunan;
use Livewire\Component;

class KuotaCutiTahunan extends Component
{
    public $form = [
        'jumlah' => null,
    ];
    public $form2 = [
        'jumlah' => null,
    ];

    public function mount()
    {
        $data = ModelsKuotaCutiTahunan::where('id', 1)->first()->toArray();
        $data2 = ModelsKuotaCutiTahunan::where('id', 2)->first()->toArray();
        $this->form = $data;
        $this->form2 = $data2;
    }

    public function save()
    {
        ModelsKuotaCutiTahunan::find(1)->update($this->form);
        ModelsKuotaCutiTahunan::find(2)->update($this->form2);

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

    public function batal()
    {
        return redirect(route('dashboard'));
    }

    public function kembali()
    {
        return redirect(route('master.kuota-cuti-tahunan'));
    }

    public function render()
    {
        return view('livewire.kuota-cuti-tahunan');
    }
}
