<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use App\Models\Force;
use App\Models\Staff;
use App\Models\Member;
use App\Models\Division;
use App\Models\Blog_post;
use App\Models\Form_answer;
use App\Models\Blog_comment;
use App\Models\Picture_gallery;
use App\Models\Position;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

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
        $role = Auth::user()->getRoleNames()[0];
        $userId = Auth::user()->id;
        $divisionStaffs = [];
        $divisionName = null;

        if ($role == 'head_of_division') {
            $getHeadPositionId = Staff::where('user_id', $userId)
                ->where('period_id', getActivePeriod()->id)
                ->first()
                ->position_id;

            $divisionStaffs = Staff::whereHas('position', function ($query) use ($getHeadPositionId) {
                $query->where('parent_id', $getHeadPositionId);
            })
                ->where('period_id', getActivePeriod()->id)
                ->get();

                $_getUserStaffId = Staff::where('period_id', getActivePeriod()->id)
            ->where('user_id', $userId)
            ->first()
            ->position_id;

            $divisionName = Position::where('id', $_getUserStaffId)
                ->with('division')->first()->division->name;
        }

        $data = [
            'divisionName' => $divisionName,
            'blog' => [
                'post' => Blog_post::where('user_id', $userId)->count(),
                'comment' => Blog_comment::whereHas('post', function ($post) use ($userId) {
                    return $post->where('user_id', $userId);
                })->count(),
                'commentModeration' => Blog_comment::whereHas('post', function ($post) use ($userId) {
                    return $post->where('user_id', $userId);
                })
                    ->where('status', 'on_moderation')->count()
            ],
            'forms' => Form::take(3)->withCount('answers')->get(),
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
                'blog' => [
                    'post' => Blog_post::count(),
                    'comment' => Blog_comment::count(),
                    'commentModeration' => Blog_comment::where('status', 'on_moderation')->count()
                ],
                'galleries' => Picture_gallery::with(['media', 'categories'])->paginate(10),
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

        return view('private.overview.' . $role)
            ->with($data);
    }
}
