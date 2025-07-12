@extends('layouts.template_default')
@section('title', 'Halaman Assesmen')
@section('assesmen', 'active')
@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center mb-3">
        <i class="fas fa-file-alt text-primary fa-2x me-2 animate__animated animate__fadeInDown"></i>
        <h1 class="h3 text-gray-800 fw-bold mb-0 animate__animated animate__fadeInRight">
            Halaman Assesmen
        </h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create">
                <i class="fa fa-plus"></i> Tambah Assesmen
            </a>
        </div>
        @include('pages.assesmen.create') {{-- modal create --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Jadwal Wawancara</th>
                            <th>Total SKS</th>
                            <th>Total Mata Kuliah</th>
                            <th>SKS Ditempuh</th>
                            <th>Mata Kuliah Ditempuh</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
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
                            <td>
                                <div class="text-center d-flex">
                                    <a href="#" class="btn btn-info btn-sm mx-1" data-toggle="modal" data-target="#modal-show{{ $assesmen->id }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning btn-sm mx-1" data-toggle="modal" data-target="#modal-edit{{ $assesmen->id }}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <form action="{{ route('assesmen.destroy', $assesmen->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm delete_confirm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('pages.assesmen.edit') {{-- modal edit --}}
                        {{-- modal detail --}}
                        @empty
                        <tr>
                            <td colspan="8" class="text-center p-5">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@include('pages.assesmen.show')
@endsection
