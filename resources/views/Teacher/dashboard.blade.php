@extends('Layout.Dashboard_Layout')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


@section('AdminContent')
<div class="container">

    <!-- Assigned Courses List -->
    <h2>Assigned Courses</h2>
    <div class="assigned-courses">
        @foreach($courses as $course)
            <div class="course-card">
                <h3>{{ $course->name }}</h3>

                <!-- Dropdown for course options -->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Teacher Options
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#hoursTaught">Hours Taught & Remaining</a>
                        <a class="dropdown-item" href="#enterMarks">Enter Student Marks</a>
                        <a class="dropdown-item" href="#quizzesQuestionBank">Quizzes Question Bank</a>
                        <a class="dropdown-item" href="#missingQuizzesAssignments">Student Missing Quizzes & Assignments</a>
                    </div>
                </div>

                <!-- Option Sections -->
                <div id="hoursTaught" class="mt-4">
                    <!-- Hours Taught Form & Table -->
                </div>

                <div id="enterMarks" class="mt-4">
                    <!-- Enter Marks Form & Table -->
                </div>

                <div id="quizzesQuestionBank" class="mt-4">
                    <!-- Quizzes Question Bank Form & Table -->
                </div>

                <div id="missingQuizzesAssignments" class="mt-4">
                    <!-- Missing Quizzes & Assignments List -->
                </div>

            </div>
        @endforeach
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
