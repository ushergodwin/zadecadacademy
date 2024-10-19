<?php

namespace App\Http\Controllers;

use App\Models\CompanyAddress;
use App\Models\CompanyProfile;
use App\Models\Course;
use App\Models\PaymentOption;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Program::orderBy('id')->get();
        $profile = CompanyProfile::where('id', 1)->first();
        $companyAddress = CompanyAddress::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();
        return view('courses', compact('courses', 'profile', 'companyAddress', 'paymentOptions'));
    }

    public function indexFunc()
    {
        $courses = Course::orderBy('id', 'desc')->get();
        $companyAddress = CompanyAddress::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();
        return view('course-outlines', compact('courses', 'companyAddress', 'paymentOptions'));
    }

    public function downloads()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(6); // Paginate with 6 items per page
        $companyAddress = CompanyAddress::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();
        return view('downloads', compact('courses', 'companyAddress', 'paymentOptions'));
    }


    public function details($id)
    {
        // $id = base64_decode($request->input('read-more'));
        $program = Program::findOrFail($id);
        $outline = Program::orderBy('id', 'desc')->get();
        $companyAddress = CompanyAddress::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();
        return view('details', compact('program', 'outline', 'companyAddress', 'paymentOptions'));
    }
}
