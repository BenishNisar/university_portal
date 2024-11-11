@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h1>Edit Assignment</h1>

    <!-- Display all errors at the top -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.assignments.update', $assignment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="course_id">Select Course</label>
            <select name="course_id" class="form-control" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $assignment->course_id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <!-- Error message for course_id -->
            @error('course_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $assignment->title) }}" required>
            <!-- Error message for title -->
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $assignment->description) }}</textarea>
            <!-- Error message for description -->
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="datetime-local" name="due_date" class="form-control" value="{{ old('due_date', \Carbon\Carbon::parse($assignment->due_date)->format('Y-m-d\TH:i')) }}" required>
            <!-- Error message for due_date -->
            @error('due_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Update Assignment</button>
    </form>
</div>
@endsection
