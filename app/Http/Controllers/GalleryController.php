<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $images = Image::where('status', 'Yes')->get();
        return view('gallery', compact('images'));
    }
}
