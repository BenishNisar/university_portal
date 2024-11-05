@extends("Layout.Dashboard_Layout")

@section("AdminContent")
    <div class="container">
        <h2>Assign Course</h2>

        <form action="{{ route('admin.course_assign.store') }}" method="POST">
            @csrf

                     <!-- Course Selection -->
                     <div class="form-group">
                        <label for="course_id">Course</label>
                        <select name="course_id" id="course_id" class="form-control" required>
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
            <!-- User (Teacher) Selection -->
        <!-- User (Teacher) Selection -->
        <div class="form-group">
            <label for="user_id">Teacher</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">
                        {{ $teacher->firstname }} {{ $teacher->lastname }}
                        @if($teacher->role) ({{ $teacher->role->role_name }}) @endif
                    </option>
                @endforeach
            </select>
        </div>



            <!-- Department Selection -->
            <div class="form-group">
                <label for="department_id">Department</label>
                <select name="department_id" id="department_id" class="form-control" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Batch Selection -->
            <div class="form-group">
                <label for="batch_id">Batch</label>
                <select name="batch_id" id="batch_id" class="form-control" required>
                    <option value="">Select Batch</option>
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Semester Input -->
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="text" name="semester" id="semester" class="form-control" placeholder="e.g., Fall or Spring" required>
            </div>

            <!-- Year Input -->
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" class="form-control" placeholder="e.g., 2024" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Assign Course</button>
        </form>
    </div>
@endsection
