<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog_category;
use App\Models\Blog_post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Membatasi akses ke halaman
     * 
     * Akses ke setiap method dibatasi berdasarkan
     * hak akses yang dimiliki user.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  void
     */
    public function __construct()
    {
        $this->middleware(['permission:create_blog_post'])->only('create', 'store');
        $this->middleware(['permission:read_blog_post'])->only(['index', 'show']);
        $this->middleware(['permission:update_blog_post'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_blog_post'])->only('destroy');
        $this->middleware(['role:secretary'])->only(['deleted', 'restore', 'force_delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $isSecretary = (auth()->user()->roles[0]->name === 'secretary');
        $writer_id = $request->writer;
        $category_id = $request->category_id;

        if ($isSecretary) {
            //Sekretaris dapat melihat semua posting dari user,
            //tetapi hanya bisa melihat, tidak bisa mengubah
            //atau menghapus

            $posts = Blog_post::where('status', '!=', 'deleted')
                ->whereHas('user', function ($post) use ($writer_id, $request) {
                    if ($writer_id != '') {
                        return $post->where('user_id', $writer_id);
                    }
                })
                ->whereHas('categories', function ($post) use ($category_id) {
                    if ($category_id != '') {
                        return $post->with('categories');
                    }
                })->orderBy('created_at', 'DESC')->paginate();
        }
        else {
            //user biasa hanya bisa melihat, mengubah dan menghapus posting miliknya
            
            $posts = Blog_post::where('user_id', auth()->user()->id)
                ->where('status', '!=', 'deleted')->orderBy('created_at', 'DESC')->paginate();
        }

        return view('private.blog.index', compact('isSecretary', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Blog_category::where('display', true)->orderBy('name', 'ASC')->get();

        return view('private.blog.create', compact('categories'));
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
            'title' => 'required|min:8|max:255|unique:blog_posts,title',
            'picture' => 'nullable|mimes:jpg,jpeg,png|max:5096',
            'content' => 'required',
            'excerpt' => 'nullable|max:255'
        ]);

        $post = new Blog_post;
        $post->user_id = $request->user()->id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->excerpt = $request->excerpt;
        $post->allow_comment = ($request->allow_comment == 1) ? true : false;
        $post->moderate_comment = ($request->moderate_comment == 1) ? true : false;
        if ($request->publish) {
            $post->status = 'publish';
        }
        if ($request->draft) {
            $post->status = 'draft';
        }
        $post->save();

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            $post->addMediaFromRequest('picture')
                ->toMediaCollection('post_picture');
        }

        if (isset($request->categories) && count($request->categories) > 0) {
            $post->categories()->attach($request->categories);
        }
        else {
            $uncategorized = Blog_category::getUncategorizedData();
            if ($uncategorized != null) {
                $post->categories()->attach($uncategorized->id);
            }
        }

        return redirect()
            ->route('admin.blog.posts.index')
            ->withSuccess('Berhasil menambahkan posting baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Blog_post $post)
    {
        return view('private.blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog_post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            abort(403, 'Anda tidak mempunyai izin untuk mengubah posting ini');
        }

        if ($post->status == 'deleted') {
            abort(403, 'Posting dalam tempat sampah tidak bisa diubah lagi');
        }

        $categories = Blog_category::where('display', true)->orderBy('name', 'ASC')->get();
        $postCategories = [];
        if ( count($post->categories) > 0) {
            foreach ($post->categories as $item) {
                $postCategories[] = $item->id;
            }
        }

        return view('private.blog.edit', compact('categories', 'post', 'postCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog_post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            abort(403, 'Anda tidak mempunyai izin untuk mengubah posting ini');
        }

        $request->validate([
            'title' => 'required|min:8|max:255',
            'picture' => 'nullable|mimes:jpg,jpeg,png|max:5096',
            'content' => 'required',
            'excerpt' => 'nullable|max:255'
        ]);

        $post->user_id = $request->user()->id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->excerpt = $request->excerpt;
        $post->allow_comment = ($request->allow_comment == 1) ? true : false;
        $post->moderate_comment = ($request->moderate_comment == 1) ? true : false;
        if ($request->publish) {
            $post->status = 'publish';
        }
        if ($request->draft) {
            $post->status = 'draft';
        }
        $post->save();

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            if (isset($post->media[0])) {
                $post->media[0]->delete();
            }

            $post->addMediaFromRequest('picture')
                ->toMediaCollection('post_picture');
        }

        if (isset($request->categories) && count($request->categories) > 0) {
            $post->categories()->sync($request->categories);
        }

        return redirect()
            ->route('admin.blog.posts.index')
            ->withSuccess('Berhasil memperbarui posting.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Blog_post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            abort(403, 'Anda tidak mempunyai izin untuk menghapus posting ini');
        }

        if ($post->status == 'deleted') {
            if ($request->force_delete == 1) {
                $post->delete();
    
                return redirect()
                    ->route('admin.blog.posts.trash')
                    ->withSuccess('Berhasil menghapus posting secara permanen.');
            }
            else {
                $post->status = 'draft';
                $post->save();

                return redirect()
                    ->route('admin.blog.posts.index')
                    ->withSuccess('Berhasil mengembalikan posting');
            }
        }
        else {
            $post->status = 'deleted';
            $post->save();

            return redirect()
                ->route('admin.blog.posts.trash')
                ->withSuccess('Berhasil menghapus posting');
        }
    }

    /**
     * Halaman tempat sampah
     * 
     * Menampilkan halaman tempat sampah,
     * yang merupakan halaman yang menampilkan
     * semua posting yang sudah dihapus user.
     * 
     * Setiap user hanya bisa melihat posting miliknya saja
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return View\Factory@private.blog.trash
     */
    public function trash()
    {
        $isSecretary = (auth()->user()->roles[0]->name === 'secretary');

        if ($isSecretary) {
            $posts = Blog_post::where('status', 'deleted')->paginate();
        }
        else {
            $posts = Blog_post::where(['user_id' => auth()->user()->id, 'status' => 'deleted'])->paginate();
        }

        return view('private.blog.trash', compact('isSecretary', 'posts'));
    }

    /**
     * Halaman posting yang dihapus permanen
     * 
     * Halaman ini menampilkan semua posting yang sudah
     * dihapus dari tempat sampah. Posting tersebut tidak
     * benar-benar dihapus, tetapi dilakukan soft delete.
     * Halaman ini menampilkan posting yang telah dilakukan soft delete.
     * 
     * Halaman ini hanya bisa diakses sekretaris
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.blog.deleted
     */
    public function deleted()
    {
        $posts = Blog_post::onlyTrashed()->paginate();

        return view('private.blog.deleted', compact('posts'));
    }

    /**
     * Mengembalikan posting yang di soft delete
     * 
     * Mengembalikan posting yang dihapus secara soft delete.
     * Posting akan dikembalikan ke tempat sampah
     * masing-masing user.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  void
     */
    public function restore(Request $request)
    {
        $post_id = $request->id;

        $post = Blog_post::find($post_id);
        $post->restore();

        return redirect()
            ->route('admin.blog.posts.trash')
            ->withSuccess('Berhasil mengembalikan posting');
    }

    /**
     * Menghapus posting secara permanen
     * 
     * Menghapus posting secara permanen. Posting akan benar-benar dihapus,
     * termasuk media, komentar dan data terkait.
     * 
     * @since   1.0
     * @author  mulyosyahidin95
     * 
     * @return  void
     */
    public function force_delete(Request $request)
    {
        $postId = $request->post_id;

        $post = Blog_post::withTrashed()
            ->where('id', $postId)
            ->first();

        if (isset($post->media[0])) {
            $post->media[0]->delete();
        }

        $post->forceDelete();

        return redirect()
            ->back()
            ->withSuccess('Berhasil menghapus posting secara permanen');
    }
}
