<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog_category;
use App\Models\Blog_post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog_post::paginate();
        $categories = Blog_category::orderBy('name')->get();

        return view('public.blog.index', compact('posts', 'categories'));
    }

    public function category($id = 0, $slug = null)
    {
        if ($id == 0 || $slug == null) {
            abort(403, 'Akses tidak diizinkan');
        }

        if ( ! Blog_category::where(['id' => $id, 'slug' => $slug])->exists()) {
            abort(404, 'Kategori itu tidak ada!');
        }

        $posts = Blog_post::with('categories')->whereHas('categories', function ($category) use ($id) {
                return $category->where('blog_categories.id', $id);
            })->paginate();
        $categories = Blog_category::orderBy('name')->get();
        $category = Blog_category::find($id);

        return view('public.blog.category', compact('category', 'categories', 'posts'));
    }

    public function post($id = 0, $slug = null)
    {
        if ($id == 0 || $slug == null) {
            abort(403, 'Akses tidak diizinkan');
        }

        if ( ! Blog_post::where(['id' => $id, 'slug' => $slug])->exists()) {
            abort(404, 'Posting itu tidak ada!');
        }

        $post = Blog_post::find($id);
        
        return view('public.blog.post', compact('post'));
    }
}
