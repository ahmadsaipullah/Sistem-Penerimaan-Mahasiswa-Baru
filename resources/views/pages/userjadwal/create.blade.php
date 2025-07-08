<!-- Modal Create -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Pengajuan Jadwal Wawancara</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('userjadwal.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jadwal_wawancara">Jadwal Wawancara</label>
                                <input type="text" class="form-control @error('jadwal_wawancara') is-invalid @enderror"
                                    id="jadwal_wawancara" name="jadwal_wawancara" value="{{ old('jadwal_wawancara') }}" required />

                                @error('jadwal_wawancara')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
