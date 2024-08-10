<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = Program::orderBy('pid')->get();
        return view('courses', compact('courses'));
    }

    public function indexFunc()
    {
        $courses = Course::orderBy('code')->get();
        return view('course-outlines', compact('courses'));
    }
}
