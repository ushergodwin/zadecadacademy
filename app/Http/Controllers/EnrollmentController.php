<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class EnrollmentController extends Controller
{
    //
    public function show(Request $request)
    {
        $id = base64_decode($request->input('activate'));
        $program = Program::with('soft')->where('id', $id)->first();
        $outline = Program::orderBy('id')->get();
        $countries = $this->getCountries();

        return view('enrol', compact('program', 'outline', 'countries'));
    }

    public function store(Request $request)
    {   
        
            // return response()->json($request);

           $request->validate([
            'program' => 'required',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'gender' => 'required|string|in:Male,Female',
            'country' => 'required|string|max:100',
            'occupation' => 'nullable|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'company' => 'required|string|max:255',
            'mode_of_class' => 'required|string|in:Virtual,Physical,Hybrid',
            'time_for_class' => 'required|string|in:Week days,Weekends',
        ]);


        $check = Enrollment::where('program_id', $request->program)
            ->where('phone', $request->phone)
            ->first();

        if (!$check) {
            $enrollment = new Enrollment();

            $enrollment->program_id = $request->program;
            $enrollment->fullname = $request->fullname;
            $enrollment->email = $request->email;
            $enrollment->phone = $request->phone;
            $enrollment->whatsapp = $request->whatsapp;
            $enrollment->gender = $request->gender;
            $enrollment->country = $request->country;
            $enrollment->enrollment_date = Carbon::now();
            $enrollment->occupation = $request->occupation;
            $enrollment->field_of_study = $request->field_of_study;
            $enrollment->company = $request->company;
            $enrollment->mode_of_class = $request->mode_of_class;
            $enrollment->time_for_class = $request->time_for_class;

            // Save the instance to the database
            $enrollment->save();

            return redirect()->back()->with('success', 'Hello ' . $request->firstname . ', you have successfully enrolled for this course');
        } else {
            return redirect()->back()->with('swalError', 'Hello ' . $request->full_name . ', you have already applied for this course');
        }
    }

    private function getCountries()
    {
        return ['Uganda', 'Kenya', 'Tanzania', 'Rwanda'];
    }
}
