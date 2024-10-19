<?php

namespace App\Http\Controllers;

use App\Models\CompanyAddress;
use App\Models\Course;
use App\Models\PaymentOption;
use App\Models\TrainingCalendar;
use Illuminate\Http\Request;

class TrainingCalenderController extends Controller
{
    //
    public function index()
    {
        $calendars = TrainingCalendar::with('course')->get();
        $courses = Course::all();
        return view('admin.calendar.training_calendar', compact('calendars', 'courses'));
    }

    public function fetchCalendars()
    {
        // Fetch all training calendar entries with associated course data
        $calendars = TrainingCalendar::with('course')->get();
        $companyAddress = CompanyAddress::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();

        // Pass the data to the view
        return view('view_training_calendar', compact('calendars', 'companyAddress', 'paymentOptions'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.training_calendar', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string|max:255',
        ]);

        TrainingCalendar::create($request->all());

        return redirect()->route('admin.training_calendar.index')->with('success', 'Training calendar entry added successfully.');
    }


    public function edit($id)
    {
        $calendar = TrainingCalendar::findOrFail($id);
        $courses = Course::all();
        return view('admin.training_calendar.edit', compact('calendar', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string|max:255',
        ]);

        $calendar = TrainingCalendar::findOrFail($id);
        $calendar->update($request->all());

        return redirect()->route('admin.training_calendar.index')->with('success', 'Training calendar entry updated successfully.');
    }

    public function destroy($id)
    {
        $calendar = TrainingCalendar::findOrFail($id);
        $calendar->delete();

        return redirect()->route('admin.training_calendar.index')->with('success', 'Training calendar entry deleted successfully.');
    }
}
