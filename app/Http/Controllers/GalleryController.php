<?php

namespace App\Http\Controllers;

use App\Models\CompanyAddress;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\GallerySection;
use App\Models\Image;
use App\Models\PaymentOption;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $categories = GallerySection::with('images')->where('id', '!=', 1)->get();
        $profile = CompanyProfile::where('id', 1)->first();
        $companyAddress = CompanyAddress::where('id', 1)->first();
        $paymentOptions = PaymentOption::where('id', 1)->first();
        return view('gallery', compact('categories', 'profile', 'companyAddress', 'paymentOptions'));
    }
}
