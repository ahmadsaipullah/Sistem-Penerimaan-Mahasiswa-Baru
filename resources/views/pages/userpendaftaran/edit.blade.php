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

                            @foreach([
                                'asal_sekolah_universitas' => 'Asal Sekolah/Universitas',
                                'alamat_sekolah_universitas' => 'Alamat Sekolah/Universitas',
                                'nis_nim' => 'NIS/NIM',
                                'nomor_ijasah' => 'Nomor Ijazah',
                                'tahun_lulus' => 'Tahun Lulus',
                                'program_studi_asal' => 'Program Studi Asal',
                                'program_studi_tujuan' => 'Program Studi Tujuan',
                                'program_kelas' => 'Program Kelas',
                            ] as $field => $label)
                                <div class="form-group">
                                    <label for="{{ $field }}">{{ $label }}</label>
                                    <input type="{{ $field == 'tahun_lulus' ? 'number' : 'text' }}"
                                        class="form-control @error($field) is-invalid @enderror"
                                        name="{{ $field }}"
                                        value="{{ old($field, $pendaftaran->$field) }}"
                                        required>
                                    @error($field)
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="form-group">
                                <label for="jenjang">Jenjang</label>
                                <select name="jenjang" id="jenjang" class="form-control @error('jenjang') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenjang --</option>
                                    <option value="S1" {{ old('jenjang', $pendaftaran->jenjang) == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('jenjang', $pendaftaran->jenjang) == 'S2' ? 'selected' : '' }}>S2</option>
                                </select>
                                @error('jenjang')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Data Pekerjaan -->
                        <div class="col-md-6">
                            <h5 class="text-primary fw-bold mb-3">Data Pekerjaan</h5>

                            @foreach([
                                'pekerjaan' => 'Pekerjaan',
                                'perusahaan' => 'Perusahaan',
                                'alamat_perusahaan' => 'Alamat Perusahaan',
                                'lama_bekerja' => 'Lama Bekerja (tahun)',
                            ] as $field => $label)
                                <div class="form-group">
                                    <label for="{{ $field }}">{{ $label }}</label>
                                    <input type="{{ $field == 'lama_bekerja' ? 'number' : 'text' }}"
                                        class="form-control @error($field) is-invalid @enderror"
                                        name="{{ $field }}"
                                        value="{{ old($field, $pendaftaran->$field) }}">
                                    @error($field)
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="form-group">
                                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                <textarea class="form-control @error('deskripsi_pekerjaan') is-invalid @enderror"
                                    name="deskripsi_pekerjaan">{{ old('deskripsi_pekerjaan', $pendaftaran->deskripsi_pekerjaan) }}</textarea>
                                @error('deskripsi_pekerjaan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
                                <input type="file" class="form-control mt-2 @error('sertifikat') is-invalid @enderror" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png">
                                @error('sertifikat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Sertifikat</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi">{{ old('deskripsi', $pendaftaran->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
