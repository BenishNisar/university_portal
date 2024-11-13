@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container mt-5">
    <h3 class="text-center mb-4">Assignment Submissions</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Assignment Title</th>
                <th>Description</th>
                <th>Student Name</th>
               
                <th>View Assignment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions as $submission)
                <tr>
                    <td>{{ $submission->assignment_title }}</td>
                    <td>{{ $submission->description }}</td>
                    <td>{{ $submission->student_name }}</td>

                    <td><a href="{{ asset('storage/' . $submission->file_path) }}" class="btn btn-primary" target="_blank">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
