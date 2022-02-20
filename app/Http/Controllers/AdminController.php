<?php

namespace App\Http\Controllers;

use App\Models\Blog_comment;
use App\Models\Blog_post;
use App\Models\Division;
use App\Models\Force;
use App\Models\Form;
use App\Models\Form_answer;
use App\Models\Member;
use App\Models\Picture_gallery;
use App\Models\Staff;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    
    /**
     * AdminController@index
     * 
     * Menampilkan halaman admin saat diakses dengan
     * route [admin.index]
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.{$role}
     */
    public function index()
    {
        $role = auth()->user()->getRoleNames()[0];
        $divisionStaffs = [];

        if ($role == 'head_of_division') {
            $parent = auth()->user()->staffs[0]->position_id;

            $divisionStaffs = Staff::whereHas('position', function ($position) use($parent) {
                return $position->where('parent_id', $parent);
            })->get();
        }

        $data = [
            'secretary' => [
                'forceCount' => Force::count(),
                'memberCount' => Member::whereHas('memberUser')->count(),
                'divisionCount' => Division::count(),
                'staffCount' => Staff::count(),
                'form' => [
                    'published' => Form::where('status', 2)->count(),
                    'draft' => Form::where('status', 1)->count(),
                    'closed' => Form::where('status', 3)->count(),
                    'all' => Form::count(),
                    'answers' => Form_answer::count()
                ],
                'galleries' => Picture_gallery::with(['media', 'categories'])->paginate(10),
                'blog' => [
                    'post' => Blog_post::count(),
                    'comment' => Blog_comment::count(),
                    'commentModeration' => Blog_comment::where('status', 'on_moderation')->count()
                ],
                'latestPost' => (Blog_post::orderBy('created_at', 'DESC')->limit(1)->exists()) ?
                    Blog_post::orderBy('created_at', 'DESC')->limit(1)->first() : null,
                'comments' => Blog_comment::with(['post'])->where('status', 'approved')->limit(3)->get()
            ],
            'divisionStaffs' => $divisionStaffs,
            'admin' => [
                'userCount' => User::count(),
                'role' => Role::count(),
                'permission' => Permission::count()
            ]
        ];

        $divisionStaff = [];
        
        return view('private.overview.'. $role)
            ->with($data);
    }
}
