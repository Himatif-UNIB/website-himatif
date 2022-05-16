<?php

namespace App\Http\Controllers;

use App\Models\Showcase;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Showcase_category;
use Illuminate\Support\Facades\Storage;
use Google_Service_Drive_Permission;

class ShowcaseController extends Controller
{
    public $folderId;

    public function __construct()
    {
        $this->folderId = config('filesystems.disks.google.showcase.folder_id');
    }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('private.showcases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required'
        ]);

        $showcase = new Showcase();
        $showcase->user_id = auth()->user()->id;
        $showcase->type = $request->type ? $request->type : 'app';
        $showcase->title = $request->title;
        $showcase->slug = Str::slug($request->title);
        $showcase->save();

        return redirect()
            ->route('admin.showcases.edit', $showcase->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function show(Showcase $showcase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function edit(Showcase $showcase)
    {
        $categories = Showcase_category::orderBy('name', 'ASC')->get();

        return view('private.showcases.edit', compact('showcase', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showcase $showcase)
    {
        $request->validate([
            'title' => 'required|max:255|min:10',
            'description' => 'nullable',
            'tags' => 'nullable',
            'technologies' => 'nullable',
            'category_id' => 'required|numeric',
            'github_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'drive_url' => 'nullable|url',
            'file' => 'nullable|max:10960|mimes:pdf,doc,docx',
        ]);

        $showcase->title = $request->title;
        $showcase->slug = Str::slug($request->title);
        $showcase->description = $request->description;
        $showcase->tags = $request->tags;
        $showcase->technologies = $request->technologies;
        $showcase->category_id = $request->category_id;
        $showcase->github_url = $request->github_url;
        $showcase->youtube_url = $request->youtube_url;
        $showcase->drive_url = $request->drive_url;

        if ($showcase->status == Showcase::STATUS_DRAFT) {
            if (is_null($request->draft)) {
                $showcase->status = Showcase::STATUS_PUBLISHED;
            }
        }

        $showcase->save();

        if ($request->hasFile('file')) {
            if (!is_null($showcase->report_url)) {
                Storage::disk('google')->delete($this->folderId .'/'. $showcase->report_url);
            }

            $fileName = $showcase->id . '_' . $request->file('file')->getClientOriginalName();

            Storage::disk('google')->put(
                $this->folderId . '/' . $fileName,
                file_get_contents($request->file('file')->getRealPath())
            );

            $dir = '/' . $this->folderId . '/';
            $recursive = false;
            $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
            $file = $contents
                ->where('type', '=', 'file')
                ->where('filename', '=', pathinfo($fileName, PATHINFO_FILENAME))
                ->where('extension', '=', pathinfo($fileName, PATHINFO_EXTENSION))
                ->first();

                $fileId = $file['basename'];

            $service = Storage::disk('google')->getAdapter()->getService();
            $permission = new Google_Service_Drive_Permission();
            $permission->setRole('reader');
            $permission->setType('anyone');
            $permission->setAllowFileDiscovery(false);
            $permissions = $service->permissions->create($fileId, $permission);

            $showcase->report_drive_id = $fileId;
            $showcase->report_file_name = $fileName;
            $showcase->save();
        }

        return redirect()
            ->route('admin.showcases.edit', $showcase->id)
            ->withSuccess('Berhasil memperbarui data karya');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showcase $showcase)
    {
        //
    }
}
