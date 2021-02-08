<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('member')->whereHas('roles', function ($role) {
            return $role->where('name', '!=', 'super_admin');
        })->get();
        
        return ['data' => $users];
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
            'name' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'email', 'min:10', 'max:255', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'password' => ['required', 'min:8'],
            'role' => ['required', 'string'],
            'npm' => Rule::requiredIf(function () use ($request) {
                return (is_string($request->role) && $request->role !== 'builder');
            }),
            'force' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->save();

        $user->assignRole($request->role);
        if ($request->role != 'super_admin' || $request->role != 'builder') {
            $member = new Member();
            $member->user_id = $user->id;
            $member->name = $request->name;
            $member->npm = $request->npm;
            $member->force_id = $request->force;
            $member->save();
        }

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menambah data user'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus user'
            ]);
    }
}
