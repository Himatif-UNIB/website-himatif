<?php

namespace App\Http\Controllers\Api\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Picture_gallery_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Picture_gallery_category::where('display', true)->get()];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:gallery_categories,name']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $category = new Picture_gallery_category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menambah kategori baru'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture_gallery_category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Picture_gallery_category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture_gallery_category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture_gallery_category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui kategori'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture_gallery_category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture_gallery_category $category)
    {
        $category->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus kategori'
            ]);
    }
}
