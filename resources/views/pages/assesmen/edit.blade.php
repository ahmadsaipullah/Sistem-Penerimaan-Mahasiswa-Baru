<!-- /.modal -->
@if(isset($assesmen))
<div class="modal fade" id="modal-edit{{$assesmen->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-center">
                <h4 class="modal-title text-white">Edit Assesmen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('assesmen.update', $assesmen->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label for="jadwal_id">Pilih Mahasiswa</label>
                        <select class="form-control" name="jadwal_id" required>
                            <option value="" disabled>-- Pilih Mahasiswa --</option>
                            @foreach($jadwals as $jadwal)
                                <option value="{{ $jadwal->id }}" {{ $assesmen->jadwal_id == $jadwal->id ? 'selected' : '' }}>
                                    {{ $jadwal->user->name ?? 'Tanpa Nama' }} ({{ $jadwal->jadwal_wawancara }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dokumen">Upload Dokumen Baru (Kosongkan jika tidak diubah)</label>
                        <input type="file" class="form-control @error('dokumen') is-invalid @enderror" name="dokumen">
                        @error('dokumen')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                        <small class="text-muted">Dokumen saat ini: <a href="{{ asset('storage/' . $assesmen->dokumen) }}" target="_blank">Lihat</a></small>
                    </div>

                    <div class="form-group">
                        <label>Total SKS</label>
                        <input type="number" class="form-control" name="total_sks" value="{{ old('total_sks', $assesmen->total_sks) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Total Mata Kuliah</label>
                        <input type="number" class="form-control" name="total_mata_kuliah" value="{{ old('total_mata_kuliah', $assesmen->total_mata_kuliah) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Total SKS yang Ditempuh</label>
                        <input type="number" class="form-control" name="total_sks_ditempuh" value="{{ old('total_sks_ditempuh', $assesmen->total_sks_ditempuh) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Total Mata Kuliah yang Ditempuh</label>
                        <input type="number" class="form-control" name="total_mata_kuliah_ditempuh" value="{{ old('total_mata_kuliah_ditempuh', $assesmen->total_mata_kuliah_ditempuh) }}" required>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
