<div>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Spesialis</li>
                </ol>
            </div>
        </div>
    </x-slot>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-success card-outline">
                        <form class="form-horizontal mt-2" wire:submit='save'>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <object data="{{ asset(str_replace('public', 'storage', $pengajuan->path)) }}"
                                            type="application/pdf" width="100%" height="500"
                                            style="border: solid 1px #ccc;">
                                        </object>


                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Judul</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    wire:model="formPengajuan.judul" placeholder="Judul"
                                                    @if (!auth()->user()->hasRole('desa')) disabled @endif>
                                                @error('formPengajuan.judul')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        @if (auth()->user()->hasRole('desa'))
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Upload File
                                                    <small class="text-danger">(*pdf)</small></label>
                                                <div class="col-sm-9">
                                                    <input type="file" wire:model="path" class="form-control"
                                                        accept="application/pdf">
                                                    @error('path')
                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if ($path)
                                                <object data="{{ $lokasi }}" type="application/pdf" width="100%"
                                                    height="500" style="border: solid 1px #ccc;"></object>
                                            @endif

                                            @error('path')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        @endif

                                        @if (auth()->user()->hasRole('kecamatan'))
                                            @if ($kecamatan)
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control"
                                                            wire:model.live="form.pengajuan_tp">
                                                            <option value="">-- Pilih Status --</option>
                                                            @foreach ($status ?? [] as $item)
                                                                <option value="{{ $item['com_cd'] }}">
                                                                    {{ $item['code_nm'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('form.pengajuan_tp')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        @if (auth()->user()->hasRole('dinsos'))
                                            @if ($dinsos)
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control"
                                                            wire:model.live="form.pengajuan_tp">
                                                            <option value="">-- Pilih Status --</option>
                                                            @foreach ($status ?? [] as $item)
                                                                <option value="{{ $item['com_cd'] }}">
                                                                    {{ $item['code_nm'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('form.pengajuan_tp')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                        @if ($keterangan)
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Keterangan</label>
                                                <div class="col-md-9">
                                                    <textarea wire:model="form.keterangan" class="form-control" rows="2"></textarea>
                                                    @error('form.keterangan')
                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif



                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            @if ($edit)
                                @if (auth()->user()->hasRole('desa'))
                                    @if ($desa)
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                    @endif
                                @elseif(auth()->user()->hasRole('kecamatan'))
                                    @if ($kecamatan)
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    @endif
                                @else
                                    @if ($dinsos)
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    @endif
                                    <!-- /.card-footer -->
                                @endif
                            @endif
                        </form>
                        <!-- /.card-header -->
                        <!-- form start -->
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- The time line -->
                    <div class="timeline">

                        @php
                            $lastDate = null;
                        @endphp

                        @foreach ($post as $index => $item)
                            @php
                                $currentDate = \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->format('Y-m-d');
                            @endphp

                            @if ($lastDate != $currentDate)
                                <!-- timeline time label -->
                                <div class="time-label">
                                    @if ($index == 0)
                                        <span class="bg-red">
                                        @else
                                            <span class="bg-dark">
                                    @endif
                                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->isoFormat('D MMMM Y') }}
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                            @endif

                            @php
                                $lastDate = $currentDate;
                            @endphp

                            <!-- timeline item -->
                            <div>
                                {{-- @if ($item->posisinya->code_nm == 'Kecamatan')
                                    <i class="fas fa-circle bg-yellow"></i>
                                @elseif($item->posisinya->code_nm == 'Desa')
                                    <i class="fas fa-circle bg-secondary"></i>
                                @else
                                    <i class="fas fa-circle bg-success"></i>
                                @endif --}}
                                @if ($index == 0)
                                    <i class="fas fa-circle bg-danger"></i>
                                @else
                                    <i class="fas fa-circle bg-secondary"></i>
                                @endif
                                <div class="timeline-item">
                                    <span class="time">
                                        <i class="fas fa-clock"></i>
                                        {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}
                                    </span>
                                    <h3 class="timeline-header">
                                        <a href="#">
                                            {{ $item->posisinya->code_nm ?? '' }}
                                        </a>
                                        @if ($item->pengajuannya)
                                            @if ($item->pengajuannya->code_nm == 'Disetujui')
                                                <span class="badge badge-success">
                                                @else
                                                    <span class="badge badge-danger">
                                            @endif
                                            {{ $item->pengajuannya->code_nm ?? '' }}
                                            </span>
                                        @elseif($item->statusnya)
                                            @if ($item->statusnya->code_nm == 'Menunggu Respon')
                                                <span class="badge badge-dark">
                                                @else
                                                    <span class="badge badge-warning">
                                            @endif
                                            {{ $item->statusnya->code_nm ?? '' }}
                                            </span>
                                        @endif


                                    </h3>

                                    @if ($item->keterangan)
                                        <div class="timeline-body">
                                            {{ $item->keterangan ?? '' }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- END timeline item -->
                        @endforeach

                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-circle bg-secondary"></i>
                            <div class="timeline-item">
                                <span class="time">
                                    <i class="fas fa-clock"></i>
                                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}
                                </span>
                                <h3 class="timeline-header no-border">
                                    <a href="#">{{ $pengajuan->user->name ?? '' }}</a>
                                    melakukan pengajuan dengan judul {{ $pengajuan->judul ?? '' }}
                                </h3>
                            </div>
                        </div>
                        <!-- END timeline item -->

                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->

    </section>
    <!-- /.content -->
</div>
