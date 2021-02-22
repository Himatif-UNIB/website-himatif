<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog_category;
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
        return ['data' => Blog_category::where('display', true)->get()];
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
            'name' => ['required', 'unique:blog_categories,name']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $category = new Blog_category;
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
     * @param  \App\Models\Blog_category  $blog_category
     * @return \Illuminate\Http\Response
     */
    public function show(Blog_category $blog_category)
    {
        return $blog_category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog_category  $blog_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog_category $blog_category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:blog_categories,name']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $blog_category->name = $request->name;
        $blog_category->slug = Str::slug($request->name);
        $blog_category->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui kategori baru'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog_category  $blog_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog_category $blog_category)
    {
        $blog_category->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus kategori'
            ]);
    }
}
