<div>
    {{-- <x-slot name="header">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Management File</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Master</li>
                    <li class="breadcrumb-item"><a href="#">Management File</a></li>
                </ol>
            </div>
        </div>
    </x-slot> --}}
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
                                                                                    class="col-sm-3 col-form-label">Nama
                                                                                    File
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.nama'
                                                                                        placeholder="Nama File">
                                                                                    @error('form.nama')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-3 col-form-label">Tahun
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        wire:model='form.tahun'
                                                                                        placeholder="Tahun">
                                                                                    @error('form.tahun')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-3 col-form-label">Kategori
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-9">
                                                                                    <select class="form-control"
                                                                                        wire:model.live='form.kategori_id'>
                                                                                        <option value="">Pilih
                                                                                            Kategori</option>
                                                                                        @foreach ($kategori ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['id'] }}">
                                                                                                {{ $item['nama'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('form.kategori_id')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-3 col-form-label">Upload
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-9">
                                                                                    <div x-data="{ uploading: false, progress: 0 }"
                                                                                        x-on:livewire-upload-start="uploading = true"
                                                                                        x-on:livewire-upload-finish="uploading = false"
                                                                                        x-on:livewire-upload-cancel="uploading = false"
                                                                                        x-on:livewire-upload-error="uploading = false"
                                                                                        x-on:livewire-upload-progress="progress = $event.detail.progress">

                                                                                        <input type="file"
                                                                                            class="form-control"
                                                                                            wire:model="files">
                                                                                        @error('files')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                        <div x-show="uploading">
                                                                                            <progress max="100"
                                                                                                x-bind:value="progress"></progress>
                                                                                            <span
                                                                                                x-text="progress"><!-- Will output: "bar" -->
                                                                                            </span> %
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                                                    Management File
                                                                </div>
                                                                <div class="card-tools">
                                                                    <select name="" class="form-control"
                                                                        id="" wire:model.live='idnya'>
                                                                        <option value="">Semua Kategori</option>
                                                                        @foreach ($kategori as $item)
                                                                            <option value="{{ $item->id }}">
                                                                                {{ $item->nama ?? '' }}</option>
                                                                        @endforeach
                                                                    </select>
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
                                                                            <th>Kategori</th>
                                                                            <th>Nama</th>
                                                                            <th>Tahun</th>
                                                                            <th>Dokumen</th>
                                                                            <th>Aksi</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($post as $item)
                                                                                <tr wire:key='{{ $item->id }}'>
                                                                                    <td>{{ $loop->index + $post->firstItem() }}
                                                                                    </td>
                                                                                    <td> {{ $item->kategori->nama ?? '-' }}
                                                                                    </td>
                                                                                    <td> {{ $item->nama ?? '-' }}</td>
                                                                                    <td> {{ $item->tahun ?? '-' }}</td>
                                                                                    <td>
                                                                                        <div class="list-icons">
                                                                                            <a href="{{ route('helper.show-picture', ['path' => $item->path]) }}"
                                                                                                class="btn btn-info rounded-round btn-sm"
                                                                                                target="_blank">Lihat
                                                                                                File</a>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="gap-3 table-actions d-flex align-items-center fs-6">
                                                                                            <div class="mr-2">
                                                                                                <button type="button"
                                                                                                    class="btn btn-danger btn-flat btn-sm"
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
