<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PositionController extends Controller
{
    /* Menampilkan halaman manajemen jabatan
     * 
     * Halaman manajemen jabatan adalah halaman
     * yang digunakan untuk mengelola jabatan pengurus
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.positions
     */
    public function index()
    {
        return view('admin.positions');
    }
}
