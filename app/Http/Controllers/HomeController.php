<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $divisions = Division::all();

        $getChilds = Staff::with('position.division')->whereHas('position', function ($position) {
            return $position->where('parent_id', '!=', null);
        })->where('period_id', getActivePeriod()->id)->get();

        $childTemp = [];
        $n = 0;
        foreach ($getChilds as $item) {
            $childTemp[$n]['user'] = $item->user;
            $childTemp[$n]['position'] = $item->position;

            $n++;
        }

        $collection = collect($getChilds);
        $grouped = $collection->groupBy('position.division_id');
        $childs = $grouped->all();

        $headOfDivisions = [];
        $getHeadOfDivisions = Staff::with('user', 'position.division')->whereHas('position', function ($position) {
            return $position->where('parent_id', null)->where('division_id', '!=', 'null');
        })->where('period_id', getActivePeriod()->id)->get();

        $collection = collect($getHeadOfDivisions);
        $grouped = $collection->groupBy('position.division.id');
        $headOfDivisions = $grouped->all();

        //dd($headOfDivisions);

        return view('public.beranda', compact('divisions', 'childs', 'headOfDivisions'));
    }

    public function modal($divisionId)
    {
        $divisi = Division::where('id', $divisionId)->with('positionDivision');

        return response()->json(compact('data'));
    }
}
