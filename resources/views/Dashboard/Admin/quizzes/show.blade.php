@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h1>{{ $quiz->title }}</h1>
    <p>{{ $quiz->description }}</p>

    <!-- Timer Display -->
    <div id="timer" class="alert alert-warning text-center">
        Time Remaining: <span id="time">30:00</span>
    </div>

    <form id="quizForm" action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
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

<!-- Custom CSS for the Timer Positioning -->
<style>
    /* Position the timer on the right side with a rounded, visually appealing design */
    #timer {
        position: fixed;
        top: 90px;
        right: 20px;
        padding: 10px 20px;
        background-color: #ffeb3b;
        color: #333;
        font-weight: bold;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        width: auto;
        text-align: center;
    }
</style>

<!-- JavaScript for the Countdown Timer -->
<script>
    // Set the time limit (30 minutes in seconds)
    let timeLimit = 30 * 60;

    // Function to start the timer
    function startTimer() {
        const timerElement = document.getElementById('time');

        const interval = setInterval(() => {
            let minutes = Math.floor(timeLimit / 60);
            let seconds = timeLimit % 60;

            // Format the time display
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            timerElement.textContent = `${minutes}:${seconds}`;
            timeLimit--;

            // If time runs out, submit the form automatically
            if (timeLimit < 0) {
                clearInterval(interval);
                alert('Time is up! Submitting your quiz.');
                document.getElementById('quizForm').submit();
            }
        }, 1000);
    }

    // Start the timer when the page loads
    window.onload = startTimer;
</script>
@endsection
