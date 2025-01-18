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
        overflow-x: auto;
        /* Enables horizontal scrolling */
        margin-top: 15px;
        padding-bottom: 1rem;
        /* Space below the scroll bar */
    }

    .table {
        width: 1500px;
        /* Set fixed width to enable horizontal scroll if content overflows */
        margin-bottom: 0;
    }

    .table th,
    .table td {
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

<div class="container">

    <div class="container-fluid mt-4 table-container">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h1 style="font-size: 23px;">Manage Students</h1>
            <a href="{{ url('/') }}" class="btn btn-success">Add New</a>
        </div>

        <div class="table-wrapper">
            <table class="table table-bordered table-striped">
                <thead>

                <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Student ID</th>
            <th>Course</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Enrollment Date</th>
            <th>Graduation Date</th>
            <th>Current Year</th>
            <th>CGPA</th>
            <th>Profile Picture</th>
            <th>Status</th>
            <th>Guardian Name</th>
            <th>Guardian Contact</th>
            <th>Scholarship Status</th>
            <th>Student Type</th>
            <th>Batch</th>
            <th>Action</th>
        </tr>
                
                </thead>
          
                <tbody>
                @foreach ($students as $student)
            <tr>
                <td>{{ $student->user->firstname }}</td>
                <td>{{ $student->user->lastname }}</td>
                <td>{{ $student->phone_number }}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->user->gender }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->course->name ?? 'N/A' }}</td>
                <td>{{ $student->department->department_name ?? 'N/A' }}</td>
                <td>{{ $student->semester ?? 'N/A' }}</td>
                <td>{{ $student->enrollment_date }}</td>
                <td>{{ $student->graduation_date }}</td>
                <td>{{ $student->current_year }}</td>
                <td>{{ $student->cgpa }}</td>
                <td>
                    @if ($student->user->profile_img)
                        <img src="{{ asset($student->user->profile_img) }}" alt="Profile Picture" width="50">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $student->status }}</td>
                <td>{{ $student->guardian_name }}</td>
                <td>{{ $student->guardian_contact }}</td>
                <td>{{ $student->scholarship_status }}</td>
                <td>{{ $student->student_type }}</td>
                <td>{{ $student->Batch }}</td>
                <td>
                    <a href="#" class="btn btn-secondary">Edit</a>
                </td>
            </tr>
        @endforeach
                </tbody>


            </table>
        </div>
    </div>

</div>

@endsection