@extends("Layout.Dashboard_Layout")
@section("AdminContent")
<div class="container">
    <h1>Edit Course</h1>

    <form action="{{ route('admin.student_courses.update', $course->course_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" class="form-control" required>
                @foreach($courses as $courseItem)
                    <option value="{{ $courseItem->id }}" @if($courseItem->id == $course->course_id) selected @endif>{{ $courseItem->course_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="enrolled" @if($course->status == 'enrolled') selected @endif>Enrolled</option>
                <option value="completed" @if($course->status == 'completed') selected @endif>Completed</option>
                <option value="remaining" @if($course->status == 'remaining') selected @endif>Remaining</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Course</button>
    </form>
</div>

@endsection
