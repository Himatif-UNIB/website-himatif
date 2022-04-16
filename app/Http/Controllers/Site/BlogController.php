<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog_category;
use App\Models\Blog_comment;
use App\Models\Blog_post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Menampilkan daftar posting
     *
     * Menampilkan daftar posting di halaman `/blog`
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return View\Factory@public.blog.index
     */
    public function index()
    {
        $posts = Blog_post::where('status', 'publish')->orderBy('created_at', 'DESC')->paginate();
        $categories = Blog_category::orderBy('name')->get();

        return view('public.blog.index', compact('posts', 'categories'));
    }

    /**
     * Posting berdasarkan kategori
     *
     * Menampilkan posting berdasarkan kategori yang dipilih.
     * Halaman ini dapat diakses di halaman `/blog/category/{id}/{slug}`
     *
     * @param   int     $id     Id kategori yang akan ditampilkan
     * @param   string  $slug   Slug kategori yang akan ditampilkan
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  View\Factory@public.blog.category
     */
    public function category($id = 0, $slug = null)
    {
        if ($id == 0 || $slug == null) {
            abort(403, 'Akses tidak diizinkan');
        }

        if (!Blog_category::where(['id' => $id, 'slug' => $slug])->exists()) {
            abort(404, 'Kategori itu tidak ada!');
        }

        $posts = Blog_post::with('categories')->whereHas('categories', function ($category) use ($id) {
            return $category->where('blog_categories.id', $id);
        })->where('status', 'publish')->paginate();
        $categories = Blog_category::orderBy('name')->get();
        $category = Blog_category::find($id);

        return view('public.blog.category', compact('category', 'categories', 'posts'));
    }

    /**
     * Halaman single post
     *
     * Menampilkan halaman single post yang dapat diakses
     * melalui halaman blog maupun kategori.
     * Menampilkan data posting dan komentar.
     *
     * @param   Blog_post   $post   Instance post yang diakses
     * @param   String      $slug   Slug posting
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  View\Factory@public.blog.post
     */
    public function post(Blog_post $post = null, $slug = null)
    {
        $comments = $post->comments()->with(['user', 'user.media', 'replies', 'replies.user'])
            ->where(['blog_comments.status' => 'approved', 'parent_id' => null])->get();

        return view('public.blog.post', compact('post', 'comments'));
    }

    /**
     * Menambah komentar baru
     *
     * Method untuk menambahkan komentar baru
     * ke posting. Diakses melalui form komentar pada
     * halaman single post atau dasbor
     *
     * @param   Request     $request    HTTP Request data
     * @param   Blog_post   $blog_post  Instance komentar yang akan dikomentari
     * @param   String      $slug       Slug posting yang akan dikomentari
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  redirectBack
     */
    public function post_comment(Request $request, Blog_post $post = null, $slug = null)
    {
        if (!getSetting('allowComment') || $post->allow_comment == false) {
            //jika komentar tidak diizinkan secara global, tidak ada yang boleh berkomentar
            //jika posting dinyatakan tidak menerima komentar

            abort(403, 'Komentar tidak dizinkan!');
        }

        if (auth()->check()) {
            $validator = Validator::make($request->all(), [
                'content' => ['required', 'min:2', 'max:512']
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'min:4', 'max:255'],
                'email' => ['required', 'min:10', 'max:255', 'email'],
                'website' => ['nullable', 'min:13', 'max:255'],
                'content' => ['required', 'max:512']
            ]);
        }

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $comment = new Blog_comment();
        $comment->content = $request->content;
        if ($request->reply_to != '') {
            $comment->parent_id = $request->reply_to;
        }
        if (auth()->check()) {
            //jika pemberi komentar sudah login,
            //gunakan data login dari session

            $comment->user_id = auth()->user()->id;
            $comment->name = auth()->user()->name;
            $comment->email = auth()->user()->email;
        } else {
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->website = $request->website;

            session(['commentName' => $request->name]);
            session(['commentEmail' => $request->email]);
            session(['commentWebsite' => $request->website]);
        }

        if (getSetting('moderateComment') || $post->moderate_comment == true) {
            $comment->status = 'on_moderation';
        }

        $comment->save();
        $post->comments()->save($comment);

        $returnMessage = ($comment->status != 'on_moderation') ? 'Berhasil menambahkan komentar' : 'Berhasil menambahkan komentar, tetapi admin perlu memverifikasinya sebelum dapat ditampilkan';

        return redirect()
            ->back()
            ->withSuccess($returnMessage);
    }
}
