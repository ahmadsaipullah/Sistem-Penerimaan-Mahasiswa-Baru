@if(isset($upload_dokumen))
<!-- Modal Edit -->
<div class="modal fade" id="modal-edit{{$upload_dokumen->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="modalEditLabel">Edit Pendaftaran Mahasiswa</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('userdokumen.update' ,$upload_dokumen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">

                        <!-- KTP -->
                        <div class="col-md-6 mb-3">
                            <label>KTP</label><br>
                            @if ($upload_dokumen->ktp)
                                <img src="{{ asset('storage/' . $upload_dokumen->ktp) }}" width="200" class="mb-2">
                            @endif
                            <input type="file" name="ktp" class="form-control">
                        </div>

                        <!-- Kartu Keluarga -->
                        <div class="col-md-6 mb-3">
                            <label>Kartu Keluarga</label><br>
                            @if ($upload_dokumen->kartu_keluarga)
                                <a href="{{ asset('storage/' . $upload_dokumen->kartu_keluarga) }}" target="_blank">Lihat PDF</a>
                            @endif
                            <input type="file" name="kartu_keluarga" class="form-control mt-2">
                        </div>

                        <!-- Akte Kelahiran -->
                        <div class="col-md-6 mb-3">
                            <label>Akte Kelahiran</label><br>
                            @if ($upload_dokumen->akte_kelahiran)
                                <a href="{{ asset('storage/' . $upload_dokumen->akte_kelahiran) }}" target="_blank">Lihat PDF</a>
                            @endif
                            <input type="file" name="akte_kelahiran" class="form-control mt-2">
                        </div>

                        <!-- Ijazah -->
                        <div class="col-md-6 mb-3">
                            <label>Ijazah</label><br>
                            @if ($upload_dokumen->ijazah)
                                <a href="{{ asset('storage/' . $upload_dokumen->ijazah) }}" target="_blank">Lihat PDF</a>
                            @endif
                            <input type="file" name="ijazah" class="form-control mt-2">
                        </div>

                        <!-- Paklaring -->
                        <div class="col-md-6 mb-3">
                            <label>Paklaring</label><br>
                            @if ($upload_dokumen->paklaring)
                                <a href="{{ asset('storage/' . $upload_dokumen->paklaring) }}" target="_blank">Lihat PDF</a>
                            @endif
                            <input type="file" name="paklaring" class="form-control mt-2">
                        </div>

                        <!-- Curriculum Vitae -->
                        <div class="col-md-6 mb-3">
                            <label>Curriculum Vitae</label><br>
                            @if ($upload_dokumen->curiculum_vitae)
                                <a href="{{ asset('storage/' . $upload_dokumen->curiculum_vitae) }}" target="_blank">Lihat PDF</a>
                            @endif
                            <input type="file" name="curiculum_vitae" class="form-control mt-2">
                        </div>

                        <!-- Form Aplikasi RPL -->
                        <div class="col-md-6 mb-3">
                            <label>Form Aplikasi RPL</label><br>
                            @if ($upload_dokumen->form_aplikasi_rpl)
                                <a href="{{ asset('storage/' . $upload_dokumen->form_aplikasi_rpl) }}" target="_blank">Lihat PDF</a>
                            @endif
                            <input type="file" name="form_aplikasi_rpl" class="form-control mt-2">
                        </div>

                        <!-- Bukti Pendaftaran -->
                        <div class="col-md-6 mb-3">
                            <label>Bukti Pendaftaran</label><br>
                            @if ($upload_dokumen->bukti_pendaftaran)
                                <img src="{{ asset('storage/' . $upload_dokumen->bukti_pendaftaran) }}" width="200" class="mb-2">
                            @endif
                            <input type="file" name="bukti_pendaftaran" class="form-control">
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endif
