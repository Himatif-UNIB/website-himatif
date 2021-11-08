<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Form_question;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        if ($request->certificate_type == 'image') {
            $validated = $request->validate([
                'title' => 'required',
                'file' => 'required|mimes:jpg,png,jpeg'
            ]);

            $file_name = $request->file->getClientOriginalName();
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);

            $validated['thumbnail'] = $request->file->storeAs('thumbnail', uniqid() . '.' . $ext);
            $validated['file'] = $request->file->storeAs('certificates', uniqid() . '.' . $ext);

        } elseif ($request->certificate_type == 'html') {
            $validated = $request->validate([
                'title' => 'required',
                'file' => 'required|mimes:html',
                'thumbnail' => 'required|mimes:jpg,png,jpeg'
            ]);

            $thumbnail_name = $request->thumbnail->getClientOriginalName();
            $ext = pathinfo($thumbnail_name, PATHINFO_EXTENSION);

            $validated['thumbnail'] = $request->file->storeAs('thumbnail', uniqid() . '.' . $ext);
            $validated['file'] = $request->file->storeAs('certificates', uniqid() . '.blade.php');

        }
        Certificate::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo json_encode(Form_question::where('form_id', $id)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
