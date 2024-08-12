<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Import the Str class

class ProgramController extends Controller
{
    //
    public function show(Request $request)
    {
        $id = base64_decode($request->input('read-more'));
        $program = Program::findOrFail($id);
        $outline = Program::orderBy('id')->get();

        return view('program-details', compact('program', 'outline'));
    }

    public function enrol(Request $request)
    {
        $id = base64_decode($request->input('id'));
        $userId = Auth::id();
        $today = Carbon::now();

        Enrollment::create([
            'user_id' => $userId,
            'program_id' => $id,
            'enrollment_date' => $today
        ]);

        $program = Program::findOrFail($id);

        return redirect()->route('program.details', ['read-more' => base64_encode($id), 'content' => Str::slug($program->pg_name)]);
    }
}
