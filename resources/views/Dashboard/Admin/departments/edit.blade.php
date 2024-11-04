@extends("Layout.Dashboard_Layout")

@section("AdminContent")

<h1>Add Department</h1>

<h1>Edit Department</h1>

<form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Department Name:</label>
    <input type="text" name="department_name" value="{{ $department->department_name }}" required>
    <button type="submit">Update Department</button>
</form>

@endsection
