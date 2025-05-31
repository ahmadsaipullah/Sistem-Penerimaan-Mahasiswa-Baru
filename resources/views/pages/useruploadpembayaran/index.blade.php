@extends('layouts.template_default')

@section('title', 'Halaman Upload Pembayaran')
@section('pembayaran','active')

@section('content')

@include('sweetalert::alert')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Halaman Upload Pembayaran</h1>

    @if($pembayarans->isEmpty())
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create">
                    <i class="fa fa-plus"></i> Upload Pembayaran
                </a>
            </div>
        </div>
    @endif

    @include('pages.useruploadpembayaran.create')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive table-xs">
                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="small">
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Bukti Pembayaran</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            @php
                $ada_rejected = $pembayarans->contains('status', 'Rejected');
                    @endphp
                    @if($ada_rejected)
                    <th>Action</th>
                    @endif
                        </tr>

                    </thead>
                    <tbody class="small">
                        @forelse ($pembayarans as $pembayaran)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>@if($pembayaran->nim == 'waiting approval')
                                <span class="badge badge-danger"> {{$pembayaran->nim}}</span>
                                @else
                                {{$pembayaran->nim}}
                            @endif
                        </td>
                            <td>{{$pembayaran->user->name}}</td>
                            <td>{{$pembayaran->user->email}}</td>

                            @foreach (['bukti_pembayaran'] as $dokumen)
                            <td>
                                @if ($pembayaran->$dokumen)
                                    <a href="{{ asset('storage/'.$pembayaran->$dokumen) }}" target="_blank">
                                        @if (Str::endsWith($pembayaran->$dokumen, ['.jpg', '.jpeg', '.png']))
                                            <img src="{{ asset('storage/'.$pembayaran->$dokumen) }}" width="50">
                                        @else
                                            <i class="fa fa-file-pdf text-danger"></i> Lihat
                                        @endif
                                    </a>
                                @else
                                    <span class="badge badge-danger">Belum Upload</span>
                                @endif
                            </td>
                        @endforeach

                        <td>Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}</td>

                            <td>@if($pembayaran->keterangan == 'Tidak Ada')
                                <span class="badge badge-danger"> {!!$pembayaran->keterangan!!}</span>
                                @else
                                {!!$pembayaran->keterangan!!}
                            @endif</td>


                            <td>
                                @php
                                    $status = $pembayaran->status;
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
                                    @if ($pembayaran->status == 'Rejected')
                                    <a href="#" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#modal-edit{{$pembayaran->id}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endif
                                </div>
                            </td>
                        </tr>
                        @include('pages.useruploadpembayaran.edit')
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
