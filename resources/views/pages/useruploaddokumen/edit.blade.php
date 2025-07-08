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

            <form action="{{ route('userdokumen.update', $upload_dokumen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">

                        @php
                            $dokumenFields = [
                                'ktp' => 'KTP',
                                'kartu_keluarga' => 'Kartu Keluarga',
                                'akte_kelahiran' => 'Akte Kelahiran',
                                'ijazah' => 'Ijazah',
                                'paklaring' => 'Paklaring',
                                'curiculum_vitae' => 'Curriculum Vitae',
                                'form_aplikasi_rpl' => 'Form Aplikasi RPL',
                                'bukti_pendaftaran' => 'Bukti Pendaftaran',
                            ];
                        @endphp

                        @foreach ($dokumenFields as $field => $label)
                            <div class="col-md-6 mb-3">
                                <label>{{ $label }}</label><br>

                                {{-- Tampilkan Preview --}}
                                @php $file = $upload_dokumen->$field; @endphp
                                @if ($file)
                                    @php $ext = pathinfo($file, PATHINFO_EXTENSION); @endphp
                                    @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ asset('storage/' . $file) }}" width="200" class="mb-2">
                                    @elseif ($ext === 'pdf')
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-sm btn-success mb-2">Lihat PDF</a>
                                    @else
                                        <p class="text-muted">Format tidak didukung</p>
                                    @endif
                                @endif

                                {{-- Input File --}}
                                <input type="file"
                                    name="{{ $field }}"
                                    class="form-control mt-2 @error($field) is-invalid @enderror"
                                    accept="{{ in_array($field, ['ktp', 'bukti_pendaftaran']) ? '.jpg,.jpeg,.png' : '.pdf' }}">
                                @error($field)
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endforeach

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
