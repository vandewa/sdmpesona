<div>
    <x-slot name="header">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Tunjangan Kehadiran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Master</li>
                    <li class="breadcrumb-item"><a href="#">Tunjangan Kehadiran</a></li>
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
                                                                                    class="col-sm-2 col-form-label">Nama
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.nama'
                                                                                        placeholder="Tunjangan">
                                                                                    @error('form.nama')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-2 col-form-label">Nominal
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        wire:model='form.nominal'
                                                                                        placeholder="Nominal">
                                                                                    @error('form.nominal')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
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
                                                                    Tunjangan Kehadiran
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="cari" wire:model.live='cari'>
                                                                    </div>
                                                                </div>

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <th>No</th>
                                                                            <th>Nama</th>
                                                                            <th>Nominal</th>
                                                                            <th>Aksi</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($post as $item)
                                                                                <tr wire:key='{{ $item->id }}'>
                                                                                    <td>{{ $loop->index + $post->firstItem() }}
                                                                                    </td>
                                                                                    <td> {{ $item->nama ?? '-' }}</td>
                                                                                    <td> {{ \Laraindo\RupiahFormat::currency($item->nominal) }}
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
