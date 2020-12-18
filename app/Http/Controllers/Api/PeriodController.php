<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Period::all()];
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
            'name' => ['required', 'unique:periods,name'],
            'is_active' => ['nullable', 'boolean']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $period = new Period;
        $period->name = $request->name;
        if ($request->is_active == 1) {
            $period->is_active = true;
            Period::where('is_active', true)->update(['is_active' => false]);
        }
        $period->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menambah data periode'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        return $period;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'is_active' => ['nullable', 'boolean']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $period->name = $request->name;
        if ($request->is_active == 1) {
            $period->is_active = true;
            Period::where(['id', '!=', $period->id])->update(['is_active' => false]);
        }
        $period->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui data periode'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        if ($period->is_active == 1) {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Tidak bisa menghapus periode yang ditandai aktif'
                ]);
        }

        $period->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus data periode'
            ]);
    }
}
