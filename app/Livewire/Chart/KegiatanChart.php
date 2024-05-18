<?php

namespace App\Livewire\Chart;

use Livewire\Component;
use App\Models\Kendaraan;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Attributes\On;

class KegiatanChart extends Component
{


    // public $startDate, $endDate;
    // #[On('jmbt')]
    // public function jmbt($start, $end)
    // {
    //     $this->startDate = $start;
    //     $this->endDate = $end;
    // }

    // public function render()
    // {
    //     $jingan = Kendaraan::withCount([
    //         'kegiatan' => function ($a) {
    //             if ($this->startDate && $this->endDate) {
    //                 $a->where('tgl', '>=', $this->startDate)->where('tgl', '<=', $this->endDate);
    //             }

    //         }
    //     ])->get();


    //     // dd($jingan);
    //     $columnChartModel = $jingan
    //         ->reduce(
    //             function ($columnChartModel, $data) {
    //                 $type = $data->nopol;
    //                 $value = $data->kegiatan_count;


    //                 return $columnChartModel->addColumn($type, $value, '#017bfe');
    //             },
    //             LivewireCharts::columnChartModel()
    //                 ->setTitle('Jumlah Kegiatan')
    //                 ->setAnimated(true)
    //                 ->withOnColumnClickEventName('onColumnClick')
    //                 ->setLegendVisibility(false)
    //                 ->setDataLabelsEnabled(true)
    //                 //->setOpacity(0.25)
    //                 // ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
    //                 ->setColumnWidth(90)
    //                 ->withGrid()
    //         );


    //     return view('livewire.chart.kegiatan-chart', [
    //         'columnChartModel' => $columnChartModel,
    //     ]);
    // }
}
