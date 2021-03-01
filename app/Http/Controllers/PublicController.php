<?php

namespace App\Http\Controllers;

use App\Models\Picture_gallery;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function galeriDetail(Request $request)
    {
        $media = Picture_gallery::find(2)->media()->where('collection_name', 'galleryPictureItems')->paginate(4);

        return view('frontend.galeri.detail', compact('media'));
    }
}
