@extends('Layout.Dashboard_Layout')

@section('AdminContent')

<h1>Add New Role</h1>

<!-- Display validation errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.roles.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="role_name">Role Name</label>
        <input type="text" name="role_name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add Role</button>
</form>

@endsection
