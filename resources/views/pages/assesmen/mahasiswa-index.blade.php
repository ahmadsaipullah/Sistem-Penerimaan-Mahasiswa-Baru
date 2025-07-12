@extends('layouts.template_default')
@section('title', 'Assesmen Saya')
@section('assesmen', 'active')
@section('content')

@include('sweetalert::alert')

<div class="container-fluid">
    <div class="d-flex align-items-center mb-3">
        <i class="fas fa-user-graduate text-success fa-2x me-2 animate__animated animate__fadeInDown"></i>
        <h1 class="h3 text-gray-800 fw-bold mb-0 animate__animated animate__fadeInRight">
            Assesmen Saya
        </h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jadwal Wawancara</th>
                            <th>Total SKS</th>
                            <th>Total Mata Kuliah</th>
                            <th>SKS Ditempuh</th>
                            <th>Mata Kuliah Ditempuh</th>
                            <th>Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($assesmens as $assesmen)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $assesmen->jadwal->user->name ?? '-' }}</td>
                            <td>{{ $assesmen->jadwal->jadwal_wawancara ?? '-' }}</td>
                            <td>{{ $assesmen->total_sks }}</td>
                            <td>{{ $assesmen->total_mata_kuliah }}</td>
                            <td>{{ $assesmen->total_sks_ditempuh }}</td>
                            <td>{{ $assesmen->total_mata_kuliah_ditempuh }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $assesmen->dokumen) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-file"></i> Lihat
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center p-5">Belum ada assesmen</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
