<?php

namespace App\Http\Controllers;

use App\Models\Showcase_category;
use Illuminate\Http\Request;

class ShowcaseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('private.showcases.categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * @param  \App\Models\Showcase_category  $showcase_category
     * @return \Illuminate\Http\Response
     */
    public function show(Showcase_category $showcase_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showcase_category  $showcase_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Showcase_category $showcase_category)
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
