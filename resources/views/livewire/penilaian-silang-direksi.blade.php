<div>
    <x-slot name="header">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">KPI Penilaian Direksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Penilaian Silang</li>
                    <li class="breadcrumb-item"><a href="#">KPI Penilaian Direksi</a></li>
                </ol>
            </div>
        </div>
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
                                        <div class="card card-success card-outline card-tabs">
                                            <div class="tab-content" id="custom-tabs-six-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-six-riwayat-rm"
                                                    role="tabpanel" aria-labelledby="custom-tabs-six-riwayat-rm-tab">
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            {{-- <div class="card card-success card-outline"> --}}
                                                            <form class="mt-2 form-horizontal" wire:submit='save'>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Bulan
                                                                                    Penilaian
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        wire:model='form.tgl'>
                                                                                    @error('form.tgl')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Subject
                                                                                    Penilaian
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model.live='form.user_id'>
                                                                                        <option value="">Pilih
                                                                                            Direksi</option>
                                                                                        @foreach ($listSubjectPenilai ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['id'] }}">
                                                                                                {{ $item['name'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('form.user_id')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Penilaian
                                                                                    Kualitatif
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <textarea rows="2" wire:model='form.penilaian_kualitatif' class="form-control"></textarea>
                                                                                    @error('form.penilaian_kualitatif')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-8 col-form-label">Penyelesaian
                                                                                    Jobdesk & Performance
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control"
                                                                                        wire:model.live='form.jobdesk'>
                                                                                        <option value="">Pilih
                                                                                            Angka</option>
                                                                                        <option value="1">1
                                                                                        </option>
                                                                                        <option value="2">2
                                                                                        </option>
                                                                                        <option value="3">3
                                                                                        </option>
                                                                                        <option value="4">4
                                                                                        </option>
                                                                                        <option value="5">5
                                                                                        </option>
                                                                                        <option value="6">6
                                                                                        </option>
                                                                                        <option value="7">7
                                                                                        </option>
                                                                                        <option value="8">8
                                                                                        </option>
                                                                                        <option value="9">9
                                                                                        </option>
                                                                                        <option value="10">10
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('form.jobdesk')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-8 col-form-label">Inovasi
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control"
                                                                                        wire:model.live='form.inovasi'>
                                                                                        <option value="">Pilih
                                                                                            Angka</option>
                                                                                        <option value="1">1
                                                                                        </option>
                                                                                        <option value="2">2
                                                                                        </option>
                                                                                        <option value="3">3
                                                                                        </option>
                                                                                        <option value="4">4
                                                                                        </option>
                                                                                        <option value="5">5
                                                                                        </option>
                                                                                        <option value="6">6
                                                                                        </option>
                                                                                        <option value="7">7
                                                                                        </option>
                                                                                        <option value="8">8
                                                                                        </option>
                                                                                        <option value="9">9
                                                                                        </option>
                                                                                        <option value="10">10
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('form.inovasi')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-8 col-form-label">Profesionalitas
                                                                                    & Kedisiplinan
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control"
                                                                                        wire:model.live='form.kedisiplinan'>
                                                                                        <option value="">Pilih
                                                                                            Angka</option>
                                                                                        <option value="1">1
                                                                                        </option>
                                                                                        <option value="2">2
                                                                                        </option>
                                                                                        <option value="3">3
                                                                                        </option>
                                                                                        <option value="4">4
                                                                                        </option>
                                                                                        <option value="5">5
                                                                                        </option>
                                                                                        <option value="6">6
                                                                                        </option>
                                                                                        <option value="7">7
                                                                                        </option>
                                                                                        <option value="8">8
                                                                                        </option>
                                                                                        <option value="9">9
                                                                                        </option>
                                                                                        <option value="10">10
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('form.kedisiplinan')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <small class="text-danger"> <b>
                                                                                            *Keterangan &nbsp; (1 =
                                                                                            Sangat Buruk &nbsp; 10 =
                                                                                            Istimewa)</b></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 card-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-info">Simpan</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                        <br>

                                                        <div class="card card-success card-outline">
                                                            <div class="card-header">
                                                                <div class="card-title">
                                                                    KPI Penilaian Direksi
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <th>Bulan</th>
                                                                            <th>Subject Penilaian</th>
                                                                            <th>Penilaian Kualitatif</th>
                                                                            <th>Penyelesaian Jobdesk & Performance</th>
                                                                            <th>Inovasi</th>
                                                                            <th>Profesionalitas & Kedisiplinan</th>
                                                                            <th>Aksi</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($post as $item)
                                                                                <tr wire:key='{{ $item->id }}'>
                                                                                    <td> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl)->isoFormat('MMMM Y') }}
                                                                                    </td>
                                                                                    <td> {{ $item->pegawai->name ?? '-' }}
                                                                                    </td>
                                                                                    <td> {{ $item->penilaian_kualitatif ?? '-' }}
                                                                                    </td>
                                                                                    <td> {{ $item->jobdesk ?? '-' }}
                                                                                    </td>
                                                                                    <td> {{ $item->inovasi ?? '-' }}
                                                                                    </td>
                                                                                    <td> {{ $item->kedisiplinan ?? '-' }}
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
</div>
