@extends('layouts.template_default')

@section('title', 'Halaman Upload Dokumen')
@section('upload_dokumen','active')

@section('content')

@include('sweetalert::alert')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Halaman Upload Dokumen</h1>

    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a href="{{ route('upload_dokumen.create') }}" class="btn btn-primary mb-3">
                <i class="fa fa-upload"></i> Upload Dokumen Baru
            </a>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>KTP</th>
                            <th>Kartu Keluarga</th>
                            <th>Akte Kelahiran</th>
                            <th>Ijazah</th>
                            <th>Paklaring</th>
                            <th>Curiculum Vitae</th>
                            <th>Form Aplikasi RPL</th>
                            <th>Bukti Pendaftaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($upload_dokumens as $upload_dokumen)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$upload_dokumen->user->name}}</td>
                            <td>{{$upload_dokumen->user->email}}</td>

                            @foreach (['ktp', 'kartu_keluarga', 'akte_kelahiran', 'ijazah', 'paklaring', 'curiculum_vitae', 'form_aplikasi_rpl', 'bukti_pendaftaran'] as $dokumen)
                                <td>
                                    @if ($upload_dokumen->$dokumen)
                                        <a href="{{ asset('storage/'.$upload_dokumen->$dokumen) }}" target="_blank">
                                            @if (Str::endsWith($upload_dokumen->$dokumen, ['.jpg', '.jpeg', '.png']))
                                                <img src="{{ asset('storage/'.$upload_dokumen->$dokumen) }}" width="50">
                                            @else
                                                <i class="fa fa-file-pdf text-danger"></i> Lihat
                                            @endif
                                        </a>
                                    @else
                                        <span class="badge badge-danger">Belum Upload</span>
                                    @endif
                                </td>
                            @endforeach

                            <td>
                                <span class="badge badge-{{ $upload_dokumen->status == 'Pending' ? 'warning' : 'success' }}">
                                    {{ $upload_dokumen->status }}
                                </span>
                            </td>

                            <td>
                                <div class="text-center d-flex">
                                    <a href="#" class="btn btn-info btn-sm mx-2">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="#" class="btn btn-warning btn-sm mx-2">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <form action="{{ route('upload_dokumen.destroy', $upload_dokumen->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete_confirm" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13" class="text-center p-5">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
