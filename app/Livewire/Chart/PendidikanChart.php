<?php

namespace App\Livewire\Chart;

use App\Models\StatusPekerjaan;
use App\Models\TingkatPekerjaan;
use App\Models\TunjanganPendidikan;
use App\Models\User;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;


class PendidikanChart extends Component
{
    public $tahun, $listTahun;
    public $name, $listName;
    public $group, $listGroup;
    public $color;
    public $firstRun = true;
    public $showDataLabels = true;
    public $pnl;
    public $colors = [
        "#00008B",
        "#008B8B",
        "#B8860B",
        "#A9A9A9",
        "#006400",
        "#BDB76B",
        "#8B008B",
        "#556B2F",
        "#FF8C00",
        "#9932CC",
        "#8B0000",
        "#E9967A",
        "#8FBC8F",
        "#483D8B",
        "#2F4F4F",
        "#00CED1",
        "#9400D3",
        "#ADD8E6",
        "#F08080",
        "#E0FFFF",
        "#FAFAD2",
        "#D3D3D3",
        "#90EE90",
        "#FFB6C1",
        "#FFA07A",
        "#20B2AA",
        "#87CEFA",
        "#778899",
        "#B0C4DE",
        "#FFFFE0",


    ];

    protected $index = -1;
    protected $indexx = -1;


    public function render()
    {

        $jingan = TunjanganPendidikan::withCount('pegawai')->get();

        // dd($jingan);

        $pieChartModel = $jingan->groupBy('nama')
            ->reduce(
                function ($pieChartModel, $data) {
                    $type = $data->first()->nama;
                    $value = $data->sum('pegawai_count');
                    $this->index = $this->index + 1;

                    return $pieChartModel->addSlice($type, $value, $this->colors[$this->index]);
                },
                LivewireCharts::pieChartModel()
                    ->setTitle('Pendidikan')
                    ->setAnimated($this->firstRun)
                    ->setType('donut')
                    ->withOnSliceClickEvent('onSliceClick')
                    ->legendPositionBottom()
                    ->withDataLabels()
                    // ->asPie()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled($this->showDataLabels)
            );

        return view('livewire.chart.pendidikan-chart', [
            'pieChartModel' => $pieChartModel,
        ]);
    }
}
