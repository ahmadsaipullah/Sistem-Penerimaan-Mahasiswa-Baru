@if(isset($jadwal))
<!-- Modal Edit -->
<div class="modal fade" id="modal-edit{{$jadwal->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{$jadwal->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-center">
                <h4 class="modal-title text-white" id="modalEditLabel{{$jadwal->id}}">Edit jadwal</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="jadwal_wawancara">Jadwal Wawancara</label>
                                <input type="text" class="form-control" name="jadwal_wawancara" value="{{ $jadwal->jadwal_wawancara }}" required>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" readonly value="{{$jadwal->keterangan}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
