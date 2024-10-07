<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GallerySection;
use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $categories = GallerySection::with('images')->where('id', '!=', 1)->get();
        return view('gallery', compact('categories'));
    }
}