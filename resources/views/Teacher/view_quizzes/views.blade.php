<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Layout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: black;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            height: 60px;
            display: block;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            margin: 5px 0;
        }
        .info {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }
        .info ul {
            list-style-type: none;
            padding: 0;
        }
        .info ul li {
            margin: 5px 0;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        .note {
            text-align: left;
            font-weight: bold;
        }

        /* Button Styling */
        .print-btn {
            text-align: center;
            margin: 20px 0;
        }
        .print-btn a {
            display: inline-block;
            padding: 12px 25px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: white;
            background-color: #801316; /* Custom Background Color */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .print-btn a:hover {
            background-color: #6a0b12; /* Slightly darker shade on hover */
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <img src="{{ asset('Dashboard_assets/img/Ilama_University.png') }}" alt="Ilama University">
        <h1>{{ $subject->name }}</h1>
        <h1>Quiz</h1>
    </div>
    <div  style="text-align:right;" class="print-btn">
        <a href="#" onclick="window.print()">Print this page</a>
    </div>
    <!-- Info Section -->
    <div class="info">
        <ul>
            <li>Subject Name: {{ $subject->name }}</li>
            <li>Student Name: {{ $quizzes->first()->user->firstname ?? 'No Student Assigned' }}</li>
            <li>Faculty Name: {{ Auth::user()->firstname }} </li>
        </ul>

        <ul>

            <li>Max Marks: 20</li>
            <li>Student ID:</li>
            <li>Campus: MAIN</li>
        </ul>
    </div>

    <!-- Note Table -->
    <table>
        <tr>
            <th style="text-align: center;" class="note" colspan="6">Note: Attempt all questions. Do not write anything on paper.</th>
        </tr>
    </table>

    <!-- Questions Table -->
    <table>
        <tr>
            <th style="width: 40%;">Question</th>
            <th>Answer 1</th>
            <th>Answer 2</th>
            <th>Answer 3</th>
            <th>Answer 4</th>
            <th>Correct Answers</th>
        </tr>

        @foreach ($quizzes as $quiz)
        <tr>
            <td>{{ $quiz->question }}</td>
            <td>{{ $quiz->answer_1 }}</td>
            <td>{{ $quiz->answer_2 }}</td>
            <td>{{ $quiz->answer_3 }}</td>
            <td>{{ $quiz->answer_4 }}</td>
            <td>{{ $quiz->correct_answer }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
