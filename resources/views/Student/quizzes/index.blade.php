@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<h1>Quizzes</h1>
    <a href="{{ route('admin.quizzes.create') }}" class="btn btn-primary">Create New Quiz</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Course</th>
                <th>Batches</th> <!-- Add Batches column -->

                <th>Description</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->id }}</td>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ $quiz->course->name ?? 'N/A' }}</td> <!-- Display course name -->

                    <td>
                        {{ $quiz->batches->pluck('name')->join(', ') }}
                    </td>
                    <!-- other fields -->
                    <td>{{ $quiz->description }}</td>

                    <td>{{ $quiz->due_date }}</td>
                    <td>
                        <a href="{{ route('admin.quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.quizzes.addQuestions', $quiz->id) }}" class="btn btn-sm btn-info">Add Questions</a>
                        <a href="{{ route('admin.quizzes.show', $quiz->id) }}" class="btn btn-sm btn-success">Show</a> <!-- Show button -->
                        <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
