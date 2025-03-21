<!-- Modal Detail Pendaftaran -->
<div class="modal fade" id="modal-detail{{$pendaftaran->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-center">
                <h4 class="modal-title text-white">Detail Pendaftaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Kolom Kiri (Data Akademik) -->
                    <div class="col-md-6">
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

                    <!-- Kolom Kanan (Data Pekerjaan) -->
                    <div class="col-md-6">
                        <p><strong>Pekerjaan:</strong> {{ $pendaftaran->pekerjaan ?? '-' }}</p>
                        <p><strong>Perusahaan:</strong> {{ $pendaftaran->perusahaan ?? '-' }}</p>
                        <p><strong>Alamat Perusahaan:</strong> {{ $pendaftaran->alamat_perusahaan ?? '-' }}</p>
                        <p><strong>Lama Bekerja:</strong> {{ $pendaftaran->lama_bekerja ? $pendaftaran->lama_bekerja . ' tahun' : '-' }}</p>
                        <p><strong>Deskripsi Pekerjaan:</strong> {{ $pendaftaran->deskripsi_pekerjaan ?? '-' }}</p>

                        <!-- Tampilkan Sertifikat -->
                        <p><strong>Sertifikat:</strong></p>
                        @if ($pendaftaran->sertifikat)
                            @php
                                $fileExtension = pathinfo($pendaftaran->sertifikat, PATHINFO_EXTENSION);
                            @endphp
                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                <img src="{{ asset('storage/' . $pendaftaran->sertifikat) }}" alt="Sertifikat" class="img-fluid mb-2" style="max-width: 200px;">
                            @elseif ($fileExtension === 'pdf')
                                <a href="{{ asset('storage/' . $pendaftaran->sertifikat) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    Lihat Sertifikat (PDF)
                                </a>
                            @else
                                <p class="text-muted">Format file tidak didukung.</p>
                            @endif
                        @else
                            <p class="text-muted">Tidak ada sertifikat.</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.modal-body -->

            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
