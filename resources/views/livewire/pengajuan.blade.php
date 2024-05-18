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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    @if (auth()->user()->hasRole('desa'))
                        <!-- general form elements -->
                        <div class="card card-success card-outline">
                            <form class="form-horizontal mt-2" wire:submit='save'>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Judul</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" wire:model='form.judul'
                                                        placeholder="Judul">
                                                    @error('form.judul')
                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

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

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                    <button type="button" class="btn btn-default float-right"
                                        wire:click='batal'>Batal</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                            <!-- /.card-header -->
                            <!-- form start -->
                        </div>
                    @endif

                    <!-- /.card -->

                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <div class="card-title">
                                Data Spesialis
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" class="form-control" placeholder="cari"
                                        wire:model.live='cari'>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Posisi</th>
                                    <th>Status</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($post as $item)
                                        <tr wire:key='{{ $item->id }}'>

                                            <td>{{ $loop->index + $post->firstItem() }}</td>
                                            <td>{{ $item->created_at ?? '' }}</td>
                                            <td>{{ $item->judul ?? '' }}</td>
                                            <td>{{ $item->statusTerbaru->posisinya->code_nm ?? '' }}</td>
                                            @if ($item->statusTerbaru->pengajuannya)
                                                <td>{{ $item->statusTerbaru->pengajuannya->code_nm ?? '' }}</td>
                                            @else
                                                <td>{{ $item->statusTerbaru->statusnya->code_nm ?? '' }}</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('detail.pengajuan', $item->id) }}"
                                                    class="btn btn-primary btn-flat btn-sm" data-toggle="tooltip"
                                                    data-placement="left" title="Detail"><i
                                                        class="fas fa-eye mr-2"></i>Detail</a>
                                                @if (auth()->user()->hasRole('desa'))
                                                    <button type="button" class="btn btn-danger btn-flat btn-sm"
                                                        wire:click="delete('{{ $item->id }}')"><i
                                                            class="fas fa-trash mr-2"></i>Hapus</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $post->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
