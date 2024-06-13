<div>
    <div class="container">
        <!-- Main content -->
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
                                                            @if ($edit)
                                                                <form class="mt-2 form-horizontal" wire:submit='save'>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <center>
                                                                                    <h4>{{ $form['pegawai']['name'] . ' (' . $form['pegawai']['jabatan']['nama'] . ')' }}
                                                                                    </h4>
                                                                                </center> <br>
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Jenis
                                                                                        Cuti
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control"
                                                                                            wire:model.live='form.cuti_tp'
                                                                                            @if ($edit) disabled @endif>
                                                                                            <option value="">Pilih
                                                                                                Jenis Cuti</option>
                                                                                            @foreach ($listJenisCuti ?? [] as $item)
                                                                                                <option
                                                                                                    value="{{ $item['com_cd'] }}">
                                                                                                    {{ $item['code_nm'] }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @error('form.cuti_tp')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                @if ($form['cuti_tp'] == 'CUTI_TP_04')
                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Jenis
                                                                                            Cuti Alasan Penting
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <select class="form-control"
                                                                                                wire:model='form.cuti_alasan_penting_id'
                                                                                                placeholder="Pilih Kategori"
                                                                                                @if ($edit) disabled @endif>
                                                                                                <option value="">
                                                                                                    Pilih
                                                                                                    Kategori</option>
                                                                                                @foreach ($listCutiAlasanPenting ?? [] as $item)
                                                                                                    <option
                                                                                                        value="{{ $item['id'] }}">
                                                                                                        {{ $item['nama'] }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                            @error('form.cuti_alasan_penting_id')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-6 col-form-label">Tanggal
                                                                                        Mulai Cuti
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            wire:model='form.tgl_mulai'
                                                                                            @if ($edit) disabled @endif>
                                                                                        @error('form.tgl_mulai')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-2  col-form-label">s.d
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            wire:model='form.tgl_selesai'
                                                                                            @if ($edit) disabled @endif>
                                                                                        @error('form.tgl_selesai')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Keterangan
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-8">
                                                                                        <textarea wire:model='form.keterangan' rows="2" class="form-control" placeholder="Alasan Cuti"
                                                                                            @if ($edit) disabled @endif></textarea>
                                                                                        @error('form.keterangan')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                @if ($form['cuti_tp'] != 'CUTI_TP_04')
                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Partner
                                                                                            Delegasi
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                wire:model='form.partner_delegasi'
                                                                                                placeholder="Nama Partner Delegasi"
                                                                                                @if ($edit) disabled @endif>
                                                                                            @error('form.partner_delegasi')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Nomor
                                                                                            Partner
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                wire:model='form.nomor_partner'
                                                                                                placeholder="Nomor Partner"
                                                                                                @if ($edit) disabled @endif>
                                                                                            @error('form.nomor_partner')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-2 row">
                                                                                        <label for="inputEmail3"
                                                                                            class="col-sm-4 col-form-label">Alamat
                                                                                            Selama
                                                                                            Korespondensi Cuti
                                                                                            <small
                                                                                                class="text-danger">*</small></label>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                wire:model='form.alamat'
                                                                                                placeholder="Tuliskan Alamat"
                                                                                                @if ($edit) disabled @endif>
                                                                                            @error('form.alamat')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                @endif

                                                                                <div class="mb-2 row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Status
                                                                                        Pengajuan Cuti
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control"
                                                                                            wire:model='form.status_st'
                                                                                            disabled>
                                                                                            <option value="">
                                                                                                Pilih
                                                                                                Status</option>
                                                                                            @foreach ($listStatus ?? [] as $item)
                                                                                                <option
                                                                                                    value="{{ $item['com_cd'] }}">
                                                                                                    {{ $item['code_nm'] }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @error('form.status_st')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-2 row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Persetujuan
                                                                                        ({{ auth()->user()->name }})
                                                                                        <small
                                                                                            class="text-danger">*</small></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control"
                                                                                            wire:model.live='persetujuanDirektur'
                                                                                            @if ($cekPertujuanDirektur) disabled @endif>
                                                                                            <option value="">
                                                                                                Pilih
                                                                                                Status</option>
                                                                                            @foreach ($listStatus ?? [] as $item)
                                                                                                <option
                                                                                                    value="{{ $item['com_cd'] }}">
                                                                                                    {{ $item['code_nm'] }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @error('persetujuanDirektur')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                @if ($tampilKeterangan)
                                                                                    <div class="row mb-2">
                                                                                        <label for="inputExperience"
                                                                                            class="col-sm-4 col-form-label">Keterangan
                                                                                            Direktur</label>
                                                                                        <div class="col-sm-8">
                                                                                            <textarea rows="2" wire:model='form.keterangan_direktur' class="form-control"></textarea>
                                                                                            @error('form.keterangan_direktur')
                                                                                                <span
                                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>

                                                                        </div>
                                                                        @if (!$cekPertujuanDirektur)
                                                                            <div class="mt-3 card-footer">
                                                                                <button type="submit"
                                                                                    class="btn btn-info">Submit
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="btn btn-default float-right"
                                                                                    wire:click='batal'>Batal
                                                                                </button>
                                                                            </div>
                                                                        @else
                                                                            <div
                                                                                class=" d-grid gap-2 mt-3 card-footer text-center">
                                                                                <button type="button"
                                                                                    wire:click="tutup"
                                                                                    class="btn btn-danger btn-block"><i
                                                                                        class="fa-solid fa-rectangle-xmark mr-2"></i>Tutup</button>
                                                                            </div>
                                                                        @endif
                                                                </form>
                                                            @endif
                                                            <br>

                                                            {{-- <div class="card card-success card-outline"> --}}
                                                            <div class="card-header">
                                                                <div class="card-title">
                                                                    Pengajuan Cuti
                                                                </div>
                                                                <div class="card-tools">
                                                                    <select name="" class="form-control"
                                                                        wire:model.live='idnya'>
                                                                        <option value="">Pilih Pegawai</option>
                                                                        @foreach ($pegawai as $item)
                                                                            <option value="{{ $item->id }}">
                                                                                {{ $item->name ?? '' }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="card-body">
                                                                @if ($idnya)
                                                                    <div class="mb-2">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="info-box">
                                                                                    <span
                                                                                        class="info-box-icon bg-warning elevation-1"><i
                                                                                            class="fas fa-calendar"></i></span>

                                                                                    <div class="info-box-content">
                                                                                        <span
                                                                                            class="info-box-text">Sisa
                                                                                            Cuti
                                                                                            Tahunan</span>
                                                                                        <span class="info-box-number">
                                                                                            {{ $kuotaCutiTahunan }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <!-- /.info-box-content -->
                                                                                </div>
                                                                                <!-- /.info-box -->
                                                                            </div>
                                                                            <!-- /.col -->
                                                                            <div class="col-md-6">
                                                                                <div class="info-box mb-3">
                                                                                    <span
                                                                                        class="info-box-icon bg-danger elevation-1"><i
                                                                                            class="fas fa-user-doctor"></i></span>

                                                                                    <div class="info-box-content">
                                                                                        <span
                                                                                            class="info-box-text">Sisa
                                                                                            Cuti
                                                                                            Tanpa Surat Dokter</span>
                                                                                        <span class="info-box-number">
                                                                                            {{ $kuotaCutiTanpaSuratDokter }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <!-- /.info-box-content -->
                                                                                </div>
                                                                                <!-- /.info-box -->
                                                                            </div>
                                                                            <!-- /.col -->
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <th>No</th>
                                                                            <th>Tanggal</th>
                                                                            <th>Nama</th>
                                                                            <th>Cuti</th>
                                                                            <th>Status</th>
                                                                            <th>Aksi</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($post as $item)
                                                                                <tr wire:key='{{ $item->id }}'>
                                                                                    <td>{{ $loop->index + $post->firstItem() }}
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($item->tgl_mulai == $item->tgl_selesai)
                                                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl_mulai)->isoFormat('D MMMM Y') }}
                                                                                        @else
                                                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl_mulai)->isoFormat('D MMMM ') . ' - ' . \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl_selesai)->isoFormat('D MMMM Y') }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>{{ $item->pegawai->name ?? '' }}
                                                                                    </td>
                                                                                    <td> {{ $item->jenisCuti->code_nm ?? '-' }}
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($item->status_st == 'STATUS_ST_01')
                                                                                            <span
                                                                                                class="badge bg-dark">
                                                                                            @elseif($item->status_st == 'STATUS_ST_02')
                                                                                                <span
                                                                                                    class="badge bg-success">
                                                                                                @else
                                                                                                    <span
                                                                                                        class="badge bg-danger">
                                                                                        @endif
                                                                                        {{ $item->status->code_nm ?? '' }}</span>

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
                                                            {{-- </div> --}}
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
</div>
