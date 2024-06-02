<div>
    <x-slot name="header">
        <h1 class="text-center">KPI PENILAIAN DIREKSI PESONA BULAN {{ strtoupper($bulannya) }}</h1>
    </x-slot>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="tab-pane fade active show">
                            <div class="tab-pane active show fade" id="custom-tabs-one-rm" role="tabpanel"
                                aria-labelledby="custom-tabs-one-rm-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-success card-outline">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <th>No</th>
                                                            <th>Bulan</th>
                                                            <th>Penilai</th>
                                                            <th>Subject Penilaian</th>
                                                            <th>Penilaian Kualitatif</th>
                                                            <th>Penilaian Jobdesk & Performance</th>
                                                            <th>Penyelesaian Jobdesk & Performance</th>
                                                            <th>Inovasi</th>
                                                            <th>Profesionalitas & Kedisiplinan</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($post as $item)
                                                                <tr wire:key='{{ $item->id }}'>
                                                                    <td>{{ $loop->index + 1 }}
                                                                    </td>
                                                                    <td> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl)->isoFormat('MMMM Y') }}
                                                                    </td>
                                                                    <td> {{ $item->user->name ?? '-' }}
                                                                    </td>
                                                                    <td> {{ $item->pegawai->name ?? '-' }}
                                                                    </td>
                                                                    <td> {{ $item->penilaian_kualitatif ?? '-' }}
                                                                    </td>
                                                                    <td> {{ $item->jobdesk ?? '-' }}
                                                                    <td> {{ $item->jobdesk ?? '-' }}
                                                                    </td>
                                                                    <td> {{ $item->inovasi ?? '-' }}
                                                                    </td>
                                                                    <td> {{ $item->kedisiplinan ?? '-' }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-center">
                                                    @if ($cekValidasi)
                                                        <button type="button" class="btn btn-danger btn-md "
                                                            wire:click="simpan"><i
                                                                class="fa-solid fa-square-check mr-2"></i>Klik untuk
                                                            memvalidasi
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-dark btn-md "
                                                            wire:click="cetak"><i
                                                                class="fa-solid fa-print mr-2"></i>Klik untuk cetak
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
