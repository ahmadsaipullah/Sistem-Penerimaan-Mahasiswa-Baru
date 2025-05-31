<!-- Modal Create -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Upload Dokumen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('userdokumen.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ktp">Upload KTP (JPG/PNG/JPEG)</label>
                                <input type="file" class="form-control" id="ktp" name="ktp" accept=".jpg,.jpeg,.png" required>
                            </div>

                            <div class="form-group">
                                <label for="kartu_keluarga">Upload Kartu Keluarga (PDF)</label>
                                <input type="file" class="form-control" id="kartu_keluarga" name="kartu_keluarga" accept=".pdf" required>
                            </div>

                            <div class="form-group">
                                <label for="akte_kelahiran">Upload Akte Kelahiran (PDF)</label>
                                <input type="file" class="form-control" id="akte_kelahiran" name="akte_kelahiran" accept=".pdf" required>
                            </div>

                            <div class="form-group">
                                <label for="ijazah">Upload Ijazah (PDF)</label>
                                <input type="file" class="form-control" id="ijazah" name="ijazah" accept=".pdf" required>
                            </div>

                            <div class="form-group">
                                <label for="paklaring">Upload Paklaring (PDF, Optional)</label>
                                <input type="file" class="form-control" id="paklaring" name="paklaring" accept=".pdf">
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="curiculum_vitae">Upload Curiculum Vitae (PDF)</label>
                                <input type="file" class="form-control" id="curiculum_vitae" name="curiculum_vitae" accept=".pdf" required>
                            </div>

                            <div class="form-group">
                                <label for="form_aplikasi_rpl">Upload Form Aplikasi RPL (PDF)</label>
                                <input type="file" class="form-control" id="form_aplikasi_rpl" name="form_aplikasi_rpl" accept=".pdf" required>

                                <a href="https://drive.google.com/drive/folders/1wiz52XfFU8hSvTQUvQEyvFoQwG32uFH5" target="_blank" class="btn btn-sm btn-success mt-2">
                                    <i class="nav-icon ion ion-clipboard"></i> Download Template di sini
                                </a>
                            </div>


                            <div class="form-group">
                                <label for="bukti_pendaftaran">Upload Bukti Pendaftaran (JPG/PNG/JPEG)</label>
                                <input type="file" class="form-control" id="bukti_pendaftaran" name="bukti_pendaftaran" accept=".jpg,.jpeg,.png" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
