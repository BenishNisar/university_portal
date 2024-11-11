@extends("Layout.Dashboard_Layout")
@section("AdminContent")
<div class="container">
    <h1>Your Courses</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->course->name }}</td>
                    <td>{{ $course->status }}</td>
                    <td>
                        <a href="{{ route('admin.student_courses.edit', $course->course_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.student_courses.destroy', $course->course_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.student_courses.add') }}" class="btn btn-primary">Add New Course</a>
</div>


@endsection
