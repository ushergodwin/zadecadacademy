<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    //
    public function show(Request $request)
    {
        $pid = base64_decode($request->input('read-more'));
        $program = Program::findOrFail($pid);
        $outline = Program::orderBy('pid')->get();

        return view('program-details', compact('program', 'outline'));
    }

    public function enrol(Request $request)
    {
        $pid = base64_decode($request->input('id'));
        $userId = Auth::id();
        $today = Carbon::now();

        Enrollment::create([
            'user_id' => $userId,
            'program_id' => $pid,
            'enrollment_date' => $today
        ]);

        $program = Program::findOrFail($pid);

        return redirect()->route('program.details', ['read-more' => base64_encode($pid), 'content' => Str::slug($program->pg_name)]);
    }
}
