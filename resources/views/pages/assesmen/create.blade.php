<!-- /.modal -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Tambah Assesmen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('assesmen.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
       <div class="form-group">
    <label for="jadwal_id">Pilih Mahasiswa (dari jadwal disetujui)</label>
    <select class="form-control @error('jadwal_id') is-invalid @enderror" name="jadwal_id" required>
        <option value="" disabled selected>-- Pilih Mahasiswa --</option>
        @foreach($jadwals as $jadwal)
            @php
                $isUsed = in_array($jadwal->id, $usedJadwalIds);
            @endphp
      <option value="{{ $jadwal->id }}" {{ $isUsed ? 'disabled style=color:red;' : '' }}>
    {{ $jadwal->user->name ?? 'Tanpa Nama' }} ({{ $jadwal->jadwal_wawancara }})
    {{ $isUsed ? ' — Sudah dilakukan Assesmen' : '' }}
</option>

        @endforeach
    </select>
    @error('jadwal_id')
        <span class="text-danger"> {{ $message }}</span>
    @enderror
</div>


                    <div class="form-group">
                        <label for="dokumen">Upload Dokumen</label>
                        <input type="file" class="form-control @error('dokumen') is-invalid @enderror" name="dokumen" required>
                        @error('dokumen')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Total SKS</label>
                        <input type="number" class="form-control" name="total_sks" required>
                    </div>

                    <div class="form-group">
                        <label>Total Mata Kuliah</label>
                        <input type="number" class="form-control" name="total_mata_kuliah" required>
                    </div>

                    <div class="form-group">
                        <label>Total SKS yang Ditempuh</label>
                        <input type="number" class="form-control" name="total_sks_ditempuh" required>
                    </div>

                    <div class="form-group">
                        <label>Total Mata Kuliah yang Ditempuh</label>
                        <input type="number" class="form-control" name="total_mata_kuliah_ditempuh" required>
                    </div>
                </div>

                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
