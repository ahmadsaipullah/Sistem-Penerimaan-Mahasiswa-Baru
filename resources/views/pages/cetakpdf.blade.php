<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #333;
        }
        .kop-surat {
            text-align: center;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        h1, h2, h3 {
            margin: 5px;
        }
        .table-container {
            width: 100%;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #007bff;
            color: #007bff;
        }
        .text-muted {
            color: #666;
            font-size: 12px;
        }
        .certificate img {
            max-width: 150px;
            max-height: 100px;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <!-- Header Surat -->
    <div class="kop-surat">
        <img src="{{ public_path('assets/img/logo.jpg') }}" alt="Logo Universitas">
        <h2>Universitas Muhammadiyah Tangerang</h2>
        <h3>Jl. Perintis Kemerdekaan, Cikokol, Kota Tangerang</h3>
    </div>

    <!-- Judul -->
    <h3 align="center">{{ $title }}</h3>

    <!-- Tabel Data Pendaftar -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Asal Sekolah</th>
                    <th>Program Studi Tujuan</th>
                    <th>Jenjang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendaftarans as $index => $pendaftaran)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pendaftaran->nama }}</td>
                        <td>{{ $pendaftaran->email }}</td>
                        <td>{{ $pendaftaran->asal_sekolah_universitas }}</td>
                        <td>{{ $pendaftaran->program_studi_tujuan }}</td>
                        <td>{{ $pendaftaran->jenjang }}</td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div class="section-title">Data Akademik</div>
                            <strong>Alamat Sekolah:</strong> {{ $pendaftaran->alamat_sekolah_universitas }} <br>
                            <strong>NIS/NIM:</strong> {{ $pendaftaran->nis_nim }} <br>
                            <strong>Nomor Ijazah:</strong> {{ $pendaftaran->nomor_ijasah }} <br>
                            <strong>Tahun Lulus:</strong> {{ $pendaftaran->tahun_lulus }} <br>
                            <strong>Program Studi Asal:</strong> {{ $pendaftaran->program_studi_asal }} <br>
                            <strong>Program Kelas:</strong> {{ $pendaftaran->program_kelas }} <br>

                            <div class="section-title">Data Pekerjaan</div>
                            <strong>Pekerjaan:</strong> {{ $pendaftaran->pekerjaan ?? '-' }} <br>
                            <strong>Perusahaan:</strong> {{ $pendaftaran->perusahaan ?? '-' }} <br>
                            <strong>Alamat Perusahaan:</strong> {{ $pendaftaran->alamat_perusahaan ?? '-' }} <br>
                            <strong>Lama Bekerja:</strong> {{ $pendaftaran->lama_bekerja ?? '-' }} Tahun <br>
                            <strong>Deskripsi Pekerjaan:</strong> {{ $pendaftaran->deskripsi_pekerjaan ?? '-' }} <br>
                            {{-- <strong>Deskripsi Sertifikat:</strong> {{ $pendaftaran->deskripsi ?? '-' }} <br> --}}

                            {{-- <div class="section-title">Sertifikat</div>

                            @if (!empty($pendaftaran->sertifikat))
                                @php
                                    $filePath = public_path('uploads/sertifikat/' . $pendaftaran->sertifikat);
                                    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                    $sertifikatUrl = asset('uploads/sertifikat/' . $pendaftaran->sertifikat);
                                @endphp

                                @if (file_exists($filePath))
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                        <img src="data:image/{{ $fileExtension }};base64,{{ base64_encode(file_get_contents($filePath)) }}"
                                             class="certificate" style="max-width: 200px;">
                                    @elseif ($fileExtension === 'pdf')
                                        <p><strong>Scan untuk melihat sertifikat:</strong></p>
                                        {!! QrCode::format('svg')->size(100)->generate($sertifikatUrl) !!}

                                        <p>Atau klik link berikut:</p>
                                        <a href="{{ $sertifikatUrl }}" target="_blank">{{ $sertifikatUrl }}</a>
                                    @else
                                        <p class="text-muted">Format file tidak didukung.</p>
                                    @endif
                                @else
                                    <p class="text-muted">File tidak ditemukan.</p>
                                @endif
                            @else
                                <p class="text-muted">Tidak Ada Sertifikat</p>
                            @endif --}}

{{--
                            <div class="section-title">Deskripsi Tambahan</div>
                            <p>{{ $pendaftaran->deskripsi ?? '-' }}</p> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
