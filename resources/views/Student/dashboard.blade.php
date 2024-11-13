@extends("Layout.Dashboard_Layout")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Custom Styles -->
<style>
    .dropdown-custom {
        border: 1px solid #007bff;
        border-radius: 8px;
        padding: 10px;
        width: 100%;
        font-size: 16px;
        color: #007bff;
        background-color: #f8f9fa;
        text-align: left;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .dropdown-custom:focus, .dropdown-custom:hover {
        background-color: #007bff;
        color: white;
        border-color: #0056b3;
    }
    .dropdown-custom option {
        padding: 8px;
    }
</style>

@section("AdminContent")
<div class="container">
    <h1>Student Dashboard</h1>

    <!-- Courses Table -->
    <h2 class="mt-5">Courses Status</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <!-- Completed Courses -->
            <tr>
                <td>Completed Courses</td>
                <td>
                    <select class="dropdown-custom">
                        <option disabled selected>View Completed Courses</option>
                        @foreach($completedCourses as $course)
                            <option>{{ $course->course->name ?? 'Unknown Course' }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <!-- Remaining Courses -->
            <tr>
                <td>Remaining Courses</td>
                <td>
                    <select class="dropdown-custom">
                        <option disabled selected>View Remaining Courses</option>
                        @foreach($remainingCourses as $course)
                            <option>{{ $course->course->name ?? 'Unknown Course' }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <!-- Enrolled Courses -->
            <tr>
                <td>Enrolled Courses</td>
                <td>
                    <select class="dropdown-custom">
                        <option disabled selected>View Enrolled Courses</option>
                        @foreach($enrolledCourses as $course)
                            <option>{{ $course->course->name ?? 'Unknown Course' }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </thead>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
