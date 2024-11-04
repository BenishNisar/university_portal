@extends("Layout.Dashboard_Layout")

@section("AdminContent")

<style>
    .container-fluid {
        padding-left: 0;
        padding-right: 0;
    }

    .table-container {
        margin-left: 10px;
        margin-right: 10px;
    }

    .table-wrapper {
        overflow-x: auto; /* Enables horizontal scrolling */
        margin-top: 15px;
        padding-bottom: 1rem; /* Space below the scroll bar */
    }

    .table {
        width: 1500px; /* Set fixed width to enable horizontal scroll if content overflows */
        margin-bottom: 0;
    }

    .table th, .table td {
        padding: 10px 12px;
        font-size: 14px;
        white-space: nowrap;
        text-align: left;
    }

    .add-new-btn {
        background-color: #b10937;
        color: white;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-left: 15px;
    }

    .add-new-btn:hover {
        background-color: grey;
    }

    .actions {
        display: flex;
        justify-content: center;
    }

    .actions i {
        margin: 0 4px;
        cursor: pointer;
    }

    .actions i:hover {
        color: #b10937;
    }
</style>

<div class="container-fluid mt-4 table-container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-size: 23px;">Users</h1>
        <a href="{{ url('/users/add') }}" class="add-new-btn">Add New</a>
    </div>

    <div class="table-wrapper">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Profile_Image</th>
                                    <th>Departments</th>
                                    <th>Role_id</th>
                                    <th>Martial_status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $item)

                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->firstname}}</td>
                                        <td>{{ $item->lastname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->password }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->country }}</td>
                                        <td>{{ $item->city }}</td>

                                        <td>
                                            @if($item->profile_img)
                                                <!-- Use the saved path directly in the src attribute -->
                                                <img src="{{ asset($item->profile_img) }}" alt="Profile Image" style="width: 50px; height: auto;">
                                            @else
                                                No Image
                                            @endif
                                        </td>



                                        <td>{{ $item->department->department_name ?? 'No Department' }}</td>

                                        <td>{{ $item->role->role_name ?? 'No Role' }}</td>


                                        <td>
                                            <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                            </form>
                                        </td>


                                        </td>
                                    </tr>
                          @endforeach




                            </tbody>
                        </table>


 </div>
</div>

@endsection



