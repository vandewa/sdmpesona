<?php

namespace App\Livewire\Chart;

use Livewire\Component;
use App\Models\Kendaraan;
use App\Livewire\Chart\KegiatanChart;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class KendaraanChart extends Component
{
    public $startDate, $endDate;
    // public function render()
    // {

    //     $jingan = Kendaraan::withCount([
    //         'pemeliharaan' => function ($a) {
    //             if ($this->startDate && $this->endDate) {
    //                 $this->dispatch('jmbt', start: $this->startDate, end: $this->endDate)->to(KegiatanChart::class);
    //                 $a->where('tgl', '>=', $this->startDate)->where('tgl', '<=', $this->endDate);
    //             }

    //         }
    //     ])
    //         ->get();


    //     // dd($jingan);
    //     $columnChartModel = $jingan
    //         ->reduce(
    //             function ($columnChartModel, $data) {
    //                 $type = $data->nopol;
    //                 $value = $data->pemeliharaan_count;


    //                 return $columnChartModel->addColumn($type, $value, '#017bfe');
    //             },
    //             LivewireCharts::columnChartModel()
    //                 ->setTitle('Jumlah Pemeliharaan')
    //                 ->setAnimated(true)
    //                 ->withOnColumnClickEventName('onColumnClick')
    //                 ->setLegendVisibility(false)
    //                 ->setDataLabelsEnabled(true)
    //                 //->setOpacity(0.25)
    //                 // ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
    //                 ->setColumnWidth(90)
    //                 ->withGrid()
    //         );


    //     return view('livewire.chart.kendaraan-chart', [
    //         'columnChartModel' => $columnChartModel,
    //     ]);
    // }
}
