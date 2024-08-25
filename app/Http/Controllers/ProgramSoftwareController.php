<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramSoftware;
use Illuminate\Http\Request;

class ProgramSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::with('soft')->get();

        return view('admin.software.view_softwares', ['programs' => $programs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('admin.software.add_software', ['programs' => $programs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'program_id' => $request->program_id,
            'no_of_sessions' => $request->no_of_sessions,
            'fee' => $request->fee,
            'add_by' => session('email'),
            'software_name' => $request->software_name
        ];

        $software = new ProgramSoftware($data);
        $software->save();

        if ($software->id) {
            return redirect()->route('software.index')->with('success', 'Program Software saved successfully.');
        }
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
    public function destroy(string $id)
    {
        //
    }
}
