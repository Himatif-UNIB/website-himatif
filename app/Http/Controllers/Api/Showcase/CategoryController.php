<?php

namespace App\Http\Controllers\Api\Showcase;

use App\Http\Controllers\Controller;
use App\Models\Showcase_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showcase_category  $showcase_category
     * @return \Illuminate\Http\Response
     */
    public function show(Showcase_category $showcase_category)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showcase_category  $showcase_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showcase_category $showcase_category)
    {
        //
    }
}
