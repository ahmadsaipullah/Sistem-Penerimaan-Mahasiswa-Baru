<!-- /.modal -->
@if(isset($admin))
<div class="modal fade" id="modal-edit{{$admin->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Update Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.update', $admin->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is invalid

          @enderror"
                            id="name" name="name" placeholder="Name" value="{{ old('name') ?? $admin->name }}" required />
                        @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control @error('email') is invalid

          @enderror"
                            id="email" name="email" placeholder="Email" value="{{ old('email') ?? $admin->email }}" required />
                        @error('email')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is invalid

          @enderror"
                            id="password" name="password" placeholder="Password" value="{{ old('password') ?? $admin->password }}" required />
                        @error('password')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="level_id">Level User</label>
                        <select class="form-control" id="level_id" name="level_id">
                            <option disabled selected>{{$admin->Level->level}}</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->level }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif
