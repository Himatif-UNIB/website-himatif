<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::where('period_id', getActivePeriod()->id)->with('position', 'user.media')->get();

        $positionTemp = [];
        $n = 0;
        foreach ($staff as $item) {
            $positionTemp[$n]['user'] = $item->user;
            $positionTemp[$n]['position'] = $item->position;

            $n++;
        }

        $collection = collect($positionTemp);
        $grouped = $collection->groupBy('position.order_level');
        $positions = $grouped->all();

        $getChilds = Staff::whereHas('position', function ($position) {
            return $position->where('parent_id', '!=', null);
        })->where('period_id', getActivePeriod()->id)->get();
        

        $childTemp = [];
        $n = 0;
        foreach ($getChilds as $item) {
            $childTemp[$n]['user'] = $item->user;
            $childTemp[$n]['position'] = $item->position;

            $n++;
        }

        $collection = collect($childTemp);
        $grouped = $collection->groupBy('position.parent_id');
        $childs = $grouped->all();

        return view('frontend.struktur', compact('childs', 'staff', 'positions'));
    }
}
