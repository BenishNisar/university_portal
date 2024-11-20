@extends('Layout.Dashboard_Layout')
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

</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
