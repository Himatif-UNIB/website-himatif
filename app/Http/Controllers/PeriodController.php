<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Menampilkan halaman manajemen periode kepengurusan
     * 
     * Halaman manajemen periode kepengurusan adalah
     * halaman yang menampilkan manajemen periode kepengurusan
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.periods
     */
    public function index()
    {
        return view('admin.periods');
    }
}
