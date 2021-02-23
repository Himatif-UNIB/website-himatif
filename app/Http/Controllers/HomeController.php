<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $divisions = Division::all();

        return view('frontend.beranda', compact('divisions'));
    }

    public function modal($divisionId)
    {
        $divisi = Division::where('id', $divisionId)->with('positionDivision');

        return response()->json(compact('data'));
    }
}
