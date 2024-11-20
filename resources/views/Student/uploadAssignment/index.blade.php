@extends('Layout.Dashboard_Layout')

@section('AdminContent')




<div class="container">
    <div class="row py-3">
        <div class="col-6">
            <h3>Student Assignment</h3>
        </div>
        <div class="col-3">
            <h5>Total Marks (5)</h5>
        </div>
        <div class="col-3">
            <h5 class="text-danger"> Due Date (22-11-2024)</h5>
        </div>
    </div>
    <div class="row py-2">
        
    <div class="col-6">
            <div class="form-group">
                <label for="">Course</label>
                <select name="" class="form-control" id="">
                    <option value="">Computer Science</option>
                </select>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                    <label for="">Subject</label>
                    <select name="" class="form-control" id="">
                        <option value="">Programming Fundamentals</option>
                    </select>
            </div>
        </div>
    </div>

    <div class="row py-1">
        <div class="col-12 pt-2">
                <div class="form-group">
                    <input type="file" name="" id="" class="form-control">
                </div>
                <div class="form-group pt-3">
                    <a href="" class="btn btn-success">Upload</a>
                </div>
            </div>
        
        </div>
</div>

@endsection
