<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\MembersImport;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Member::with('force')->get()];
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
            'name' => ['required', 'min:4', 'max:128'],
            'npm' => ['required', 'min:9', 'max:16', 'unique:members,npm'],
            'force_id' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $member = new Member;
        $member->name = $request->name;
        $member->npm = $request->npm;
        $member->force_id = $request->force_id;
        $member->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menambah data anggota'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return $member;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:4', 'max:128'],
            'npm' => ['required', 'min:9', 'max:16'],
            'force_id' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $member->name = $request->name;
        $member->npm = $request->npm;
        $member->force_id = $request->force_id;
        $member->save();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil memperbarui data anggota'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus anggota'
            ]);
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'max:10240', 'mimes:xlsx,xls']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = '_temp_'. time() .'_'. $file->getClientOriginalName();
            $filePath = 'uploads/members-import/'. $fileName;

            $file->move('uploads/members-import', $fileName);

            Excel::import(new MembersImport, $filePath);

            File::delete($filePath);

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Berhasil mengimpor data anggota'
                ]);
        }
    }
}
