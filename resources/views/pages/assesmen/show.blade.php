@if(isset($assesmen))
<div class="modal fade" id="modal-show{{ $assesmen->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-center">
                <h4 class="modal-title text-white">Detail Assesmen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <td>{{ $assesmen->jadwal->user->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jadwal Wawancara</th>
                        <td>{{ $assesmen->jadwal->jadwal_wawancara ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Total SKS</th>
                        <td>{{ $assesmen->total_sks }}</td>
                    </tr>
                    <tr>
                        <th>Total Mata Kuliah</th>
                        <td>{{ $assesmen->total_mata_kuliah }}</td>
                    </tr>
                    <tr>
                        <th>Total SKS yang Ditempuh</th>
                        <td>{{ $assesmen->total_sks_ditempuh }}</td>
                    </tr>
                    <tr>
                        <th>Total Mata Kuliah yang Ditempuh</th>
                        <td>{{ $assesmen->total_mata_kuliah_ditempuh }}</td>
                    </tr>
                    <tr>
                        <th>Dokumen</th>
                        <td>
                            <a href="{{ asset('storage/' . $assesmen->dokumen) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-file"></i> Lihat Dokumen
                            </a>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endif
