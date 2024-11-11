@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h1>{{ $quiz->title }}</h1>
    <p>{{ $quiz->description }}</p>

    <form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
        @csrf

        @foreach($quiz->questions as $index => $question)
            <div class="mb-4">
                <h4>Question {{ $index + 1 }}: {{ $question->text }}</h4>

                @foreach($question->options as $option)
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="answers[{{ $question->id }}]"
                            value="{{ $option->id }}"
                            id="option{{ $option->id }}">
                        <label class="form-check-label" for="option{{ $option->id }}">
                            {{ $option->text }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Submit Quiz</button>
    </form>
</div>
@endsection
