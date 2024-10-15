<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ChooseUs;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $courses = Program::orderBy('id')->limit(3)->get();
        $gallery = Gallery::where('status', 'yes')->get();
        $abt = Gallery::where('status', 'yes')->limit(3)->get();
        $chzn = ChooseUs::orderBy('id')->get();
        $partners = Partner::all();
        $blogs = Blog::latest()->limit(20)->get();
        $testimonial = Testimonial::all()->first();

        return view('index', compact('courses', 'gallery', 'abt', 'chzn', 'partners', 'blogs', 'testimonial'));
    }
}