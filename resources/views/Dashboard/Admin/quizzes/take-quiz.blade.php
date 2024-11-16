<h1 class="text-center">{{ $quiz->title }}</h1>
<p>{{ $quiz->description }}</p>

<form action="{{ route('admin.quizzes.submit', $quiz->id) }}" method="POST">
    @csrf
    @foreach($quiz->questions as $index => $question)
        <div class="card mb-4">
            <div class="card-body">
                <h5>Question {{ $index + 1 }}</h5>
                <p>{{ $question->text }}</p>
                @foreach($question->options as $option)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                 id="option{{ $option->id }}" value="{{ $option->id }}" required>
                        <label class="form-check-label" for="option{{ $option->id }}">
                            {{ $option->text }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit Quiz</button>
</form>
