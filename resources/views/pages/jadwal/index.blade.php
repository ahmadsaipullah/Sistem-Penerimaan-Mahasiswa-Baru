@extends('layouts.template_default')

@section('title', 'Halaman Jadwal Wawancara')
@section('jadwal', 'active')

@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
   <div class="d-flex align-items-center mb-4">
  <i class="fas fa-calendar-check text-primary fa-2x me-2 animate__animated animate__fadeInDown"></i>
  <h1 class="h3 text-gray-800 fw-bold mb-0 animate__animated animate__fadeInRight">
    Halaman Jadwal Wawancara
  </h1>
</div>


    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive table-xs">
                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="small">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pengajuan Jadwal</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Approval</th>
                            @if(auth()->user()->level_id == 1)
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwals as $jadwal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jadwal->user->name }}</td>
                            <td>{{ $jadwal->user->email }}</td>

                            <td>{{$jadwal->jadwal_wawancara }}</td>

                            <td>
                                @if($jadwal->keterangan == 'Tidak Ada')
                                    <span class="badge badge-danger">{{ $jadwal->keterangan }}</span>
                                @else
                                    {!! $jadwal->keterangan !!}
                                @endif
                            </td>

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

                                <span class="badge badge-{{ $badgeClass }}">{{ $status }}</span>
                            </td>

                            <td class="text-center">
                                <!-- Tombol modal -->
                                <button class="btn btn-success btn-sm px-2 py-1" data-toggle="modal" data-target="#approveModal{{ $jadwal->id }}" title="Approve">✓</button>
                                <button class="btn btn-danger btn-sm px-2 py-1" data-toggle="modal" data-target="#rejectModal{{ $jadwal->id }}" title="Reject">✕</button>
                            </td>
   @if(auth()->user()->level_id == 1)
   <td class="text-center">
       <div class="d-flex justify-content-center gap-1">
        <a href="#" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#modal-edit{{$jadwal->id}}">
               <i class="fa fa-pen"></i>
           </a>
           <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline">
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

                        {{-- Modal Approve --}}
                        <div class="modal fade" id="approveModal{{ $jadwal->id }}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel{{ $jadwal->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('jadwal.approve', $jadwal->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="Approve">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Approve jadwal</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                       <div class="modal-body">
                                            <div class="form-group">
                                                <label>Masukkan Keterangan</label>
                                                <textarea name="keterangan" class="form-control" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- Modal Rejected --}}
                        <div class="modal fade" id="rejectModal{{ $jadwal->id }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel{{ $jadwal->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('jadwal.rejected', $jadwal->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="Rejected">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tolak jadwal</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Masukkan Keterangan Penolakan</label>
                                                <textarea name="keterangan" class="form-control" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="submit">Tolak</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                          @include('pages.jadwal.edit')
                        @empty
                        <tr>
                            <td colspan="10" class="text-center p-5">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
