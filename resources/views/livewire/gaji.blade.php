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
                                                        <div class="col-md-12">
                                                            {{-- <div class="card card-success card-outline"> --}}
                                                            <form class="mt-2 form-horizontal" wire:submit='save'>
                                                                <div class="card-body">
                                                                    <div class="mb-5">
                                                                        <center>
                                                                            <h3>{{ $nama }}</h3>
                                                                            <h5>{{ ' (' . $jabatan . ')' }}</h5>
                                                                        </center>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <legend>Gaji Pokok</legend>
                                                                            <hr>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Gaji
                                                                                    Pokok
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model='form.gapok'
                                                                                            readonly>
                                                                                        @error('form.gapok')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            {{-- <div class="row mb-4">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Jumlah
                                                                                    Diterima
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.jml_diterima_gapok'
                                                                                            readonly>
                                                                                        @error('form.jml_diterima_gapok')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                                            <div class="mb-4 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Tanggal
                                                                                    Penggajian
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        wire:model='form.tanggal_penggajian'>
                                                                                    @error('form.tanggal_penggajian')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Total
                                                                                    Gaji <br> (Gaji Pokok & Tunjangan
                                                                                    dan
                                                                                    Honor)
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.total_gaji'
                                                                                            readonly>
                                                                                        @error('form.total_gaji')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <legend>Tunjangan dan Honor</legend>
                                                                            <hr>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-5 col-form-label">Tunjangan
                                                                                    Pendidikan
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.tunjangan_pendidikan'>
                                                                                        @error('form.tunjangan_pendidikan')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-5 col-form-label">Tunjangan
                                                                                    Masa Kerja
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.tunjangan_masa_kerja'>
                                                                                        @error('form.tunjangan_masa_kerja')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-5 col-form-label">Tunjangan
                                                                                    KPI
                                                                                    <small class="text-danger">*</small>
                                                                                    <button type="button"
                                                                                        class="btn btn-info btn-sm"
                                                                                        wire:click="$dispatch('show-modal-tunjangan-kpi')">Lihat
                                                                                        Data</button></label></label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.kpi'>
                                                                                        @error('form.kpi')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-5 col-form-label">Tunjangan
                                                                                    Kehadiran
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                    <button type="button"
                                                                                        class="btn btn-info btn-sm"
                                                                                        wire:click="$dispatch('show-modal-tunjangan-kehadiran')">Lihat
                                                                                        Data</button></label>

                                                                                <div class="col-sm-7">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.kehadiran'>
                                                                                        @error('form.kehadiran')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-5 col-form-label">Lembur
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.lembur'>
                                                                                        @error('form.lembur')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-5 col-form-label">Uang
                                                                                    Makan Partimer
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.uang_makan_parttimer'>
                                                                                        @error('form.uang_makan_parttimer')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-5 col-form-label">Lain-lain
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.lain_lain'>
                                                                                        @error('form.lain_lain')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-5 col-form-label">Fee
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.fee'>
                                                                                        @error('form.fee')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-5 col-form-label">Jumlah
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="input-group">
                                                                                        <div
                                                                                            class="input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text">Rp.</span>
                                                                                        </div>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.change='form.jml_diterima_tunjangan'
                                                                                            readonly>
                                                                                        @error('form.jml_diterima_tunjangan')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 card-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-info">Simpan</button>
                                                                        <button type="button"
                                                                            class="btn btn-default float-right"
                                                                            wire:click='batal'>Batal</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                        <br>

                                                        <div class="card card-success card-outline">
                                                            {{-- <div class="card-header">
                                                                <div class="card-title">
                                                                    Gaji
                                                                </div>
                                                            </div> --}}
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <th>Gaji</th>
                                                                            <th>Gaji Pokok</th>
                                                                            <th>Tunjangan</th>
                                                                            <th>Jumlah Diterima</th>
                                                                            <th>Aksi</th>
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
                                                                                                    wire:click="getEdit('{{ $item->id }}')"
                                                                                                    class="btn btn-warning btn-flat btn-sm mb-2"
                                                                                                    data-toggle="tooltip"
                                                                                                    data-placement="left"
                                                                                                    title="Edit"><i
                                                                                                        class="fas fa-pencil-alt"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn btn-danger btn-flat btn-sm mb-2"
                                                                                                    wire:click="delete('{{ $item->id }}')"><i
                                                                                                        class="fas fa-trash"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn btn-dark btn-flat btn-sm mb-2"
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
    <livewire:component.modal-tunjangan-kehadiran wire:key='modal-tunjangan-kehadiran'>
        <livewire:component.modal-tunjangan-kpi wire:key='modal-tunjangan-kpi'>
</div>
