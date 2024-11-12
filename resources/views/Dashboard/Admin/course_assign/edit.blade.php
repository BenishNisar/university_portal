@extends("Layout.Dashboard_Layout")

@section("AdminContent")
    <div class="container">
        <h2>Edit Course Assignment</h2>

        <form action="{{ route('admin.course_assign.update', $courseAssign->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- User (Teacher) Selection -->
            <div class="form-group">
                <label for="user_id">Teacher</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $courseAssign->user_id == $teacher->id ? 'selected' : '' }}>
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
                        <option value="{{ $department->id }}" {{ $courseAssign->department_id == $department->id ? 'selected' : '' }}>
                            {{ $department->department_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Batch Selection -->
            <div class="form-group">
                <label for="batch_id">Batch</label>
                <select name="batch_id" id="batch_id" class="form-control" required>
                    <option value="">Select Batch</option>
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}" {{ $courseAssign->batch_id == $batch->id ? 'selected' : '' }}>
                            {{ $batch->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Semester Input -->
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="text" name="semester" id="semester" class="form-control" value="{{ old('semester', $courseAssign->semester) }}" required>
            </div>

            <!-- Year Input -->
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $courseAssign->year) }}" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Assignment</button>
        </form>
    </div>
@endsection
