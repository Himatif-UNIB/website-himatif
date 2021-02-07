<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    
    /**
     * AdminController@index
     * 
     * Menampilkan halaman admin saat diakses dengan
     * route [admin.index]
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.index
     */
    public function index()
    {
        return view('private.admin.index');
    }
}
