<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Models\Pemeliharaan as ModelsPemeliharaan;
use Livewire\Component;
use Livewire\WithPagination;

class Pemeliharaan extends Component
{

    use WithPagination;

    public $idHapus, $edit = false, $idnya, $cari, $keterangan = false;

    public $form = [
        'kendaraan_id' => null,
        'nota' => null,
        'tgl' => null,
        'pengguna_kendaraan' => null,
        'user_id' => null,
        'keterangan_nopol' => null,
    ];

    public function mount()
    {
        $this->ambilKendaraan();
    }

    public function ambilKendaraan()
    {
        if (auth()->user()->hasRole('superadmin')) {
            return Kendaraan::all()->toArray();
        } else {
            return Kendaraan::where('nopol', '!=', 'Lainnya')->get()->toArray();
        }
    }

    public function getEdit($a)
    {
        $this->form = ModelsPemeliharaan::find($a)->only(['kendaraan_id', 'tgl', 'pengguna_kendaraan', 'keterangan_nopol']);
        $this->idHapus = $a;
        $this->edit = true;
        if ($this->form['kendaraan_id'] == 'Lainnya') {
            $this->keterangan = true;
        }
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
    }

    public function store()
    {
        $this->form['nota'] = gen_nota();
        $this->form['user_id'] = auth()->user()->id;
        ModelsPemeliharaan::create($this->form);
        $this->reset();
    }

    public function delete($id)
    {
        $this->idHapus = $id;
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Apakah Anda yakin?',
                text: "Apakah kamu ingin menghapus data ini? proses ini tidak dapat dikembalikan.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
                $wire.hapus()
            }
          })
        JS);
    }

    public function hapus()
    {
        ModelsPemeliharaan::destroy($this->idHapus);
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);
    }

    public function storeUpdate()
    {
        $this->form['user_id'] = auth()->user()->id;
        ModelsPemeliharaan::find($this->idHapus)->update($this->form);
        $this->reset();
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->reset();
    }

    public function updated($property)
    {
        if ($property === 'form.kendaraan_id') {
            if ($this->form['kendaraan_id'] == 'Lainnya') {
                $this->keterangan = true;
            } else {
                $this->keterangan = false;
                $this->form['keterangan_nopol'] = null;
            }
        }
    }

    public function render()
    {
        if (auth()->user()->hasRole('superadmin')) {
            $data = ModelsPemeliharaan::with(['kendaraan'])
                ->withSum('transaksi', 'jumlah')
                ->cari($this->cari)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $data = ModelsPemeliharaan::with(['kendaraan'])
                ->withSum('transaksi', 'jumlah')
                ->cari($this->cari)
                ->where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }


        return view('livewire.pemeliharaan', [
            'post' => $data,
            'listKendaraan' => $this->ambilKendaraan()
        ]);
    }
}
