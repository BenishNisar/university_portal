@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<h2>Edit Role</h2>

<form class="pt-3" action="{{ route('admin.roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="role_name">Role Name</label>
        <input type="text" name="role_name" class="form-control" value="{{ $role->role_name }}" required>
    </div>
    <div class="form-group pt-3">
        <button type="submit" class="btn btn-primary">Update Role</button>
    </div>
</form>
@endsection