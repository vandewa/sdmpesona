<div>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Ketua Dewan Pengawas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Ketua Dewan Pengawas</li>
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

                                        <div class="card card-success card-outline   card-tabs">
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
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.name'
                                                                                        placeholder="Nama Lengkap">
                                                                                    @error('form.name')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-3 col-form-label">Email
                                                                                    <small class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        wire:model='form.email'
                                                                                        placeholder="Email">
                                                                                    @error('form.email')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-3 col-form-label">WhatsApp
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        wire:model='form.telpon'
                                                                                        placeholder="Nomor WhatsApp">
                                                                                    @error('form.telpon')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-3 col-form-label">Status
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-9">
                                                                                    <select class="form-control"
                                                                                        wire:model='form.status'>
                                                                                        <option value="">Pilih
                                                                                            Status</option>
                                                                                        <option value="1">Aktif
                                                                                        </option>
                                                                                        <option value="0">Non
                                                                                            Aktif</option>
                                                                                    </select>
                                                                                    @error('form.status')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-2 row">
                                                                                <div>
                                                                                    @if ($form['path_tanda_tangan'] && !$photo)
                                                                                        <img src="{{ asset(str_replace('public', 'storage', $form['path_tanda_tangan'])) }}"
                                                                                            style="max-height: 200px;">
                                                                                        {{-- <img src="{{ route('helper.show-picture', ['path' => $form['path_tanda_tangan']]) }}"
                                                                                            style="max-height: 200px;"> --}}
                                                                                    @endif
                                                                                </div>

                                                                                <div x-data="{ uploading: false, progress: 0 }"
                                                                                    x-on:livewire-upload-start="uploading = true"
                                                                                    x-on:livewire-upload-finish="uploading = false"
                                                                                    x-on:livewire-upload-cancel="uploading = false"
                                                                                    x-on:livewire-upload-error="uploading = false"
                                                                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                                                                    class="col-md-12">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-3 col-form-label">Tanda
                                                                                        Tangan</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="file"
                                                                                            wire:model="photo"
                                                                                            accept="image/png, image/gif, image/jpeg"
                                                                                            class="form-control">
                                                                                    </div>

                                                                                    @error('photo')
                                                                                        <span
                                                                                            class="error">{{ $message }}</span>
                                                                                    @enderror
                                                                                    <div x-show="uploading">
                                                                                        <progress max="100"
                                                                                            x-bind:value="progress"></progress>
                                                                                        <span
                                                                                            x-text="progress"><!-- Will output: "bar" -->
                                                                                        </span> %
                                                                                    </div>
                                                                                </div>


                                                                                <div class="mt-2">
                                                                                    @if ($photo)
                                                                                        <img src="{{ $photo->temporaryUrl() }}"
                                                                                            style="max-height: 200px;">
                                                                                    @endif

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

                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nama</th>
                                                                        <th>Jabatan</th>
                                                                        <th>WhatsApp</th>
                                                                        <th>Email</th>
                                                                        <th>Status</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($posts as $item)
                                                                        <tr>
                                                                            <td>{{ $item->name ?? '' }}</td>
                                                                            <td>Ketua Dewan Pengawas</td>
                                                                            <td>{{ $item->telpon ?? '' }}</td>
                                                                            <td>{{ $item->email ?? '' }}</td>
                                                                            <td>
                                                                                @if ($item->status == 1)
                                                                                    <span
                                                                                        class="badge bg-success">Aktif</span>
                                                                                @else
                                                                                    <span class="badge bg-danger">Non
                                                                                        Aktif</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <button type="button"
                                                                                    wire:click="getEdit('{{ $item->id }}')"
                                                                                    class="btn btn-sm btn-primary mr-2 mb-2">Edit
                                                                                </button>

                                                                                <button type="button"
                                                                                    class="btn btn-sm btn-danger mb-2"
                                                                                    wire:click="delete('{{ $item->id }}')">Hapus
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        {{ $posts->links() }}
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
