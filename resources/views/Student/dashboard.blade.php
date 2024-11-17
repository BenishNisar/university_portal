@extends("Layout.Dashboard_Layout")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    /* Customizing dropdown styling */
    .dropdown-custom {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        padding: 10px 20px;
        font-size: 14px;
        border: 2px solid #ddd;
        border-radius: 5px;
        background-color: transparent;
        color: #333;
        width: 100%;
        transition: all 0.3s ease;
    }

    /* On focus: smooth shadow and subtle effect */
    .dropdown-custom:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        outline: none;
    }

    /* Remove the background and make it more transparent */
    .dropdown-custom option {
        background-color: #fff;
        color: #333;
        padding: 10px;
    }

    .dropdown-custom option:hover {
        background-color: #f1f1f1;
    }

    /* Make the table look cleaner */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table td {
        padding: 15px;
        text-align: left;
    }

    /* Style for table headers */
    .table thead {
        background-color: #f8f8f8;
    }

    .table thead tr {
        border-bottom: 2px solid #ddd;
    }
</style>

@section("AdminContent")
<div class="container">
    <h1>Student Dashboard</h1>

    <h2 class="mt-5">Courses Status</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <td>Completed Courses</td>
                <td>
                    <select class="dropdown-custom" onchange="showCourseDetails(this)">
                        <option disabled selected>View Completed Courses</option>
                        @foreach($completedCourses as $course)
                            <option value="{{ $course->id }}">{{ $course->course->name ?? 'Unknown Course' }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="dropdown-custom">
                        <option disabled selected>Select an Action</option>
                        <option value="hours_taught">Hours Taught</option>
                        <option value="remaining_hours">Remaining Hours</option>
                        <option value="view_sessional_marks">View Sessional Marks</option>
                        <option value="view_mid_marks">View Mid Marks</option>
                        <option value="view_final_marks">View Final Marks</option>
                        <option value="upload_quiz">Upload Quiz</option>
                        <option value="upload_assignment">Upload Assignment</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Remaining Courses</td>
                <td>
                    <select class="dropdown-custom" onchange="showCourseDetails(this)">
                        <option disabled selected>View Remaining Courses</option>
                        @foreach($remainingCourses as $course)
                            <option value="{{ $course->id }}">{{ $course->course->name ?? 'Unknown Course' }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="dropdown-custom">
                        <option disabled selected>Select an Action</option>
                        <option value="hours_taught">Hours Taught</option>
                        <option value="remaining_hours">Remaining Hours</option>
                        <option value="view_sessional_marks">View Sessional Marks</option>
                        <option value="view_mid_marks">View Mid Marks</option>
                        <option value="view_final_marks">View Final Marks</option>
                        <option value="upload_quiz">Upload Quiz</option>
                        <option value="upload_assignment">Upload Assignment</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enrolled Courses</td>
                <td>
                    <select class="dropdown-custom" onchange="showCourseDetails(this)">
                        <option disabled selected>View Enrolled Courses</option>
                        @foreach($enrolledCourses as $course)
                            <option value="{{ $course->id }}">{{ $course->course->name ?? 'Unknown Course' }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="dropdown-custom">
                        <option disabled selected>Select an Action</option>
                        <option value="hours_taught">Hours Taught</option>
                        <option value="remaining_hours">Remaining Hours</option>
                        <option value="view_sessional_marks">View Sessional Marks</option>
                        <option value="view_mid_marks">View Mid Marks</option>
                        <option value="view_final_marks">View Final Marks</option>
                        <option value="upload_quiz">Upload Quiz</option>
                        <option value="upload_assignment">Upload Assignment</option>
                    </select>
                </td>
            </tr>
        </thead>
    </table>

</div>

<!-- Course Details Modal -->
<div class="modal fade" id="courseDetailsModal" tabindex="-1" aria-labelledby="courseDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseDetailsModalLabel">Course Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Exam:</strong> <span id="courseExam"></span></p>
                <p><strong>Session:</strong> <span id="courseSession"></span></p>
                <h6 class="mt-3">Options:</h6>
                <ul id="courseOptions">
                    <!-- Dynamically populated options -->
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function showCourseDetails(select) {
    console.log("Fetching details for course ID:", select.value); // Log to verify the function is called
    const courseId = select.value;

    $.ajax({
        url: '/get-course-details',
        method: 'GET',
        data: { id: courseId },
        success: function (response) {
            console.log(response); // Add this to check the returned data
            document.getElementById('courseExam').textContent = response.exam || "N/A";
            document.getElementById('courseSession').textContent = response.session || "N/A";

            const options = [
                `<li>Hours Taught: ${response.hoursTaught || 'N/A'}</li>`,
                `<li>Remaining Hours: ${response.remainingHours || 'N/A'}</li>`,
                `<li><a href="/marks/${courseId}">View Marks</a></li>`,
                `<li><a href="/upload/quiz/${courseId}">Upload Quiz</a></li>`,
                `<li><a href="/upload/assignment/${courseId}">Upload Assignment</a></li>`
            ];
            document.getElementById('courseOptions').innerHTML = options.join('');

            $('#courseDetailsModal').modal('show');
        },
        error: function () {
            alert('Failed to fetch course details.');
        }
    });
}

</script>
@endsection
