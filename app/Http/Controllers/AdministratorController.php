<?php

namespace App\Http\Controllers;

use App\Models\Force;
use App\Models\Member;
use App\Models\Period;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Menampilkan halaman manejemen pengurus
     * 
     * Halaman manajemen pengurus adalah halaman untuk
     * mengelola data pengurus
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.administrators
     */
    public function index()
    {
        return view('admin.administrators');
    }
}
