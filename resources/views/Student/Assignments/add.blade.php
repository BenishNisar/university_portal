@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h1>Add New Assignment</h1>

    <form action="{{ route('admin.assignments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_id">Select Course</label>
            <select name="course_id" class="form-control" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            @if($errors->has('course_id'))
                <div class="text-danger">{{ $errors->first('course_id') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @if($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            @if($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="datetime-local" name="due_date" class="form-control" value="{{ old('due_date') }}" required>
            @if($errors->has('due_date'))
                <div class="text-danger">{{ $errors->first('due_date') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-success mt-2">Add Assignment</button>
    </form>
</div>
@endsection
