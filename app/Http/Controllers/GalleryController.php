<?php

namespace App\Http\Controllers;

use App\Models\Picture_gallery;
use App\Models\Picture_gallery_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_gallery'])->only(['create', 'store']);
        $this->middleware(['permission:read_gallery'])->only(['index', 'show']);
        $this->middleware(['permission:update_gallery'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_gallery'])->only(['show', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Picture_gallery::with(['media', 'user'])->orderBy('created_at', 'DESC')->paginate();

        return view('private.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Picture_gallery_category::where('display', true)->get();

        return view('private.gallery.create', compact('categories'));
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
            'description' => 'nullable|max:512'
        ]);

        $gallery = new Picture_gallery();
        $gallery->user_id = $request->user()->id;
        $gallery->title = $request->title;
        $gallery->slug = Str::slug($request->title);
        $gallery->description = $request->description;
        $gallery->status = 'draft';

        $gallery->save();

        if (isset($request->categories) && count($request->categories) > 0) {
            $gallery->categories()->attach($request->categories);
        }

        return redirect()
            ->route('admin.gallery.edit', $gallery->id)
            ->withSuccess('Berhasil membuat album baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture_gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Picture_gallery $gallery)
    {
        return view('private.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picture_gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture_gallery $gallery)
    {
        $categories = Picture_gallery_category::where('display', true)->orderBy('name', 'ASC')->get();
        $galleryCategories = [];
        if ( count($gallery->categories) > 0) {
            foreach ($gallery->categories as $item) {
                $galleryCategories[] = $item->id;
            }
        }

        return view('private.gallery.edit', compact('categories', 'gallery', 'galleryCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture_gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture_gallery $gallery)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable|max:512'
        ]);

        $gallery->user_id = $request->user()->id;
        $gallery->title = $request->title;
        $gallery->slug = Str::slug($request->title);
        $gallery->description = $request->description;
        if ($request->draft) {
            $gallery->status = 'draft';
        }
        else {
            $gallery->status = 'publish';
        }

        $gallery->save();

        if (isset($request->categories) && count($request->categories) > 0) {
            $gallery->categories()->sync($request->categories);
        }
        else {
            $gallery->categories()->detach();

            $uncategorized = Picture_gallery_category::getUncategorizedData();
            if ($uncategorized != null) {
                $gallery->categories()->attach($uncategorized->id);
            }
        }

        return redirect()
            ->route('admin.gallery.index')
            ->withSuccess('Berhasil memperbarui album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture_gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture_gallery $gallery)
    {
        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->withSuccess('Berhasil menghapus album');
    }

    /**
     * Halaman manajemen kategori
     *
     * Menampilkan halaman manajemen kategori album
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return View\Factory@private.gallery.categories
     */
    public function categories()
    {
        return view('private.gallery.categories');
    }
}
