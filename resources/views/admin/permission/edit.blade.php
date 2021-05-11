@extends('layouts.admin')
@section('pageName')
Edit Permission
@endsection

@section('content')
    @role('Developer')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Permission</h3>
                <div class="card-tools">
                    <a href="{{ route('permission.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Permission</a>
                </div>
            </div>
            <form method="POST" action="{{ route('permission.update', $permission->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Permission Name</label>
                        <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $permission->name }}" required placeholder="Permission Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Permission</button>
                </div>
            </form>
        </div>
    @endrole
@endsection