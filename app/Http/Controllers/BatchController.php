<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Batch;


class BatchController extends Controller
{
    public function index()
{
    $batches = Batch::all();  // Retrieve all batches from the database
    return view('Dashboard.admin.batches.index', compact('batches'));
}

public function add()
{
    return view('Dashboard.admin.batches.add');  // Return the view with the form
}


public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'start_year' => 'required|digits:4',
        'end_year' => 'required|digits:4|after:start_year',
    ]);

    // Create and save the new batch
    Batch::create([
        'name' => $request->name,
        'start_year' => $request->start_year,
        'end_year' => $request->end_year,
    ]);

    return redirect()->route('admin.batches.index')->with('success', 'Batch created successfully.');
}
public function edit($id)
{
    $batch = Batch::findOrFail($id);  // Find the batch by ID
    return view('Dashboard.admin.batches.edit', compact('batch'));
}
public function update(Request $request, $id)
{
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'start_year' => 'required|digits:4',
        'end_year' => 'required|digits:4|after:start_year',
    ]);

    // Find and update the batch
    $batch = Batch::findOrFail($id);
    $batch->update([
        'name' => $request->name,
        'start_year' => $request->start_year,
        'end_year' => $request->end_year,
    ]);

    return redirect()->route('Dashboard.admin.batches.index')->with('success', 'Batch updated successfully.');
}
public function destroy($id)
{
    $batch = Batch::findOrFail($id);
    $batch->delete();  // Delete the batch
    return redirect()->route('batches.index')->with('success', 'Batch deleted successfully.');
}



}
