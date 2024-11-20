@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h2>Add New User</h2>

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group  pt-3">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" class="form-control" required>
        </div>

        <div class="form-group pt-3">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="form-group pt-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group pt-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group pt-3">
            <label for="role_id">Role</label>
            <select name="role_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($roles as $role)
                @if($role->id != 1)
                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <!-- Dynamic Department Selection -->
        <div class="form-group pt-3">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>




        <div class="form-group pt-3">
            <label for="profile_img">Profile Image</label>
            <input type="file" name="profile_img" class="form-control">
        </div>


        <div class="form-group pt-3">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control">
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="form-group pt-3">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" required>
        </div>


        <div class="form-group pt-3">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control">
        </div>

        <div class="form-group pt-3">
            <button type="submit" class="btn btn-success mt-2">Add User</button>
        </div>

    </form>
</div>
@endsection