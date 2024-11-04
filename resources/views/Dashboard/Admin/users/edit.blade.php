@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" class="form-control" value="{{ $user->firstname }}" required>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password <small>(leave blank to keep current)</small></label>
            <input type="password" name="password" class="form-control">
        </div>

      <!-- Role -->
      <div class="form-group">
        <label for="role_id">Role</label>
        <select name="role_id" class="form-control" required>
            <option value="">Select Role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Dynamic Department Selection -->
    <div class="form-group">
        <label for="department_id">Department</label>
        <select name="department_id" class="form-control" required>
            <option value="">Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
            @endforeach
        </select>
    </div>



        <div class="form-group">
            <label for="profile_img">Profile Image</label>
            <input type="file" name="profile_img" class="form-control">
            @if($user->profile_img)
                <img src="{{ asset($user->profile_img) }}" alt="Profile Image" class="img-thumbnail mt-2" style="width: 100px; height: 100px;">
            @endif
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control">
                <option value="" {{ is_null($user->gender) ? 'selected' : '' }}>Select Gender</option>
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" value="{{ $user->country }}" required>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" value="{{ $user->city }}">
        </div>

        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</div>
@endsection
