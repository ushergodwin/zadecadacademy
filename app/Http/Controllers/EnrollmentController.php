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
        $program = Program::findOrFail($id);
        $outline = Program::orderBy('id')->get();
        $countries = $this->getCountries();

        return view('enrol', compact('program', 'outline', 'countries'));
    }

    public function store(Request $request)
    {   
        Log::error('Entered the function');

        $request->validate([
            'program' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'company' => 'required',
            'mode_of_class' => 'required',
            'time_for_class' => 'required',
        ]);

        $check = Enrollment::where('program', $request->program)
            ->where('phone', $request->phone)
            ->first();

        if (!$check) {
            Enrollment::create([
                'program' => $request->program,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'whatsapp' => $request->whatsapp,
                'gender' => $request->gender,
                'country' => $request->country,
                'enrollment_date' => Carbon::now(),
                'occupation' => $request->occupation,
                'field_of_study' => $request->field_of_study,
                'company' => $request->company,
                'mode_of_class' => $request->mode_of_class,
                'time_for_class' => $request->time_for_class,
            ]);

            return redirect()->back()->with('success', 'Hello ' . $request->firstname . ', you have successfully enrolled for this course');
        } else {
            return redirect()->back()->with('error', 'Hello ' . $request->firstname . ', you have already enrolled for this course');
        }
    }

    private function getCountries()
    {
        return ['Uganda', 'Kenya', 'Tanzania', 'Rwanda'];
    }
}
