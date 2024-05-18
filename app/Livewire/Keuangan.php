<?php

namespace App\Livewire;

use App\Models\Saldo;
use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Pemeliharaan as ModelsPemeliharaan;



class Keuangan extends Component
{
    use WithPagination;

    public $tahun, $saldo, $pengeluaran, $sisa, $cari;

    public function mount()
    {
        $this->saldo = Saldo::where('tahun', date('Y'))->first()->saldo ?? "0";
        $this->pengeluaran = Transaksi::whereHas('pemeliharaan', function ($a) {
            $a->whereYear('tgl', date('Y'));
        })->sum('jumlah');

        $this->sisa = $this->saldo - $this->pengeluaran;
        $this->tahun = date('Y');
        $this->ambilTahun();

    }

    public function updated($property)
    {
        if ($property === 'tahun') {
            $this->saldo = Saldo::where('tahun', $this->tahun)->first()->saldo ?? "0";
            $this->pengeluaran = Transaksi::whereHas('pemeliharaan', function ($a) {
                $a->whereYear('tgl', $this->tahun);
            })->sum('jumlah');
            $this->sisa = $this->saldo - $this->pengeluaran;

        }
    }

    public function ambilTahun()
    {
        return ModelsPemeliharaan::select(DB::raw("year(tgl) as tahun"))->distinct()->orderBy('tahun', 'desc')->get()->toArray();
    }

    public function render()
    {
        $data = ModelsPemeliharaan::with(['kendaraan'])
            ->cari($this->cari)
            ->withSum('transaksi', 'jumlah')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.keuangan', [
            'post' => $data,
            'listTahun' => $this->ambilTahun(),
        ]);
    }
}
