@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container mt-4">
    <h1>Quiz Result: {{ $quiz->title }}</h1>
    <p>{{ $quiz->description }}</p>

    <div class="alert alert-info">
        <h3>Score: {{ $score }} / {{ $totalQuestions }}</h3>
        <h4>Percentage: {{ $percentage }}%</h4>

        @if($percentage >= 50)
            <p class="text-success">Congratulations! You passed the quiz.</p>
        @else
            <p class="text-danger">Unfortunately, you did not pass the quiz. Better luck next time!</p>
        @endif
    </div>

    <a href="{{ route('admin.quizzes.index') }}" class="btn btn-primary">Back to Quizzes</a>
</div>
@endsection
