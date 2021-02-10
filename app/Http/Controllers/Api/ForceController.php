<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Force;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ForceController extends Controller
{
    /**
     * Membatasi akses ke api
     * 
     * - create_force -> store()
     * - read_force -> index(), show()
     * - update_force -> update()
     * - delete_force -> destroy()
     */
    public function __construct()
    {
        $this->middleware(['permission:create_force'])->only('store');
        $this->middleware(['permission:read_force'])->only(['index', 'show']);
        $this->middleware(['permission:update_force'])->only('update');
        $this->middleware(['permission:delete_force'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Force::all()];
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
            'name' => ['required', 'unique:forces,name'],
            'year' => ['required', 'unique:forces,year']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $force = new Force;
        $force->name = $request->name;
        $force->year = $request->year;
        $force->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menambah data angkatan'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Force  $force
     * @return \Illuminate\Http\Response
     */
    public function show(Force $force)
    {
        return $force;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Force  $force
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Force $force)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'year' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $force->name = $request->name;
        $force->year = $request->year;
        $force->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui data angkatan'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Force  $force
     * @return \Illuminate\Http\Response
     */
    public function destroy(Force $force)
    {
        $force->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus angkatan'
            ]);
    }
}
