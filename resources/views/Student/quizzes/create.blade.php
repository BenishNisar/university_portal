@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<h1>Create Quiz</h1>
<form action="{{ route('admin.quizzes.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="course_id">Course</label>
        <select name="course_id" id="course_id" class="form-control" required>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" id="due_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="batch_id">Select Batch:</label>
        <select name="batch_id[]" multiple class="form-control">
            @foreach($batches as $batch)
                <option value="{{ $batch->id }}">{{ $batch->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
