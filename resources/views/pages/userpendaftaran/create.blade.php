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
            <form action="{{ route('pendaftaran.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <h5 class="mb-3">Data Akademik</h5>

                            <div class="form-group">
                                <label for="asal_sekolah_universitas">Asal Sekolah/Universitas</label>
                                <input type="text" class="form-control" id="asal_sekolah_universitas" name="asal_sekolah_universitas" required />
                            </div>

                            <div class="form-group">
                                <label for="alamat_sekolah_universitas">Alamat Sekolah/Universitas</label>
                                <input type="text" class="form-control" id="alamat_sekolah_universitas" name="alamat_sekolah_universitas" required />
                            </div>

                            <div class="form-group">
                                <label for="nis_nim">NIS/NIM</label>
                                <input type="text" class="form-control" id="nis_nim" name="nis_nim" required />
                            </div>

                            <div class="form-group">
                                <label for="nomor_ijasah">Nomor Ijazah</label>
                                <input type="text" class="form-control" id="nomor_ijasah" name="nomor_ijasah" required />
                            </div>

                            <div class="form-group">
                                <label for="tahun_lulus">Tahun Lulus</label>
                                <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" required />
                            </div>

                            <div class="form-group">
                                <label for="program_studi_asal">Program Studi Asal</label>
                                <input type="text" class="form-control" id="program_studi_asal" name="program_studi_asal" required />
                            </div>

                            <div class="form-group">
                                <label for="program_studi_tujuan">Program Studi Tujuan</label>
                                <input type="text" class="form-control" id="program_studi_tujuan" name="program_studi_tujuan" required />
                            </div>

                            <div class="form-group">
                                <label for="jenjang">Jenjang</label>
                                <select class="form-control" id="jenjang" name="jenjang" required>
                                    <option value="">-- Pilih Jenjang --</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="program_kelas">Program Kelas</label>
                                <input type="text" class="form-control" id="program_kelas" name="program_kelas" required />
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <h5 class="mb-3">Data Pekerjaan</h5>

                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" />
                            </div>

                            <div class="form-group">
                                <label for="perusahaan">Perusahaan</label>
                                <input type="text" class="form-control" id="perusahaan" name="perusahaan" />
                            </div>

                            <div class="form-group">
                                <label for="alamat_perusahaan">Alamat Perusahaan</label>
                                <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" />
                            </div>

                            <div class="form-group">
                                <label for="lama_bekerja">Lama Bekerja (tahun)</label>
                                <input type="number" class="form-control" id="lama_bekerja" name="lama_bekerja" />
                            </div>

                            <div class="form-group">
                                <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                <textarea class="form-control" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" rows="3"></textarea>
                            </div>

                            <h5 class="mb-3 mt-4">Upload Sertifikat</h5>

                            <div class="form-group">
                                <label for="sertifikat">Upload Sertifikat (PDF/JPG/PNG)</label>
                                <input type="file" class="form-control" id="sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png" />
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Tambahan</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
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
