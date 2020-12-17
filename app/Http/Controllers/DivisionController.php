<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Menampilkan halaman manajemen divisi
     * 
     * Halaman manajemen divisi adalah
     * halaman yang menampilkan manajemen divisi
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.divisions
     */
    public function index()
    {
        return view('admin.divisions');
    }
}
