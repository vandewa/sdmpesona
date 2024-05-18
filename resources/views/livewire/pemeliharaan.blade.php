    <div>
        <x-slot name="header">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0">Pemeliharaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item active">Master</li> --}}
                        <li class="breadcrumb-item active"><a href="#">Pemeliharaan</a></li>
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
                                                                {{-- <div class="card card-success card-outline"> --}}
                                                                <form class="mt-2 form-horizontal" wire:submit='save'>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-8">

                                                                                <div class="mb-2 row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Nomor
                                                                                        Polisi
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-5">
                                                                                        <select class="form-control"
                                                                                            wire:model.live='form.kendaraan_id'>
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

                                                                                @if ($keterangan)
                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Keterangan
                                                                                            (Nopol)
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-5">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                wire:model='form.keterangan_nopol'
                                                                                                placeholder="Nomor Polisi">
                                                                                            @error('form.keterangan_nopol')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                @endif


                                                                                <div class="mb-2 row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Tanggal
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-5">
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
                                                                                        class="col-sm-4 col-form-label">Pengguna
                                                                                        Kendaraan
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-5">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            wire:model='form.pengguna_kendaraan'
                                                                                            placeholder="Pengguna Kendaraan">
                                                                                        @error('form.pengguna_kendaraan')
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
                                                                        Pemeliharaan
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="cari"
                                                                                wire:model.live='cari'>
                                                                        </div>
                                                                    </div>

                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <th>Nota</th>
                                                                                <th>Tanggal</th>
                                                                                <th>Nopol</th>
                                                                                <th>Pengguna</th>
                                                                                <th>Jumlah</th>
                                                                                <th>Aksi</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($post as $item)
                                                                                    <tr wire:key='{{ $item->id }}'>
                                                                                        {{-- <td>{{ $loop->index + $post->firstItem() }}
                                                                                        </td> --}}
                                                                                        <td> {{ $item->nota ?? '-' }}
                                                                                        <td>
                                                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl)->isoFormat('D MMMM Y') }}
                                                                                        </td>
                                                                                        <td> {{ $item->kendaraan_id ?? '-' }}
                                                                                        </td>
                                                                                        <td> {{ $item->pengguna_kendaraan ?? '-' }}
                                                                                        <td>{{ \Laraindo\RupiahFormat::currency($item->transaksi_sum_jumlah ?? 0) }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <div
                                                                                                class="gap-3 table-actions d-flex align-items-center fs-6">
                                                                                                <div class="mr-2">
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
                                                                                                    <a href="{{ route('transaksi', $item->id) }}"
                                                                                                        class="btn btn-info btn-flat btn-sm"><i
                                                                                                            class="fas fa-money-check-alt mr-2"></i>Transaksi
                                                                                                    </a>
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
