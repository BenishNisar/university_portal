@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<h1>Edit Quiz</h1>
<form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="course_id">Course</label>
        <select name="course_id" id="course_id" class="form-control" required>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ old('course_id', $quiz->course_id) == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        @error('course_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $quiz->title) }}" required>
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required>{{ old('description', $quiz->description) }}</textarea>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date', $quiz->due_date) }}" required>
        @error('due_date') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="batch_id">Select Batch:</label>
        <select name="batch_id[]" multiple class="form-control">
            @foreach($batches as $batch)
                <option value="{{ $batch->id }}"
                    {{ in_array($batch->id, old('batch_id', $quiz->batches->pluck('id')->toArray())) ? 'selected' : '' }}>
                    {{ $batch->name }}
                </option>
            @endforeach
        </select>
        @error('batch_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
