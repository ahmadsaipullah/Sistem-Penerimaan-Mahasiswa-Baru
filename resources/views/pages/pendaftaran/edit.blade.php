@if(isset($pendaftaran))
<div class="modal fade" id="modal-edit{{$pendaftaran->id}}" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title fw-bold">Update Pendaftaran</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Form Start -->
            <form action="{{ route('userpendaftaran.update', $pendaftaran->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row">
                        <!-- Data Akademik -->
                        <div class="col-md-6">
                            <h5 class="text-primary fw-bold mb-3">Data Akademik</h5>

                            <div class="form-group">
                                <label for="asal_sekolah_universitas">Asal Sekolah/Universitas</label>
                                <input type="text" class="form-control" name="asal_sekolah_universitas"
                                    value="{{ old('asal_sekolah_universitas', $pendaftaran->asal_sekolah_universitas) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat_sekolah_universitas">Alamat Sekolah/Universitas</label>
                                <input type="text" class="form-control" name="alamat_sekolah_universitas"
                                    value="{{ old('alamat_sekolah_universitas', $pendaftaran->alamat_sekolah_universitas) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nis_nim">NIS/NIM</label>
                                <input type="text" class="form-control" name="nis_nim"
                                    value="{{ old('nis_nim', $pendaftaran->nis_nim) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nomor_ijasah">Nomor Ijazah</label>
                                <input type="text" class="form-control" name="nomor_ijasah"
                                    value="{{ old('nomor_ijasah', $pendaftaran->nomor_ijasah) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tahun_lulus">Tahun Lulus</label>
                                <input type="number" class="form-control" name="tahun_lulus"
                                    value="{{ old('tahun_lulus', $pendaftaran->tahun_lulus) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="program_studi_asal">Program Studi Asal</label>
                                <input type="text" class="form-control" name="program_studi_asal"
                                    value="{{ old('program_studi_asal', $pendaftaran->program_studi_asal) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="program_studi_tujuan">Program Studi Tujuan</label>
                                <input type="text" class="form-control" name="program_studi_tujuan"
                                    value="{{ old('program_studi_tujuan', $pendaftaran->program_studi_tujuan) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="jenjang">Jenjang</label>
                                <select name="jenjang" id="jenjang" class="form-control" required>
                                    <option value="">-- Pilih Jenjang --</option>
                                    <option value="S1" {{ old('jenjang', $pendaftaran->jenjang ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('jenjang', $pendaftaran->jenjang ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="program_kelas">Program Kelas</label>
                                <input type="text" class="form-control" name="program_kelas"
                                    value="{{ old('program_kelas', $pendaftaran->program_kelas) }}" required>
                            </div>
                        </div>

                        <!-- Data Pekerjaan -->
                        <div class="col-md-6">
                            <h5 class="text-primary fw-bold mb-3">Data Pekerjaan</h5>

                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan"
                                    value="{{ old('pekerjaan', $pendaftaran->pekerjaan) }}">
                            </div>

                            <div class="form-group">
                                <label for="perusahaan">Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan"
                                    value="{{ old('perusahaan', $pendaftaran->perusahaan) }}">
                            </div>

                            <div class="form-group">
                                <label for="alamat_perusahaan">Alamat Perusahaan</label>
                                <input type="text" class="form-control" name="alamat_perusahaan"
                                    value="{{ old('alamat_perusahaan', $pendaftaran->alamat_perusahaan) }}">
                            </div>

                            <div class="form-group">
                                <label for="lama_bekerja">Lama Bekerja (tahun)</label>
                                <input type="number" class="form-control" name="lama_bekerja"
                                    value="{{ old('lama_bekerja', $pendaftaran->lama_bekerja) }}">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                <textarea class="form-control" name="deskripsi_pekerjaan">{{ old('deskripsi_pekerjaan', $pendaftaran->deskripsi_pekerjaan) }}</textarea>
                            </div>

                            <h5 class="text-primary fw-bold mt-4">Upload Sertifikat</h5>
                            <div class="form-group">
                                <label for="sertifikat">Sertifikat Lama:</label>
                                @if ($pendaftaran->sertifikat)
                                    @php
                                        $fileExtension = pathinfo($pendaftaran->sertifikat, PATHINFO_EXTENSION);
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ asset('storage/' . $pendaftaran->sertifikat) }}" class="img-thumbnail mt-2" style="max-width: 100%;">
                                    @elseif ($fileExtension === 'pdf')
                                        <a href="{{ asset('storage/' . $pendaftaran->sertifikat) }}" target="_blank" class="btn btn-sm btn-success mt-2">
                                            <i class="fas fa-file-pdf"></i> Lihat Sertifikat Lama
                                        </a>
                                    @else
                                        <p class="text-muted">Format file tidak didukung.</p>
                                    @endif
                                @else
                                    <p class="text-muted">Tidak ada sertifikat.</p>
                                @endif
                                <input type="file" class="form-control mt-2" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
