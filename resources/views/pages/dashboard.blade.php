@extends('layouts.template_default')
@section('title', 'Dashboard')
@section('dashboard','active')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <div class="d-flex align-items-center mb-4">
  <i class="fas fa-tachometer-alt text-dark fa-2x me-2 animate__animated animate__fadeInDown"></i>
  <h1 class="h3 text-gray-800 fw-bold mb-0 animate__animated animate__fadeInRight">
    Dashboard
  </h1>
</div>

</div>

@if (auth()->user()->level_id == 3)
    @if ($pendaftaran)
        <!-- Tampilan biodata jika pendaftaran sudah diisi -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-left-primary">
                    <div class="card-body">
                        <h5 class="text-primary mb-3"><i class="fas fa-user-graduate"></i> Data Akademik</h5>
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
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-left-success">
                    <div class="card-body">
                        <h5 class="text-success mb-3"><i class="fas fa-briefcase"></i> Data Pekerjaan</h5>
                        <p><strong>Pekerjaan:</strong> {{ $pendaftaran->pekerjaan ?? '-' }}</p>
                        <p><strong>Perusahaan:</strong> {{ $pendaftaran->perusahaan ?? '-' }}</p>
                        <p><strong>Alamat Perusahaan:</strong> {{ $pendaftaran->alamat_perusahaan ?? '-' }}</p>
                        <p><strong>Lama Bekerja:</strong> {{ $pendaftaran->lama_bekerja ? $pendaftaran->lama_bekerja . ' tahun' : '-' }}</p>
                        <p><strong>Deskripsi Pekerjaan:</strong> {{ $pendaftaran->deskripsi_pekerjaan ?? '-' }}</p>

                        <h5 class="text-success mt-4"><i class="fas fa-file-alt"></i> Sertifikat</h5>
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

                        <p><strong>Deskripsi Sertifikat:</strong> {{ $pendaftaran->deskripsi ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Tampilan jika belum mengisi pendaftaran -->
        <div class="alert alert-warning">
            <h5 class="text-warning"><i class="fas fa-exclamation-triangle"></i> Data Pendaftaran Belum Ditemukan</h5>
            <p>Silakan lengkapi formulir pendaftaran terlebih dahulu untuk melihat data di dashboard.</p>
            <a href="{{ route('userpendaftaran.index') }}" class="btn btn-primary mt-2"><i class="fas fa-edit"></i> Isi Formulir Pendaftaran</a>
        </div>
    @endif

    @else

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendaftar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPendaftar }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Upload Dokumen</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUploadDokumen }}</div>
                    <div class="text-muted">Pending: {{ $pendingDokumen }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pembayaran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPembayaran }}</div>
                    <div class="text-muted">Menunggu Verifikasi: {{ $pendingPembayaran }}</div>
                </div>
            </div>
        </div>
    </div>



@endif

@endsection
