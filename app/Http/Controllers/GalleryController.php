<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $images = Gallery::where('status', 'yes')->get();
        return view('gallery', compact('images'));
    }
}
