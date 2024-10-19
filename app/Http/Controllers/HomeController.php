<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ChooseUs;
use App\Models\CompanyAddress;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\PaymentOption;
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
        $paymentOptions = PaymentOption::where('id', 1)->first();
        $companyAddress = CompanyAddress::where('id', 1)->first();

        return view('index', compact('courses', 'gallery', 'abt', 'chzn', 'partners', 'blogs', 'testimonial', 'paymentOptions', 'companyAddress'));
    }

    public function about()
    {
        $profile = CompanyProfile::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();
        $companyAddress = CompanyAddress::where('id', 1)->first();

        return view('about', compact('profile', 'companyAddress', 'paymentOptions'));
    }

    public function clientele()
    {

        $profile = CompanyProfile::where('id', 1)->first();
        $companyAddress = CompanyAddress::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();
        return view('clientele', compact('profile', 'companyAddress', 'paymentOptions'));
    }

    public function deliverables()
    {
        $profile = CompanyProfile::where('id', 1)->first();
        $companyAddress = CompanyAddress::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();
        return view('deliverables', compact('profile', 'companyAddress', 'paymentOptions'));
    }

    public function contact()
    {
        $companyAddress = CompanyAddress::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();
        return view('contact', compact('companyAddress', 'paymentOptions'));
    }
}
