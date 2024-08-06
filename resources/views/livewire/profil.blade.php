<div>
    <x-slot name="header">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Data Diri</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Diri</li>
                    {{-- <li class="breadcrumb-item"><a href="#">Jenis UTTP</a></li> --}}
                </ol>
            </div>
        </div>
    </x-slot>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-info card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if ($form['path_foto'])
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ route('helper.show-picture', ['path' => $form['path_foto']]) }}"
                                        alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('soul.png') }}"
                                        alt="User profile picture">
                                @endif

                            </div>

                            <h3 class="profile-username text-center">{{ $form['name'] ?? '-' }}</h3>


                            <ul class="list-group list-group-unbordered mb-3 mt-3">
                                <li class="list-group-item">
                                    <b>ID Karyawan</b> <br>
                                    <span>{{ $idKaryawan }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Jabatan</b> <br>
                                    <span>{{ $jabatan }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <br>
                                    <span>{{ $status }}</span>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" wire:submit='save'>
                                        <legend>Data Diri</legend>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div x-data="{ uploading: false, progress: 0 }"
                                                    x-on:livewire-upload-start="uploading = true"
                                                    x-on:livewire-upload-finish="uploading = false"
                                                    x-on:livewire-upload-cancel="uploading = false"
                                                    x-on:livewire-upload-error="uploading = false"
                                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                    <div>
                                                        @if ($photo)
                                                            <img src="{{ $photo->temporaryUrl() }}"
                                                                style="max-width: 200px;">
                                                        @endif
                                                    </div>

                                                    <div>
                                                        <span>Ganti Foto</span>
                                                        <input type="file" wire:model='photo' class="form-control"
                                                            accept="image/*">
                                                        @error('photo')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div x-show="uploading">
                                                            <progress max="100"
                                                                x-bind:value="progress"></progress>
                                                            <span x-text="progress"><!-- Will output: "bar" -->
                                                            </span> %
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Nama</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            wire:model='form.name' placeholder="Nama Lengkap">
                                                        @error('form.name')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-4 col-form-label">NIK</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" wire:model='form.ktp'
                                                            placeholder="Nomor Induk Kependudukan">
                                                        @error('form.ktp')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-4 col-form-label">NPWP</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            wire:model='form.npwp' placeholder="Nomor NPWP">
                                                        @error('form.npwp')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Jenis
                                                        Kelamin</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" wire:model='form.jk'>
                                                            <option value="">Pilih
                                                                Jenis Kelamin</option>
                                                            <option value="l">Laki-laki
                                                            </option>
                                                            <option value="p">Perempuan
                                                            </option>
                                                        </select>
                                                        @error('form.jk')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Tanggal
                                                        Lahir</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control"
                                                            wire:model='form.tgl_lahir' placeholder="tgl_lahir">
                                                        @error('form.tgl_lahir')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <label for="inputEmail"
                                                        class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control"
                                                            wire:model='form.email' placeholder="Email">
                                                        @error('form.email')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="inputExperience"
                                                        class="col-sm-4 col-form-label">Alamat</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="alamat" rows="2" wire:model='form.alamat' class="form-control"></textarea>
                                                        @error('form.alamat')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-5 col-form-label">Nomor
                                                        WhatsApp</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control"
                                                            wire:model='form.telpon'
                                                            placeholder="Contoh: 081xxxxxxxx">
                                                        @error('form.telpon')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-5 col-form-label">Status
                                                        Kawin</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" wire:model='form.kawin_tp'>
                                                            <option value="">Pilih
                                                                Status Kawin</option>
                                                            @foreach ($listKawin ?? [] as $item)
                                                                <option value="{{ $item['com_cd'] }}">
                                                                    {{ $item['code_nm'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('form.kawin_tp')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-5 col-form-label">Jumlah
                                                        Anak</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control"
                                                            wire:model='form.anak' placeholder="Jumlah Anak">
                                                        @error('form.anak')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-5 col-form-label">Pendidikan
                                                        Terakhir</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control"
                                                            wire:model='form.tunjangan_pendidikan_id'>
                                                            <option value="">Pilih
                                                                Pendidikan</option>
                                                            @foreach ($listPendidikan ?? [] as $item)
                                                                <option value="{{ $item['id'] }}">
                                                                    {{ $item['nama'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('form.tunjangan_pendidikan_id')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="inputName"
                                                        class="col-sm-5 col-form-label">Bank</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control"
                                                            wire:model='form.bank' placeholder="Nama Bank">
                                                        @error('form.bank')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <label for="inputName" class="col-sm-5 col-form-label">No
                                                        Rekening</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control"
                                                            wire:model='form.rekening' placeholder="Nomor Rekening">
                                                        @error('form.rekening')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div x-data="{ uploading: false, progress: 0 }"
                                                    x-on:livewire-upload-start="uploading = true"
                                                    x-on:livewire-upload-finish="uploading = false"
                                                    x-on:livewire-upload-cancel="uploading = false"
                                                    x-on:livewire-upload-error="uploading = false"
                                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                    <div>
                                                        @if ($form['path_tanda_tangan'])
                                                            <img src="{{ asset(str_replace('public', 'storage', $form['path_tanda_tangan'])) }}"
                                                                style="max-width: 200px;">
                                                        @endif
                                                    </div>

                                                    <div>
                                                        <span><b>Tanda Tangan</b></span>
                                                        <input type="file" wire:model='ttd' class="form-control"
                                                            accept="image/*">
                                                        @error('ttd')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div x-show="uploading">
                                                            <progress max="100"
                                                                x-bind:value="progress"></progress>
                                                            <span x-text="progress"><!-- Will output: "bar" -->
                                                            </span> %
                                                        </div>
                                                    </div>
                                                    <div>
                                                        @if ($ttd)
                                                            <img src="{{ $ttd->temporaryUrl() }}"
                                                                style="max-width: 200px;">
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check mb-3 mt-3">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                wire:model.live='check'>
                                            <label class="form-check-label" for="exampleCheck1"><b>Ganti
                                                    Password</b></label>
                                        </div>

                                        @if ($check)
                                            <div class="mt-3">
                                                <center>
                                                    <h5>Ganti Password</h5>
                                                </center>
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row mb-2">
                                                        <label for="inputName"
                                                            class="col-sm-4 col-form-label">Password</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control"
                                                                wire:model='password'>
                                                            @error('password')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row mb-2">
                                                        <label for="inputName"
                                                            class="col-sm-4 col-form-label">Konfirmasi
                                                            Password</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control"
                                                                wire:model='password_confirmation'>
                                                            @error('password_confirmation')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row mb-2">
                                            <div class="offset-sm-2 col-sm-8">
                                                <button type="submit" class="btn btn-info">Update</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
