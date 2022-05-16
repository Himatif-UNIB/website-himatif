<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Showcase_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ShowcaseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Showcase_category::all()];
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
            'name' => ['required', 'unique:showcase_categories,name']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $category = new Showcase_category();
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
     * @param  \App\Models\Showcase_category  $showcase_category
     * @return \Illuminate\Http\Response
     */
    public function show(Showcase_category $showcase_category)
    {
        return $showcase_category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showcase_category  $showcase_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showcase_category $showcase_category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:showcase_categories,name,'. $showcase_category->id]
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $showcase_category->name = $request->name;
        $showcase_category->slug = Str::slug($request->name);
        $showcase_category->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui kategori baru'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showcase_category  $showcase_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showcase_category $showcase_category)
    {
        $showcase_category->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus kategori'
            ]);
    }
}
