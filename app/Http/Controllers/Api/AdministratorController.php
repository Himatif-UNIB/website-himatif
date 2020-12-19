<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Administrator::with(['member', 'position', 'period'])->get()];
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
            'member_id' => ['required', 'numeric'],
            'position_id' => ['required', 'numeric'],
            'period_id' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }
        
        $checkIsMemberIsAdministrated = Administrator::where(['member_id' => $request->member_id, 'period_id' => $request->period_id])->first();

        if ($checkIsMemberIsAdministrated != NULL) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => [
                        'member_id' => [
                            'Anggota tersebut sudah menjadi pengurus di periode ini dengan jabatan lain'
                        ]
                    ]
                ], 422);
        }

        $administrator = new Administrator;
        $administrator->member_id = $request->member_id;
        $administrator->position_id = $request->position_id;
        $administrator->period_id = $request->period_id;
        $administrator->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menambah data pengurus'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        return $administrator;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $administrator)
    {
        $validator = Validator::make($request->all(), [
            'member_id' => ['required', 'numeric'],
            'position_id' => ['required', 'numeric'],
            'period_id' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $administrator->member_id = $request->member_id;
        $administrator->position_id = $request->position_id;
        $administrator->period_id = $request->period_id;
        $administrator->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui data pengurus'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        $administrator->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus data pengurus'
            ]);
    }
}
