<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
        .kop-surat { text-align: center; border-bottom: 3px solid black; padding-bottom: 10px; margin-bottom: 20px; }
        .kop-surat img { width: 100px; }
        h1, h2, h3 { margin: 5px; }
    </style>
</head>
<body>
    <div class="kop-surat">
        <img src="{{ public_path('logo.jpg') }}" alt="Logo">
        <h2>Universitas Muhammadiyah Tangerang</h2>
        <h3>Jl. Perintis Kemerdekaan, Cikokol, Kota Tangerang</h3>
    </div>

    <h3 align="center">{{ $title }}</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Asal Sekolah/Universitas</th>
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
                        <strong>Alamat Sekolah:</strong> {{ $pendaftaran->alamat_sekolah_universitas }} <br>
                        <strong>NIS/NIM:</strong> {{ $pendaftaran->nis_nim }} <br>
                        <strong>Nomor Ijasah:</strong> {{ $pendaftaran->nomor_ijasah }} <br>
                        <strong>Tahun Lulus:</strong> {{ $pendaftaran->tahun_lulus }} <br>
                        <strong>Program Studi Asal:</strong> {{ $pendaftaran->program_studi_asal }} <br>
                        <strong>Program Kelas:</strong> {{ $pendaftaran->program_kelas }} <br>
                        <strong>Pekerjaan:</strong> {{ $pendaftaran->pekerjaan ?? '-' }} <br>
                        <strong>Perusahaan:</strong> {{ $pendaftaran->perusahaan ?? '-' }} <br>
                        <strong>Alamat Perusahaan:</strong> {{ $pendaftaran->alamat_perusahaan ?? '-' }} <br>
                        <strong>Lama Bekerja:</strong> {{ $pendaftaran->lama_bekerja ?? '-' }} Tahun <br>
                        <strong>Deskripsi Pekerjaan:</strong> {{ $pendaftaran->deskripsi_pekerjaan ?? '-' }} <br>
                        <strong>Sertifikat:</strong>
                        @if($pendaftaran->sertifikat)
                            <a href="{{ public_path('uploads/sertifikat/'.$pendaftaran->sertifikat) }}" target="_blank">Lihat Sertifikat</a>
                        @else
                            Tidak Ada
                        @endif
                        <br>
                        <strong>Deskripsi:</strong> {{ $pendaftaran->deskripsi ?? '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
