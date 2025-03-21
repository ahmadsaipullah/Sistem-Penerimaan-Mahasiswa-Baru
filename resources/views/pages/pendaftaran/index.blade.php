@extends('layouts.template_default')
@section('title', 'Halaman Pendaftaran')
@section('pendaftaran','active')
@section('content')

@include('sweetalert::alert')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Pendaftaran</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('pendaftaran.export') }}" class="btn btn-danger mb-3">
                                <i class="fa fa-file-pdf"></i> Export Semua Data
                            </a>
                        </div>
                        {{-- @include('pages.pendaftaran.create') --}}
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

                                                    <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm delete_confirm" type="submit">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                 </div>
                                            </td>
                                        </tr>
                                        @include('pages.pendaftaran.edit')
                                        @include('pages.pendaftaran.show')
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
