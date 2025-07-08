<!-- Modal Create -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Pendaftaran Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('userpendaftaran.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <h5 class="mb-3">Data Akademik</h5>

                            @foreach([
                                'asal_sekolah_universitas' => 'Asal Sekolah/Universitas',
                                'alamat_sekolah_universitas' => 'Alamat Sekolah/Universitas',
                                'nis_nim' => 'NIS/NIM',
                                'nomor_ijasah' => 'Nomor Ijazah',
                                'tahun_lulus' => 'Tahun Lulus',
                                'program_studi_asal' => 'Program Studi Asal',
                                'program_studi_tujuan' => 'Program Studi Tujuan',
                                'program_kelas' => 'Program Kelas'
                            ] as $field => $label)
                                <div class="form-group">
                                    <label for="{{ $field }}">{{ $label }}</label>
                                    <input type="{{ $field == 'tahun_lulus' ? 'number' : 'text' }}"
                                           class="form-control @error($field) is-invalid @enderror"
                                           id="{{ $field }}"
                                           name="{{ $field }}"
                                           value="{{ old($field) }}"
                                           required />
                                    @error($field)
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="form-group">
                                <label for="jenjang">Jenjang</label>
                                <select class="form-control @error('jenjang') is-invalid @enderror"
                                        id="jenjang"
                                        name="jenjang"
                                        required>
                                    <option value="">-- Pilih Jenjang --</option>
                                    <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
                                </select>
                                @error('jenjang')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <h5 class="mb-3">Data Pekerjaan</h5>

                            @foreach([
                                'pekerjaan' => 'Pekerjaan',
                                'perusahaan' => 'Perusahaan',
                                'alamat_perusahaan' => 'Alamat Perusahaan',
                                'lama_bekerja' => 'Lama Bekerja (tahun)'
                            ] as $field => $label)
                                <div class="form-group">
                                    <label for="{{ $field }}">{{ $label }}</label>
                                    <input type="{{ $field == 'lama_bekerja' ? 'number' : 'text' }}"
                                           class="form-control @error($field) is-invalid @enderror"
                                           id="{{ $field }}"
                                           name="{{ $field }}"
                                           value="{{ old($field) }}" />
                                    @error($field)
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="form-group">
                                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                <textarea class="form-control @error('deskripsi_pekerjaan') is-invalid @enderror"
                                          id="deskripsi_pekerjaan"
                                          name="deskripsi_pekerjaan"
                                          rows="3">{{ old('deskripsi_pekerjaan') }}</textarea>
                                @error('deskripsi_pekerjaan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <h5 class="mb-3 mt-4">Upload Sertifikat</h5>

                            <div class="form-group">
                                <label for="sertifikat">Upload Sertifikat (PDF/JPG/PNG)</label>
                                <input type="file"
                                       class="form-control @error('sertifikat') is-invalid @enderror"
                                       id="sertifikat"
                                       name="sertifikat"
                                       accept=".pdf,.jpg,.jpeg,.png" />
                                @error('sertifikat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Tambahan</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                          id="deskripsi"
                                          name="deskripsi"
                                          rows="3">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
