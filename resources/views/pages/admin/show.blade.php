<!-- Modal Detail Admin -->
<div class="modal fade" id="modal-detail{{$admin->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-center">
                <h4 class="modal-title text-white">Detail Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nama:</strong> {{ $admin->name }}</p>
                        <p><strong>Email:</strong> {{ $admin->email }}</p>
                        <p><strong>Alamat:</strong> {{ $admin->alamat }}</p>
                        <p><strong>Tempat Tanggal Lahir:</strong> {{ $admin->tempat_tanggal_lahir }}</p>
                        <p><strong>No HP:</strong> {{ $admin->no_hp }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $admin->jenis_kelamin }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Pendidikan Terakhir:</strong> {{ $admin->pendidikan_terakhir }}</p>
                        <p><strong>Nama Ayah:</strong> {{ $admin->nama_ayah }}</p>
                        <p><strong>Nama Ibu:</strong> {{ $admin->nama_ibu }}</p>
                        <p><strong>Pekerjaan Ayah:</strong> {{ $admin->pekerjaan_ayah }}</p>
                        <p><strong>Pekerjaan Ibu:</strong> {{ $admin->pekerjaan_ibu }}</p>
                        <p><strong>Nama Wali:</strong> {{ $admin->nama_wali }}</p>
                        <p><strong>Pekerjaan Wali:</strong> {{ $admin->pekerjaan_wali }}</p>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
