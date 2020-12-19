<?php

namespace App\Http\Controllers;

use App\Exports\MembersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    public function index()
    {
        return view('admin.members');
    }

    public function export()
    {
        return Excel::download(new MembersExport, 'Data Anggota HIMATIF - '. time() .'.xlsx');
    }
}
