<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForceController extends Controller
{
    /**
     * Menampilkan halaman manajemen angkatan
     * 
     * Halaman manajemen angkatan adalah
     * halaman yang menampilkan manajemen angkatan
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.forces
     */
    public function index()
    {
        return view('admin.forces');
    }
}
