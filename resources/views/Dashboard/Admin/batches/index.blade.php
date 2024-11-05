@extends("Layout.Dashboard_Layout")

@section("AdminContent")

<style>
    .container-fluid {
        padding-left: 0;
        padding-right: 0;
    }

    .table-container {
        margin-left: 10px;
        margin-right: 10px;
    }

    .table-wrapper {
        overflow-x: auto; /* Enables horizontal scrolling */
        margin-top: 15px;
        padding-bottom: 1rem; /* Space below the scroll bar */
    }

    .table {
        width: 1500px; /* Set fixed width to enable horizontal scroll if content overflows */
        margin-bottom: 0;
    }

    .table th, .table td {
        padding: 10px 12px;
        font-size: 14px;
        white-space: nowrap;
        text-align: left;
    }

    .add-new-btn {
        background-color: #b10937;
        color: white;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-left: 15px;
    }

    .add-new-btn:hover {
        background-color: grey;
    }

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
</style>

<div class="container-fluid mt-4 table-container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-size: 23px;">Batches Add</h1>
        <a href="{{ url('/batches/add') }}" class="add-new-btn">Add New</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <div class="table-wrapper">
        <table class="table table-bordered table-striped">
            <thead>

                <tr>
                    <th>Name</th>
                    <th>Start Year</th>
                    <th>End Year</th>
                    <th>Actions</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($batches as $batch)
                <tr>
                    <td>{{ $batch->name }}</td>
                    <td>{{ $batch->start_year }}</td>
                    <td>{{ $batch->end_year }}</td>
                    <td>
                        <a href="{{ route('admin.batches.edit', $batch->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.batches.destroy', $batch->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

                <!-- Additional rows can be added here -->
            </tbody>
        </table>
    </div>
</div>

@endsection
