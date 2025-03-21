<!-- Modal Detail Pendaftaran -->
<div class="modal fade" id="modal-detail{{$pendaftaran->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{$pendaftaran->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title" id="modalLabel{{$pendaftaran->id}}">
                    <i class="fas fa-user-graduate"></i> Detail Pendaftaran
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Kolom Kiri (Data Akademik) -->
                    <div class="col-md-6">
                        <div class="border rounded p-3">
                            <h5 class="text-primary"><i class="fas fa-school"></i> Data Akademik</h5>
                            <hr>
                            <p><strong>Asal Sekolah/Universitas:</strong> {{ $pendaftaran->asal_sekolah_universitas }}</p>
                            <p><strong>Alamat Sekolah/Universitas:</strong> {{ $pendaftaran->alamat_sekolah_universitas }}</p>
                            <p><strong>NIS/NIM:</strong> {{ $pendaftaran->nis_nim }}</p>
                            <p><strong>Nomor Ijazah:</strong> {{ $pendaftaran->nomor_ijasah }}</p>
                            <p><strong>Tahun Lulus:</strong> {{ $pendaftaran->tahun_lulus }}</p>
                            <p><strong>Program Studi Asal:</strong> {{ $pendaftaran->program_studi_asal }}</p>
                            <p><strong>Program Studi Tujuan:</strong> {{ $pendaftaran->program_studi_tujuan }}</p>
                            <p><strong>Jenjang:</strong> {{ $pendaftaran->jenjang }}</p>
                            <p><strong>Program Kelas:</strong> {{ $pendaftaran->program_kelas }}</p>
                        </div>
                    </div>

                    <!-- Kolom Kanan (Data Pekerjaan) -->
                    <div class="col-md-6">
                        <div class="border rounded p-3">
                            <h5 class="text-primary"><i class="fas fa-briefcase"></i> Data Pekerjaan</h5>
                            <hr>
                            <p><strong>Pekerjaan:</strong> {{ $pendaftaran->pekerjaan ?? '-' }}</p>
                            <p><strong>Perusahaan:</strong> {{ $pendaftaran->perusahaan ?? '-' }}</p>
                            <p><strong>Alamat Perusahaan:</strong> {{ $pendaftaran->alamat_perusahaan ?? '-' }}</p>
                            <p><strong>Lama Bekerja:</strong> {{ $pendaftaran->lama_bekerja ? $pendaftaran->lama_bekerja . ' tahun' : '-' }}</p>
                            <p><strong>Deskripsi Pekerjaan:</strong> {{ $pendaftaran->deskripsi_pekerjaan ?? '-' }}</p>

                            <!-- Tampilkan Sertifikat -->
                            <h5 class="text-primary"><i class="fas fa-file-alt"></i> Sertifikat</h5>
                            @if ($pendaftaran->sertifikat)
                                @php
                                    $fileExtension = pathinfo($pendaftaran->sertifikat, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                    <img src="{{ asset('storage/' . $pendaftaran->sertifikat) }}" class="img-thumbnail mt-2" style="max-width: 100%;">
                                @elseif ($fileExtension === 'pdf')
                                    <a href="{{ asset('storage/' . $pendaftaran->sertifikat) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="fas fa-file-pdf"></i> Lihat Sertifikat (PDF)
                                    </a>
                                @else
                                    <p class="text-muted">Format file tidak didukung.</p>
                                @endif
                            @else
                                <p class="text-muted">Tidak ada sertifikat.</p>
                            @endif
                            <p><strong>Deskripsi Pekerjaan:</strong> {{ $pendaftaran->deskripsi ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
