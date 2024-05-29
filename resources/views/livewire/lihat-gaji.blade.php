<div>
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
                                        <div class="card card-success card-outline card-tabs">
                                            <div class="tab-content" id="custom-tabs-six-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-six-riwayat-rm"
                                                    role="tabpanel" aria-labelledby="custom-tabs-six-riwayat-rm-tab">
                                                    <div class="card-body">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                History Gaji
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <th>Gaji</th>
                                                                        <th>Gaji Pokok</th>
                                                                        <th>Tunjangan</th>
                                                                        <th>Jumlah Diterima</th>
                                                                        <th>Slip Gaji</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($post as $item)
                                                                            <tr wire:key='{{ $item->id }}'>
                                                                                <td> {{ bulanIndonesia($item->bulan) . ' ' . $item->tahun }}
                                                                                </td>
                                                                                <td> {{ \Laraindo\RupiahFormat::currency($item->jml_diterima_gapok ?? 0) }}
                                                                                </td>
                                                                                <td>{{ \Laraindo\RupiahFormat::currency($item->jml_diterima_tunjangan ?? 0) }}
                                                                                </td>
                                                                                <td>{{ \Laraindo\RupiahFormat::currency($item->jml_diterima_tunjangan + $item->jml_diterima_gapok) }}
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="gap-3 table-actions d-flex align-items-center fs-6">
                                                                                        <div class="mr-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-dark btn-flat btn-sm"
                                                                                                wire:click="cetak('{{ $item->id }}')"><i
                                                                                                    class="fas fa-print"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            {{ $post->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
