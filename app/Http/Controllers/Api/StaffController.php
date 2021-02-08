<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Membatasi akses ke api
     * 
     * - create_staff -> store()
     * - read_staff -> index(), show()
     * - update_staff -> update()
     * - delete_staff -> destroy()
     */
    public function __construct()
    {
        $this->middleware(['permission:create_staff'])->only('store');
        $this->middleware(['permission:read_staff'])->only(['index', 'show']);
        $this->middleware(['permission:update_staff'])->only('update');
        $this->middleware(['permission:delete_staff'])->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Staff::with(['user.member', 'position', 'period', 'position.division'])->get()];
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
            'user_id' => ['required', 'numeric'],
            'position_id' => ['required', 'numeric'],
            'period_id' => ['required', 'numeric'],
            'role' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }
        
        $checkIsMemberIsAdministrated = Staff::where(['user_id' => $request->user_id, 'period_id' => $request->period_id])->first();

        if ($checkIsMemberIsAdministrated != NULL) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => [
                        'user_id' => [
                            'Anggota tersebut sudah menjadi pengurus di periode ini dengan jabatan lain'
                        ]
                    ]
                ], 422);
        }

        $staff = new Staff;
        $staff->user_id = $request->user_id;
        $staff->position_id = $request->position_id;
        $staff->period_id = $request->period_id;
        $staff->save();

        $user = User::findOrFail($request->user_id);
        $user->assignRole($request->role);

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menambah data pengurus'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        $data = new \stdClass();

        $data = $staff;
        $role = $staff->user->roles[0]->name;
        $data->role = $role;
        
        unset($data->user);

        return response()
            ->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric'],
            'position_id' => ['required', 'numeric'],
            'period_id' => ['required', 'numeric'],
            'role' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $staff->user_id = $request->user_id;
        $staff->position_id = $request->position_id;
        $staff->period_id = $request->period_id;
        $staff->save();

        $user = User::findOrFail($request->user_id);
        $user->syncRoles([$request->role]);

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui data pengurus'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus data pengurus'
            ]);
    }
}
