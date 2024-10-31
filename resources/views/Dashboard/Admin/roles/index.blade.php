@extends("Layout.Dashboard_Layout")
@section("AdminContent")

<style>
    /* Ensure the table is responsive and the cell content wraps */
    .table {
        table-layout: auto; /* Allows the table to auto-adjust */
    }

    .table td {
        overflow: hidden; /* Hide overflow */
        white-space: nowrap; /* Prevent wrapping */
        text-overflow: ellipsis; /* Add ellipsis (...) for overflowed text */
        max-width: 200px; /* Set a maximum width for the cell */
    }

    .table td a {
        display: inline-block; /* Ensures the link behaves properly */
        overflow: hidden; /* Hide overflow */
        white-space: nowrap; /* Prevent wrapping */
        text-overflow: ellipsis; /* Add ellipsis (...) for overflowed text */
        max-width: 100%; /* Ensures the link respects the cell's width */
        color: #007bff; /* Bootstrap link color */
        text-decoration: none; /* Remove underline */
    }

    .table td a:hover {
        text-decoration: underline; /* Underline on hover */
    }
</style>

<section class="section" style="border: 2px solid rgb(0, 238, 208)">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h1 style="font-size: 20px;">Create Users</h1>
                    <div class="d-flex justify-content-end">
                        <a style="background-color: #b10937; color: white;" class="btn mb-3" href="{{ asset('/roles/add') }}">
                            <i class="fas fa-plus"></i> Create New
                        </a>
                    </div>
                    {{-- <!-- Add table-responsive wrapper to prevent table overflow -->
   <!-- Add table-responsive wrapper to prevent table overflow --> --}}
   <div class="table-responsive">

                        <table class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
            <th>Role Name</th>
            <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->role_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div> <!-- End of table-responsive -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



