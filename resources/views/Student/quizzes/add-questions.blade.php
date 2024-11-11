@extends('Layout.Dashboard_Layout')

@section('AdminContent')
    <div class="container">
        <h1>Add Questions to {{ $quiz->title }}</h1>

        <form action="{{ route('admin.quizzes.storeQuestions', $quiz->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="text">Question Text</label>
                <input type="text" class="form-control" name="text" id="text" required>
            </div>

            <div class="form-group">
                <label for="options">Options</label>
                <div id="options">
                    <input type="text" class="form-control" name="options[]" required placeholder="Option 1">
                    <input type="text" class="form-control" name="options[]" required placeholder="Option 2">
                    <input type="text" class="form-control" name="options[]" required placeholder="Option 3">
                    <input type="text" class="form-control" name="options[]" required placeholder="Option 4">
                </div>
            </div>

            <div class="form-group">
                <label for="correct_option">Correct Option</label>
                <select class="form-control" name="correct_option" required>
                    <option value="">Select the correct option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="4">Option 4</option>
                </select>
            </div>

            <div class="form-group">
                <label for="batch_id">Select Batch</label>
                <select class="form-control" id="batch_id" name="batch_id">
                    <option value="">Select a Batch</option>
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Container to display questions or details based on the batch -->
            <div id="batch-details" style="display: none;">
                <h3>Details for Selected Batch</h3>
                <div id="batch-questions"></div>
            </div>

            <button type="submit" class="btn btn-primary">Save Question</button>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const batchSelect = document.getElementById('batch_id');
                const batchDetails = document.getElementById('batch-details');
                const batchQuestions = document.getElementById('batch-questions');

                batchSelect.addEventListener('change', function() {
                    const batchId = this.value;

                    if (batchId) {
                        fetch(`/admin/batches/${batchId}/questions`)
                            .then(response => response.json())
                            .then(data => {
                                batchDetails.style.display = 'block';
                                batchQuestions.innerHTML = '';
                                data.questions.forEach((question, index) => {
                                    batchQuestions.innerHTML += `<p>${index + 1}. ${question.text}</p>`;
                                });
                            })
                            .catch(error => console.error('Error fetching batch details:', error));
                    } else {
                        batchDetails.style.display = 'none';
                        batchQuestions.innerHTML = '';
                    }
                });
            });
        </script>
    </div>
@endsection
