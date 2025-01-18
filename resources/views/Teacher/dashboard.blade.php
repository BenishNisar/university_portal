@extends('Layout.Dashboard_Layout')
<<<<<<< HEAD

@section('AdminContent')
<div class="container mt-4">
    <h1>Teacher Dashboard</h1>

    <!-- Program Dropdown -->
    <div class="mb-4">
        <label for="program" class="form-label">Select Program:</label>
        <select id="program" class="form-select" onchange="fetchCourses(this.value)">
            <option value="">-- Select Program --</option>
            @foreach($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Courses Table -->
    <div class="row">
        <div class="col-md-6">
            <h3>All Courses</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allCourses as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h3>Assigned Courses</h3>
            <table class="table table-bordered" id="assigned-courses">
                <thead>
                    <tr>
                        <th>Course Name</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamically updated via JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
=======
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
@section('AdminContent')
<div class="container-fluid">
    <h3>Wellcome Back {{ Auth::user()->firstname }}!</h3>
    <h6><b>Teacher Dashboard</b></h6>

    <!-- Courses Table -->
    <h2 class="mt-5">Courses</h2>
    <table class="table table-bordered mt-3">
        <thead>

       

              <!-- Enrolled Courses -->
            <tr>
                <td>Programm</td>
                <td>
                    <select class="dropdown-custom">
                            <option>Computer Science</option>
                            <option>Civil Engineering</option>
                            <option >Electrical Engineering</option>
                            <option>Mechanical Engineering</option>

                    </select>
                </td>
            </tr>


                   <!-- Enrolled Courses -->
            <tr>
                <td>Courses</td>
                <td>
                    <select class="dropdown-custom">
                            <option selected>Programming Fundamentals</option>
                            <option>Programming Fundamentals (Lab)</option>
                            <option>Calculus And Analytical Geometry</option>
                            <option>Applied Physics </option>
                            <option>Applied Physics (Lab)</option>
                            <option>English Composition & Comprehension </option>
                            <option>Islamic Studies/Ethical Behavior</option>
                            <option>Object Oriented Programming </option>
                            <option>Object Oriented Programming (Lab) </option>
                            <option>Digital Logic Design </option>
                            <option>Digital Logic Design (Lab)</option>
                            <option>Pakistan Studies</option>
                            <option>Communication and Presentation Skills</option>
                            <option>Linear Algebra</option>
                            <option>Web Engineering </option>
                            <option>Web Engineering (Lab)</option>
                            <option>Data Structures and Algorithms </option>
                            <option>Data Structures and Algorithms (Lab)</option>
                            <option>Computer Communication Networks </option>
                            <option>Computer Communication Networks (Lab)</option>
                            <option>Technical Report Writing</option>
                            <option>Introduction to Software Engineering </option>
                            <option>Introduction to Software Engineering (Lab)</option>
                    </select>
                </td>
            </tr>


        </thead>
    </table>

    <p>The Course Data not live yet</p>

>>>>>>> 68627875e3d8130108a0a57354cbdfa82e89b302
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function fetchCourses(programId) {
    if (!programId) {
        $('#assigned-courses tbody').empty();
        $('table.table-bordered:first tbody').empty();
        return;
    }

    $.ajax({
        url: `/programs/${programId}/courses`,
        method: 'GET',
        success: function (response) {
            // Update Assigned Courses Table
            let assignedCoursesHtml = '';
            response.assignedCourses.forEach(assign => {
                assignedCoursesHtml += `
                    <tr>
                        <td>${assign.course.name}</td>
                    </tr>`;
            });
            $('#assigned-courses tbody').html(assignedCoursesHtml);

            // Update All Courses Table
            let allCoursesHtml = '';
            response.allCourses.forEach(course => {
                allCoursesHtml += `
                    <tr>
                        <td>${course.name}</td>
                    </tr>`;
            });
            $('table.table-bordered:first tbody').html(allCoursesHtml);
        },
        error: function (xhr) {
            console.error("Error fetching courses:", xhr.responseText);
        }
    });
}

// Trigger fetching courses on page load (if a program is selected by default)
$(document).ready(function () {
    const defaultProgramId = $('#program').val();
    if (defaultProgramId) {
        fetchCourses(defaultProgramId);
    }
});
</script>

@endsection
