<div class="modal fade show" id="modal-default"
    @if ($modal) style="display: block;" @else style="display: none;" @endif>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" wire:click='showModal' class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <th>Nama</th>
                        <th>Nominal</th>
                    </thead>
                    <tbody>
                        <td><b> Tunjangan KPI Pelaksana Divisi dan Direksi</b></td>
                        @foreach ($posts as $item)
                            <tr wire:key='{{ $item->icd_cd }}'>
                                <td>{{ $item->nama ?? '' }}</td>
                                <td>{{ \Laraindo\RupiahFormat::currency($item->nominal) }}</td>
                            </tr>
                        @endforeach
                        <td><b> Tunjangan KPI Partimer</b></td>
                        @foreach ($posts2 as $item)
                            <tr wire:key='{{ $item->icd_cd }}'>
                                <td>{{ $item->nama ?? '' }}</td>
                                <td>{{ \Laraindo\RupiahFormat::currency($item->nominal) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"
                    wire:click='showModal'>Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
