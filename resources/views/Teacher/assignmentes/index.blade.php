<!-- resources/views/teacher/assignments/index.blade.php -->

@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h1>Teacher's Assignment Management</h1>

    <!-- Displaying courses -->
  <!-- resources/views/teacher/assignments/index.blade.php -->

@foreach($courses as $course)
<h3>{{ $course->name }}</h3>

<!-- Toggle button to enable/disable assignments -->
<form action="{{ route('toggleAssignments', $course->id) }}" method="POST">
    @csrf
    @method('POST')
    <button type="submit" class="btn btn-{{ $course->assignments_enabled ? 'danger' : 'success' }}">
        {{ $course->assignments_enabled ? 'Disable Assignments' : 'Enable Assignments' }}
    </button>
</form>
@endforeach

</div>
@endsection
