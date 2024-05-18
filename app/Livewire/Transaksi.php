<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kendaraan;
use App\Models\Perawatan;
use Livewire\Attributes\On;
use App\Models\Pemeliharaan;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Transaksi as ModelsTransaksi;

class Transaksi extends Component
{

    use WithPagination;
    use WithFileUploads;

    #[Validate('image|max:3000')]
    public $photo;

    public $idHapus, $edit = false, $idnya;

    #[On('refresh')]
    public function refresh()
    {
        $this->resetPage();
    }

    public $form = [
        'kendaraan_id' => null,
        'tgl' => null,
        'pengguna_kendaraan' => null,
        'nota' => null,
    ];

    public $form2 = [
        'pemeliharaan_id' => null,
        'perawatan_id' => null,
        'kilometer' => null,
        'nama' => null,
        'volume' => null,
        'satuan' => null,
        'harga_satuan' => null,
        'jumlah' => null,
        'tempat' => null,
        'path' => null,
    ];

    public function mount($id = '')
    {
        $this->idnya = $id;
        $pemeliharaan = Pemeliharaan::find($id)->toArray();
        $this->form = $pemeliharaan;
        $this->ambilKendaraan();
        $this->ambilPerawatan();
    }

    public function ambilKendaraan()
    {
        return Kendaraan::all()->toArray();
    }

    public function ambilPerawatan()
    {
        return Perawatan::all()->toArray();
    }

    public function getEdit($a)
    {
        $this->form2 = ModelsTransaksi::find($a)->only(['perawatan_id', 'kilometer', 'nama', 'volume', 'satuan', 'harga_satuan', 'jumlah', 'tempat', 'path']);
        $this->idHapus = $a;
        $this->edit = true;
    }

    public function save()
    {
        if ($this->edit) {
            $this->storeUpdate();
        } else {
            $this->store();
        }

        $this->form2 = [
            'pemeliharaan_id' => null,
            'perawatan_id' => null,
            'kilometer' => null,
            'nama' => null,
            'volume' => null,
            'satuan' => null,
            'harga_satuan' => null,
            'jumlah' => null,
            'tempat' => null,
            'path' => null,
        ];

        $this->photo = null;

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
        $this->validate([
            'form2.perawatan_id' => 'required'
        ]);

        if ($this->photo) {
            $foto = $this->photo->store('sigap/photos', 'gcs');
        }
        $this->form2['path'] = $foto ?? null;
        $this->form2['pemeliharaan_id'] = $this->idnya;
        ModelsTransaksi::create($this->form2);
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
        ModelsTransaksi::destroy($this->idHapus);
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
        $this->validate([
            'form2.perawatan_id' => 'required'
        ]);

        if ($this->photo) {
            $foto = $this->photo->store('sigap/photos', 'gcs');
            $this->form2['path'] = $foto;
        }
        ModelsTransaksi::find($this->idHapus)->update($this->form2);
        $this->edit = false;
    }


    public function batal()
    {
        $this->edit = false;
        $this->reset();
    }

    public function updated($property)
    {
        // $property: The name of the current property that was updated

        if ($property === 'form2.harga_satuan') {
            if ($this->form2['harga_satuan'] != null) {
                if ($this->form2['volume'] != null) {
                    $this->form2['jumlah'] = $this->form2['volume'] * $this->form2['harga_satuan'];
                }
            }
        }

        if ($property === 'form2.volume') {
            if ($this->form2['volume'] != null) {
                if ($this->form2['harga_satuan'] != null) {
                    $this->form2['jumlah'] = $this->form2['volume'] * $this->form2['harga_satuan'];
                }
            }
        }
    }

    public function render()
    {
        $data = ModelsTransaksi::with(['perawatan'])->where('pemeliharaan_id', $this->idnya)->paginate(15);
        $jumlah = ModelsTransaksi::where('pemeliharaan_id', $this->idnya)->sum('jumlah');

        return view('livewire.transaksi', [
            'post' => $data,
            'listKendaraan' => $this->ambilKendaraan(),
            'listPerawatan' => $this->ambilPerawatan(),
            'total' => $jumlah
        ]);
    }
}
