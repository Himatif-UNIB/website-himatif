<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    /**
     * Membatasi akses ke api
     * 
     * - create_position -> store()
     * - read_position -> index(), show()
     * - update_position -> update()
     * - delete_position -> destroy()
     */
    public function __construct()
    {
        $this->middleware(['permission:create_position'])->only('store');
        $this->middleware(['permission:read_position'])->only(['index', 'show']);
        $this->middleware(['permission:update_position'])->only('update');
        $this->middleware(['permission:delete_position'])->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Position::with('division')->get()];
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
            'division_id' => ['nullable', 'numeric'],
            'order_level' => ['required', 'numeric']
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
        $position->division_id = ($request->division_id == 0) ? NULL : $request->division_id;
        $position->order_level = $request->order_level;
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
            'division_id' => ['nullable', 'numeric'],
            'order_level' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $position->name = $request->name;
        $position->division_id = ($request->division_id == 0) ? NULL : $request->division_id;
        $position->order_level = $request->order_level;
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
        $position->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus data jabatan'
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
        $parents = Position::where('division_id', NULL)->get();

        return ['data' => $parents];
    }
}
