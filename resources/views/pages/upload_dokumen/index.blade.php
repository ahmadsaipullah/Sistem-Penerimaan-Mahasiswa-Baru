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


    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a href="{{ route('upload_dokumen.create') }}" class="btn btn-primary mb-3">
                <i class="fa fa-upload"></i> Upload Dokumen Baru
            </a>
        </div> --}}
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
                            <th>Approval</th>
                               @if(auth()->user()->level_id == 1)
                               <th>Action</th>
                               @endif
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


                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <form action="{{ route('upload_dokumen.approve', $upload_dokumen->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="Approve">
                                        <button type="submit" class="btn btn-success btn-sm px-2 py-1" title="Approve">
                                            ✓
                                        </button>
                                    </form>

                                    <form action="{{ route('upload_dokumen.rejected', $upload_dokumen->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="Rejected">
                                        <button type="submit" class="btn btn-danger btn-sm px-2 py-1" title="Rejected">
                                            ✕
                                        </button>
                                    </form>
                                </div>
                            </td>

                            </div>
                               @if(auth()->user()->level_id == 1)
                               <td>
                                   <div class="text-center d-flex">
                                       {{-- <a href="#" class="btn btn-info btn-sm mx-2">
                                           <i class="fa fa-eye"></i>
                                        </a> --}}

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
                                @endif
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
