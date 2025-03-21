<!-- /.modal -->
@if(isset($pendaftaran))
<div class="modal fade" id="modal-edit{{$pendaftaran->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Update Pendaftaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <!-- Data Akademik -->
                    <div class="form-group">
                        <label for="asal_sekolah_universitas">Asal Sekolah/Universitas</label>
                        <input type="text" class="form-control @error('asal_sekolah_universitas') is-invalid @enderror"
                            id="asal_sekolah_universitas" name="asal_sekolah_universitas"
                            value="{{ old('asal_sekolah_universitas', $pendaftaran->asal_sekolah_universitas) }}" required />
                        @error('asal_sekolah_universitas') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_sekolah_universitas">Alamat Sekolah/Universitas</label>
                        <input type="text" class="form-control @error('alamat_sekolah_universitas') is-invalid @enderror"
                            id="alamat_sekolah_universitas" name="alamat_sekolah_universitas"
                            value="{{ old('alamat_sekolah_universitas', $pendaftaran->alamat_sekolah_universitas) }}" required />
                        @error('alamat_sekolah_universitas') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nis_nim">NIS/NIM</label>
                        <input type="text" class="form-control @error('nis_nim') is-invalid @enderror"
                            id="nis_nim" name="nis_nim"
                            value="{{ old('nis_nim', $pendaftaran->nis_nim) }}" required />
                        @error('nis_nim') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nomor_ijasah">Nomor Ijazah</label>
                        <input type="text" class="form-control @error('nomor_ijasah') is-invalid @enderror"
                            id="nomor_ijasah" name="nomor_ijasah"
                            value="{{ old('nomor_ijasah', $pendaftaran->nomor_ijasah) }}" required />
                        @error('nomor_ijasah') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror"
                            id="tahun_lulus" name="tahun_lulus"
                            value="{{ old('tahun_lulus', $pendaftaran->tahun_lulus) }}" required />
                        @error('tahun_lulus') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="program_studi_asal">Program Studi Asal</label>
                        <input type="text" class="form-control @error('program_studi_asal') is-invalid @enderror"
                            id="program_studi_asal" name="program_studi_asal"
                            value="{{ old('program_studi_asal', $pendaftaran->program_studi_asal) }}" required />
                        @error('program_studi_asal') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="program_studi_tujuan">Program Studi Tujuan</label>
                        <input type="text" class="form-control @error('program_studi_tujuan') is-invalid @enderror"
                            id="program_studi_tujuan" name="program_studi_tujuan"
                            value="{{ old('program_studi_tujuan', $pendaftaran->program_studi_tujuan) }}" required />
                        @error('program_studi_tujuan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenjang">Jenjang</label>
                        <input type="text" class="form-control @error('jenjang') is-invalid @enderror"
                            id="jenjang" name="jenjang"
                            value="{{ old('jenjang', $pendaftaran->jenjang) }}" required />
                        @error('jenjang') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="program_kelas">Program Kelas</label>
                        <input type="text" class="form-control @error('program_kelas') is-invalid @enderror"
                            id="program_kelas" name="program_kelas"
                            value="{{ old('program_kelas', $pendaftaran->program_kelas) }}" required />
                        @error('program_kelas') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Data Pekerjaan -->
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                            id="pekerjaan" name="pekerjaan"
                            value="{{ old('pekerjaan', $pendaftaran->pekerjaan) }}" />
                        @error('pekerjaan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" class="form-control @error('perusahaan') is-invalid @enderror"
                            id="perusahaan" name="perusahaan"
                            value="{{ old('perusahaan', $pendaftaran->perusahaan) }}" />
                        @error('perusahaan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="lama_bekerja">Lama Bekerja (tahun)</label>
                        <input type="number" class="form-control @error('lama_bekerja') is-invalid @enderror"
                            id="lama_bekerja" name="lama_bekerja"
                            value="{{ old('lama_bekerja', $pendaftaran->lama_bekerja) }}" />
                        @error('lama_bekerja') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Upload Sertifikat -->
                    <div class="form-group">
                        <label for="sertifikat">Upload Sertifikat (PDF/JPG/PNG)</label>
                        <input type="file" class="form-control @error('sertifikat') is-invalid @enderror"
                            id="sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png" />
                        @error('sertifikat') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif
