<?php

namespace App\Http\Controllers\Api\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Picture_gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture_gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Picture_gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture_gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture_gallery $gallery)
    {
        $validator = Validator::make($request->all(), [
            'picture' => ['required', 'max:10960']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            $fileName = empty($request->title) ? $gallery->title : $request->title;
            $fileDescription = empty($request->description) ? $gallery->description : $request->description;

            $gallery->addMediaFromRequest('picture')
                ->withCustomProperties([
                    'name' => $fileName,
                    'description' => strip_tags($fileDescription)
                ])
                ->toMediaCollection('galleryPictureItems');

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Berhasil menambahkan foto'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture_gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Picture_gallery $gallery)
    {
        $fileId = $request->fileId;
        $item = $gallery->whereHas('media', function ($query) use ($fileId) {
            $query->whereId($fileId);
        });
        if ($item->exists()) {
            $item->first()->deleteMedia($fileId);
        }

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus foto'
            ]);
    }
}
