@extends('layouts.template_default')

@section('title', 'Halaman Upload Dokumen')
@section('upload_dokumen','active')

@section('content')

@include('sweetalert::alert')

<div class="container-fluid">
   <div class="d-flex align-items-center mb-3">
  <i class="fas fa-file-upload text-primary fa-2x me-2 animate__animated animate__fadeInDown"></i>
  <h1 class="h3 text-gray-800 fw-bold mb-0 animate__animated animate__fadeInRight">
    Halaman Upload Dokumen
  </h1>
</div>

    @if($upload_dokumens->isEmpty())
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create">
                    <i class="fa fa-plus"></i> Upload Dokumen
                </a>
            </div>
        </div>
    @endif

    @include('pages.useruploaddokumen.create')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive table-xs">
                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="small">
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
                            @php
                $ada_rejected = $upload_dokumens->contains('status', 'Rejected');
                    @endphp
                    @if($ada_rejected)
                    <th>Action</th>
                    @endif
                        </tr>
                    </thead>
                    <tbody class="small">
                        @forelse ($upload_dokumens as $upload_dokumen)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $upload_dokumen->user->name }}</td>
                            <td>{{ $upload_dokumen->user->email }}</td>

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
                                @php
                                    $status = $upload_dokumen->status;
                                    $badgeClass = match($status) {
                                        'Pending' => 'warning',
                                        'Approve' => 'success',
                                        'Rejected' => 'danger',
                                        default => 'secondary',
                                    };
                                @endphp

                                <span class="badge badge-{{ $badgeClass }}">
                                    {{ $status }}
                                </span>
                            </td>

                            <td>
                                <div class="text-center d-flex">
                                    {{-- <a href="{{ route('pendaftaran.export', $upload_dokumen->id) }}" class="btn btn-sm btn-danger">
                                        <i class="fa fa-file-pdf"></i>
                                    </a> --}}
                                    {{-- <a href="#" class="btn btn-info btn-sm mx-2" data-toggle="modal" data-target="#modal-detail{{$upload_dokumen->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a> --}}
                                    @if ($upload_dokumen->status == 'Rejected')
                                    <a href="#" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#modal-edit{{$upload_dokumen->id}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endif
                                </div>
                            </td>
                        </tr>
                        @include('pages.useruploaddokumen.edit')
                        {{-- @include('pages.useruploaddokumen.show') --}}
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
