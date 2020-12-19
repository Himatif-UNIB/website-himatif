<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Position::with('parent')->get()];
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
            'name' => ['required'],
            'parent_id' => ['nullable', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $position = new Position;
        $position->name = $request->name;
        $position->parent_id = ($request->parent_id == 0) ? NULL : $request->parent_id;
        $position->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menambah data jabatan'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return $position;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'parent_id' => ['nullable', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $position->name = $request->name;
        $position->parent_id = ($request->parent_id == 0) ? NULL : $request->parent_id;
        $position->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui data jabatan'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $message = ($position->parent_id == NULL) ? 'Berhasil menghapus data jabatan. Jabatan ini merupakan jabatan induk, semua child dari jabatan ini juga dihapus.' :
            'Berhasil menghapus data jabatan';

        $position->delete();

        return response()
            ->json([
                'success' => true,
                'message' => $message
            ]);
    }

    /**
     * Menampilkan jabatan parent
     * 
     * Menampilkan semua jabatan yang merupakan
     * jabatan parent
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Array   Data jabatan parent
     */
    public function parents()
    {
        $parents = Position::where('parent_id', NULL)->get();

        return ['data' => $parents];
    }
}
