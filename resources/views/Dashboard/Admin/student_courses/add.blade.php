@extends("Layout.Dashboard_Layout")
@section("AdminContent")
<div class="container">
    <h1>Add New Course</h1>

    <form action="{{ route('admin.student_courses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="enrolled">Enrolled</option>
                <option value="completed">Completed</option>
                <option value="remaining">Remaining</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-2">Add Course</button>
    </form>
</div>
@endsection
