<?php

namespace App\Livewire;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gaji as ModelsGaji;
use PhpOffice\PhpWord\TemplateProcessor;


class LihatGaji extends Component
{

    use WithPagination;
    public $cari, $idHapus, $edit = false, $idnya;


    public function render()
    {
        $data = ModelsGaji::where('user_id', auth()->user()->id)->orderBy('tanggal_penggajian', 'desc')->paginate(20);

        return view('livewire.lihat-gaji', [
            'post' => $data
        ]);
    }
}
