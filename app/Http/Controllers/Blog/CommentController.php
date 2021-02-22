<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog_comment;
use App\Models\Blog_post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Halaman daftar komentar
     * 
     * Menampilkan halaman daftar komentar blog.
     * Sekretaris bisa melihat semua komentar, sedangkan
     * user biasa hanya bisa melihat komentar miliknya
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.blog.comments.index
     */
    public function index()
    {
        $isSecretary = (auth()->user()->roles[0]->name === 'secretary');
        
        if ($isSecretary) {
            $comments = Blog_comment::orderBy('created_at', 'DESC')->paginate();
        }
        else {
            $comments = Blog_comment::whereHas('post', function ($post) {
                return $post->where('user_id', auth()->user()->id);
            })->orderBy('created_at', 'DESC')->paginate();
        }

        return view('private.blog.comments.index', compact('comments'));
    }

    /**
     * Menampilkan komentar berdasarkan posting
     * 
     * Menampilkan halaman komentar berdasarkan posting.
     * Sekretaris bisa melihat semua komentar, sedangkan
     * user biasa hanya bisa melihat komentar miliknya.
     * Tetapi hanya pemilik posting yang bisa menerima, menolak
     * atau menghapus komentar posting
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.blog.comments.post
     */
    public function post(Blog_post $post)
    {
        return view('private.blog.comments.post', compact('post'));
    }

    /**
     * Menampilkan komentar berdasarkan penulis posting
     * 
     * Menampilkan halaman komentar berdasarkan penulis posting.
     * Sekretaris bisa melihat semua komentar, sedangkan
     * user biasa hanya bisa melihat komentar miliknya.
     * Tetapi hanya pemilik posting yang bisa menerima, menolak
     * atau menghapus komentar posting
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.blog.comments.user
     */
    public function user($user = 0)
    {
        $comments = Blog_comment::where('user_id', $user)->paginate();

        return view('private.blog.comments.index', compact('comments'));
    }
}
