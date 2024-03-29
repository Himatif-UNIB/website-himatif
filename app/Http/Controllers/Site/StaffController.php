<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Halaman struktur kepengurusan
     *
     * Menampilkan halaman struktur kepengurusan
     * berdasarkan data yang sudah diinput oleh sekretaris
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  View\Factory@frontend.struktur
     */
    public function index()
    {
        $staff = Staff::where('period_id', getActivePeriod()->id)->with(['position', 'user', 'user.media'])->get();

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

        $getChilds = Staff::with(['user', 'position','user.member'])->whereHas('position', function ($position) {
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
        $grouped = $collection->groupBy('position.parent_id');
        $childs = $grouped->all();

        ///
        // $getChilds = Staff::with(['position.division', 'user', 'user.member'])->whereHas('position', function ($position) {
        //     return $position->where('parent_id', '!=', null);
        // })->where('period_id', getActivePeriod()->id)->get();

        // $childTemp = [];
        // $n = 0;
        // foreach ($getChilds as $item) {
        //     $childTemp[$n]['user'] = $item->user;
        //     $childTemp[$n]['position'] = $item->position;

        //     $n++;
        // }

        // $collection = collect($getChilds);
        // $grouped = $collection->groupBy('position.division_id');
        // $childs = $grouped->all();
        
        $headOfDivisions = [];
        $getHeadOfDivisions = Staff::with(['user', 'position.division', 'user.media', 'user.member'])
            ->whereHas('position', function ($position) {
                return $position->where('parent_id', null)->where('division_id', '!=', 'null');
            })->where('period_id', getActivePeriod()->id)->get();

        $collection = collect($getHeadOfDivisions);
        $grouped = $collection->groupBy('position.division.id');
        $headOfDivisions = $grouped->all();
        

        return view('public.structures', compact('childs', 'staff','headOfDivisions', 'positions'));
    }
}
