<!-- Modal Create -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Upload Pembayaran</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('userpembayaran.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            {{-- Bukti Pembayaran --}}
                            <div class="form-group">
                                <label for="bukti_pembayaran">Upload Bukti Pembayaran (JPG/PNG/JPEG)</label>
                                <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                                       id="bukti_pembayaran" name="bukti_pembayaran" accept=".jpg,.jpeg,.png" required>
                                @error('bukti_pembayaran')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Nominal --}}
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                                       id="nominal" name="nominal" value="{{ old('nominal') }}" required />
                                @error('nominal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
