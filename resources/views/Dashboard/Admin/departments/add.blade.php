@extends("Layout.Dashboard_Layout")

@section("AdminContent")



<div class="container">
    <div class="row">
        <div class="col-12">

            <h1>Add Department</h1>

            <form class="pt-4" action="{{ route('admin.departments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Department Name:</label>
                    <input type="text" class="form-control" name="department_name" required>
                </div>


                <div class="form-group pt-3">

                    <button class="btn btn-success" type="submit">Add Department</button>
                </div>
            </form>

            @endsection