@if(isset($pembayaran))
<!-- Modal Edit -->
<div class="modal fade" id="modal-edit{{$pembayaran->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{$pembayaran->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-center">
                <h4 class="modal-title text-white" id="modalEditLabel{{$pembayaran->id}}">Edit Pembayaran</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('userpembayaran.update', $pembayaran->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            {{-- Bukti Pembayaran --}}
                            <div class="form-group">
                                <label for="bukti_pembayaran">Upload Bukti Pembayaran (JPG/PNG/JPEG)</label>
                                <input type="file"
                                       class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                                       name="bukti_pembayaran" accept=".jpg,.jpeg,.png">
                                @error('bukti_pembayaran')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                @if ($pembayaran->bukti_pembayaran)
                                    <small class="form-text text-muted mt-2">
                                        File sebelumnya:
                                        <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" target="_blank">Lihat Bukti</a>
                                    </small>
                                @endif
                            </div>

                            {{-- Nominal --}}
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="number"
                                       class="form-control @error('nominal') is-invalid @enderror"
                                       name="nominal"
                                       value="{{ old('nominal', $pembayaran->nominal) }}" required>
                                @error('nominal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Keterangan --}}
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" readonly value="{{ $pembayaran->keterangan }}">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
