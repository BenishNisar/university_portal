<!-- resources/views/teacher/assignments/index.blade.php -->

@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container">
    <h1>Quizzes</h1>

    <!-- Displaying courses -->
  <!-- resources/views/teacher/assignments/index.blade.php -->
  @foreach($courses as $course)
  <h3>{{ $course->name }}</h3>

  <!-- Toggle button to enable/disable quizzes -->
  <form action="{{ route('toggleQuizzes', $course->id) }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-{{ $course->quizzes_enabled ? 'danger' : 'success' }}">
          {{ $course->quizzes_enabled ? 'Disable Quizzes' : 'Enable Quizzes' }}
      </button>
  </form>
@endforeach



</div>
@endsection
