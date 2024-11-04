@extends("Layout.Dashboard_Layout")

@section("AdminContent")

<h1>Add Department</h1>

<form action="{{ route('admin.departments.store') }}" method="POST">
    @csrf
    <label>Department Name:</label>
    <input type="text" name="department_name" required>
    <button type="submit">Add Department</button>
</form>

@endsection
