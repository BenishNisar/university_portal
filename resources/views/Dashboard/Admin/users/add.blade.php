@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h1>Add User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role_id">Role ID</label>
            <input type="number" name="role_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="department_id">Department ID</label>
            <input type="number" name="department_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="profile_img">Profile Image</label>
            <input type="file" name="profile_img" class="form-control">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control">
        </div>
        <button type="submit" class="btn btn-success mt-2">Add User</button>
    </form>
</div>
@endsection
