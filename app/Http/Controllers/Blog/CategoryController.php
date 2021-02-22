<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Membatasi akses ke halaman kategori
     * 
     * Hanya user yang memiliki permission manajemen blog dan kategori
     * yang dapat mengakses
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  void
     */
    public function __construct()
    {
        $this->middleware(['permission:create_blog_category|read_blog_category|update_blog_category|delete_blog_category']);
    }

    /**
     * Halaman manajemen kategori
     * 
     * Menampilkan halaman manajemen kategori blog
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return View\Factory@private.blog.categories
     */
    public function index()
    {
        return view('private.blog.categories');
    }
}
