<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Position;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    /**
     * Menampilkan halaman manajemen pengurus
     * 
     * Halaman manajemen pengurus adalah halaman untuk
     * mengelola data pengurus
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.members.staff
     */
    public function index()
    {
        $roles = Role::where('name', '!=', 'super_admin')->get();

        return view('private.staff.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periods = Period::all();
        $positions = Position::orderBy('order_level', 'ASC')->get();
        $users = User::with('member')->whereHas('roles', function ($role) {
            return $role->where('name', '!=', 'super_admin');
        })->get();

        $staff = Staff::all();
        
        $collectStaff = collect($staff);
        $groupedStaff = $collectStaff->groupBy('position_id');

        $positionUsers = [];
        foreach ($groupedStaff->all() as $position => $data) {
            $temp_data = [];
            foreach ($data as $key => $data) {
                $temp_data = array_merge($temp_data, [$data['user_id']]);;
            }

            $positionUsers[$position] = $temp_data;
        }
        
        return view('private.staff.create', compact('periods', 'positions', 'positionUsers', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'period_id' => 'required|numeric'
        ]);

        $period = $request->period_id;
        $positions = $request->positions;

        Staff::where('period_id', $period)->delete();
        $insertData = [];

        $n = 0;
        foreach ($positions as $key => $data) {
            foreach ($positions[$key] as $user_id) {
                $tempData[] = ['period_id' => $period, 'position_id' => $key, 'user_id' => $user_id];
            }

            $insertData = $tempData;

            $n++;
        }

        DB::table('staff')->insert($insertData);
        
        return redirect()
            ->back()
            ->withSuccess('Berhasil menyimpan data kepengurusan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show()
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

        return view('private.staff.show', compact('childs', 'staff', 'positions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
