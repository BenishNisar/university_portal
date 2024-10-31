@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="role_name">Role Name</label>
        <input type="text" name="role_name" class="form-control" value="{{ $role->role_name }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Role</button>
</form>
@endsection
