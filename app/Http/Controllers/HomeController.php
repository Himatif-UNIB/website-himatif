<?php

namespace App\Http\Controllers;

use App\Models\Blog_post;
use App\Models\Division;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $divisions = Division::with(['media'])->where('show', 1)->get();

        $getChilds = Staff::with(['position.division', 'user', 'user.member'])->whereHas('position', function ($position) {
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
        $getHeadOfDivisions = Staff::with(['user', 'position.division', 'user.media', 'user.member'])
            ->whereHas('position', function ($position) {
                return $position->where('parent_id', null)->where('division_id', '!=', 'null');
            })->where('period_id', getActivePeriod()->id)->get();

        $collection = collect($getHeadOfDivisions);
        $grouped = $collection->groupBy('position.division.id');
        $headOfDivisions = $grouped->all();

        $posts = Blog_post::orderBy('created_at', 'DESC')->where('status', 'publish')->take(3)->get();

        return view('public.index', compact('divisions', 'childs', 'headOfDivisions', 'posts'));
    }
}
