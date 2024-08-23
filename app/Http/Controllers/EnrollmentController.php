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
        Log::error('Entered the function');

        $request->validate([
            'program' => 'required',
            'full_name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'company' => 'required',
            'mode_of_class' => 'required',
            'time_for_class' => 'required',
            'email' => 'required:email'
        ]);

        $check = Enrollment::where('program_id', $request->program)
            ->where('email', $request->email)
            ->first();
        $full_name = explode(" ", $request->full_name);
        $first_name = $last_name = "";
        if ($full_name) {
            $first_name = $full_name[0];
            $last_name = $full_name[1];

            if (isset($full_name[2])) {
                $last_name .= " " . $first_name[2];
            }
        }

        $application = [
            'program_id' => $request->program,
            'firstname' => $first_name,
            'lastname' => $last_name,
            'email' => $request->email,
            'program_software' => implode(",", $request->program_software),
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
        ];
        if (!$check) {
            $app = new Enrollment($application);
            $app->save();
            return redirect()->back()->with('swalSuccess', 'Hello ' . $request->full_name . ', you have successfully applied for this course');
        } else {
            return redirect()->back()->with('swalError', 'Hello ' . $request->full_name . ', you have already applied for this course');
        }
    }

    private function getCountries()
    {
        return ['Uganda', 'Kenya', 'Tanzania', 'Rwanda'];
    }
}
