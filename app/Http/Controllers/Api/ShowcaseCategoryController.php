<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Showcase_category;
use App\Http\Controllers\Controller;
use App\Models\Showcase;
use Illuminate\Support\Facades\Validator;

class ShowcaseCategoryController extends Controller
{
    public function contributor()
    {
        // Count the occurrences of each name
        $showcase =  Showcase::select('user_id')->where('status', Showcase::STATUS_PUBLISHED)->with(['user',])->get()->load(['user.media']);
        // dd($showcase[3]->user->media->first() == NULL);
        $data = [];
        foreach ($showcase as $index) {
            if (!in_array($index->user->name, $data)) {
                // Tambahkan data ke array jika belum ada
                $name = $index->user->name;
                if ($index->user->media->first() != NULL) {
                    $profile = $index->user->media[0]->getFUllUrl();
                } else {
                    $profile = "/favicon.png";
                }
                $data[] = [
                    "name" => $name,
                    "profile" => $profile,
                    'id_user' => $index->user_id,
                ];

                // $data[] = [$name,];
            }
        }
        sort($data);
        $uniqueData = [];

        // Loop through the original data array
        foreach ($data as $item) {
            $name = $item["name"];

            // If the "name" is not yet in the uniqueData array, add it
            if (!array_key_exists($name, $uniqueData)) {
                $uniqueData[$name] = $item;
            }
        }

        // Convert the associative array back to indexed array if needed
        $uniqueData = array_values($uniqueData);
        // dd($uniqueData);
        return ['data' => $uniqueData];
    }
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
            'name' => ['required', 'unique:showcase_categories,name,' . $showcase_category->id]
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
