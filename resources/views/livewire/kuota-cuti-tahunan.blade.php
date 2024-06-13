<div>
    <div class="modal fade show" id="modal-default" style="display: block;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kuota Cuti Tahunan</h4>
                </div>
                <div class="modal-body">
                    <form class="mt-2 form-horizontal" wire:submit='save'>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center">Pegawai Tetap</h4>
                                    <hr>
                                    <div class="mb-2 row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah
                                            <small class="text-danger">*</small></label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" wire:model='form.jumlah'
                                                placeholder="Jumlah Kuota Cuti Tahunan">
                                            @error('form.jumlah')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <h4 class="text-center mt-5">Pegawai Partimer</h4>
                                    <hr>
                                    <div class="mb-2 row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah
                                            <small class="text-danger">*</small></label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" wire:model='form2.jumlah'
                                                placeholder="Jumlah Kuota Cuti Tahunan">
                                            @error('form2.jumlah')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 card-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <button type="button" class="btn btn-default float-right"
                                    wire:click='batal'>Kembali</button>
                            </div>
                    </form>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
