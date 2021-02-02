<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Social_auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->with('member')->first();
        $administrators = auth()->user()->member->administrators;

        return view('profile.index', compact('user', 'administrators'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $isConnectedWith = [
            'facebook' => Social_auth::where(['user_id' => auth()->id(), 'driver' => 'facebook'])
                ->exists(),
            'google' => Social_auth::where(['user_id' => auth()->id(), 'driver' => 'google'])
                ->exists(),
        ];
        $socialData = [
            'facebook' => [
                'data' => $isConnectedWith['facebook'] ? json_decode(Social_auth::where(['user_id' => auth()->id(), 'driver' => 'facebook'])
                    ->first()
                    ->social_data) : NULL,
                'picture_url' => $isConnectedWith['facebook'] ? Social_auth::where(['user_id' => auth()->user()->id, 'driver' => 'facebook'])
                    ->first()
                    ->media[0]
                    ->getFullUrl() : NULL
            ],
            'google' => [
                'data' => $isConnectedWith['google'] ? json_decode(Social_auth::where(['user_id' => auth()->id(), 'driver' => 'google'])
                    ->first()
                    ->social_data) : NULL,
                'picture_url' => $isConnectedWith['google'] ? Social_auth::where(['user_id' => auth()->user()->id, 'driver' => 'google'])
                    ->first()
                    ->media[0]
                    ->getFullUrl() : NULL
            ]
        ];
        $user = auth()->user()->with('member')->first();
       
        return view('profile.edit', compact('isConnectedWith', 'socialData', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|max:2048|mimes:png,jpg,jpeg',
            'name' => 'required|min:4|max:128',
            'email' => 'required|min:10|max:128|email',
            'password' => 'nullable|min:6|max:128'
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != '') {
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        }
        $user->save();

        $profile = Member::where(['user_id' => $user->id])->first();
        $profile->name = $user->name;
        $profile->birth_place = $request->birth_place;
        $profile->birth_date = $request->birth_date;
        $profile->phone_number = $request->phone_number;
        $profile->address = $request->address;
        $profile->save();

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            if (isset($user->media[0])) {
                $user->media[0]->delete();
            }

            $user->addMediaFromRequest('picture')
                ->toMediaCollection('userProfilePicture');
        }

        return redirect()
            ->back()
            ->withSuccess('Berhasil memperbarui profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
