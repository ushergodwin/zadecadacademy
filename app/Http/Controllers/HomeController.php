<?php

namespace App\Http\Controllers;

use App\Models\ChooseUs;
use App\Models\Gallery;
use App\Models\Program;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $courses = Program::orderBy('id')->limit(6)->get();
        $gallery = Gallery::where('status', 'yes')->get();
        $abt = Gallery::where('status', 'yes')->limit(3)->get();
        $chzn = ChooseUs::orderBy('id')->get();

        return view('index', compact('courses', 'gallery', 'abt', 'chzn'));
    }
}
