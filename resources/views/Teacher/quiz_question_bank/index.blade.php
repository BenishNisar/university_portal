
@extends('Layout.Dashboard_Layout')

@section("AdminContent")

<style>
    /* Container and Table Styling */
    .container-fluid {
        padding-left: 0;
        padding-right: 0;
    }

    .table-container {
        margin-left: 10px;
        margin-right: 10px;
    }

    .table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-top: 15px;
        margin-bottom: 30px;
        padding-bottom: 10px;
    }

    .table {
        width: 100%;
        margin-bottom: 0;
    }

    /* Table Header and Cell Styling */
    .table th, .table td {
        padding: 10px 12px;
        font-size: 14px;
        white-space: nowrap;
        text-align: left;
    }

    /* Button Styling */
    .add-new-btn, .print-btn {
        background-color: #b10937;
        color: white;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-right: 5px;
    }

    .btn{
        background-color: #b10937;
        color: white;
         padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-right: 5px;
    }
    .add-new-btn:hover, .print-btn:hover {
        background-color: #86092b;
        color: white;
    }

    /* Search Input Styling */
    .search-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: auto;
    }

    .search-input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 250px;
        outline: none;
        font-size: 14px;
    }

    .search-input:focus {
        border-color: rgba(0, 0, 0, 0.349);
    }

    /* Action Icons Styling */
    .actions {
        display: flex;
        justify-content: center;
    }

    .actions i {
        margin: 0 4px;
        cursor: pointer;
    }

    .actions i:hover {
        color: #b10937;
    }

    .dropdown-container {
    display: flex;
    gap: 10px; /* Space between dropdowns */
    align-items: center;
    justify-content: flex-start; /* Align dropdowns to the start */
}

.dropdown-container .form-select {
    width: 200px; /* Adjust width as needed */
}

</style>

<form id="quizForm" method="POST" action="{{ route('quiz-bank.save') }}">
    @csrf<!-- CSRF Token for security -->

    <div class="container-fluid mt-4 table-container">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <div class="dropdown-container">
                <select class="form-select" name="semester" required>
                    <option selected disabled>Select Semester</option>
                    @foreach($semesters as $semester)
                        <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                    @endforeach
                </select>

                <select class="form-select" name="subject" required>
                    <option selected disabled>Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>

                <select class="form-select" name="quiz_no" required>
                    <option selected disabled>Select Quiz No</option>
                    @foreach($quizzes as $quiz)
                        <option value="{{ $quiz->id }}">{{ $quiz->quiz_number }}</option>
                    @endforeach
                </select>
            </div>



            <div class="search-container" style="margin-top: 100px;">
                <button type="submit" class="btn">Save</button>
                <button type="button" class="add-new-btn" onclick="addRow()">Add Row</button>
                <button type="button" class="print-btn" onclick="printTable()">Print</button>
            </div>
        </div>

        <div class="table-wrapper mt-5">
            <table class="table table-bordered table-striped" id="quizTable">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer 1</th>
                        <th>Answer 2</th>
                        <th>Answer 3</th>
                        <th>Answer 4</th>
                        <th>Correct Answer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="question" required></td>
                        <td><input type="text" name="answer_1" required></td>
                        <td><input type="text" name="answer_2" required></td>
                        <td><input type="text" name="answer_3" required></td>
                        <td><input type="text" name="answer_4" required></td>
                        <td>
                            <select name="correct_answer" required>
                                <option value="1">Answer 1</option>
                                <option value="2">Answer 2</option>
                                <option value="3">Answer 3</option>
                                <option value="4">Answer 4</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</form>

<script>
    // Add a new row to the quiz table
    function addRow() {
        const table = document.getElementById("quizTable").getElementsByTagName("tbody")[0];
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td><input type="text" name="question" required></td>
            <td><input type="text" name="answer_1" required></td>
            <td><input type="text" name="answer_2" required></td>
            <td><input type="text" name="answer_3" required></td>
            <td><input type="text" name="answer_4" required></td>
            <td>
                <select name="correct_answer" required>
                    <option value="1">Answer 1</option>
                    <option value="2">Answer 2</option>
                    <option value="3">Answer 3</option>
                    <option value="4">Answer 4</option>
                </select>
            </td>`;
        table.appendChild(newRow);
    }

    // Print the quiz table
    function printTable() {
        const printContents = document.getElementById("quizTable").outerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection
