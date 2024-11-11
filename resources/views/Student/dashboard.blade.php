@extends("Layout.Dashboard_Layout")

@section('AdminContent')
<h1>Student</h1>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>Welcome to Your Dashboard</h2>
        </div>
        <div class="card-body">
            <p class="card-text">
                Access your quizzes, view progress, and manage your profile here. Use the options in the sidebar to navigate through different sections.
            </p>

            <!-- Batch Dropdown -->
            <form action="{{ route('student.dashboard') }}" method="GET">
                <div class="form-group">
                    <label for="batch">Select Batch</label>
                    <select name="batch_id" id="batch" class="form-control">
                        <option value="">Select a batch</option>
                        @foreach($batches as $batch)
                            <option value="{{ $batch->id }}" {{ request()->get('batch_id') == $batch->id ? 'selected' : '' }}>
                                {{ $batch->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Start Quiz</button>
            </form>

            <br>

            <!-- Display Quizzes if a batch is selected and quizzes exist -->
            @if ($batchId && $quizzes->isNotEmpty())
                @foreach ($quizzes as $quiz)
                    <a href="{{ route('admin.quizzes.show', ['id' => $quiz->id]) }}" class="btn btn-primary">View Quiz: {{ $quiz->title }}</a><br>
                @endforeach
            @elseif($batchId)
                <p>No quizzes available for the selected batch.</p>
            @endif
        </div>
    </div>
</div>
@endsection
