@extends('layouts.template_default')
@section('title', 'Halaman Pendaftaran Mahasiswa')
@section('pendaftaran','active')
@section('content')

@include('sweetalert::alert')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Pendaftaran Mahasiswa</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        @if($pendaftarans->isEmpty())
                        <div class="card-header py-3">
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i>Pendaftaran Mahasiswa</a>
                        </div>
                        @endif
                        @include('pages.userpendaftaran.create')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Asal Sekolah/Universitas</th>
                                            <th>Program Studi Tujuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pendaftarans as $pendaftaran )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$pendaftaran->nama}}</td>
                                            <td>{{$pendaftaran->email}}</td>
                                            <td>{{$pendaftaran->asal_sekolah_universitas}}</td>
                                            <td>{{$pendaftaran->program_studi_tujuan}}</td>
                                            <td>
                                                <div class="text-center d-flex">

                                                    <a href="{{ route('pendaftaran.export', $pendaftaran->id) }}" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-file-pdf"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-info btn-sm mx-2" data-toggle="modal" data-target="#modal-detail{{$pendaftaran->id}}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="#"
                                                        class="btn btn-warning btn-sm mx-2"data-toggle="modal" data-target="#modal-edit{{$pendaftaran->id}}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                 </div>
                                            </td>
                                        </tr>
                                        @include('pages.userpendaftaran.edit')
                                        @include('pages.userpendaftaran.show')
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">Data Kosong</td>
                                         </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                @include('pages.pendaftaran.edit')
@endsection
