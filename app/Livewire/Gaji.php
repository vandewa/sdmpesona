<?php

namespace App\Livewire;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gaji as ModelsGaji;
use PhpOffice\PhpWord\TemplateProcessor;


class Gaji extends Component
{

    use WithPagination;
    public $cari, $idHapus, $edit = false, $idnya;

    public $nama, $jabatan, $gapok;

    public $form = [
        'user_id' => null,
        'bulan' => null,
        'tahun' => null,
        'gapok' => null,
        'honor_siaran' => '0',
        'tunjangan_pendidikan' => '0',
        'tunjangan_masa_kerja' => '0',
        'kpi' => '0',
        'kehadiran' => '0',
        'lembur' => '0',
        'uang_makan_parttimer' => '0',
        'lain_lain' => '0',
        'fee' => '0',
        'tanggal_penggajian' => null,
        'jml_diterima_gapok' => null,
        'jml_diterima_tunjangan' => null,
        'total_gaji' => null,
    ];

    public function mount($id = '')
    {
        $user = User::with(['tunjanganPendidikan'])->find($id);
        $this->idnya = $id;

        $this->nama = $user->name;
        $this->jabatan = $user->jabatan->nama;
        $this->form['gapok'] = $user->gapok_sekarang;
        $this->form['tanggal_penggajian'] = date('Y-m-d');
        $this->form['user_id'] = $id;

        $this->form['tunjangan_pendidikan'] = $user->tunjanganPendidikan->nominal ?? "0";

        $this->form['jml_diterima_gapok'] = $this->form['gapok'];

        $this->form['jml_diterima_tunjangan'] =
            $this->form['tunjangan_pendidikan'] +
            $this->form['tunjangan_masa_kerja'] +
            $this->form['kpi'] +
            $this->form['kehadiran'] +
            $this->form['lembur'] +
            $this->form['uang_makan_parttimer'] +
            $this->form['lain_lain'] +
            $this->form['fee'];

        $this->form['total_gaji'] = $this->form['gapok'] + $this->form['jml_diterima_tunjangan'];


    }

    public function getEdit($a)
    {
        $this->form = ModelsGaji::find($a)->only(['gapok', 'honor_siaran', 'tunjangan_pendidikan', 'tunjangan_masa_kerja', 'kpi', 'kehadiran', 'lembur', 'uang_makan_parttimer', 'lain_lain', 'fee', 'tanggal_penggajian', 'jml_diterima_gapok', 'jml_diterima_tunjangan']);
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



        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);

        return redirect(route('gaji', $this->idnya));

    }

    public function store()
    {
        // Membuat objek DateTime dari string tanggal
        $date = DateTime::createFromFormat('Y-m-d', $this->form['tanggal_penggajian']);
        $this->form['tahun'] = $date->format('Y');
        $this->form['bulan'] = $date->format('m');


        ModelsGaji::create($this->form);

    }



    public function storeUpdate()
    {
        // Membuat objek DateTime dari string tanggal
        $date = DateTime::createFromFormat('Y-m-d', $this->form['tanggal_penggajian']);
        $this->form['tahun'] = $date->format('Y');
        $this->form['bulan'] = $date->format('m');

        ModelsGaji::find($this->idHapus)->update($this->form);

        $this->edit = false;

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
        ModelsGaji::destroy($this->idHapus);
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);
    }

    public function updated($property)
    {
        // $property: The name of the current property that was updated

        if ($property === 'form.tunjangan_pendidikan' || $property === 'form.tunjangan_masa_kerja' || $property === 'form.kpi' || $property === 'form.kehadiran' || $property === 'form.lembur' || $property === 'form.uang_makan_parttimer' || $property === 'form.lain_lain' || $property === 'form.fee') {

            $this->form['jml_diterima_tunjangan'] =
                (int) $this->form['tunjangan_pendidikan'] +
                (int) $this->form['tunjangan_masa_kerja'] +
                (int) $this->form['kpi'] +
                (int) $this->form['kehadiran'] +
                (int) $this->form['lembur'] +
                (int) $this->form['uang_makan_parttimer'] +
                (int) $this->form['lain_lain'] +
                (int) $this->form['fee'];

            $this->form['total_gaji'] = $this->form['gapok'] + $this->form['jml_diterima_tunjangan'];
        }

    }

    public function cetak($id)
    {
        $data = ModelsGaji::with(['pegawai', 'tunjanganPendidikan'])->find($id);
        $bendahara = User::where('nama_jabatan_id', '7')->where('status', '1')->first();

        $path = public_path('template/gaji.docx');
        $pathSave = storage_path('app/public/' . 'Gaji-' . $data->pegawai->name . ' -' . $data->bulan . ' ' . $data->tahun . '.docx');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'nama' => strtoupper($data->pegawai->name ?? ''),
            'jabatan' => strtoupper($data->pegawai->jabatan->nama ?? ''),
            'bulan' => bulanIndonesia($data->bulan) . ' ' . $data->tahun,
            'gapok' => \Laraindo\RupiahFormat::currency($data->gapok),
            'honor' => \Laraindo\RupiahFormat::currency($data->honor) ?? '-',
            'jumlah_gapok' => \Laraindo\RupiahFormat::currency($data->jml_diterima_gapok),
            'tgl' => Carbon::createFromFormat('Y-m-d', $data->tanggal_penggajian)->isoFormat('D MMMM Y'),
            'bendahara' => $bendahara->name,
            'jabatan_bendahara' => $bendahara->jabatan->nama,

            'tunjangan_pendidikan' => \Laraindo\RupiahFormat::currency($data->tunjangan_pendidikan) ?? '-',
            'tunjangan_masa_kerja' => \Laraindo\RupiahFormat::currency($data->tunjangan_masa_kerja) ?? '-',
            'kpi' => \Laraindo\RupiahFormat::currency($data->kpi) ?? '-',
            'kehadiran' => \Laraindo\RupiahFormat::currency($data->kehadiran) ?? '-',
            'lembur' => \Laraindo\RupiahFormat::currency($data->lembur) ?? '-',
            'uang_makan_parttimer' => \Laraindo\RupiahFormat::currency($data->uang_makan_parttimer) ?? '-',
            'lain_lain' => \Laraindo\RupiahFormat::currency($data->lain_lain) ?? '-',
            'fee' => \Laraindo\RupiahFormat::currency($data->fee) ?? '-',
            'jumlah_tunjangan' => \Laraindo\RupiahFormat::currency($data->jml_diterima_tunjangan) ?? '-',
        ]);

        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
        $templateProcessor->saveAs($pathSave);

        return response()->download($pathSave)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $data = ModelsGaji::where('user_id', $this->idnya)->paginate(20);

        return view('livewire.gaji', [
            'post' => $data
        ]);
    }
}
