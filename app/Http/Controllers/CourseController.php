<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Program::orderBy('id')->get();
        return view('courses', compact('courses'));
    }

    public function indexFunc()
    {
        $courses = Course::orderBy('id')->get();
        return view('course-outlines', compact('courses'));
    }

    public function downloads()
    {
        $courses = Course::orderBy('id')->paginate(6); // Paginate with 6 items per page
        return view('downloads', compact('courses'));
    }


    public function details($id)
    {
        // $id = base64_decode($request->input('read-more'));
        $program = Program::findOrFail($id);
        $outline = Program::orderBy('id')->get();

        return view('details', compact('program', 'outline'));
    }
}
