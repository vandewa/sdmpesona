    <div>
        <x-slot name="header">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('pemeliharaan') }}">Pemeliharaan</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
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
                                                    <div class="tab-pane fade show active"
                                                        id="custom-tabs-six-riwayat-rm" role="tabpanel"
                                                        aria-labelledby="custom-tabs-six-riwayat-rm-tab">
                                                        <div class="card-body">
                                                            <div class="col-md-12">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">

                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Nota
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.nota' disabled>
                                                                                    @error('form.nota')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Nomor
                                                                                    Polisi
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model.defer='form.kendaraan_id'
                                                                                        disabled>
                                                                                        <option value="">Pilih
                                                                                            Kendaraan</option>
                                                                                        @foreach ($listKendaraan ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['nopol'] }}">
                                                                                                {{ $item['nopol'] . ' (' . $item['merk'] . '/' . $item['tipe'] . ')' }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('form.kendaraan_id')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            @if ($form['kendaraan_id'] == 'Lainnya')
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Keterangan
                                                                                        (Nopol)
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            wire:model='form.keterangan_nopol'
                                                                                            placeholder="Nomor Polisi"
                                                                                            disabled>
                                                                                        @error('form.keterangan_nopol')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Tanggal
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        wire:model='form.tgl' disabled>
                                                                                    @error('form.tgl')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2 row">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Pengguna
                                                                                    Kendaraan
                                                                                    <small
                                                                                        class="text-danger">*</small></label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.pengguna_kendaraan'
                                                                                        placeholder="Pengguna Kendaraan"
                                                                                        disabled>
                                                                                    @error('form.pengguna_kendaraan')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    @if ($form['user_id'] == auth()->user()->id)
                                                                        <form wire:submit='save'>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Jenis
                                                                                            Perawatan
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <select class="form-control"
                                                                                                wire:model.live='form2.perawatan_id'>
                                                                                                <option value="">
                                                                                                    Pilih
                                                                                                    Perawatan</option>
                                                                                                @foreach ($listPerawatan ?? [] as $item)
                                                                                                    <option
                                                                                                        value="{{ $item['id'] }}">
                                                                                                        {{ $item['nama'] }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                            @error('form2.perawatan_id')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Kilometer
                                                                                            Kendaraan
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                wire:model='form2.kilometer'>
                                                                                            @error('form2.kilometer')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Tempat
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                wire:model='form2.tempat'>
                                                                                            @error('form2.tempat')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Nama
                                                                                            Barang / Jasa
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                wire:model='form2.nama'>
                                                                                            @error('form2.nama')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Volume
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                wire:model.live='form2.volume'>
                                                                                            @error('form2.volume')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Satuan
                                                                                            <small
                                                                                                class="text-danger">*</small>
                                                                                        </label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                wire:model='form2.satuan'>
                                                                                            @error('form2.satuan')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Harga
                                                                                            Satuan
                                                                                            <small
                                                                                                class="text-danger">*</small>
                                                                                        </label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                wire:model.live.debounce.1s='form2.harga_satuan'>
                                                                                            @error('form2.harga_satuan')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Jumlah
                                                                                            <small
                                                                                                class="text-danger">*</small>
                                                                                        </label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                wire:model='form2.jumlah'
                                                                                                readonly>
                                                                                            @error('form2.jumlah')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                            <span>{{ Terbilang::make($form2['jumlah'] ?? 0, ' rupiah', '') }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-2 row">

                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Bukti
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <div x-data="{ uploading: false, progress: 0 }"
                                                                                                x-on:livewire-upload-start="uploading = true"
                                                                                                x-on:livewire-upload-finish="uploading = false"
                                                                                                x-on:livewire-upload-cancel="uploading = false"
                                                                                                x-on:livewire-upload-error="uploading = false"
                                                                                                x-on:livewire-upload-progress="progress = $event.detail.progress">

                                                                                                <input type="file"
                                                                                                    class="form-control"
                                                                                                    wire:model.live="photo"
                                                                                                    accept="image/png, image/jpeg">
                                                                                                @error('photo')
                                                                                                    <span
                                                                                                        class="form-text text-danger">{{ $message }}</span>
                                                                                                @enderror
                                                                                                <div
                                                                                                    x-show="uploading">
                                                                                                    <progress
                                                                                                        max="100"
                                                                                                        x-bind:value="progress"></progress>
                                                                                                    <span
                                                                                                        x-text="progress"><!-- Will output: "bar" -->
                                                                                                    </span> %
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div
                                                                                                class="mt-2 text-center">
                                                                                                @if ($form2['path'] ?? '')
                                                                                                    @if ($photo)
                                                                                                    @else
                                                                                                        <img src="{{ route('helper.show-picture', ['path' => $form2['path']]) }}"
                                                                                                            style="max-width: 500px; max-height:400px;">
                                                                                                    @endif

                                                                                                @endif
                                                                                                @if ($photo)
                                                                                                    <img src="{{ $photo->temporaryUrl() }}"
                                                                                                        style="max-width: 500px; max-height:400px;">
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-3 card-footer">
                                                                                <button type="submit"
                                                                                    class="btn btn-info">Simpan
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    @endif
                                                                </div>

                                                                <br>

                                                                <div class="card card-success card-outline">
                                                                    <div class="card-header">
                                                                        <div class="card-title">
                                                                            Transaksi
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <th>No</th>
                                                                                    <th>Jenis Perawatan</th>
                                                                                    <th>Nama</th>
                                                                                    <th>Tempat</th>
                                                                                    <th>Harga</th>
                                                                                    @if ($form['user_id'] == auth()->user()->id)
                                                                                        <th>Aksi</th>
                                                                                    @endif
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($post as $item)
                                                                                        <tr
                                                                                            wire:key='{{ $item->id }}'>
                                                                                            <td>{{ $loop->index + $post->firstItem() }}
                                                                                            </td>
                                                                                            <td> {{ $item->perawatan->nama ?? '-' }}
                                                                                            </td>
                                                                                            <td> {{ $item->nama ?? '-' }}
                                                                                            <td> {{ $item->tempat ?? '-' }}
                                                                                            </td>
                                                                                            <td> {{ \Laraindo\RupiahFormat::currency($item->jumlah) }}
                                                                                            </td>
                                                                                            @if ($form['user_id'] == auth()->user()->id)
                                                                                                <td>
                                                                                                    <div
                                                                                                        class="gap-3 table-actions d-flex align-items-center fs-6">
                                                                                                        <div
                                                                                                            class="mr-2">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                wire:click="getEdit('{{ $item->id }}')"
                                                                                                                class="btn btn-warning btn-flat btn-sm"
                                                                                                                data-toggle="tooltip"
                                                                                                                data-placement="left"
                                                                                                                title="Edit"><i
                                                                                                                    class="fas fa-pencil-alt"></i>
                                                                                                                Edit
                                                                                                            </button>
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="btn btn-danger btn-flat btn-sm"
                                                                                                                wire:click="delete('{{ $item->id }}')"><i
                                                                                                                    class="fas fa-trash"></i>
                                                                                                                Hapus
                                                                                                            </button>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @endif
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                                @if ($total)
                                                                                    <tfoot>
                                                                                        <th colspan="4">Total</th>
                                                                                        <th>{{ \Laraindo\RupiahFormat::currency($total) }}
                                                                                        </th>
                                                                                    </tfoot>
                                                                                @endif
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
