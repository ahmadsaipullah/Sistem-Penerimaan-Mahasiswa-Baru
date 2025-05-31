@extends('layouts.template_default')

@section('title', 'Halaman Pengajuan Wawancara')
@section('jadwal','active')

@section('content')

@include('sweetalert::alert')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Halaman Pengajuan Wawancara</h1>

    @if($jadwals->isEmpty())
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create">
                    <i class="fa fa-plus"></i> Pengajuan Wawancara
                </a>
            </div>
        </div>
    @endif

    @include('pages.userjadwal.create')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive table-xs">
                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="small">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jadwal Wawancara</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            @php
                $ada_rejected = $jadwals->contains('status', 'Rejected');
                    @endphp
                    @if($ada_rejected)
                    <th>Action</th>
                    @endif
                        </tr>

                    </thead>
                    <tbody class="small">
                        @forelse ($jadwals as $jadwal)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$jadwal->user->name}}</td>
                            <td>{{$jadwal->user->email}}</td>
                            <td>{{$jadwal->jadwal_wawancara}}</td>
                            <td>@if($jadwal->keterangan == 'Tidak Ada')
                                <span class="badge badge-danger"> {!!$jadwal->keterangan!!}</span>
                                @else
                                {!!$jadwal->keterangan!!}
                            @endif</td>


                            <td>
                                @php
                                    $status = $jadwal->status;
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
                                    @if ($jadwal->status == 'Rejected')
                                    <a href="#" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#modal-edit{{$jadwal->id}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endif
                                </div>
                            </td>
                        </tr>
                        @include('pages.userjadwal.edit')
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
