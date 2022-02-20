<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{
    /**
     * Membatasi akses ke api
     * 
     * - create_division -> store()
     * - read_division -> index(), show()
     * - update_division -> update()
     * - delete_division -> destroy()
     */
    public function __construct()
    {
        $this->middleware(['permission:create_division'])->only('store');
        $this->middleware(['permission:read_division'])->only(['index', 'show']);
        $this->middleware(['permission:update_division'])->only('update');
        $this->middleware(['permission:delete_division'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::with(['media'])->get();
        foreach ($divisions as $division) {
            $division->picture = isset($division->media[0]) ? $division->media[0]->getFullUrl() : NULL;
            unset($division->media);
        }
        
        return ['data' => $divisions];
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
            'name' => ['required', 'min:2', 'max:128', 'unique:divisions,name'],
            'picture' => ['required', 'max:5096', 'mimes:jpg,jpeg,png,svg']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $division = new Division;
        $division->name = $request->name;
        $division->save();

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $division->addMediaFromRequest('picture')
                ->toMediaCollection('divisionPicture');
        }

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menambah data divisi'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        return $division;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:2', 'max:128'],
            'picture' => ['nullable', 'max:5096', 'mimes:jpg,jpeg,png,svg']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $division->name = $request->name;
        $division->save();

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            if (isset($division->media[0])) {
                $division->media[0]->delete();
            }

            $division->addMediaFromRequest('picture')
                ->toMediaCollection('divisionPicture');
        }

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui data divisi'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        if (isset($division->media[0])) {
            $division->media[0]->delete();
        }

        $division->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus divisi'
            ]);
    }
}
