@extends('layouts.template_default')
@section('title', 'Halaman Admin')
@section('admin','active')
@section('content')

@include('sweetalert::alert')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Admin</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah Admin</a>
                        </div>
                        @include('pages.admin.create')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @forelse ($admins as $admin )

                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->Level->level}}</td>
                                            <td>
                                                <div class="text-center d-flex">
                                                    <a href="#" class="btn btn-info btn-sm mx-2" data-toggle="modal" data-target="#modal-detail{{$admin->id}}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="#"
                                                        class="btn btn-warning btn-sm mx-2"data-toggle="modal" data-target="#modal-edit{{$admin->id}}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                    <form action="{{ route('admin.destroy', $admin->id) }}" method="post"
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
                                        @include('pages.admin.edit')
                                        @include('pages.admin.show')
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center p-5">Data Kosong</td>
                                         </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                @include('pages.admin.edit')
@endsection
