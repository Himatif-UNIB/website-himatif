<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $divisions = Division::all();

        return view('frontend.beranda', compact('divisions'));
    }
}
