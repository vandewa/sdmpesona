<div>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">User</li>
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
                                                            <form class="form-horizontal mt-2" wire:submit='save'>
                                                                <div class="card-body">
                                                                    <legend class="text-center mb-3">Data Pribadi
                                                                    </legend>
                                                                    <hr>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Nama
                                                                                    <small class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.name'
                                                                                        placeholder="Nama">
                                                                                    @error('form.name')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Email
                                                                                    <small class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
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

                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">ID
                                                                                    Karyawan
                                                                                    <small class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.id_karyawan'
                                                                                        placeholder="ID Karyawan">
                                                                                    @error('form.id_karyawan')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Jenis
                                                                                    Kelamin
                                                                                    <small class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model='form.jk'>
                                                                                        <option value="">Pilih
                                                                                            Jenis Kelamin</option>
                                                                                        <option value="l">Laki-laki
                                                                                        </option>
                                                                                        <option value="p">Perempuan
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('form.jk')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">
                                                                                    Telepon
                                                                                    <small class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.telpon'
                                                                                        placeholder="Nomor Telepon">
                                                                                    @error('form.telpon')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Alamat
                                                                                    <small class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <textarea name="alamat" rows="2" wire:model='form.alamat' class="form-control"></textarea>
                                                                                    @error('form.alamat')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputName"
                                                                                    class="col-sm-4 col-form-label">Pendidikan
                                                                                    Terakhir</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model='form.tunjangan_pendidikan_id'>
                                                                                        <option value="">Pilih
                                                                                            Pendidikan</option>
                                                                                        @foreach ($listPendidikan ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['id'] }}">
                                                                                                {{ $item['nama'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('form.tunjangan_pendidikan_id')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>





                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Tanggal
                                                                                    Lahir
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        wire:model='form.tgl_lahir'
                                                                                        placeholder="tgl_lahir">
                                                                                    @error('form.tgl_lahir')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">NPWP
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.npwp'
                                                                                        placeholder="NPWP">
                                                                                    @error('form.npwp')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">NIK
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.ktp'
                                                                                        placeholder="NIK">
                                                                                    @error('form.ktp')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Status
                                                                                    Kawin
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model='form.kawin_tp'>
                                                                                        <option value="">Pilih
                                                                                            Status Kawin</option>
                                                                                        @foreach ($listKawin ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['com_cd'] }}">
                                                                                                {{ $item['code_nm'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('form.kawin_tp')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Jumlah
                                                                                    Anak
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.anak'
                                                                                        placeholder="Jumlah Anak">
                                                                                    @error('form.anak')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Akun
                                                                                    Bank
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.bank'
                                                                                        placeholder="Nama Bank">
                                                                                    @error('form.bank')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Nomor
                                                                                    Rekening
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        wire:model='form.rekening'
                                                                                        placeholder="Nomor Rekening">
                                                                                    @error('form.rekening')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <legend class="text-center mb-3 mt-3">Data
                                                                        Pekerjaan</legend>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            {{-- <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Status
                                                                                    Pekerjaan
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model='form.status_pekerjaan_id'>
                                                                                        <option value="">Pilih
                                                                                            Status Pekerjaan</option>
                                                                                        @foreach ($listStatusPekerjaan ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['id'] }}">
                                                                                                {{ $item['nama'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('form.status_pekerjaan_id')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div> --}}
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Nama
                                                                                    Jabatan Awal
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model='form.nama_jabatan_id'>
                                                                                        <option value="">Pilih
                                                                                            Nama Jabatan</option>
                                                                                        @foreach ($listNamaJabatan ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['id'] }}">
                                                                                                {{ $item['nama'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('form.nama_jabatan_id')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Status
                                                                                    Pekerjaan Awal
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model='form.tingkat_pekerjaan_awal_id'>
                                                                                        <option value="">Pilih
                                                                                            Nama Jabatan</option>
                                                                                        @foreach ($listTingkatPekerjaanAwal ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['id'] }}">
                                                                                                {{ $item['nama'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('form.tingkat_pekerjaan_awal_id')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Tanggal
                                                                                    Penetapan Jabatan Awal
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        wire:model='form.tgl_penetapan_jabatan_awal'>
                                                                                    @error('form.tgl_penetapan_jabatan_awal')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>



                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Tanggal
                                                                                    Masuk
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        wire:model='form.tgl_masuk'
                                                                                        placeholder="tgl_masuk">
                                                                                    @error('form.tgl_masuk')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <div class="col-md-12">
                                                                                    <center>
                                                                                        <h5>Masa Kerja
                                                                                            <b>{{ $masaKerja ?? '' }}</b>
                                                                                            Tahun
                                                                                        </h5>
                                                                                    </center>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Masa
                                                                                    Kerja
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model='form.tunjangan_masa_kerja_id'>
                                                                                        <option value="">Pilih
                                                                                            Masa Kerja</option>
                                                                                        @foreach ($listMasaKerja ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['id'] }}">
                                                                                                {{ $item['nama'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('form.tunjangan_masa_kerja_id')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Tanggal
                                                                                    Keluar
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        wire:model='form.tgl_keluar'
                                                                                        placeholder="tgl_keluar">
                                                                                    @error('form.tgl_keluar')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Gaji
                                                                                    Pokok Pertama
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        wire:model='form.gapok_awal'
                                                                                        placeholder="Gaji Pokok Pertama ">
                                                                                    @error('form.gapok_awal')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Tanggal
                                                                                    Penetapan Gapok Awal
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        wire:model='form.tgl_penetapan_gapok_awal'>
                                                                                    @error('form.tgl_penetapan_gapok_awal')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                    <hr>

                                                                    <div class="row">

                                                                        @if ($edit)
                                                                            <div class="col-md-6">
                                                                                <div class="row mb-1">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Nama
                                                                                        Jabatan Sekarang
                                                                                        <small
                                                                                            class="text-danger">*</small>
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control"
                                                                                            wire:model='form.nama_jabatan_sekarang_id'
                                                                                            disabled>
                                                                                            <option value="">
                                                                                                Pilih
                                                                                                Nama Jabatan</option>
                                                                                            @foreach ($listNamaJabatan ?? [] as $item)
                                                                                                <option
                                                                                                    value="{{ $item['id'] }}">
                                                                                                    {{ $item['nama'] }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @error('form.nama_jabatan_sekarang_id')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-1">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Status
                                                                                        Pekerjaan Sekarang
                                                                                        <small
                                                                                            class="text-danger">*</small>
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control"
                                                                                            wire:model='form.tingkat_pekerjaan_sekarang_id'
                                                                                            disabled>
                                                                                            <option value="">
                                                                                                Pilih
                                                                                                Nama Jabatan</option>
                                                                                            @foreach ($listTingkatPekerjaanAwal ?? [] as $item)
                                                                                                <option
                                                                                                    value="{{ $item['id'] }}">
                                                                                                    {{ $item['nama'] }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @error('form.tingkat_pekerjaan_sekarang_id')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-1">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-4 col-form-label">Gaji
                                                                                        Pokok Saat Ini
                                                                                        <small
                                                                                            class="text-danger">*</small>
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model='form.gapok_sekarang'
                                                                                            placeholder="Gaji Pokok Saat Ini"
                                                                                            disabled>
                                                                                        @error('form.gapok_sekarang')
                                                                                            <span
                                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <div class="col-md-6">
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Role</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        wire:model='role'>
                                                                                        <option value="">Pilih
                                                                                            Role</option>
                                                                                        @foreach ($listRole ?? [] as $item)
                                                                                            <option
                                                                                                value="{{ $item['id'] }}">
                                                                                                {{ $item['name'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('role')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Status
                                                                                    User</label>
                                                                                <div class="col-sm-8">
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
                                                                    </div>


                                                                    @if ($edit)
                                                                        <legend class="text-center mt-4">Ganti Password
                                                                        </legend>
                                                                        <hr>
                                                                    @endif

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Password
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="password"
                                                                                        class="form-control"
                                                                                        wire:model='form.password'
                                                                                        placeholder="Password">
                                                                                    @error('form.password')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-2">
                                                                                <label for="inputEmail3"
                                                                                    class="col-sm-4 col-form-label">Konfirmasi
                                                                                    Password
                                                                                    <small
                                                                                        class="text-danger">*</small>
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="password"
                                                                                        class="form-control"
                                                                                        wire:model='konfirmasi_password'
                                                                                        placeholder="Konfirmasi Password">
                                                                                    @error('konfirmasi_password')
                                                                                        <span
                                                                                            class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                                <div class="card-footer">
                                                                    <button type="submit" class="btn btn-info">Simpan
                                                                    </button>
                                                                    <a href="{{ route('master.user-index') }}"
                                                                        class="btn btn-warning float-right">Kembali
                                                                    </a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <br>
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
