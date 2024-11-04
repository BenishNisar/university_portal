@extends("Layout.Dashboard_Layout")

@section("AdminContent")

<h2>Edit Course</h2>
<form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" required>
    </div>
    <div class="form-group">
        <label for="code">Code</label>
        <input type="text" name="code" id="code" class="form-control" value="{{ $course->code }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ $course->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="available" {{ $course->status == 'available' ? 'selected' : '' }}>Available</option>
            <option value="assigned" {{ $course->status == 'assigned' ? 'selected' : '' }}>Assigned</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update Course</button>
</form>

@endsection
