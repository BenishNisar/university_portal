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
        <h1 style="font-size: 23px;">Courses</h1>
    <a href="{{ route('admin.course_assign.add') }}" class="btn btn-primary">Assign Course</a>
    </div>

    <div class="table-wrapper">
        <table class="table table-bordered table-striped">
            <thead>

                <tr>
                    <th>Course</th>
                    <th>Batch</th>
                    <th>Teacher</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($courseAssignments as $assignment)
                <tr>
                    <td>{{ $assignment->course->name }}</td>
                    <td>{{ $assignment->batch->name }}</td>
                    <td>{{ $assignment->teacher->firstname }} {{ $assignment->teacher->lastname }}</td>
                    <td>{{ $assignment->department->department_name }}</td>
                    <td>{{ $assignment->semester }}</td>
                    <td>{{ $assignment->year }}</td>
                    <td>
                        <a href="{{ route('admin.course_assign.edit', $assignment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.course_assign.destroy', $assignment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

                <!-- Additional rows can be added here -->
            </tbody>
        </table>
    </div>
</div>

@endsection
