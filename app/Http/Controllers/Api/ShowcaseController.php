<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShowcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
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
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Showcase $showcase)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showcase $showcase)
    {
        $validator = Validator::make($request->all(), [
            'picture' => ['required', 'max:10960'],
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            $fileName = empty($request->title) ? $showcase->title : $request->title;
            $fileDescription = empty($request->description) ? $showcase->description : $request->description;

            $showcase->addMediaFromRequest('picture')
                ->withCustomProperties([
                    'name' => $fileName,
                    'description' => strip_tags($fileDescription)
                ])
                ->toMediaCollection('showcaseImages');

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
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Showcase $showcase)
    {
        $fileId = $request->fileId;
        $item = $showcase->whereHas('media', function ($query) use ($fileId) {
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
