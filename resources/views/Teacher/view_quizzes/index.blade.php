@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<h1>Quizzes</h1>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Semester</th>
            <th>Subject</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($quizzes as $quiz)
        <tr>
            <td>{{ $quiz->id }}</td>
            <td>{{ optional($quiz->semester)->name ?? 'No Semester Assigned' }}</td>
            <td>{{ optional($quiz->subject)->name ?? 'No Subject Assigned' }}</td>
            <td>
                <a href="{{ route('teacher.view_quizzes.views', $quiz->subject_id) }}" class="btn btn-primary" target="_blank">Print</a>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
