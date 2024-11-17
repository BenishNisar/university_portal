@extends('Layout.Dashboard_Layout')

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
