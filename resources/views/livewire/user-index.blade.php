<div>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
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
                                                        <div class="card-header">
                                                            <div class="text-left mb-3">
                                                                <a href="{{ route('master.user') }}"
                                                                    class="btn btn-info"><i
                                                                        class="fas fa-plus-square mr-2"></i>Tambah
                                                                    Data</a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-2 mb-2">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="cari" wire:model.live='cari'>
                                                                </div>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID Karyawan</th>
                                                                            <th>Nama</th>
                                                                            <th>Jabatan</th>
                                                                            <th>Status</th>
                                                                            <th>Role</th>
                                                                            <th>Status Pegawai</th>
                                                                            <th>Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($posts as $item)
                                                                            <tr>
                                                                                <td>{{ $item->id_karyawan ?? '' }}</td>
                                                                                <td>{{ $item->name ?? '' }}</td>
                                                                                <td>{{ $item->jabatan->nama ?? '' }}
                                                                                <td>{{ $item->tingkat->nama ?? '' }}
                                                                                </td>
                                                                                <td>{{ $item->roles()->first()->name ?? '-' }}
                                                                                </td>
                                                                                <td>
                                                                                    @if ($item->status == 1)
                                                                                        <span
                                                                                            class="badge bg-success">Aktif</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="badge bg-danger">Non
                                                                                            Aktif</span>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    <a href="{{ route('master.user', $item->id) }}"
                                                                                        class="btn btn-sm btn-primary mr-2 mb-2">Detail
                                                                                    </a>

                                                                                    <button type="button"
                                                                                        class="btn btn-sm btn-danger"
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
