@extends('Layout.Dashboard_Layout')

@section('AdminContent')
<div class="container mt-4">
    <h1 class="text-center mb-4 text-primary">Assignments</h1>

    @if($assignments->count() > 0)
        @php
            $currentCourse = null;
        @endphp

        @foreach($assignments as $assignment)
            @if($currentCourse !== $assignment->course->name)
                @if($currentCourse)
                    </div> <!-- Close the previous course section -->
                @endif

                <h3 class="mt-4 mb-2 text-success">{{ $assignment->course->name }}</h3>
                <div class="row">
                    @php
                        $currentCourse = $assignment->course->name;
                    @endphp
            @endif

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-light">
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $assignment->title }}</h5>
                        <p class="card-text">{{ \Str::limit($assignment->description, 100) }}</p>
                        <p class="text-muted"><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($assignment->due_date)->format('F j, Y') }}</p>
                        {{-- <a href="{{ route('assignment.details', $assignment->id) }}" class="btn btn-primary btn-sm">View Details</a> --}}
                    </div>
                </div>
            </div>
        @endforeach

        </div> <!-- Close the last course section -->

    @else
        <div class="alert alert-warning text-center" role="alert">
            No assignments found.
        </div>
    @endif
</div>
@endsection
