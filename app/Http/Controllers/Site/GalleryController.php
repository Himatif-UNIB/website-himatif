<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Picture_gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Picture_gallery::all();

        return view('public.galleries.index', compact('albums'));
    }

    public function show(Picture_gallery $album, $title)
    {
        return view('public.galleries.show', compact('album'));
    }
}
