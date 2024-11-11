@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h1>Assignments</h1>
    <a href="{{ route('admin.assignments.add') }}" class="btn btn-primary mb-2">Add New Assignment</a>
    <table class="table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->course->name }}</td>
                    <td>{{ $assignment->title }}</td>
                    <td>{{ $assignment->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($assignment->due_date)->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.assignments.edit', $assignment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.assignments.destroy', $assignment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>

                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
