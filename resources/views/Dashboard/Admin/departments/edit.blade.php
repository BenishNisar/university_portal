@extends("Layout.Dashboard_Layout")

@section("AdminContent")


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Department</h1>

            <form class="pt-4" action="{{ route('admin.departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label>Department Name:</label>
                    <input type="text" name="department_name" class="form-control" value="{{ $department->department_name }}" required>
                </div>

                <div class="form-group pt-3">
                    <button type="submit" class="btn btn-success">Update Department</button>
                </div>


            </form>
        </div>
    </div>
</div>


@endsection