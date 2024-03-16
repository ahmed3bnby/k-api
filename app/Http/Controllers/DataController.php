<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Data;

use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Data::all(); // Retrieve all data from the 'data' table
        return view('dashboard', compact('data')); // Pass the data to the view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:data', // Assuming 'data' is your table name
        ]);

        // Create a new instance of the Data model and fill it with the validated data
        $data = Data::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Data added successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $record = Data::find($id);

        if ($record) {
            $record->delete();
            return redirect()->route('dashboard')->with('status', 'Record deleted successfully.')->with('status_type', 'danger');
        }

        return redirect()->route('dashboard')->with('status', 'Record not found.')->with('status_type', 'danger');
    }
}
