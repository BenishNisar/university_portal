@extends("Layout.Dashboard_Layout")

@section("AdminContent")


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.batches.update', $batch->id) }}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
    <label for="name">Batch Name:</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $batch->name) }}" required>
</div>

<div class="form-group">
    <label for="start_year">Start Year:</label>
    <input type="number" id="start_year" name="start_year" class="form-control" value="{{ old('start_year', $batch->start_year) }}" required>
</div>

<div class="form-group">
    <label for="end_year">End Year:</label>
    <input type="number" id="end_year" name="end_year" class="form-control" value="{{ old('end_year', $batch->end_year) }}" required>
</div>

<button type="submit" class="btn btn-primary">Update Batch</button>
</form>

@endsection
