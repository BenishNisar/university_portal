@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container mt-5">
    @foreach($courses as $course)
    <div class="card mb-4 shadow-lg rounded-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">{{ $course->name }}</h3>
        </div>
        <div class="card-body">

            <!-- Check if assignments are enabled -->
            @if($course->assignments_enabled)
                <div class="assignments-section mb-4">
                    <h4 class="text-info">Assignments</h4>
                    @foreach($course->assignments as $assignment)
                    <div class="assignment mb-3 p-3 border rounded-lg bg-light">
                        <p><strong>{{ $assignment->title }}</strong></p>
                        <p>{{ $assignment->description }}</p>
                        <a href="{{ asset('storage/' . $assignment->file_path) }}" class="btn btn-outline-primary" target="_blank">View Assignment</a>
                    </div>
                    @endforeach

                    <!-- Form to upload assignment -->
                    <div class="upload-form bg-light p-4 rounded-lg mt-4">
                        <h5 class="mb-3 text-primary">Upload Assignment</h5>
                        <form action="{{ route('student.uploadAssignment', $course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Assignment Title" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" placeholder="Assignment Description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="assignment" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Upload Assignment</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-warning mt-3">
                    <p>Assignments are currently disabled by the teacher.</p>
                </div>
            @endif

            <!-- Check if quizzes are enabled -->
            @if($course->quizzes_enabled)
                <div class="quizzes-section mb-4">
                    <h4 class="text-info">Quizzes</h4>
                    @foreach($course->quizzes as $quiz)
                    <div class="quiz mb-3 p-3 border rounded-lg bg-light">
                        <p><strong>{{ $quiz->title }}</strong></p>
                        <p>{{ $quiz->description }}</p>
                        <a href="{{ asset('storage/' . $quiz->file_path) }}" class="btn btn-outline-success" target="_blank">View Quiz</a>
                    </div>
                    @endforeach

                    <!-- Form to upload quiz -->
                    <div class="upload-form bg-light p-4 rounded-lg mt-4">
                        <h5 class="mb-3 text-success">Upload Quiz</h5>
                        <form action="{{ route('student.uploadQuiz', $course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Quiz Title" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" placeholder="Quiz Description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="quiz" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Upload Quiz</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-warning mt-3">
                    <p>Quizzes are currently disabled by the teacher.</p>
                </div>
            @endif
        </div>
    </div>
    @endforeach
</div>

@endsection
